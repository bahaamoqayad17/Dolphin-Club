@extends('dashboard.master')

@section('title', 'Sliders | ' . config('app.name'))


@section('content')
    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a class="btn btn-dark" href="{{ route('dashboard.sliders.index') }}">{{ __('All Sliders') }}</a>
    </div>

    @include('dashboard.errors')

    <form action="{{ route('dashboard.sliders.store', isset($slider->id) ? $slider->id : '') }}" method="POST"
        enctype="multipart/form-data">
        <input type="hidden" name="id" value="{{ isset($slider->id) ? $slider->id : '' }}">
        @csrf

        <div class="mb-3">
            <label>{{ __('Arabic Title') }}</label>
            <input type="text" name="title_ar" class="form-control" placeholder="{{ __('Arabic Title') }}"
                value="{{ isset($slider->title_ar) ? $slider->title_ar : '' }}" />
        </div>

        <div class="mb-3">
            <label>{{ __('English Title') }}</label>
            <input type="text" name="title_en" class="form-control" placeholder="{{ __('English Title') }}"
                value="{{ isset($slider->title_en) ? $slider->title_en : '' }}" />
        </div>

        <div class="mb-3">
            <label>{{ __('Arabic Content') }}</label>
            <textarea class="tinytext" placeholder="{{ __('Arabic Content') }}" name="content_ar" rows="10" cols="20">{{ isset($slider->content_ar) ? $slider->content_ar : '' }}</textarea>
        </div>

        <div class="mb-3">
            <label>{{ __('English Content') }}</label>
            <textarea class="tinytext" placeholder="{{ __('English Content') }}" name="content_en" rows="10" cols="20">{{ isset($slider->content_en) ? $slider->content_en : '' }}</textarea>
        </div>

        <div class="mb-3">
            <label>{{ __('Image') }} (1920 x 850) </label>
            <input type="file" name="image" class="form-control">
            @if (isset($slider->image_url))
                <img width="100" src="{{ $slider->image_url }}" alt="">
            @endif
        </div>

        <input type="submit" class="btn btn-success px-5" value="{{ __('Save') }}"></input>
    </form>
@stop
