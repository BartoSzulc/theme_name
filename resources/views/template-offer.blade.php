
{{--
  Template Name: Oferta
--}}

@php
$right_button = 'absolute top-1/2 -translate-y-1/2 right-[38px] z-10 hidden lg:block';
$left_button = 'absolute top-1/2 -translate-y-1/2 left-[38px] z-10 hidden lg:block';
$data = get_field('offer');
$hero = $data['hero'] ?? null;
$title = $hero['title'] ?? null;
$subtitle = $hero['subtitle'] ?? null;

@endphp
@extends('layouts.app')

@section('content')

@if (!empty($hero))
<section class="offer__title my-half lg:my-full">
    <div class="container">
        @if (!empty($title))
        <div class="w-full badge text-center"  data-aos="fade-up">
            {!! $title !!}
        </div>
        @endif
        @if (!empty($subtitle))
        <div class="w-full text-center mt-30 lg:mt-half text-gray text-desc xl:px-40"  data-aos="fade-up">
            {!! $subtitle !!}
        </div>
        @endif
    </div>
</section>
@endif


@include('sections.offer.premium')
@include('sections.offer.special')

@endsection