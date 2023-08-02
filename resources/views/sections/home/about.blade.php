@php
$data = get_field('about');
$badge  = $data['badge'] ?? null;
$title = $data['title'] ?? null;
$desc = $data['desc'] ?? null;
$links = $data['links'] ?? null;
$images = $data['images'] ?? null;
@endphp

@if ($data)
<div class="home-about md:pt-full md:pb-[180px] py-half relative overflow-hidden">
    <div class="absolute w-full h-full bg-gray-light top-0 rounded-absolute"></div>
    <div class="container relative z-10">
        <div class="grid grid-cols-12 gap-5">
            <div class="xl:col-start-2 xl:col-span-4 lg:col-span-6 col-span-full" data-aos="fade-up">
                <div class="flex flex-col justify-between h-full">
                    <div class="content flex flex-col space-y-5 lg:space-y-half 4xl:pr-40">
                        @if ($badge)
                        <span class="badge">
                            {!! $badge !!}
                        </span>
                        @endif
                        @if ($title)
                        <div class="heading text-8xl ">
                            {!! $title !!}
                        </div>
                        @endif
                        @if ($desc)
                        <div class="desc">
                            {!! $desc !!}
                        </div>
                        @endif
                        
                    </div>
                    @if ($links)
                    <div class="buttons flex flex-wrap 4xl:flex-nowrap items-center lg:justify-start justify-center gap-4 5xl:space-x-5 mt-5">
                        @foreach ($links as $link)

                        <div class="custom-border w-fit">
                            <a class="btn-green" href="{{ $link['link']['url'] }}">
                                {{ $link['link']['title'] }}
                            </a>
                        </div>
                        @endforeach
                    </div> 
                    @endif
                </div>         
            </div>
            @if ($images)
            <div class="col-span-full lg:col-span-6 relative h-fit" data-aos="fade-up">
                <div class="swiper aboutSwiper">
                    <div class="swiper-wrapper">
                        @foreach ($images as $image)
                        <div class="swiper-slide rounded">
                            <img class="object-cover h-full w-full rounded" src="{{ $image['image']['url'] }}" alt="">
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="aboutSwiper__nav flex w-full justify-between h-fit self-end absolute top-1/2 transform -translate-y-1/2 z-10">
                    <button class="aboutSwiper__nav--prev cursor-pointer group relative -left-10 button-swiper">
                        <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="40" cy="40" r="40" fill="#F3F3F3"/>
                            <path class="fill-gray transition-colors" d="M49.6777 38.3631C49.5877 38.3476 49.4966 38.3405 49.4054 38.3418H33.8849L34.2233 38.1749C34.5541 38.0089 34.855 37.783 35.1126 37.5075L39.465 32.8938C40.0382 32.3138 40.1345 31.3807 39.6932 30.6829C39.1796 29.9394 38.1947 29.778 37.4933 30.3224C37.4366 30.3664 37.3827 30.4144 37.3321 30.466L29.4617 38.809C28.8466 39.4602 28.846 40.5167 29.4604 41.1687C29.4608 41.1691 29.4613 41.1696 29.4617 41.17L37.3321 49.5129C37.9477 50.1636 38.9443 50.1622 39.5582 49.5096C39.6065 49.4583 39.6516 49.4036 39.6932 49.3461C40.1345 48.6483 40.0382 47.7152 39.465 47.1352L35.1205 42.5132C34.8896 42.2681 34.624 42.0626 34.3335 41.9042L33.8612 41.6789H49.3188C50.1229 41.7106 50.8284 41.1151 50.9795 40.2773C51.1186 39.3677 50.5358 38.5107 49.6777 38.3631Z"/>
                        </svg>  
                    </button>
                    <button class="aboutSwiper__nav--next cursor-pointer group rotate-180 relative -right-10 button-swiper">
                        <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="40" cy="40" r="40" fill="#F3F3F3"/>
                            <path class="fill-gray transition-colors" d="M49.6777 38.3631C49.5877 38.3476 49.4966 38.3405 49.4054 38.3418H33.8849L34.2233 38.1749C34.5541 38.0089 34.855 37.783 35.1126 37.5075L39.465 32.8938C40.0382 32.3138 40.1345 31.3807 39.6932 30.6829C39.1796 29.9394 38.1947 29.778 37.4933 30.3224C37.4366 30.3664 37.3827 30.4144 37.3321 30.466L29.4617 38.809C28.8466 39.4602 28.846 40.5167 29.4604 41.1687C29.4608 41.1691 29.4613 41.1696 29.4617 41.17L37.3321 49.5129C37.9477 50.1636 38.9443 50.1622 39.5582 49.5096C39.6065 49.4583 39.6516 49.4036 39.6932 49.3461C40.1345 48.6483 40.0382 47.7152 39.465 47.1352L35.1205 42.5132C34.8896 42.2681 34.624 42.0626 34.3335 41.9042L33.8612 41.6789H49.3188C50.1229 41.7106 50.8284 41.1151 50.9795 40.2773C51.1186 39.3677 50.5358 38.5107 49.6777 38.3631Z" />
                        </svg>  
                    </button>
                </div> 
            </div>
            @endif
        </div>
    </div>
</div>
@endif
