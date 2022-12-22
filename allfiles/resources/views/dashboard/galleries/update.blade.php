@extends('dashboard.master')

@section('title', 'Gallery | ' . config('app.name'))


@section('content')
    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a class="btn btn-dark" href="{{ route('dashboard.galleries.index') }}">{{ __('All Photos') }}</a>
    </div>

    @include('dashboard.errors')
    <form action="{{ route('dashboard.galleries.store', isset($gallery->id) ? $gallery->id : '') }}" method="POST"
        enctype="multipart/form-data">
        <input type="hidden" name="id" value="{{ isset($gallery->id) ? $gallery->id : '' }}">
        @csrf

        <div class="mb-3">
            <label>{{ __('Arabic Title') }}</label>
            <input type="text" name="title_ar" class="form-control" placeholder="{{ __('Arabic Title') }}"
                value="{{ isset($gallery->title_ar) ? $gallery->title_ar : '' }}" />
        </div>

        <div class="mb-3">
            <label>{{ __('English Title') }}</label>
            <input type="text" name="title_en" class="form-control" placeholder="{{ __('English Title') }}"
                value="{{ isset($gallery->title_en) ? $gallery->title_en : '' }}" />
        </div>

        <div class="mb-3">
            <label>{{ __('Image') }} (370 x 480) </label>
            <input type="file" name="image" class="form-control">
            @if (isset($gallery->image_url))
                <img width="100" src="{{ $gallery->image_url }}" alt="">
            @endif
        </div>

        <input type="submit" class="btn btn-success px-5" value="{{ __('Save') }}"></input>
    </form>
@stop
