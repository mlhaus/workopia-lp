@props(['url' => '/', 'icon' => null, 'btnColor' => 'yellow'])

<a
    href="{{ getenv('APP_URL') }}{{ $url }}"
    class="bg-{{ $btnColor }}-500 hover:bg-{{ $btnColor }}-600 text-black px-4 py-2 rounded hover:shadow-md transition duration-300"
>
    @if($icon)<i class="fa fa-{{ $icon }}"></i>@endif {{ $slot }}
</a>
