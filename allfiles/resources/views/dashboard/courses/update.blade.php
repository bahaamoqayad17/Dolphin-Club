@extends('dashboard.master')

@section('title', 'Courses | ' . config('app.name'))


@section('content')
<!-- Page Heading -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <a class="btn btn-dark" href="{{ route('dashboard.courses.index') }}">{{ __('All Courses') }}</a>
</div>

@include('dashboard.errors')

<form action="{{ route('dashboard.courses.store', isset($course->id) ? $course->id : '') }}" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="{{ isset($course->id) ? $course->id : '' }}">
    @csrf

    <div class="mb-3">
        <label>{{ __('Arabic Name') }}</label>
        <input type="text" name="name_ar" class="form-control" placeholder="{{ __('Arabic Name') }}" value="{{ isset($course->name_ar) ? $course->name_ar : '' }}" />
    </div>

    <div class="mb-3">
        <label>{{ __('English Name') }}</label>
        <input type="text" name="name_en" class="form-control" placeholder="{{ __('English Name') }}" value="{{ isset($course->name_en) ? $course->name_en : '' }}" />
    </div>


    <div class="mb-3">
        <label>{{ __('Price') }}</label>
        <input type="number" step="any" name="price" class="form-control" placeholder="{{ __('Price') }}" value="{{ isset($course->price) ? $course->price : '' }}" />
    </div>

    <div class="mb-3">
        <label>{{ __('Arabic Content') }}</label>
        <textarea class="tinytext" placeholder="{{ __('Arabic Content') }}" name="content_ar" rows="10" cols="20">{{ isset($course->content_ar) ? $course->content_ar : '' }}</textarea>
    </div>

    <div class="mb-3">
        <label>{{ __('English Content') }}</label>
        <textarea class="tinytext" placeholder="{{ __('English Content') }}" name="content_en" rows="10" cols="20">{{ isset($course->content_en) ? $course->content_en : '' }}</textarea>
    </div>
    <div class="mb-3">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="status" @if (isset($course->status)) {{ $course->status == 0 ? 'checked' : '' }} @endif id="Landing"
            value="0">
            <label class="form-check-label" for="Landing">
                {{ __('Available') }}
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="status" @if (isset($course->status)) {{ $course->status == 1 ? 'checked' : '' }} @endif id="show"
            value="1">
            <label class="form-check-label" for="show">
                {{ __('Not Available') }}
            </label>
        </div>
    </div>

    <div class="mb-3">
        <label>{{ __('Image') }} (550 x 400) || (1920 x 550) </label>
        <input type="file" name="image" class="form-control">
        @if (isset($course->image_url))
        <img width="100" src="{{ $course->image_url }}" alt="">
        @endif
    </div>

    <input type="submit" class="btn btn-success px-5" value="{{ __('Save') }}"></input>
</form>
@stop