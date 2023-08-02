@include('partials.contact')

@php

$locations = get_nav_menu_locations(); //get all menu locations
$menu_first = wp_get_nav_menu_object($locations['footer_navigation']);
$menu_second = wp_get_nav_menu_object($locations['footer_navigation2']);
$policy_page_title  = '';
$policy_page_url    = '';
$policy_page_id     = (int) get_option( 'wp_page_for_privacy_policy' );

if ( $policy_page_id && get_post_status( $policy_page_id ) === 'publish' ) {
    $policy_page_title  = get_the_title( $policy_page_id );
    $policy_page_url    = get_permalink( $policy_page_id );
}
$footer = get_field('footer', 'options');
$socials = $footer['socials'] ?? null;

$contact_info = $footer['contact_info'] ?? null;

$phone = $contact_info['contact_info--phone'] ?? null;
$email = $contact_info['contact_info--email'] ?? null;
$address = $contact_info['contact_info--address'] ?? null;
$map_url = $contact_info['contact_info--address-url'] ?? null;

$left = $footer['footer_content--left'] ?? null;
$left_content = $left['footer_content--left--content'] ?? null;
$left_about_us = $left['footer_content--left--about_us'] ?? null;

$right = $footer['footer_content--right'] ?? null;
$right_content = $right['footer_content--right--content'] ?? null;

@endphp

<footer class="text-white">
  <div class="container">
    <div class="relative z-10 bg-black inside-footer">
      <div class="inside-footer__contact mx-5 flex xl:justify-between lg:py-60 py-30 relative flex-col xl:flex-row justify-center | 3xl:mx-half 2xl:mx-30">
        <div class="absolute bottom-0 left-0 w-full h-px bg-gray"></div>
        @if (!empty($contact_info))
        <div class="contact lg:flex items-center justify-between min-w-[68%] grow-0 lg:space-x-5 space-y-5 lg:space-y-0">
          @if (!empty($address))
          <div class="flex items-center gap-5 cursor-pointer item group" data-aos="fade-up">
            <div class="icon">
              @svg('images.mapa')
            </div>
            <div class="text-base font-semibold uppercase text 3xl:text-5xl 2xl:text-desc tracking-tightest">
              <a class="transition-kaemde group-hover:text-primary" target="_blank" href="{{ $map_url }}">{{ $address }}</a>
            </div>
          </div>
          @endif
          @if (!empty($phone))
          <div class="flex items-center gap-5 cursor-pointer item group" data-aos="fade-up">
            <div class="icon">
              @svg('images.phone')       
            </div>
            <div class="text-base font-semibold uppercase text 3xl:text-5xl 2xl:text-desc tracking-tightest">
              <a class="transition-kaemde group-hover:text-primary" href="tel:{{ str_replace(" ", "", $phone) }}">{{ $phone }}</a>
            </div>
          </div>
          @endif
          @if (!empty($email))
          <div class="flex items-center gap-5 cursor-pointer item group" data-aos="fade-up">
            <div class="icon">
              @svg('images.email')           
            </div>
            <div class="text-base font-semibold uppercase text 3xl:text-5xl 2xl:text-desc tracking-tightest">
              <a class="transition-kaemde group-hover:text-primary" href="mailto:{{ $email }}">{{ $email }}</a>
            </div>
          </div>
          @endif
        </div>
        @endif
        @if (!empty($socials))
        <div class="flex items-center space-x-5 socials 2xl:space-x-30 lg:justify-center mt-30 xl:mt-0">
          @foreach ($socials as $social)
          @php
              $url = $social['socials_url'];
              $icon = $social['socials_select'];
          @endphp
          <a href="{{ $url }}" class="duration-500 ease-in-out group" data-aos="fade-up">
            @switch($icon)
              @case('facebook')
              @svg('images.facebook')
            @break
              @case('linkedin')
              @svg('images.linkedin')
            @break
              @case('tiktok')
              @svg('images.tik-tok')
            @break
              @case('youtube')
              @svg('images.yt')
            @break
            @endswitch
          </a>
          @endforeach
        </div>
        @endif
      </div>
      <div class="grid grid-cols-12 gap-5 mx-5 inside-footer__rest 3xl:mx-half 2xl:mx-30 py-30 lg:py-60 xl:text-desc text-base">
        @if (!empty($left))
        <div class="col-span-full lg:col-span-3">
          @if (!empty($left_content))
          <div class="first">
           {!! $left_content !!}
          </div>
          @endif
          @if (!empty($left_about_us))
          <div class="second mt-30lg:mt-60">
            <p>{{ $left_about_us }}</p>
          </div>
          @endif
        </div>
        @endif
        <div class="col-span-full lg:col-span-3 xl:col-span-2 xl:col-start-5 lg:col-start-4 font-semibold">
          @if (has_nav_menu('footer_navigation'))
          {{ wp_nav_menu([
          'menu_class' => 'text-base list-custom menu-footer menu-footer--left', 
          'container' => '', 
          'theme_location' => 'footer_navigation']) }}
          @endif
        </div>
        <div class="col-span-full lg:col-span-3 xl:col-span-3 font-semibold -mt-5 lg:mt-0">
          @if (has_nav_menu('footer_navigation2'))
          {{ wp_nav_menu([
          'menu_class' => 'text-base list-custom menu-footer menu-footer--right', 
          'container' => '', 
          'theme_location' => 'footer_navigation2']) }}
          @endif
        </div>
        @if (!empty($right))
        <div class="col-span-full lg:col-span-3 text-right text-base leading-[50px] font-semibold flex flex-wrap lg:block space-x-1 lg:space-x-0 ">
          {!! $right_content !!}
          @if($policy_page_id)
          <a class="w-full block underline transition-kaemde hover:text-primary text-left lg:text-right" href="{{ esc_url(get_permalink($policy_page_id)) }}" target="_blank">{{ esc_html(get_the_title($policy_page_id)) }}</a>
          @endif
          <br/>
          <p>Realizacja: <a target="_blank" rel="noopener" class="transition-kaemde hover:text-primary group-hover:opacity-100" href="">gregormedia.com.pl</a></p>
        </div>
        @endif
      </div>
    </div>
  </div>
</footer>
<aside class="js-menu-mobile xl:hidden">
    <button class="relative flex items-center mb-10 ml-auto space-x-2 js-hamburger--close top-1">
        <div class="text-xs leading-[14px] font-medium text-primary uppercase -tracking-tighter ">
          <span>{{ __('Zamknij', 'lpbk')}}</span>
        </div>
        <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect x="0.615234" y="16.9707" width="24" height="2" rx="1" transform="rotate(-45 0.615234 16.9707)" fill="#8EC43F"/>
            <rect x="2.02942" width="24" height="2" rx="1" transform="rotate(45 2.02942 0)" fill="#8EC43F"/>
        </svg>
    </button>
    @if (has_nav_menu('primary_navigation'))
      {{ wp_nav_menu([
      'menu_class' => 'header-menu header-menu__top', 
      'container' => '', 
      'theme_location' => 'primary_navigation',
      'walker'          => new Custom_Nav_Walker(),
      ]) }}
    @endif
</aside>


