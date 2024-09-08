<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CheckRole;
use App\Models\Application;
use App\Models\Role;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\Gate;
use Mockery\Generator\Method;


class AnswerController extends Controller 

{  
    
    
    
    public function create(Application $application){
       /* if (! Gate::allows('answers-create', auth()->user())) {
            abort(403);
        }*/
        
        return view('answers.create', ['application' => $application]);
    }

    public function store(Application $application, Request $request){

        /*if (! Gate::allows('answers-create', auth()->user())) {
            abort(403);
        }*/
        $request->validate(['body' => 'required']);

        $application->answer()->create([
            'body' => $request->body
        ]);
        

        return redirect()->route('dashboard');
    }
}
