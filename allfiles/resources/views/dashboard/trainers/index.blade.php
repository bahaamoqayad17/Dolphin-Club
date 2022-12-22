@extends('dashboard.master')

@section('title', 'All Trainers | ' . config('app.name'))
@section('content')
@php
$locale = App::getLocale();
@endphp
<!-- Page Heading -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{ __('All Trainers') }}</h1>
    <a class="btn btn-dark" href="{{ route('dashboard.trainers.create') }}">{{ __('Add New Trainer') }}</a>
</div>

<form action="{{ route('dashboard.trainers.index') }}">
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search..." value="{{ request()->keyword }}" name="keyword">
        <button class="btn btn-success" type="submit" id="button-addon2">{{ __('Search') }}</button>
    </div>
</form>

<table class="table table-hover table-bordered table-striped">
    <tr>
        <th>{{ __('ID') }}</th>
        <th>{{ __('Name') }}</th>
        <th>{{ __('Field') }}</th>
        <th>{{ __('Image') }}</th>
        <th>{{ __('Actions') }}</th>
    </tr>
    @foreach ($trainers as $trainer)
    <tr>
        <td>{{ $trainer->id }}</td>
        <td>{{ $trainer['name_' . $locale] }}</td>
        <td>{{ $trainer['field_' . $locale] }}</td>
        <td><img width="100" src="{{ $trainer->image_url }}" alt=""></td>
        <td>
            <a class="btn btn-sm btn-primary" href="{{ route('dashboard.trainers.edit', $trainer->id) }}"><i class="fas fa-edit"></i></a>
            <form class="d-inline" action="{{ route('dashboard.trainers.destroy', $trainer->id) }}" method="POST">
                @csrf
                @method('delete')
                <button class="btn btn-sm btn-danger" onclick="return confirm({{ __('Are You Sure ?') }})"><i class="fas fa-trash"></i></button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@stop