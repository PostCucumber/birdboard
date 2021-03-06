@extends ('layouts.app')
@section('content')
    <header class="flex items-center justify-between mb-3">       
        <h2 class="subpixel-antialiased text-gray-500">My Projects</h2>
        <button class="button"><a href="/projects/create">Add Project</a></button>
    </header>
    <main class="lg:flex lg:flex-wrap -mx-3">
        @forelse ($projects as $project)
            <div class="lg:w-1/3 px-3 pb-6">
                @include('projects.card')
            </div>
        @empty
            <div>No Projects yet</div>
        @endforelse
    </main>
@endsection
