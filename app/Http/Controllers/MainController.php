<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function main(){
        return view('dashboard');
    }

    public function dashboard(){        
        return view('dashboard')->with(['applications' => Application::latest()->paginate(10)]);
    }
}
