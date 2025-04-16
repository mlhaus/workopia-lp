<x-workopia-layout>
<x-slot name="title">{{ $title }}</x-slot>
<h2 class="text-2xl">{{ $title }}</h2>
<div class="mb-4">{{ $jobs->links() }}</div>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 my-6">
    @forelse($jobs as $job)
        <x-job-card :job="$job"></x-job-card>
    @empty
        <p>No Jobs Found</p>
    @endforelse
</div>
<div class="mt-4">{{ $jobs->links() }}</div>
</x-workopia-layout>
