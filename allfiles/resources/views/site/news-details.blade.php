@extends('site.master')
@section('title', 'Article | ' . config('app.name'))
@section('content')
    @php
        $locale = App::getLocale();
    @endphp
    <!-- Inner Banner -->
    <div class="inner-banner bg-shape1 bg-color4">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="conatiner">
                    <div class="inner-title text-center">
                        <h3>{{ __('Article Details') }}</h3>
                        <ul>
                            <li>
                                <a href="{{ route('site.index') }}">{{ __('Home') }}</a>
                            </li>
                            <li>
                                <i class="fas fa-chevron-right"></i>
                            </li>
                            <li>
                                {{ __('Article Details') }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Inner Banner End -->

    <!-- News Detl -->
    <div class="news-detl pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="common-dtel-img">
                        <img src="{{ $article->image_url }}" alt="About Images">
                    </div>
                    <div class="common-dtel-text">
                        <h2>{!! $article['title_' . $locale] !!}</h2>
                        {!! $article['summary_' . $locale] !!}
                        {!! $article['content_' . $locale] !!}
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="widget-area">
                        <div class="widget-categories">
                            <h2>{{ __('More Articles') }}</h2>
                            <ul>
                                @foreach ($articles as $article)
                                    <li>
                                        <a href="{{ route('dashboard.articles.show', $article->id) }}">
                                            {!! $article['title_' . $locale] !!}
                                            <i class="fas fa-chevron-right"></i>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- News Detl End -->
@stop
