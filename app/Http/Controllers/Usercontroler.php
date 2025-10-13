<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class Usercontroler extends Controller
{
public function login(Request $request)
{
    $data = $request->validate([
        'username' => 'required',
        'password' => 'required',
    ]);

    $user = User::where('name', $data['username'])->first();

        if ($user && $data['password'] === $user->password) {
        session(['users' => $user]);

        if($user->pangkat === 'admin'){
            return response()->json(['success' => true,'admin'=>true]);
        }
        return response()->json(['success' => true]);
    }

    return response()->json(['success' => false,'admin'=>true]);
}

}
