@php
    $image = $element['image'] ?? null;
    $title = $element['content'] ?? null;
    $link = $element['link']['url'] ?? null;
@endphp
<div class="swiper-slide">
    <a class="transition-all hover:text-primary hover:underline" href="{{$link}}">
        <div class="box">
            <img src="{{ $image['url'] }}" alt="">
            <div class="title">
                {!! $title !!}
            </div>
        </div>
    </a>
    
</div>