<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class PreferencesController extends Controller
{
    public function setTheme(Request $request)
    {
        $theme = $request->input('theme', 'light');
        // Simpan cookie selama 1 tahun (525600 menit)
        Cookie::queue('theme', $theme, 60 * 24 * 365);

        return response()->json(['message' => 'Theme updated', 'theme' => $theme]);
    }

    public function setLanguage(Request $request)
    {
        $lang = $request->input('lang', 'en');
        // Simpan cookie selama 1 tahun juga
        Cookie::queue('lang', $lang, 60 * 24 * 365);

        return redirect()->back();
    }

    public function getPreferences()
    {
        return [
            'theme' => Cookie::get('theme', 'light'),
            'lang' => Cookie::get('lang', 'en'),
        ];
    }
}
