@extends('dashboard.master')

@section('title', 'Articles | ' . config('app.name'))


@section('content')
<!-- Page Heading -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <a class="btn btn-dark" href="{{ route('dashboard.articles.index') }}">{{ __('All Articles') }}</a>
</div>

@include('dashboard.errors')

<form action="{{ route('dashboard.articles.store', isset($article->id) ? $article->id : '') }}" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="{{ isset($article->id) ? $article->id : '' }}">
    @csrf

    <div class="mb-3">
        <label>{{ __('Arabic Title') }}</label>
        <input type="text" name="title_ar" class="form-control" placeholder="{{ __('Arabic Title') }}" value="{{ isset($article->title_ar) ? $article->title_ar : '' }}" />
    </div>

    <div class="mb-3">
        <label>{{ __('English Title') }}</label>
        <input type="text" name="title_en" class="form-control" placeholder="{{ __('English Title') }}" value="{{ isset($article->title_en) ? $article->title_en : '' }}" />
    </div>

    <div class="mb-3">
        <label>{{ __('Arabic Field') }}</label>
        <input type="text" name="field_ar" class="form-control" placeholder="{{ __('Arabic Field') }}" value="{{ isset($article->field_ar) ? $article->field_ar : '' }}" />
    </div>

    <div class="mb-3">
        <label>{{ __('English Field') }}</label>
        <input type="text" name="field_en" class="form-control" placeholder="{{ __('English Field') }}" value="{{ isset($article->field_en) ? $article->field_en : '' }}" />
    </div>

    <div class="mb-3">
        <label>{{ __('Arabic Summary') }}</label>
        <textarea class="tinytext" placeholder="{{ __('Arabic Summary') }}" name="summary_ar" rows="10" cols="20">{{ isset($article->summary_ar) ? $article->summary_ar : '' }}</textarea>
    </div>

    <div class="mb-3">
        <label>{{ __('English Summary') }}</label>
        <textarea class="tinytext" placeholder="{{ __('English Summary') }}" name="summary_en" rows="10" cols="20">{{ isset($article->summary_en) ? $article->summary_en : '' }}</textarea>
    </div>

    <div class="mb-3">
        <label>{{ __('Arabic Content') }}</label>
        <textarea class="tinytext" placeholder="{{ __('Arabic Content') }}" name="content_ar" rows="10" cols="20">{{ isset($article->content_ar) ? $article->content_ar : '' }}</textarea>
    </div>

    <div class="mb-3">
        <label>{{ __('English Content') }}</label>
        <textarea class="tinytext" placeholder="{{ __('English Content') }}" name="content_en" rows="10" cols="20">{{ isset($article->content_en) ? $article->content_en : '' }}</textarea>
    </div>

    <div class="mb-3">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="flag" {{ isset($article->flag) == 0 ? 'checked' : '' }} id="Landing" value="0">
            <label class="form-check-label" for="Landing">
                {{ __('Show Landing Page') }}
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="flag" {{ isset($article->flag) == 1 ? 'checked' : '' }} id="show" value="1">
            <label class="form-check-label" for="show">
                {{ __('Show') }}
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="flag" {{ isset($article->flag) == 2 ? 'checked' : '' }} id="hide" value="2">
            <label class="form-check-label" for="hide">
                {{ __('Disabled') }}
            </label>
        </div>
    </div>

    <div class="mb-3">
        <label>{{ __('Image') }} (570 x 400) </label>
        <input type="file" name="image" class="form-control">
        @if (isset($article->image_url))
        <img width="100" src="{{ $article->image_url }}" alt="">
        @endif
    </div>

    <input type="submit" class="btn btn-success px-5" value="{{ __('Save') }}"></input>
</form>
@stop