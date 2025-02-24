<x-workopia-layout>
<x-slot name="title">View all Jobs</x-slot>
<ul>
    @forelse($jobs as $job)
        <li>{{ $job }}</li>
    @empty
        <li>No Jobs Found</li>
    @endforelse
</ul>
</x-workopia-layout>
