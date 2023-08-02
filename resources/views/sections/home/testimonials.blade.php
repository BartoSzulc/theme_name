@php
$id = get_option('page_on_front');
$data = get_field('references', $id);
$badge = $data['badge'] ?? null;
$content = $data['content'] ?? null;
$gallery = $data['gallery'] ?? null;
$data_1 = get_field('testimonials', $id);
$badge_1 = $data_1['badge'] ?? null;
$content_1 = $data_1['content'] ?? null;
$args = array(
'post_type' => 'places',
'posts_per_page' => -1,
);
$query = new WP_Query( $args );
@endphp
<section class="home__testimonials bg-gray-light relative overflow-hidden">
   <div class="container">
      <div class="grid grid-cols-12 gap-5">
         <div class="@if(!is_front_page()) col-span-full | xl:col-start-2 xl:col-span-5 lg:col-span-6 @else col-span-full | xl:col-span-5 lg:col-span-6 @endif">
            <div class="col-span-full py-half lg:py-full"> 
               @if (!empty($badge))
               <div class="w-full badge text-center lg:text-left @if(!is_front_page()) text-center 3xl:ml-8 @endif" data-aos="fade-up">
                  {!! $badge !!}
               </div>
               @endif
               @if (!empty($content))
               <div class="text-desc text-gray relative z-10 my-30 lg:my-half text-center lg:text-left  @if(!is_front_page()) 3xl:px-40 lg:px-20  3xl:ml-8 text-center @endif " data-aos="fade-up">
                  {!! $content !!}
               </div>
               @endif
               <div class="lg:grid xl:grid-cols-5 lg:grid-cols-6 gap-x-5 ">
                  <div class="hidden col-span-1 lg:flex items-center justify-center">
                     @include('partials.swiper-arrow', ['class' => "swiperReferences__nav--prev transform rotate-180"])
                  </div>
                  <div class="xl:col-span-3 lg:col-span-4 relative ">
                     @if (!empty($gallery))
                     <div class="swiperReferences--before relative w-[calc(100%-40px)] lg:ml-auto mx-auto lg:mx-0">
                        <div class="swiper swiperReferences drop-shadow-cien-2 ml-auto mr-0">
                           <div class="swiper-wrapper">
                              @foreach ($gallery as $item)
                              <div class="swiper-slide reference" data-aos="fade-up">
                                 <a href="{!! wp_get_attachment_image_url($item, 'full') !!}" class="glightbox">
                                 {!! wp_get_attachment_image($item, 'full', false, array('class' => 'mx-auto lg:mx-0', 'loading' => 'lazy')); !!}
                                 </a>
                              </div>
                              @endforeach
                           </div>
                        </div>
                        @include('partials.hover-box', ['class' => "z-10", 'svg' => "lupa"])
                     </div>
                     @endif
                  </div>
                  <div class="hidden col-span-1 lg:flex items-center justify-center" >
                     @include('partials.swiper-arrow', ['class' => "swiperReferences__nav--next"])
                  </div>
               </div>
            </div>
         </div>
         <div class="relative py-half lg:py-full @if(!is_front_page()) col-span-full xl:col-span-6 xl:col-start-7 lg:col-start-7 lg:grid lg:grid-cols-6 lg:gap-5 @else col-span-full | xl:col-span-7 lg:col-span-6 xl:grid xl:grid-cols-7 xl:gap-5 @endif">
            <div class="absolute w-[200%] h-full -left-5 top-0 bg-white"></div>
            <div class="@if(!is_front_page()) col-span-full | 4xl:col-start-2 4xl:col-span-3 xl:col-span-5 lg:col-span-6  @else col-span-full | xl:col-start-2 xl:col-span-6 lg:col-span-6 @endif ">
               @if (!empty($badge_1))
               <div class="w-full badge text-center lg:text-left  relative z-10 @if(!is_front_page()) text-center @endif" data-aos="fade-up">
                  {!! $badge_1 !!}
               </div>
               @endif
               @if (!empty($content_1))
               <div class="text-desc my-30 lg:my-half text-gray relative z-10  text-center lg:text-left @if(!is_front_page()) text-center @endif " data-aos="fade-up">
                  
                  {!! $content_1 !!}
               </div>
               @endif
               @hasposts($query)
               <div class="swiper swiperOpinie">
                  <div class="swiper-wrapper">
                     @posts($query)
                     <div class="swiper-slide relative" data-aos="fade-up">
                        <div class="icon absolute right-5 top-5">
                           <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <g clip-path="url(#clip0_1436_20)">
                                 <path d="M28.8635 12.3919L16.6268 12.3914C16.0864 12.3914 15.6484 12.8293 15.6484 13.3696V17.2787C15.6484 17.819 16.0864 18.257 16.6267 18.257H23.5177C22.7631 20.2153 21.3548 21.8552 19.5579 22.8973L22.4962 27.9837C27.2096 25.2578 29.9962 20.4748 29.9962 15.1207C29.9962 14.3583 29.94 13.8133 29.8277 13.1997C29.7422 12.7334 29.3375 12.3919 28.8635 12.3919Z" fill="#167EE6"/>
                                 <path d="M14.9994 24.1304C11.6271 24.1304 8.68307 22.2878 7.10191 19.5613L2.01562 22.493C4.604 26.979 9.45287 29.9999 14.9994 29.9999C17.7203 29.9999 20.2877 29.2673 22.4994 27.9906V27.9837L19.5611 22.8971C18.217 23.6767 16.6617 24.1304 14.9994 24.1304Z" fill="#12B347"/>
                                 <path d="M22.5 27.9907V27.9837L19.5617 22.8972C18.2177 23.6767 16.6625 24.1304 15 24.1304V30C17.7209 30 20.2884 29.2674 22.5 27.9907Z" fill="#0F993E"/>
                                 <path d="M5.86957 15.0001C5.86957 13.3379 6.3232 11.7827 7.10256 10.4388L2.01627 7.50708C0.732539 9.71179 0 12.2722 0 15.0001C0 17.728 0.732539 20.2884 2.01627 22.4931L7.10256 19.5615C6.3232 18.2175 5.86957 16.6624 5.86957 15.0001Z" fill="#FFD500"/>
                                 <path d="M14.9994 5.86957C17.1984 5.86957 19.2184 6.65098 20.7962 7.95076C21.1854 8.27139 21.7511 8.24824 22.1077 7.8917L24.8774 5.12197C25.2819 4.71744 25.2531 4.05527 24.821 3.68039C22.1775 1.38709 18.738 0 14.9994 0C9.45287 0 4.604 3.02092 2.01562 7.50697L7.10191 10.4387C8.68307 7.71211 11.6271 5.86957 14.9994 5.86957Z" fill="#FF4B26"/>
                                 <path d="M20.7968 7.95076C21.186 8.27139 21.7518 8.24824 22.1083 7.8917L24.878 5.12197C25.2825 4.71744 25.2537 4.05527 24.8216 3.68039C22.1781 1.38703 18.7387 0 15 0V5.86957C17.199 5.86957 19.219 6.65098 20.7968 7.95076Z" fill="#D93F21"/>
                              </g>
                              <defs>
                                 <clipPath id="clip0_1436_20">
                                    <rect width="30" height="30" fill="white"/>
                                 </clipPath>
                              </defs>
                           </svg>
                        </div>
                        @php
                        $text = get_the_content();
                        $title = get_the_title();
                        $image = get_the_post_thumbnail_url();
                        $rating = get_post_meta( get_the_ID(), 'rating', true );
                        $limit = 23; // limit słów
                        $words = explode(" ", $text); // dzieli tekst na słowa
                        $post_id = get_the_ID();
                        $avatar_url = get_post_meta($post_id, 'avatar_url', true);
                        $your_date = get_the_date(); 
                        @endphp
                        <div class="name text-desc mb-5 flex items-center space-x-5 text-[#295B80]">
                           @if (!empty($avatar_url))
                           <img src="{{ $avatar_url }}" alt="" class="aspect-[1/1] h-60">
                           @elseif (!empty($image))
                           <img src="{{ $image }}" alt="" class="aspect-[1/1] h-60 w-60 object-contain rounded-full">
                           @else 
                           <div class="w-60 h-60 bg-primary text-white text-5xl font-bold rounded-full flex items-center justify-center">
                              <span>
                              {!! $title[0] !!}
                              </span>
                           </div>
                           @endif
                           <div class="text space-y-2.5">
                              <div class="text-base lg:text-desc font-bold">
                                 {!! $title !!}
                              </div>
                              <div class="text-smallest">
                                 {{ the_time() }}
                              </div>
                           </div>
                        </div>
                        <div class="rating mb-5">
                           @if (!is_null($rating))
                           <div class="flex space-x-2.5">
                              <?php $star_rating = round($rating); ?>
                              @for ($i = 0; $i < $star_rating; $i++)
                              <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M10 0L12.2451 6.90983H19.5106L13.6327 11.1803L15.8779 18.0902L10 13.8197L4.12215 18.0902L6.36729 11.1803L0.489435 6.90983H7.75486L10 0Z" fill="#FFB800"/>
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
                        <div class="review text-base lg:text-desc text-gray italic block relative w-full">
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
                           <a class="mt-4 block cursor-pointer show-more text-base transition-kaemde hover:text-primary">{!! __('Czytaj więcej...') !!}</a>
                           @else
                           <p>{{ $text }}</p>
                           @endif
                        </div>
                     </div>
                     @endposts
                  </div>
               </div>
               @endhasposts
               <div class="flex flex-wrap items-center @if(is_front_page()) justify-between @endif  mt-full z-10 relative @if(!is_front_page())  @endif gap-5" data-aos="fade-up">
                  <a href="https://www.google.com/search?q=kaemde&oq=kaemde&aqs=chrome.0.35i39i650j46i175i199i512j0i512l2j69i60l2j69i65j69i60.904j0j7&sourceid=chrome&ie=UTF-8#lrd=0x470250d2fff9ce9f:0xb16ab25a1e69b809,1" class="btn-primary !min-w-[288px]" target="_blank">{!! __('Zobacz wszystkie opinie') !!}</a>
                  <div class="swiperOpinie--buttons flex items-center space-x-3.5">
                     @include('partials.swiper-arrow', ['class' => "testimonialSwiper__nav--prev transform rotate-180", 'color' => "gray-light"])
                     @include('partials.swiper-arrow', ['class' => "testimonialSwiper__nav--next", 'color' => "gray-light"])
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

