@extends('dashboard.master')

@section('title', 'Trainers | ' . config('app.name'))


@section('content')
<!-- Page Heading -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <a class="btn btn-dark" href="{{ route('dashboard.trainers.index') }}">{{ __('All Trainers') }}</a>
</div>

@include('dashboard.errors')

<form action="{{ route('dashboard.trainers.store', isset($trainer->id) ? $trainer->id : '') }}" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="{{ isset($trainer->id) ? $trainer->id : '' }}">
    @csrf

    <div class="mb-3">
        <label>{{ __('Arabic Name') }}</label>
        <input type="text" name="name_ar" class="form-control" placeholder="{{ __('Arabic Name') }}" value="{{ isset($trainer->name_ar) ? $trainer->name_ar : '' }}" />
    </div>

    <div class="mb-3">
        <label>{{ __('English Name') }}</label>
        <input type="text" name="name_en" class="form-control" placeholder="{{ __('English Name') }}" value="{{ isset($trainer->name_en) ? $trainer->name_en : '' }}" />
    </div>

    <div class="mb-3">
        <label>{{ __('Arabic Field') }}</label>
        <input type="text" name="field_ar" class="form-control" placeholder="{{ __('Arabic Field') }}" value="{{ isset($trainer->field_ar) ? $trainer->field_ar : '' }}" />
    </div>

    <div class="mb-3">
        <label>{{ __('English Field') }}</label>
        <input type="text" name="field_en" class="form-control" placeholder="{{ __('English Field') }}" value="{{ isset($trainer->field_en) ? $trainer->field_en : '' }}" />
    </div>

    <div class="mb-3">
        <label>{{ __('Arabic Desciption') }}</label>
        <textarea placeholder="{{ __('Arabic Desciption') }}" name="description_ar" class="form-control" cols="20" rows="10">{{ isset($trainer->description_ar) ? $trainer->description_ar : '' }}</textarea>
    </div>

    <div class="mb-3">
        <label>{{ __('English Desciption') }}</label>
        <textarea placeholder="{{ __('English Desciption') }}" name="description_en" class="form-control" cols="20" rows="10">{{ isset($trainer->description_en) ? $trainer->description_en : '' }}</textarea>
    </div>

    <div class="mb-3">
        <label>{{ __('Facebook Link') }}</label>
        <input type="text" name="facebook" class="form-control" placeholder="{{ __('Facebook Link') }}" value="{{ isset($trainer->facebook) ? $trainer->facebook : '' }}" />
    </div>

    <div class="mb-3">
        <label>{{ __('Email') }}</label>
        <input type="text" name="gmail" class="form-control" placeholder="{{ __('Email') }}" value="{{ isset($trainer->gmail) ? $trainer->gmail : '' }}" />
    </div>

    <div class="mb-3">
        <label>{{ __('Twitter Link') }}</label>
        <input type="text" name="twitter" class="form-control" placeholder="{{ __('Twitter Link') }}" value="{{ isset($trainer->twitter) ? $trainer->twitter : '' }}" />
    </div>

    <div class="mb-3">
        <label>{{ __('LinkedIn Link') }}</label>
        <input type="text" name="linkedin" class="form-control" placeholder="{{ __('LinkedIn Link') }}" value="{{ isset($trainer->linkedin) ? $trainer->linkedin : '' }}" />
    </div>

    <div class="mb-3">
        <label>{{ __('Image') }} (270 x 270) </label>
        <input type="file" name="image" class="form-control">
        @if (isset($trainer->image_url))
        <img width="100" src="{{ $trainer->image_url }}" alt="">
        @endif
    </div>

    <input type="submit" class="btn btn-success px-5" value="{{ __('Save') }}"></input>
</form>
@stop