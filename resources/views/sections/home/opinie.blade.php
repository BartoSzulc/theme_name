@php
$data = get_field('testimonials');
$badge = $data['badge'] ?? null;
$title = $data['title'] ?? null;
  $args = array(
    'post_type' => 'places',
);
$query = new WP_Query( $args );

@endphp

@if ($data)
<section id="opinie" class="home-opinie-google bg-gray-light md:pt-full pt-half relative overflow-hidden">
    <div class="absolute bg-white w-full h-full top-0 rounded-absolute"></div> 
    <div class="container relative z-10">
        @if ($badge || $title)
        <div class="text-center w-full relative" data-aos="fade-up">
            
            <span class="badge">{{ $badge }}</span>

            <div class="heading text-8xl mt-half">
                {!! $title !!}
            </div>
        </div>
        @endif
        <div class="grid grid-cols-12">
            <div class="col-span-1  items-center justify-start hidden lg:flex">
                <button class="testimonialSwiper__nav--prev cursor-pointer button-swiper relative z-10 right-10 md:right-0">
                    <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="40" cy="40" r="40" class="fill-gray-light"/>
                        <path d="M49.6777 38.3631C49.5877 38.3476 49.4966 38.3405 49.4054 38.3418H33.8849L34.2233 38.1749C34.5541 38.0089 34.855 37.783 35.1126 37.5075L39.465 32.8938C40.0382 32.3138 40.1345 31.3807 39.6932 30.6829C39.1796 29.9394 38.1947 29.778 37.4933 30.3224C37.4366 30.3664 37.3827 30.4144 37.3321 30.466L29.4617 38.809C28.8466 39.4602 28.846 40.5167 29.4604 41.1687C29.4608 41.1691 29.4613 41.1696 29.4617 41.17L37.3321 49.5129C37.9477 50.1636 38.9443 50.1622 39.5582 49.5096C39.6065 49.4583 39.6516 49.4036 39.6932 49.3461C40.1345 48.6483 40.0382 47.7152 39.465 47.1352L35.1205 42.5132C34.8896 42.2681 34.624 42.0626 34.3335 41.9042L33.8612 41.6789H49.3188C50.1229 41.7106 50.8284 41.1151 50.9795 40.2773C51.1186 39.3677 50.5358 38.5107 49.6777 38.3631Z" fill="#605F5F"/>
                    </svg>
                </button>
            </div>
            <div class="col-span-full lg:col-span-10 md:w-full sm:w-[calc(100%+40px)] w-[calc(100%+50px)] relative -left-[25px] sm:-left-5 md:left-0" data-aos="fade-up"> 
                @hasposts($query)
                <div class="swiper swiperOpinie md:py-full py-half md:px-7 px-10">
                    <div class="swiper-wrapper">
                        @posts($query)
                        <div class="swiper-slide">

                            @php
                                $text = get_the_content();
                                $rating = get_post_meta( get_the_ID(), 'rating', true );
                                $limit = 23; // limit słów
                                $words = explode(" ", $text); // dzieli tekst na słowa
                            @endphp
                
                            <div class="name text-desc mb-5 flex items-center justify-between">@title<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_1043_109)">
                                <path d="M19.2475 8.26113L11.0897 8.26074C10.7295 8.26074 10.4375 8.5527 10.4375 8.91293V11.519C10.4375 11.8791 10.7295 12.1712 11.0897 12.1712H15.6837C15.1806 13.4767 14.2417 14.57 13.0438 15.2647L15.0027 18.6557C18.145 16.8384 20.0027 13.6497 20.0027 10.0803C20.0027 9.57203 19.9652 9.20871 19.8903 8.79961C19.8334 8.48879 19.5635 8.26113 19.2475 8.26113Z" fill="#167EE6"/>
                                <path d="M9.99957 16.0871C7.75137 16.0871 5.78871 14.8587 4.73461 13.041L1.34375 14.9955C3.06934 17.9862 6.30191 20.0001 9.99957 20.0001C11.8135 20.0001 13.5251 19.5117 14.9996 18.6606V18.6559L13.0407 15.2649C12.1447 15.7846 11.1078 16.0871 9.99957 16.0871Z" fill="#12B347"/>
                                <path d="M15 18.6603V18.6557L13.0411 15.2646C12.1451 15.7843 11.1083 16.0868 10 16.0868V19.9998C11.8139 19.9998 13.5256 19.5114 15 18.6603Z" fill="#0F993E"/>
                                <path d="M3.91305 10.0002C3.91305 8.89207 4.21547 7.85531 4.73504 6.95934L1.34418 5.00488C0.488359 6.47469 0 8.18164 0 10.0002C0 11.8188 0.488359 13.5258 1.34418 14.9956L4.73504 13.0411C4.21547 12.1452 3.91305 11.1084 3.91305 10.0002Z" fill="#FFD500"/>
                                <path d="M9.99957 3.91305C11.4656 3.91305 12.8123 4.43398 13.8641 5.30051C14.1236 5.51426 14.5007 5.49883 14.7384 5.26113L16.5849 3.41465C16.8546 3.14496 16.8354 2.70352 16.5473 2.45359C14.785 0.924727 12.492 0 9.99957 0C6.30191 0 3.06934 2.01395 1.34375 5.00465L4.73461 6.9591C5.78871 5.14141 7.75137 3.91305 9.99957 3.91305Z" fill="#FF4B26"/>
                                <path d="M13.8645 5.30051C14.124 5.51426 14.5012 5.49883 14.7389 5.26113L16.5854 3.41465C16.855 3.14496 16.8358 2.70352 16.5477 2.45359C14.7854 0.924688 12.4925 0 10 0V3.91305C11.466 3.91305 12.8127 4.43398 13.8645 5.30051Z" fill="#D93F21"/>
                                </g>
                                <defs>
                                <clipPath id="clip0_1043_109">
                                <rect width="20" height="20" fill="white"/>
                                </clipPath>
                                </defs>
                                </svg>
                            </div>

                            <div class="rating mb-5">
                                @if (!is_null($rating))
                                <div class="flex space-x-[5px]">
                                    <?php $star_rating = round($rating); ?>
                                    @for ($i = 0; $i < $star_rating; $i++)
                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 0L12.2451 6.90983H19.5106L13.6327 11.1803L15.8779 18.0902L10 13.8197L4.12215 18.0902L6.36729 11.1803L0.489435 6.90983H7.75486L10 0Z" fill="#FFD500"/>
                                        </svg>
                                    @endfor
                                    @for ($i = 0; $i < 5 - $star_rating; $i++)
                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 0.404509L12.1263 6.94846L12.1543 7.03483H12.2451H19.1259L13.5592 11.0792L13.4858 11.1326L13.5138 11.219L15.6401 17.7629L10.0735 13.7185L10 13.6652L9.92653 13.7185L4.35991 17.7629L6.48617 11.219L6.51423 11.1326L6.44076 11.0792L0.874146 7.03483H7.75486H7.84568L7.87374 6.94846L10 0.404509Z" fill="white" stroke="black" stroke-width="0.25"/>
                                        </svg>
                                    @endfor
                                </div>
                                @endif
                            </div>
                            <div class="review text-base text-gray block relative w-full">
                                @if(count($words) > $limit)
                                    {{-- if more than $limit --}}
                                    @php
                                    $shortened = implode(" ", array_slice($words, 0, $limit)); // skraca tekst do limitu słów
                                    $shortened .= '...';

                                    @endphp
                                    <p class="short-text">{{ $shortened }}</p>
                                    <p class="hidden hidden-review full-text">
                                        {{ $text }}
                                    </p>
                                    <a class="mt-4 block cursor-pointer show-more text-base transition-color hover:text-primary">Czytaj więcej...</a>
                                @else
                                    <p>{{ $text }}</p>
                                @endif
                            </div>
                        </div>
                        @endposts
                    </div>
                </div>
                @endhasposts
            </div>
            
            <div class="col-span-1 hidden lg:flex items-center justify-end">
                <button class="testimonialSwiper__nav--next cursor-pointer button-swiper relative z-10 -right-10 md:right-0">
                    <svg class="rotate-180" width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="40" cy="40" r="40" class="fill-gray-light"/>
                        <path d="M49.6777 38.3631C49.5877 38.3476 49.4966 38.3405 49.4054 38.3418H33.8849L34.2233 38.1749C34.5541 38.0089 34.855 37.783 35.1126 37.5075L39.465 32.8938C40.0382 32.3138 40.1345 31.3807 39.6932 30.6829C39.1796 29.9394 38.1947 29.778 37.4933 30.3224C37.4366 30.3664 37.3827 30.4144 37.3321 30.466L29.4617 38.809C28.8466 39.4602 28.846 40.5167 29.4604 41.1687C29.4608 41.1691 29.4613 41.1696 29.4617 41.17L37.3321 49.5129C37.9477 50.1636 38.9443 50.1622 39.5582 49.5096C39.6065 49.4583 39.6516 49.4036 39.6932 49.3461C40.1345 48.6483 40.0382 47.7152 39.465 47.1352L35.1205 42.5132C34.8896 42.2681 34.624 42.0626 34.3335 41.9042L33.8612 41.6789H49.3188C50.1229 41.7106 50.8284 41.1151 50.9795 40.2773C51.1186 39.3677 50.5358 38.5107 49.6777 38.3631Z" fill="#605F5F"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</section>
@endif