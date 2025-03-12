<x-workopia-layout>
<x-slot name="title">View all Jobs</x-slot>
<ul>
    @forelse($jobs as $job)
        <li><a href="{{ route('jobs.show', $job->id) }}">{{ $job->title }}</a></li>
    @empty
        <li>No Jobs Found</li>
    @endforelse
</ul>
</x-workopia-layout>
