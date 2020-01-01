@extends ('layouts.app')
@section('content')
    <div class="flex items-center">       
        <h1 class="mr-auto mb-3">Birdboard</h1>
        <a href="/projects/create">Create New Project</a>
    </div>
    <div class="flex">
        @forelse ($projects as $project)
                <div class="bg-white mr-4 p-8 shadow-md rounded">
                    <h3>{{ $project->title }}</h3>
                    <div>{{ $project->description }}</div>
                </div>
        @empty
            <div>No Projects yet</div>
        @endforelse
    </div>
@endsection
