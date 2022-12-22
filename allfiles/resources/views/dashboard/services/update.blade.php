@extends('dashboard.master')

@section('title', 'Services | ' . config('app.name'))


@section('content')
    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a class="btn btn-dark" href="{{ route('dashboard.services.index') }}">{{ __('All Services') }}</a>
    </div>

    @include('dashboard.errors')

    <form action="{{ route('dashboard.services.store', isset($service->id) ? $service->id : '') }}" method="POST"
        enctype="multipart/form-data">
        <input type="hidden" name="id" value="{{ isset($service->id) ? $service->id : '' }}">
        @csrf

        <div class="mb-3">
            <label>{{ __('Arabic Title') }}</label>
            <input type="text" name="title_ar" class="form-control" placeholder="{{ __('Arabic Title') }}"
                value="{{ isset($service->title_ar) ? $service->title_ar : '' }}" />
        </div>

        <div class="mb-3">
            <label>{{ __('English Title') }}</label>
            <input type="text" name="title_en" class="form-control" placeholder="{{ __('English Title') }}"
                value="{{ isset($service->title_en) ? $service->title_en : '' }}" />
        </div>

        <div class="mb-3">
            <label>{{ __('Arabic Content') }}</label>
            <textarea class="tinytext" placeholder="{{ __('Arabic Content') }}" name="content_ar" rows="10" cols="20">{{ isset($service->content_ar) ? $service->content_ar : '' }}</textarea>
        </div>

        <div class="mb-3">
            <label>{{ __('English Content') }}</label>
            <textarea class="tinytext" placeholder="{{ __('English Content') }}" name="content_en" rows="10" cols="20">{{ isset($service->content_en) ? $service->content_en : '' }}</textarea>
        </div>

        <div class="form-group" style="font-size: 30px">

            <div class="form-check">
                <input class="form-check-input"
                    @if (isset($service->icon)) {{ $service->icon == 'waves' ? 'checked' : '' }} @endif
                    type="radio" name="icon" id="waves" value="waves">
                <label class="form-check-label" for="waves">
                    <i class="flaticon-waves"></i>
                </label>
            </div>

            <div class="form-check">
                <input class="form-check-input"
                    @if (isset($service->icon)) {{ $service->icon == 'swimming' ? 'checked' : '' }} @endif
                    type="radio" name="icon" id="swimming" value="swimming">
                <label class="form-check-label" for="swimming">
                    <i class="flaticon-swimming"></i>
                </label>
            </div>

            <div class="form-check">
                <input class="form-check-input"
                    @if (isset($service->icon)) {{ $service->icon == 'flipper' ? 'checked' : '' }} @endif
                    type="radio" name="icon" id="flipper" value="flipper">
                <label class="form-check-label" for="flipper">
                    <i class="flaticon-flipper"></i>
                </label>
            </div>

            <div class="form-check">
                <input class="form-check-input"
                    @if (isset($service->icon)) {{ $service->icon == 'diver' ? 'checked' : '' }} @endif
                    type="radio" name="icon" id="diver" value="diver">
                <label class="form-check-label" for="diver">
                    <i class="flaticon-diver"></i>
                </label>
            </div>

            <div class="form-check">
                <input class="form-check-input"
                    @if (isset($service->icon)) {{ $service->icon == 'swimmer' ? 'checked' : '' }} @endif
                    type="radio" name="icon" id="swimmer" value="swimmer">
                <label class="form-check-label" for="swimmer">
                    <i class="flaticon-swimmer"></i>
                </label>
            </div>

            <div class="form-check">
                <input class="form-check-input"
                    @if (isset($service->icon)) {{ $service->icon == 'dive' ? 'checked' : '' }} @endif type="radio"
                    name="icon" id="dive" value="dive">
                <label class="form-check-label" for="dive">
                    <i class="flaticon-dive"></i>
                </label>
            </div>


        </div>

        <input type="submit" class="btn btn-success px-5" value="{{ __('Save') }}"></input>
    </form>
@stop
