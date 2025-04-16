@props(['url' => '/', 'icon' => null, 'btnColor' => 'yellow', 'mobile' => false])

<a
    href="{{ $url }}"
    class="bg-{{ $btnColor }}-500 hover:bg-{{ $btnColor }}-600 text-black px-4 py-2 @if($mobile) block @endif rounded hover:shadow-md transition duration-300"
>
    @if($icon)<i class="fa fa-{{ $icon }}"></i>@endif {{ $slot }}
</a>
