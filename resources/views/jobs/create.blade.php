<x-workopia-layout>
<x-slot name="title">Create a New Job</x-slot>
<h1>Create Job</h1>
<form action="/jobs" method="POST">
    @csrf
    <input type="text" name="title" placeholder="Title" value="{{ old('title') }}" />
    @error('title')
    <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
    @enderror
    <input type="text" name="description" placeholder="Description" value="{{ old('description') }}" />
    @error('description')
    <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
    @enderror
    <button type="submit">Submit</button>
</form>
</x-workopia-layout>
