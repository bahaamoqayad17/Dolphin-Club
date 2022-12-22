@extends('site.master')
@section('title', config('app.name'))
@section('styles')
    <style>
        a {
            text-decoration: none
        }
    </style>
@stop
@section('content')
    @php
        $locale = App::getLocale();
    @endphp
    <!-- Home Slider -->
    <div id="home" class="home-slider">
        <div class="slider-area owl-carousel owl-theme">
            @foreach ($sliders as $slider)
                <div class="slider-item"
                    style="background-image:url('{{ isset($slider->image_url) ? $slider->image_url : '' }}') ">
                    <div class="d-table">

                        <div class="d-table-cell">
                            <div class="container">
                                <div class="slider-text">
                                    <h1>{{ $slider['title_' . $locale] }}</h1>
                                    <p>
                                        {!! $slider['content_' . $locale] !!}
                                    </p>
                                    <div class="slider-btn">
                                        <a href="{{ route('site.contact') }}"
                                            class="default-btn2 ml-20">{{ __('Contact Us') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Home Slider End -->
    <!-- Brand Area End -->
    <div class="brand-area pt-100">
        <div class="container">
            <div class="brand-slider owl-carousel owl-theme">
                @foreach ($brands as $pic)
                    <div class="brand-item">
                        <a href="#">
                            @if (isset($pic->image_url))
                                <img src="{{ $pic->image_url }}" class="brand-logo-one" alt="Images">
                                <img src="{{ $pic->image_url }}" class="brand-logo-two" alt="Images">
                            @endif
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Brand Area End -->
    <!-- About Area -->
    <div id="about" class="about-area pt-100 pb-70">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-text">
                        <div class="section-title">
                            <a href="{{ route('site.about') }}">
                                <span>{{ __('About Us') }}</span>
                            </a>
                            <p>{!! isset($data['about']['value'][App::getLocale()]['summary'])
                                ? $data['about']['value'][App::getLocale()]['summary']
                                : '' !!}
                            </p>
                            <div class="about-btn">
                                <a href="{{ route('site.about') }}" class="default-btn2">{{ __('Know More') }}</a>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="about-right" style="background-image: url('{{ asset('siteassets/img/swim.jpg') }}')">
                        <div class="play-area">
                            <a href="{{ isset($data['contact']['value']['youtube']) ? $data['contact']['value']['youtube'] : '' }}"
                                class="play-btn">
                                <i class="flaticon-play-button"></i>
                                {{ __('Play a Video') }}
                            </a>
                        </div>

                        <div class="icon-shape-1">
                            <i class="flaticon-waves"></i>
                        </div>
                        <div class="icon-shape-2">
                            <i class="flaticon-waves"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Area End -->

    <!-- Service Area -->
    <section id="services" class="service-area pt-100 pb-70">
        <div class="container">
            <div class="section-title text-center mb-50">
                <a href="{{ route('site.services') }}">
                    <span>{{ __('Our Services') }}</span>
                </a>
                <h2>{{ __('Dolphin Club Provides Services') }}</h2>
            </div>

            <div class="service-item-area owl-carousel owl-theme">
                @foreach ($services as $service)
                    <div class="service-item">
                        <a href="{{ route('site.services') }}" class="service-item-icon">
                            <i class="flaticon-{{ $service->icon }}"></i>
                        </a>
                        <a href="{{ route('site.services') }}" class="service-head">
                            <h3>{{ $service['title_' . $locale] }}
                            </h3>
                        </a>
                        <p>
                            {!! $service['content_' . $locale] !!}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Service Area End -->

    <!-- Apply Area -->
    <div class="apply-area">
        <div class="container">
            <div class="apply-text">
                <div>
                    <a href="{{ route('site.courses') }}">
                        <span>{{ __('Subscribe for Us') }}</span>
                    </a>
                </div>
                <a href="{{ route('subscriptions.create', isset($course[0]['id']) ? $course[0]['id'] : '') }}">
                    <h2>
                        {{ isset($course[0]['name_' . $locale]) ? $course[0]['name_' . $locale] : '' }}
                    </h2>
                </a>
                <p>
                    {!! isset($course[0]['content_' . $locale]) ? $course[0]['content_' . $locale] : '' !!}
                </p>
                <div class="apply-btn">
                    <a href="{{ route('subscriptions.create', isset($course[0]['id']) ? $course[0]['id'] : '') }}"
                        class="default-btn1">{{ __('Subscribe Here') }}</a>
                    <a href="{{ route('site.courses') }}" class="default-btn2 ml-20">{{ __('All Courses') }}</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Apply Area End -->

    <!-- Course Area -->
    <div class="course-area pt-100 pb-70">
        <div class="container-fluid m-0 p-0">
            <div class="row">
                <div class="col-lg-7 col-xxl-6">
                    <div class="course-item">
                        <div class="course-text">
                            <a href="{{ route('subscriptions.create', isset($course[1]['id']) ? $course[1]['id'] : '') }}">
                                <span>{{ isset($course[1]['name_' . $locale]) ? $course['1']['name_' . $locale] : '' }}</span>
                            </a>
                            {{-- <h2>{{ __('Swimming Course Taken by Our Most Experienced Trainer') }}</h2> --}}
                            <p>
                                {!! isset($course[1]['content_' . $locale]) ? $course['1']['content_' . $locale] : '' !!}
                            </p>
                            <div class="course-btn">
                                <a href="{{ route('subscriptions.create', isset($course[1]['id']) ? $course[1]['id'] : '') }}"
                                    class="default-btn2">{{ __('Take Course') }}</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 col-xxl-6">
                    <div class="course-img">
                        @if (isset($course[1]->image_url))
                            <img src="{{ $course[1]->image_url }}" alt="Course Images">
                        @endif
                    </div>
                    <div class="course-dots">
                        <img src="{{ asset('siteassets/img/shape/dots-blue.png') }}" alt="Dots Images">
                    </div>
                </div>
            </div>
            <div class="course-another pt-70">
                <div class="row">
                    <div class="col-lg-5 col-xxl-6">
                        <div class="course-img-2">
                            @if (isset($course[2]->image_url))
                                <img src="{{ $course[2]->image_url }}" alt="Course Images">
                            @endif
                        </div>
                        <div class="course-dots-2">
                            <img src="{{ asset('siteassets/img/shape/dots-pink.png') }}" alt="Dots Images">
                        </div>
                    </div>

                    <div class="col-lg-7 col-xxl-6">
                        <div class="course-item-2">
                            <div class="course-text">
                                <a
                                    href="{{ route('subscriptions.create', isset($course[2]['id']) ? $course[2]['id'] : '') }}">
                                    <span>{{ isset($course[2]['name_' . $locale]) ? $course[2]['name_' . $locale] : '' }}</span>
                                </a>
                                {{-- <h2>{{ __('Diving Course Taken by Our Most Experienced Trainer') }}</h2> --}}
                                <p>
                                    {!! isset($course[2]['content_' . $locale]) ? $course[2]['content_' . $locale] : '' !!}
                                </p>
                                <div class="course-btn">
                                    <a href="{{ route('subscriptions.create', isset($course[2]['id']) ? $course[2]['id'] : '') }}"
                                        class="default-btn2">{{ __('Take Course') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="icon-shape-3">
            <i class="flaticon-swimming"></i>
        </div>
        <div class="icon-shape-4">
            <i class="flaticon-diver"></i>
        </div>
    </div>
    <!-- Course Area End -->

    <!-- Product Area -->
    <section class="product-area pt-100 pb-70">
        <div class="container">
            <div class="section-title text-center mb-50">
                <a href="{{ route('site.shop') }}">
                    <span>{{ __('Our Products') }}</span>
                </a>
                <h2>{{ __('Buy the Equipment You Need') }}</h2>
                {{-- <p>
                    The introduced now, the they expect, animals the desk, and catch
                    temple. More seven my couldn't it the character using recommended.
                </p> --}}
            </div>
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-lg-3 col-sm-6">
                        <div class="product-item">
                            <a href="{{ route('site.shop') }}">
                                @if (isset($product->image_url))
                                    <img src="{{ $product->image_url }}" alt="Product Images">
                                @endif
                            </a>
                            <div class="product-cotent">
                                <div class="product-text">
                                    <a href="{{ route('site.shop') }}">
                                        <h3>{{ $product['name_' . $locale] }}</h3>
                                    </a>
                                    <span>₪ {{ $product->price }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Product Area End -->

    <!-- Gallery Area -->
    <section id="gallery" class="gallery-area pt-100 pb-70">
        <div class="container">
            <div class="section-title text-center mb-50">
                <a href="{{ route('site.gallery') }}">
                    <span>{{ __('Our Gallery') }}</span>
                </a>
                <h2>{{ __('Amazing Photos at Our Daily Dolphin Club') }}</h2>
            </div>
            <div class="gallery-view">
                <div class="row">
                    @foreach ($galleries as $pic)
                        <div class="col-lg-4 col-sm-6">
                            <div class="gallery-item">
                                <a href="{{ $pic->image_url }}">
                                    <img src="{{ $pic->image_url }}" alt="Gallery Images">
                                </a>
                                <div class="gallery-text">
                                    <h3>{{ $pic['title_' . $locale] }}</h3>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Gallery Area End -->


    <!-- Trainers Area -->
    <section class="trainers-area pb-70">
        <div class="container">
            <div class="section-title text-center mb-50">
                <span>{{ __('Our Trainers') }}</span>
                <h2>{{ __('Our Professional Trainers') }}</h2>
                {{-- <p>
                    The introduced now, the they expect, animals the desk, and catch temple.
                    More seven my couldn't it the character using recommended.
                </p> --}}
            </div>
            <div class="row">
                @foreach ($trainers as $trainer)
                    <div class="col-lg-3 col-sm-6">
                        <div class="trainer-card">
                            <a href="{{ route('dashboard.trainers.show', $trainer->id) }}">
                                @if (isset($trainer->image_url))
                                    <img src="{{ $trainer->image_url }}" alt="Trainers Images">
                                @endif
                            </a>
                            <div class="trainer-content">
                                <a href="{{ route('dashboard.trainers.show', $trainer->id) }}">
                                    <h3>{{ $trainer['name_' . $locale] }}</h3>
                                </a>
                                <span>{{ $trainer['field_' . $locale] }}</span>
                                <div class="social-icon">
                                    <ul>
                                        <li>
                                            <a href="{{ $trainer->linkedin }}" target="_blank">
                                                <i class="fab fa-linkedin-in"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ $trainer->facebook }}" target="_blank">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ $trainer->twitter }}" target="_blank">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ $trainer->gmail }}" target="_blank">
                                                <i class="fas fa-envelope"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{ $trainers->links() }}
            </div>
        </div>
    </section>
    <!-- Trainers Area End -->

    <!-- News Area -->
    <section id="news" class="news-area pb-70">
        <div class="container">
            <div class="section-title text-center mb-50">
                <a href="{{ route('site.news') }}">
                    <span>{{ __('Our Articles') }}</span>
                </a>
                <h2>{{ __('Daily Updates of Our Dolphin Club') }}</h2>

            </div>

            <div class="row">
                @foreach ($articles as $article)
                    <div class="col-lg-4 col-md-6">
                        <div class="news-card">
                            <div class="news-img">
                                <a href="{{ route('dashboard.articles.show', $article->id) }}">
                                    <img src="{{ $article->image_url }}" alt="News Images">
                                </a>
                                <div class="sub-text">
                                    <a href="#">{{ $article['field_' . $locale] }}</a>
                                </div>
                            </div>
                            <ul>
                                <li>{{ $article->created_at->format('Y,M') }}</li>
                            </ul>
                            <div class="news-content">
                                <a href="{{ route('dashboard.articles.show', $article->id) }}">
                                    <h3>{{ $article['title_' . $locale] }}</h3>
                                </a>
                                <p>
                                    {!! $article['summary_' . $locale] !!}
                                </p>
                                <a href="{{ route('dashboard.articles.show', $article->id) }}" class="news-icon">
                                    {{ __('Read More') }}
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- News Area End -->
@stop
