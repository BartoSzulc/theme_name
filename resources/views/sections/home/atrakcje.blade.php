@php
    $data = get_field('attractions');
    $badge = $data['badge'] ?? null;
    $title = $data['title'] ?? null;
    $desc = $data['desc'] ?? null;
    $links = $data['links'] ?? null;
    $images  = $data['images'] ?? null;


@endphp

@if ($data)
<section id="atrakcje" class="home-atrakcje relative bg-gray-light py-half md:py-full rounded-absolute">
    <div class="container">
    <div class="grid grid-cols-12 gap-5 gap-y-10 lg:gap-y-0">
            <div class="xl:col-start-2 lg:col-span-6 xl:col-span-4 col-span-full">
                <div class="flex flex-col justify-between h-full">
                    <div class="content flex flex-col space-y-5 lg:space-y-half md:pr-10" data-aos="fade-up">
                        @if ($badge)
                        <span class="badge">
                            {{ $badge }}
                        </span>
                        @endif
                        @if ($title)
                        <div class="heading text-7xl ">
                            {!! $title !!}
                        </div>
                        @endif
                        @if ($desc)
                        <div class="desc md:pr-28">
                            {!! $desc !!}
                        </div>
                        @endif
                    </div>
                    @if ($links)
                    <div class="buttons flex items-center justify-center lg:justify-start mt-5" data-aos="fade-up">
                        @foreach ($links as $link)
                        <div class="custom-border w-fit">
                            @if ($link['link'])
                            <a class="btn-green" href="{{ $link['link']['url'] }}">
                                {!! $link['link']['title'] !!}
                            </a>
                            @endif
                        </div>
                        @endforeach
                    </div> 
                    @endif
                </div>         
            </div>
            @if ($images)
            <div class="col-span-full lg:col-span-6 relative" data-aos="fade-up">
                <div class="grid grid-cols-6 gap-2.5 md:gap-5">
                    @foreach ($images as $image)
                    <div class="col-span-2 flex items-center justify-center">
                        @if ($image['image'])
                        <img class="rounded" src="{{ $image['image']['url'] }}" alt="">
                        @endif
                    </div>
                    @endforeach
                </div>

            </div>
            @endif
        </div>
    </div>
</section>
@endif