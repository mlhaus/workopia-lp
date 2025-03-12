<x-workopia-layout>
    <x-slot name="title">Viewing {{ $job->title }}</x-slot>
    <h1 class='text-2xl'>{{ $job->title }}</h1>
    <p>{{ $job->description }}</p>
</x-workopia-layout>