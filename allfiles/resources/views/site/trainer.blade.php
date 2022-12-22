@extends('site.master')
@section('title', 'Trainers | ' . config('app.name'))
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
                        <h3>{{ __('Trainer') }}</h3>
                        <ul>
                            <li>
                                <a href="{{ route('site.index') }}">{{ __('Home') }}</a>
                            </li>
                            <li>
                                <i class="fas fa-chevron-right"></i>
                            </li>
                            <li>
                                {{ __('Trainer') }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Inner Banner End -->

    <!-- Instructor Area -->
    <div class="instructor-area pt-100 pb-70">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4">
                    <div class="instructor-img">
                        @if ($trainer->image_url)
                            <img src="{{ $trainer->image_url }}" alt="Images">
                        @endif
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="instructor-content">
                        <h3>{{ $trainer['name_' . $locale] }}</h3>
                        <span>{{ $trainer['field_' . $locale] }}</span>
                        <ul class="instructor-social">
                            <li>
                                <a href="{{ isset($trainer->facebook) ? $trainer->facebook : '' }}" target="_blank">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ isset($trainer->twitter) ? $trainer->twitter : '' }}" target="_blank">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ isset($trainer->linkedin) ? $trainer->linkedin : '' }}" target="_blank">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ isset($trainer->gmail) ? $trainer->gmail : '' }}" target="_blank">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </li>
                        </ul>
                        <p>
                            {{ $trainer['description_' . $locale] }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Instructor Area End -->

    <!-- Instructor All -->
    <section class="instructor-all pt-100 pb-70">
        <div class="container">
            <div class="section-title text-center mb-50">
                <span>{{ __('Our Trainers') }}</span>
                <h2>{{ __('Our Expert Trainers') }}</h2>
                {{-- <p>
                     The introduced now, the they expect,animals the desk, and catch temple.
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
    <!-- Instructor All End -->
@stop
