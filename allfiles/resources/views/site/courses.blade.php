@extends('site.master')
@section('title', 'Courses | ' . config('app.name'))
@section('content')
    @php
        $locale = App::getLocale();
    @endphp
    <!-- Inner Banner -->
    <div class="inner-banner bg-shape2 bg-color3">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="conatiner">
                    <div class="inner-title text-center">
                        <h3>{{ __('Courses') }}</h3>
                        <ul>
                            <li>
                                <a href="{{ route('site.index') }}">{{ __('Home') }}</a>
                            </li>
                            <li>
                                <i class="fas fa-chevron-right"></i>
                            </li>
                            <li>
                                {{ __('Courses') }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Inner Banner End -->

    <!-- Course Area -->
    <div class="course-area pt-100 pb-70">
        <div class="container">
            <div class="section-title text-center mb-50">
                <span>{{ __('Our Courses') }}</span>
            </div>
            <div class="row">
                @foreach ($courses as $course)
                    <div class="col-lg-4 col-md-6">
                        <div class="courses-card-item">
                            <div class="courses-card-img">
                                <a href="{{ route('subscriptions.create', $course->id) }}">
                                    @if (isset($course->image_url))
                                        <img src="{{ $course->image_url }}" alt="Course Images">
                                    @endif
                                </a>
                                <div class="courses-card-text">₪ {{ $course->price }}</div>
                            </div>
                            <ul>
                                <li cla`ss="active">
                                    @if ($course->status == 0)
                                        {{ __('Available') }}
                                    @else
                                        {{ __('Not Available') }}
                                    @endif
                                </li>
                            </ul>
                            <div class="courses-card-content">
                                <a href="#">
                                    <h3>{{ $course['name_' . $locale] }}</h3>
                                </a>
                                <p>
                                    {!! $course['content_' . $locale] !!}
                                </p>
                                <a href="{{ route('subscriptions.create', $course->id) }}"
                                    class="course-book-btn">{{ __('Subscribe Now') }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $courses->links() }}
        </div>
    </div>
    <!-- Course Area End -->
@stop
