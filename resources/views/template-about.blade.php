
{{--
  Template Name: O firmie
--}}

@php
$data = get_field('about');

@endphp

@extends('layouts.app')
@section('content')

@if (!empty($data))

@include('sections.about.section-hero')
@include('sections.about.section-video')
@include('sections.about.section-zespol')
@include('sections.about.section-two_columns')
@include('sections.about.section-technologia')
@include('sections.home.testimonials')
 
@endif

@endsection