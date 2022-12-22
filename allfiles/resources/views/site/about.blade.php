@extends('site.master')
@section('title', 'About Us | ' . config('app.name'))
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

    <!-- Inner Banner -->
    <div class="inner-banner bg-shape1 bg-color1">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="conatiner">
                    <div class="inner-title text-center">
                        <h3>{{ __('About Us') }}</h3>
                        <ul>
                            <li>
                                <a href="{{ route('site.index') }}">{{ __('Home') }}</a>
                            </li>
                            <li>
                                <i class="fas fa-chevron-right"></i>
                            </li>
                            <li>
                                {{ __('About Us') }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Inner Banner End -->

    <!-- About Detl -->
    <div class="about-detl pt-100 pb-70">
        <div class="container">
            <div class="common-dtel-img">
                <img style="object-fit: cover" height="500" src="{{ asset('siteassets/img/swimmer.jpg') }}"
                    alt="About Images">
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="common-dtel-text">
                        <h2>{!! isset($data['about']['value'][$locale]['summary']) ? $data['about']['value'][$locale]['summary'] : '' !!}
                        </h2>
                        <p>
                            {!! isset($data['about']['value'][$locale]['content']) ? $data['about']['value'][$locale]['content'] : '' !!}
                        </p>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="common-offer">
                        <div class="drive-img">
                            <img src="{{ asset('siteassets/img/swim.jpg') }}" alt="Images">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Detl End -->

    <!-- Product Area -->
    <section class="product-area pt-100 pb-70">
        <div class="container">
            <div class="section-title text-center mb-50">
                <span>{{ __('Our Products') }}</span>
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
                                    <span>{{ $product->price }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Product Area End -->
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
                                            <a href="{{ isset($trainer->linkedin) ? $trainer->linkedin : '' }}"
                                                target="_blank">
                                                <i class="fab fa-linkedin-in"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ isset($trainer->facebook) ? $trainer->facebook : '' }}"
                                                target="_blank">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ isset($trainer->twitter) ? $trainer->twitter : '' }}"
                                                target="_blank">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ isset($trainer->gmail) ? $trainer->gmail : '' }}" target="_blank">
                                                <i class="fas fa-envelope"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Trainers Area End -->

    <!-- News Area -->
    <section class="news-area pb-70">
        <div class="container">
            <div class="section-title text-center mb-50">
                <span>{{ __('Our Articles') }}</span>
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
                                {{-- <li>
                                <a href=""></a>
                            </li> --}}
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
