@extends('site.master')
@section('title', 'Testimonials | ' . config('app.name'))
@section('content')
    @php
        $locale = App::getLocale();
    @endphp
    <!-- Inner Banner -->
    <div class="inner-banner bg-shape1 bg-color1">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="conatiner">
                    <div class="inner-title text-center">
                        <h3>{{ __('Testimonials') }}</h3>
                        <ul>
                            <li>
                                <a href="{{ route('site.index') }}">{{ __('Home') }}</a>
                            </li>
                            <li>
                                <i class="fas fa-chevron-right"></i>
                            </li>
                            <li>
                                {{ __('Testimonials') }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Inner Banner End -->

    <!-- Testimonials Inner -->
    <div class="testimonials-inner pt-100 pb-70">
        <div class="container">
            <div class="section-title text-center mb-50">
                <span>{{ __('Testimonials') }}</span>
                <h2>{{ __('What Our Clients Say About Us') }}</h2>
            </div>
            <div class="row">
                @foreach ($testimonials as $item)
                    <div class="col-lg-6">
                        <div class="single-testominal">
                            @if (isset($item->image_url))
                                <img src="{{ $item->image_url }}" alt="Images">
                            @endif
                            <h3>{{ $item['name_' . $locale] }}</h3>
                            <span>{{ $item['field_' . $locale] }}</span>
                            <p>
                                “{!! $item['content_' . $locale] !!}”
                            </p>
                            <ul>
                                <li>
                                    <i class="fas fa-star"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star"></i>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endforeach
                {{ $testimonials->links() }}
            </div>
        </div>
    </div>
    <!-- Testimonials Inner End -->
@stop
