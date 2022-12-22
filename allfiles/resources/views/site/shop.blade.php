@extends('site.master')
@section('title', 'Product | ' . config('app.name'))
@section('content')
    @php
        $locale = App::getLocale();
    @endphp
    <!-- Inner Banner -->
    <div class="inner-banner bg-shape3 bg-color5">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="conatiner">
                    <div class="inner-title text-center">
                        <h3>{{ __('Shop') }}</h3>
                        <ul>
                            <li>
                                <a href="{{ route('site.index') }}">{{ __('Home') }}</a>
                            </li>
                            <li>
                                <i class="fas fa-chevron-right"></i>
                            </li>
                            <li>
                                {{ __('Shop') }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Inner Banner End -->

    <!-- Product Area -->
    <section class="product-area pt-94 pb-70">
        <div class="container">
            <div class="section-title text-center mb-50">
                <h2>{{ __('Our All Latest Diving & Swimming Equipments') }}</h2>
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
                                    <span>₪{{ $product->price }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Product Area End -->
@stop
