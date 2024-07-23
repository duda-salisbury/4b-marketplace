<section class="fe-hero {{ $classname }}">
    <div class="container fe-hero__content">
        <h1>{{ $title }}</h1>
        <p>{{ $blurb }}</p>
        <a href="{{ $cta1['url'] }}" class="btn {{$cta1['classname']}}">
               {{ $cta1['label'] }}
        </a>
        @if (isset($cta2))
            <a href="{{ $cta2['url'] }}" class="btn">{{ $cta2['label'] }}</a>
        @endif
    </div>
</section>

