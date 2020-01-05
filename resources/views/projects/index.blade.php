@extends ('layouts.app')
@section('content')
    <div class="flex items-center justify-between mb-3">       
        <h2 class="subpixel-antialiased text-gray-500">My Projects</h2>
        <button class="py-2 px-3 bg-blue-400 text-gray-100 rounded shadow mb-2 tracking-wide font-light"><a href="/projects/create">Add Project</a></button>
    </div>
    <main class="flex flex-wrap -mx-3">
        @forelse ($projects as $project)
                <div class="w-1/3 px-3 pb-6">
                    <div class="bg-white p-8 shadow-md rounded" style="height:16rem">
                        <h1 class="text-xl font-semibold py-4">{{ $project->title }}</h1>
                        <div class="text-gray-700 pb-4">{{ Str::limit($project->description,150) }}</div>
                    </div>
                </div>
        @empty
            <div>No Projects yet</div>
        @endforelse
    </main>
@endsection
