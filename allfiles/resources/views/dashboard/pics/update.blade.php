@extends('dashboard.master')

@section('title', 'Pictures | ' . config('app.name'))


@section('content')
    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a class="btn btn-dark" href="{{ route('dashboard.pics.index') }}">{{ __('All Pictures') }}</a>
    </div>

    @include('dashboard.errors')

    <form action="{{ route('dashboard.pics.store') }}" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="{{ isset($pic->id) ? $pic->id : '' }}">
        @csrf

        <div class="mb-3">
            <label>{{ __('Image') }} (110 x 75) </label>
            <input type="file" name="image" class="form-control">
            @if (isset($pic->image_url))
                <img width="100" src="{{ $pic->image_url }}" alt="">
            @endif
        </div>

        <input type="submit" class="btn btn-success px-5" value="{{ __('Save') }}"></input>
    </form>
@stop
