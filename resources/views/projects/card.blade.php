<div class="card" style="height:16rem">
    <h3 class="text-xl font-semibold py-4 -ml-5 mb-3 border-l-4 border-blue-brand pl-4">
        <a href="{{ $project->path() }}">{{ $project->title }}</a>
    </h3>
    <div class="text-gray-700 pb-4">{{ Str::limit($project->description,150) }}</div>
</div>
