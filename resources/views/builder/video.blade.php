@php

$url = $block['video_url'] ?? null;
preg_match('/src="(.+?)"/', $url, $matches);
$src = $matches[1];

// Add extra parameters to src and replace HTML.
$params = array(
    'controls'  => 1,
    'hd'        => 1,
    'autohide'  => 1
);
$new_src = add_query_arg($params, $src);
$url = str_replace($src, $new_src, $url);

// Add extra attributes to iframe HTML.
$attributes = 'frameborder="0"';
$url = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $url);
@endphp


@if (!empty($url))
<div class="grid lg:grid-cols-8 gap-5 lg:mt-full mt-half">
    <div class="lg:col-start-2 lg:col-span-6 col-span-full aspect-video relative">
        {!! $url !!}
        {{-- @include('partials.hover-box', ['class' => "z-10", 'svg' => "play"]) --}}
    </div>
</div>
@endif