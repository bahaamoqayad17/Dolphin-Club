@extends('site.master')
@section('title', 'Gallery | ' . config('app.name'))
@section('content')
    @php
        $locale = App::getLocale();
    @endphp
    <!-- Inner Banner -->
    <div class="inner-banner bg-shape3 bg-color4">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="conatiner">
                    <div class="inner-title text-center">
                        <h3>{{ __('Gallery') }}</h3>
                        <ul>
                            <li>
                                <a href="{{ route('site.index') }}">{{ __('Home') }}</a>
                            </li>
                            <li>
                                <i class="fas fa-chevron-right"></i>
                            </li>
                            <li>
                                {{ __('Gallery') }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Inner Banner End -->

    <!-- Gallery Inner -->
    <div class="gallery-inner pt-100 pb-70">
        <div class="container">
            <div class="section-title text-center mb-50">
                <span>{{ __('Our Gallery') }}</span>
                <h2>{{ __('Amazing Photos at Our Gallery') }}</h2>
            </div>
            <div class="gallery-view">
                <div class="row">
                    @foreach ($galleries as $pic)
                        <div class="col-lg-4 col-sm-6">
                            <div class="single-gallery">
                                <img src="{{ $pic->image_url }}" alt="Gallery Images">
                                <a href="{{ $pic->image_url }}" class="single-icon">
                                    <i class="fas fa-plus"></i>
                                </a>
                                <div class="gallery-content">
                                    <h3>{!! $pic['title_' . $locale] !!}
                                    </h3>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{ $galleries->links() }}
                </div>
            </div>
        </div>
    </div>
    <!-- Gallery Inner End -->

@stop
