
@php
$data = get_field('header', 'option');
$logo = $data['header_logo'] ?? null;

@endphp

<header class="relative z-50 mb-2">
    <div class="container">
      <div class="header-inner">
      <div class="absolute bg-primary h-2 w-full -bottom-2 z-10"></div>
      <nav class="py-5 relative flex justify-between items-center h-full" id="site-menu" role="navigation" aria-label="{{ __('Menu Główne') }}">
        @if (!empty($logo))
        <a href="{{ site_url() }}" class="hover:opacity-70 transition-opacity duration-500 ease-in-out">
          <img class="logo 2xl:w-[220px] w-[150px]" src="{{ $logo['url'] }}" alt="logo">
        </a>
        @endif
        <div class="js-site-header-nav-wrapper js-header-menu site-header-nav-wrapper flex shrink-[1] items-center space-x-5 h-full justify-end header-menu">
          @if (has_nav_menu('primary_navigation'))
            {{ wp_nav_menu([
            'theme_location' => 'primary_navigation',
            'menu_class' => 'font-primary items-center hidden xl:flex', 
            'container' => '',
            'walker'          => new Custom_Nav_Walker(),]) }}
          @endif
          <button class="js-hamburger flex items-center space-x-2 xl:hidden">
            <svg width="28" height="20" viewBox="0 0 28 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M2 4H26C27.104 4 28 3.104 28 2C28 0.896 27.104 0 26 0H2C0.896 0 0 0.896 0 2C0 3.104 0.896 4 2 4ZM26 8H2C0.896 8 0 8.896 0 10C0 11.104 0.896 12 2 12H26C27.104 12 28 11.104 28 10C28 8.896 27.104 8 26 8ZM26 16H2C0.896 16 0 16.896 0 18C0 19.104 0.896 20 2 20H26C27.104 20 28 19.104 28 18C28 16.896 27.104 16 26 16Z" fill="#8EC43F"/>
            </svg>                   
          </button>
        </div>
      </nav>
      </div>
    </div>
</header>
