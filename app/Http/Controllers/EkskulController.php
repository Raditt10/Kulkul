<?php

namespace App\Http\Controllers;
use App\Models\ekskul;

use Illuminate\Http\Request;

class EkskulController extends Controller
{
    public function viewData(){
        $data = ekskul::all();
        
        return view('admin.ekstrakurikuler', compact('data'));
    }
}
