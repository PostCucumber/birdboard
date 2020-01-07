@extends ('layouts.app')
@section('content')
    <header class="flex items-center justify-between mb-3">       
        <h2 class="subpixel-antialiased text-gray-500">My Projects</h2>
        <button class="button"><a href="/projects/create">Add Project</a></button>
    </header>

    <main>
        <div class="lg:flex -mx-3">
            <div class="lg:w-3/4 px-3 mb-6">
                <div class="mb-6">    
                    <h2 class="subpixel-antialiased text-gray-500 text-lg mb-3">Tasks</h2>
                    <div class="card">Lorem Ipsum.</div>
                </div>
                <div>
                    <h2 class="subpixel-antialiased text-gray-500 text-lg mb-3">General Notes</h2>
                    <div class="card">Lorem Ipsum.</div>
                </div>
            </div>
            <div class="w-1/4 px-3">
                <div class="card">
                    <h1 class="text-xl font-semibold">{{ $project->title }}</h1>
                    <div>{{ $project->description }}</div>
                    <a href="/projects">Go Back</a>
                </div>
            </div>
        </div>
    </main>

@endsection