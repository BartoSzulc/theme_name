
{{--
  Template Name: Dokumenty do pobrania
--}}

@php
$data = get_field('boxes');

@endphp

@extends('layouts.app')

@section('content')

<section class="documents__main">
    <div class="container">
        <div class="w-full badge text-center py-half lg:py-full"  data-aos="fade-up">
            <h1>@title</h1>
        </div>
        <div class="grid grid-cols-12 gap-x-5 lg:pb-full pb-half">
            <div class="xl:col-start-2 xl:col-span-10 col-span-full lg:space-y-half space-y-30">
            @if (!empty($data))
                @foreach ($data as $item)
                @php
                $title = $item['title'] ?? null;
                $links = $item['links'] ?? null;
                @endphp
                
                <div class="box"  data-aos="fade-up">
                    @if (!empty($title))
                    <div class="title relative mb-30 text-6xl font-bold border-b-8 border-primary flex w-fit after:content-['']  after:bg-black after:absolute after:-bottom-2 after:w-[calc(30%)] after:h-2">
                        {!! $title !!}
                    </div>
                    @endif
                    @if (!empty($links))
                    <div class="links text-base lg:text-desc  text-gray ">
                        @foreach ($links as $link)
                        @php
                        $file = $link['file'] ?? null;
                        @endphp
                        <div class="link leading-[40px]"  data-aos="fade-up">
                            <a class="transition-kaemde hover:text-primary" href="{{ $file['url'] }}" target="_blank">{{ $file['title'] }}</a>
                        </div>
                        @endforeach
                    </div>
                    @endif
                    
                </div>
                @endforeach
            @endif
            </div>
        </div>
    </div>
</section>


@endsection