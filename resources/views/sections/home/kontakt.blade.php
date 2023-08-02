
@php
$data = get_field('contact');
$badge = $data['badge'] ?? null;
$desc = $data['desc'] ?? null;
$contact_repeater = $data['contact_repeater'] ?? null;
$google_map = $data['google-maps'] ?? null;

$form = $data['form'] ?? null;
$badge_form = $form['badge'] ?? null;
$title_form = $form['title'] ?? null;
$shortcode = $form['shortcode'] ?? null;

@endphp
@if ($data)
<section class="home-kontakt bg-black relative md:py-full py-half">
    <div class="absolute bg-white rounded-absolute w-full h-full top-0"></div>
    <div class="container relative z-10">
        <div class="grid grid-cols-12 gap-5">
            <div class="col-span-full lg:col-span-6 xl:col-span-5 xl:col-start-2">
                <div class="flex flex-col justify-between space-y-5 md:space-y-half h-full" data-aos="fade-up">
                    @if ($badge)
                    <span class="badge">
                        {{ $badge }}
                    </span>
                    @endif
                    @if ($desc)
                    <div class="font-semibold desc text-6xl">
                        {!! $desc !!}
                    </div>
                    @endif
                    @if ($contact_repeater)
                    <div class="flex  flex-wrap items-center gap-4  xl:space-x-half">
                        @foreach ($contact_repeater as $contact)
                        @php
                            $link = $contact['link'] ?? null;
                            $image = $contact['image'] ?? null;
                        @endphp
                        <a class="flex items-center space-x-2.5 hoverlink" href="{{ $link['url'] }}">
                            <img src="{{ $image['url']}}" alt="">
                            <span>{!! $link['title'] !!}</span>
                        </a>
                        @endforeach
                        
                    </div>
                    @endif
                    @if ($google_map)
                    <iframe class="rounded" src="{{ $google_map }}" width="100%" height="188" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    @endif
                </div>
            </div>
            @if ($form)
            <div class="col-span-full lg:col-span-6 xl:col-span-5" data-aos="fade-up">
                <div class="formNewsletter bg-primary rounded xl:p-half p-5 py-10 text-white relative">
                    <div class="absolute opacity-50 mix-blend-luminosity top-0 left-0 z-0 w-full h-full">
                        <img class="object-cover h-full w-full rounded" src="@asset('images/kontakt-bg.png')" alt="">
                    </div>
                    <div class="inside relative z-10">
                        @if ($badge_form)
                        <span class="badge sm:mb-[30px] mb-5 block">
                            {{ $badge_form }}
                        </span>
                        @endif
                        @if ($title_form)
                        <div class="heading text-7xl mb-half">
                            {!! $title_form !!}
                        </div>
                        @endif
                        @if ($shortcode)
                            {!! do_shortcode($shortcode) !!}
                        @endif
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
@endif