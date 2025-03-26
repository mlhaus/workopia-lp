@props([
    'heading' => 'Looking to hire?', 
    'subheading' => 'Post your job listing now and find the perfect candidate.',
    'btnText' => 'Create job',
    'btnLink' => '/jobs/create',
    'btnIcon' => 'edit',
    'btnColor' => 'yellow'
 ])
<section class="container mx-auto my-6 max-w-screen-xl px-4">
    <div
        class="bg-blue-800 text-white rounded p-4 flex items-center justify-between"
    >
        <div>
            <h2 class="text-xl font-semibold">{{ $heading }}</h2>
            <p class="text-gray-200 text-lg mt-2">
                {{ $subheading }}
            </p>
        </div>
        <x-workopia-button-link url="{{ $btnLink }}" icon="{{ $btnIcon }}" btnColor="{{ $btnColor }}">{{ $btnText }}</x-workopia-button-link>
    </div>
</section>
