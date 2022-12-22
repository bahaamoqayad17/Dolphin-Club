@extends('site.master')
@section('title', 'Articles | ' . config('app.name'))
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
    <div class="inner-banner bg-shape2 bg-color2">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="conatiner">
                    <div class="inner-title text-center">
                        <h3>{{ __('Articles') }}</h3>
                        <ul>
                            <li>
                                <a href="{{ route('site.index') }}">{{ __('Home') }}</a>
                            </li>
                            <li>
                                <i class="fas fa-chevron-right"></i>
                            </li>
                            <li>
                                {{ __('Articles') }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Inner Banner End -->

    <!-- News Area -->
    <section class="news-area pt-94 pb-70">
        <div class="container">
            <div class="section-title text-center mb-30">
                <h2>{{ __('Our Regular Latest Articles & Updates') }}</h2>
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
                                    <a href="#">
                                        {!! $article['field_' . $locale] !!}
                                    </a>
                                </div>
                            </div>
                            <ul>
                                <li>{{ $article->created_at->format('M,Y') }}</li>
                            </ul>
                            <div class="news-content">
                                <a href="{{ route('dashboard.articles.show', $article->id) }}">
                                    <h3>{!! $article['title_' . $locale] !!}</h3>
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
                {{ $articles->links() }}
                {{-- <div class="col-lg-12 col-md-12">
                    <div class="pagination-area">
                        <a href="#" class="prev page-numbers">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                        <a href="#" class="page-numbers current" aria-current="page">1</a>
                        <a href="#" class="page-numbers ">2</a>
                        <a href="#" class="page-numbers">3</a>
                        <a href="#" class="next page-numbers">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
    <!-- News Area End -->
@stop
