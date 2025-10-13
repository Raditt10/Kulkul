<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminControler extends Controller{
    public function lgd(Request $request){
        $user = session('user');

        if($user->pangkat === 'admin'){
            return response()->json([
                'admin' => true,
                'success' => true
            ]);
        }else{
            return response()->json([
                'admin' => false,
                'success' => false
            ]);
        }

    }
}
