@extends ('layouts.app')
@section('content')
    <div class="flex items-center">       
        <h1 class="mr-auto mb-3 text-blue-200">Birdboard</h1>
        <a href="/projects/create">Create New Project</a>
    </div>
    <div class="flex">
        @forelse ($projects as $project)
                <div class="bg-white mr-4 p-8 shadow-md rounded w-1/3">
                    <h1 class="text-xl font-semibold py-4">{{ $project->title }}</h1>
                    <div class="text-gray-700 ">{{ Str::limit($project->description,150) }}</div>
                </div>
        @empty
            <div>No Projects yet</div>
        @endforelse
    </div>
@endsection
