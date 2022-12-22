@extends('dashboard.master')

@section('title', 'Products | ' . config('app.name'))


@section('content')
<!-- Page Heading -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <a class="btn btn-dark" href="{{ route('dashboard.products.index') }}">{{ __('All Products') }}</a>
</div>

@include('dashboard.errors')

<form action="{{ route('dashboard.products.store', isset($product->id) ? $product->id : '') }}" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="{{ isset($product->id) ? $product->id : '' }}">
    @csrf
    <div class="mb-3">
        <label>{{ __('Arabic Name') }}</label>
        <input type="text" name="name_ar" class="form-control" placeholder="{{ __('Arabic Name') }}" value="{{ isset($product->name_ar) ? $product->name_ar : '' }}" />
    </div>

    <div class="mb-3">
        <label>{{ __('English Name') }}</label>
        <input type="text" name="name_en" class="form-control" placeholder="{{ __('English Name') }}" value="{{ isset($product->name_en) ? $product->name_en : '' }}" />
    </div>

    <div class="mb-3">
        <label>{{ __('Price') }}</label>
        <input type="number" step="any" name="price" class="form-control" placeholder="{{ __('Price') }}" value="{{ isset($product->price) ? $product->price : '' }}" />
    </div>

    <div class="mb-3">
        <label>{{ __('Image') }} (270 x 240) </label>
        <input type="file" name="image" class="form-control">
        @if (isset($product->image_url))
        <img width="100" src="{{ $product->image_url }}" alt="">
        @endif
    </div>

    <input type="submit" class="btn btn-success px-5" value="{{ __('Save') }}"></input>
</form>
@stop