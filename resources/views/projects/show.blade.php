@extends ('layouts.app')
@section('content')
    <header class="flex items-center justify-between mb-3">       
        <p class="subpixel-antialiased text-gray-500">
            <a href="/projects">My Projects</a> / {{ $project->title }}
        </p>
        <button class="button">
            <a href="/projects/create">Add Project</a>
        </button>
    </header>

    <main>
        <div class="lg:flex -mx-3">
            <div class="lg:w-3/4 px-3 mb-6">
                <div class="mb-8">    
                    <h2 class="subpixel-antialiased text-gray-500 text-lg mb-3">Tasks</h2>
                    <div class="card">Lorem Ipsum.</div>
                </div>
                <div>
                    <h2 class="subpixel-antialiased text-gray-500 text-lg mb-3">General Notes</h2>
                    <textarea class="card w-full" style="min-height:200px">Lorem Ipsum.</textarea>
                </div>
            </div>
            <div class="lg:w-1/4 px-3">
                @include('projects.card')   
            </div>
        </div>
    </main>

@endsection