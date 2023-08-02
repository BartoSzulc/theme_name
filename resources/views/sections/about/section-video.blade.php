
@php

$video = $data['video'] ?? null;
$left = $video['left'] ?? null;
$image = $left['image']['url'] ?? null;
$url = $left['link'] ?? null;

$right = $video['right'] ?? null;
$title = $right['title'] ?? null;
$subtitle = $right['subtitle'] ?? null;
$content = $right['content'] ?? null;
$link = $right['link'] ?? null;


@endphp
@if (!empty($video))
<section class="about__video bg-gray-light py-half lg:py-full">
    <div class="container">
        <div class="grid grid-cols-12 gap-5">
            <div class="xl:col-start-2 xl:col-span-10 col-span-12 grid grid-cols-10 gap-5 relative py-half lg:py-full">
                <div class="absolute top-0 right-0 w-[calc((1212/1520)*100%)] h-full bg-white z-0"></div>
                @if (!empty($left))
                <div class="col-span-full lg:col-span-5 drop-shadow-cien-2 relative z-10 flex items-center justify-center lg:justify-start ">
                    @if (!empty($url))
                    <a @click="modelOpen = true" class="cursor-pointer relative"  data-aos="fade-up">
                        <img src="{{$image}}" alt="">
                        @include('partials.hover-box', ['class' => "z-10", 'svg' => "play"])
                    </a> 
                    @else 
                    <img src="{{$image}}" alt="">
                    @endif 
                </div>
                @endif
                @if (!empty($right))
                <div class="order-first lg:order-last col-span-full 4xl:col-start-7 lg:col-start-7 4xl:col-span-3 lg:col-span-4 relative z-10 flex flex-col">
                    @if (!empty($title))
                    <div class="badge mb-30 lg:mb-half w-full 4xl:whitespace-nowrap"  data-aos="fade-up">
                       {!! $title !!}
                    </div>
                    @endif
                    @if (!empty($subtitle))
                    <div class="text-5xl font-semibold mb-30 lg:mb-half"  data-aos="fade-up">
                       {!! $subtitle !!}
                    </div>
                    @endif
                    @if (!empty($content))
                    <div class="text-desc text-gray"  data-aos="fade-up"> 
                        {!! $content !!}
                    </div>
                    @endif
                    @if (!empty($link))
                    <div class="btn mt-auto pt-5 flex items-center"  data-aos="fade-up">
                        <a href="{{$link['url']}}" class="btn-primary">{{$link['title']}}</a>
                    </div>
                    @endif
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@if (!empty($url))
<div x-show="modelOpen" class="modal-hero fixed z-[99] inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
      <div class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
      <div x-cloak @click="modelOpen = false" x-show="modelOpen" 
        x-transition:enter="transition ease-out duration-300 transform"
        x-transition:enter-start="opacity-0" 
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200 transform"
        x-transition:leave-start="opacity-100" 
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 transition-opacity bg-gray bg-opacity-40" aria-hidden="true"></div>
          <div x-cloak x-show="modelOpen" 
          x-transition:enter="transition ease-out duration-300 transform"
          x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
          x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
          x-transition:leave="transition ease-in duration-200 transform"
          x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" 
          x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
          class="flex items-center justify-center mx-auto h-screen ">
          <div class=" bg-black inline-block w-fit h-fit border-8 border-solid border-primary p-2 text-button font-semibold transition-colors duration-500 relative">
            <!-- Close button to hide the modal -->
            <button @click="modelOpen = false" class="bg-black p-3 rounded-full transition-opacity hover:bg-gray-light transition-kaemde absolute -right-5 -top-5 z-[999]">
              <svg xmlns="http://www.w3.org/2000/svg" width="22.457" height="22.457" viewBox="0 0 22.457 22.457">
                <path class="fill-primary" id="Close-icon-9iuh" d="M122.232,46.019l6.621-6.621a2.7,2.7,0,1,0-3.817-3.817L118.415,42.2l-6.621-6.621a2.7,2.7,0,0,0-3.817,3.817l6.621,6.621-6.621,6.621a2.7,2.7,0,0,0,3.817,3.817l6.621-6.621,6.621,6.621a2.7,2.7,0,0,0,3.817-3.817Z" transform="translate(-107.186 -34.791)"/>
              </svg>
            </button>
            <iframe allowfullscreen class="aspect-video 3xl:w-[1100px] w-[calc(80vw)]" src="{{$url}}?autoplay=0&fs=0&iv_load_policy=3&showinfo=0&rel=0&cc_load_policy=0&start=0&end=0?mute=1">
            </iframe>
          </div>
        </div>

    </div>
  </div>
@endif
@endif