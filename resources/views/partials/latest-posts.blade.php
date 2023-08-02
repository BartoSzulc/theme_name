@php
$args = array(
  'post_type' => $post_type,
  'posts_per_page' => 3,
  'orderby' => 'date',
  'order'   => 'DESC',

);
$query = new WP_Query( $args );
@endphp

<section class="latest__posts bg-white pb-half lg:pb-full">
    <div class="container">
        <div class="w-full badge py-half lg:py-full text-center"  data-aos="fade-up">
            <h2>{!! __('Zobacz także') !!}</h2>
        </div>
        @if ($query->have_posts())
        <div class="grid xl:grid-cols-3 lg:grid-cols-2 grid-cols-1 gap-5">
            @if ($post_type == 'realizacje')
                @while ($query->have_posts())
                @php $query->the_post() @endphp
                <div class="col-span-1">
                    <div class="realizacja relative"  data-aos="fade-up">
                        <a href="@permalink">
                            <img class="mx-auto aspect-[750/500] object-cover" src="@thumbnail('full', false)" alt="">
                            <div class="absolute opacity-0 transition-kaemde w-full-h-full inset-0 hover-box bg-black/50 inline-flex items-center justify-center">
                            <span class="btn-primary">{!! __('Zobacz projekt') !!}</span>
                            </div>
                            <div class="absolute bg-white bottom-0 left-0 min-h-[100px] w-[calc((442/750)*100%)] flex items-center">
                            <div class="text-6xl text-black font-semibold">
                            <h2>@title</h2>
                            </div>
                            </div>
                        </a>
                    </div>
                </div>
                @endwhile 
            @else
                @while ($query->have_posts())
                @php $query->the_post() @endphp
                <div class="col-span-1 w-fit lg:w-auto mx-auto">
                    <div class="blog relative"  data-aos="fade-up">
                        <a href="@permalink">
                        <img class="mx-auto aspect-[596/400] object-cover w-full h-full object-center" src="@thumbnail('full', false)" alt="">
                        <div class="absolute opacity-0 transition-kaemde w-full-h-full inset-0 hover-box bg-black/50 inline-flex items-center justify-center">
                            <span class="btn-primary">{!! __('Zobacz wpis') !!}</span>
                        </div>
                        <div class="absolute bg-white bottom-0 right-0 min-h-[100px] w-[calc((442/596)*100%)] flex items-center" >
                            <div class="text-5xl text-black font-semibold pl-30 uppercase tracking-tightest">
                            <h2>@title</h2>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
                @endwhile 
            @endif
        </div>
        @endif
    </div>
</section>
