<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\User;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function store(Request $request){

        if($request->hasFile('file_url')){
            $name = date('h-m-s') .$request->file('file_url')->getClientOriginalName();
            $path = $request->file('file_url')->storeAs('files', $name, options: 'public');
        }

         $request->validate([
            'subject' => 'required|max:255',
            'message' => 'required',
            'file_url' =>  'file|mimes:png,jpg,bmp,png,pdf'
        ]);
        
        $application = Application::create([
            'subject' => $request->subject,
            'message' => $request->message,
            'file_url' => $path ?? null,
            'user_id' => auth()->user()->id,
            
        ]);

        return redirect()->back();
    }

    
}
