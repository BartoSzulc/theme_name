@php
$data = get_field('emdoro');
$image = $data['emdoro_image']['url'] ?? null;
$url = $data['emdoro_url'] ?? null;
$title = $data['emdoro_title'] ?? null;
$content = $data['emdoro_content'] ?? null;
$link = $data['emdoro_link'] ?? null;

@endphp

@if (!empty($data))
<section class="home__em-doro bg-gray-light">
    <div class="container relative py-half lg:py-full">
      <div class="absolute top-0 right-5 w-[calc((1366/1868)*100%)] h-full bg-white z-0"></div>
      <div class="grid grid-cols-12 gap-5 relative z-10">
        <div class="col-span-full lg:col-start-2 lg:col-span-5 xl:col-span-3 xl:col-start-3 relative flex items-center justify-center lg:justify-start" >
          @if (!empty($url))
          <a @click="modelOpen = true" class="cursor-pointer">
            <div class="relative box-hover h-fit" data-aos="fade-up">
              <img src="{{ $image }}" alt="">
            @include('partials.hover-box', ['class' => "z-10", 'svg' => "play"])
            </div>
          </a>
          @else
          <img src="{{ $image }}" alt="">
          @endif
        </div>
        <div class="order-first lg:order-last col-span-full lg:col-span-6 xl:col-start-7 xl:col-span-4 flex flex-col justify-center">
          <div class="space-y-30 lg:space-y-10">
            @if (!empty($title))
            <div class="badge" data-aos="fade-up">
              {!! $title !!}
            </div>
            @endif
            <div class="icon" data-aos="fade-up">
              @svg('images/logo_emDoro.svg')
            </div>
            @if (!empty($content))
            <div class="text text-gray text-desc" data-aos="fade-up">
              {!! $content !!}
            </div>
            @endif
          </div>
          @if (!empty($link))
          <div class="inline-flex relative pt-10 justify-center lg:justify-start" data-aos="fade-up">
            <a class="btn-primary" href="{{$link['url']}}">{{$link['title']}}</a>
          </div>
          @endif
        </div>
      </div>
    </div>
</section>
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