<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{

    public function index()
    {
        // dd(auth()->user());
        // dd(auth()->user()->projects);
        if ((auth()->user()) != NULL)
        {
            $projects = auth()->user()->projects; //scope to current user's projects or ask to login
            return view('projects.index', compact('projects'));
        }
        else
        {
            redirect('/login');
            return;
        }
    }

    public function show(Project $project)
    {
        if (auth()->user()->isNot($project->owner)) {
            abort(403);
        }  
        return view('projects.show', compact('project'));
    }

    public function store()
    {
        auth()->user()->projects()->create(request()->validate([
            'title' => 'required',
            'description' => 'required',
        ]));
        
        return redirect('/projects');
    }

    public function create()
    {
        return view('projects.create');
    }
}
