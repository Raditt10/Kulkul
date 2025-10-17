<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserSettingsController extends Controller
{
    public function updatePassword(Request $request)
    {
        $request->validate([
            'oldPassword' => 'required',
            'newPassword' => 'required|min:8|confirmed',
        ]);

        $user = session('user');
        if (!$user) {
            return response()->json(['success' => false, 'message' => 'Sesi berakhir. Silakan login ulang.']);
        }

        // Ambil password lama dari database
        $dbUser = DB::table('users')->where('nis', $user->nis)->first();
        if (!$dbUser) {
            return response()->json(['success' => false, 'message' => 'User tidak ditemukan.']);
        }

        // Validasi password lama
        if ($dbUser->password !== $request->oldPassword) {
            return response()->json(['success' => false, 'message' => 'Password lama salah.']);
        }

        // Update password baru
        $user = User::where('nis', session('user')->nis)->first();
        if ($user) {
            $user->password = $request->newPassword;
            $user->save();
            return response()->json(['success' => true, 'message' => 'Password berhasil diubah!']);
        }

        return response()->json(['success' => true, 'message' => 'Password berhasil diubah!']);
    }

    public function sessions()
    {
        $userId = session('nis');
        $user = DB::table('users')->find($userId);

        $token = request()->cookie('user_token');
        $session = DB::table('sessions')->where('id', $token)->first();

        if (!$session) {
            return redirect('/login'); // token nggak valid atau sesi expired
        }

        $sessions = DB::table('sessions')
                    ->where('user_id', $user['id'])
                    ->get();
   
        return view('user.settings', [
            'user' => $user,
            'sessions' => $sessions,
        ]);
    }

    public function logoutSession($sessionId)
    {
        DB::table('sessions_custom')->where('session_token', $token)->delete();
        cookie()->queue(cookie()->forget('session_token'));

        return back()->with('status', 'Perangkat berhasil dikeluarkan.');
    }

    public function logoutAllSessions()
    {
        $userId = session('user_id');
        $user = DB::table('users')->find($userId);
        
        DB::table('sessions_custom')->where('user_id', session('user_id'))->delete();
        session()->flush();
        foreach (request()->cookies as $cookieName => $value) {
            cookie()->queue(cookie()->forget($cookieName));
        }
        
        return redirect('/login')->with('status', 'Semua perangkat telah logout.');
    }

    public function deleteData()
    {
        $userId = session('user_id');

        // contoh hapus data terkait user
        DB::table('posts')->where('user_id', $userId)->delete();
        DB::table('comments')->where('user_id', $userId)->delete();
        DB::table('activities')->where('user_id', $userId)->delete();

        return back()->with('status', 'Semua data Anda berhasil dihapus.');
    }

    public function deleteAccount()
    {
        $userId = session('user_id');

        // hapus akun dari DB
        DB::table('users')->where('id', $userId)->delete();

        // hapus semua session & cookie
        session()->flush();
        foreach (request()->cookies as $cookieName => $value) {
            cookie()->queue(cookie()->forget($cookieName));
        }

        return redirect('/')->with('status', 'Akun berhasil dihapus secara permanen.');
    }
}