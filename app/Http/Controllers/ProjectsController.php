<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{


    public function index()
    {
        $user = auth()->user();
        if ($user != null) {
            $projects = auth()->user()->projects; //scope to current user's projects or ask to login
            return view('projects.index', compact('projects'));
        } 
        else {
            $error = 'User is a guest.';
            return redirect('/login');
        }   
    }

    public function show(Project $project)
    {
        $user = auth()->user();
        if ($user != null) {
            if (auth()->user()->isNot($project->owner)) {
                abort(403);
            }
            return view('projects.show', compact('project'));
        }
        else {
            return redirect('/login');
        }
    }

    public function store() //set user as null in test!!!!
    {
        auth()->user()->projects()->create(request()->validate([
            'title' => 'required',
            'description' => 'required',
        ]));
        
        return redirect('/projects');
    }

    public function create()
    {
        $user = auth()->user();
        if ($user != null) {
            return view('projects.create');
        }
        else {
            return redirect('/login');
        }
    }
}
