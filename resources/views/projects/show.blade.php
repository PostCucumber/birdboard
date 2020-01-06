@extends ('layouts.app')
@section('content')
    <h1 class="text-xl font-semibold">{{ $project->title }}</h1>
    <div>{{ $project->description }}</div>
    <a href="/projects">Go Back</a>
@endsection