@extends('dashboard.master')

@section('title', 'Testimonials | ' . config('app.name'))


@section('content')
<!-- Page Heading -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <a class="btn btn-dark" href="{{ route('dashboard.testimonials.index') }}">{{ __('All Testimonials') }}</a>
</div>

@include('dashboard.errors')

<form action="{{ route('dashboard.testimonials.store', isset($testimonial->id) ? $testimonial->id : '') }}" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="{{ isset($testimonial->id) ? $testimonial->id : '' }}">
    @csrf

    <div class="mb-3">
        <label>{{ __('Arabic Name') }}</label>
        <input type="text" name="name_ar" class="form-control" placeholder="{{ __('Arabic Name') }}" value="{{ isset($testimonial->name_ar) ? $testimonial->name_ar : '' }}" />
    </div>

    <div class="mb-3">
        <label>{{ __('English Name') }}</label>
        <input type="text" name="name_en" class="form-control" placeholder="{{ __('English Name') }}" value="{{ isset($testimonial->name_en) ? $testimonial->name_en : '' }}" />
    </div>

    <div class="mb-3">
        <label>{{ __('Arabic Field') }}</label>
        <input type="text" name="field_ar" class="form-control" placeholder="{{ __('Arabic Field') }}" value="{{ isset($testimonial->field_ar) ? $testimonial->field_ar : '' }}" />
    </div>

    <div class="mb-3">
        <label>{{ __('English Field') }}</label>
        <input type="text" name="field_en" class="form-control" placeholder="{{ __('English Field') }}" value="{{ isset($testimonial->field_en) ? $testimonial->field_en : '' }}" />
    </div>

    <div class="mb-3">
        <label>{{ __('Arabic Content') }}</label>
        <textarea placeholder="{{ __('Arabic Content') }}" name="content_ar" class="tinytext" cols="20" rows="10">{{ isset($testimonial->content_ar) ? $testimonial->content_ar : '' }}</textarea>
    </div>

    <div class="mb-3">
        <label>{{ __('English Content') }}</label>
        <textarea placeholder="{{ __('English Content') }}" name="content_en" class="tinytext" cols="20" rows="10">{{ isset($testimonial->content_en) ? $testimonial->content_en : '' }}</textarea>
    </div>

    <div class="mb-3">
        <label>{{ __('Image') }} (90 x 90) </label>
        <input type="file" name="image" class="form-control">
        @if (isset($testimonial->image_url))
        <img width="100" src="{{ $testimonial->image_url }}" alt="">
        @endif
    </div>

    <input type="submit" class="btn btn-success px-5" value="{{ __('Save') }}"></input>
</form>
@stop