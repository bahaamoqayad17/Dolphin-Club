@extends('dashboard.master')

@section('title', 'All Courses | ' . config('app.name'))
@section('content')
@php
$locale = App::getLocale();
@endphp
<!-- Page Heading -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{ __('All Courses') }}</h1>
    <a class="btn btn-dark" href="{{ route('dashboard.courses.create') }}">{{ __('Add New Course') }}</a>
</div>

<form action="{{ route('dashboard.courses.index') }}">
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search..." value="{{ request()->keyword }}" name="keyword">
        <button class="btn btn-success" type="submit" id="button-addon2">{{ __('Search') }}</button>
    </div>
</form>

<table class="table table-hover table-bordered table-striped">
    <tr>
        <th>{{ __('ID') }}</th>
        <th>{{ __('Name') }}</th>
        <th>{{ __('Price') }}</th>
        <th>{{ __('Status') }}</th>
        <th>{{ __('Image') }}</th>
        <th>{{ __('Show') }}</th>
        <th>{{ __('Actions') }}</th>
    </tr>
    @foreach ($courses as $course)
    <tr>
        <td>{{ $course->id }}</td>
        <td>{{ $course['name_' . $locale] }}</td>
        <td>{{ $course->price }}</td>
        <td class="badge badge-{{ $course->status == 0 ? 'success' : 'danger' }}">
            @if ($course->status == 0)
            {{ __('Available') }}
            @else
            {{ __('Not Available') }}
            @endif

        </td>
        <td><img width="100" src="{{ $course->image_url }}" alt=""></td>
        <form class="d-inline" action="{{ route('dashboard.courses.update', $course->id) }}" method="POST">
            <td>
                <select name="flag" class="form-control">
                    <option value="" selected disabled>{{ __('Select') }}</option>
                    <option {{ $course->flag === 0 ? 'selected' : '' }} value="0">{{ __('Main') }}
                    </option>
                    <option {{ $course->flag == 1 ? 'selected' : '' }} value="1">{{ __('Second') }}
                    </option>
                    <option {{ $course->flag == 2 ? 'selected' : '' }} value="2">{{ __('Third') }}
                    </option>
                </select>
            </td>
            <td>
                @csrf
                @method('put')
                <button class="btn btn-sm btn-success"><i class="fas fa-link"></i></button>
        </form>
        <a class="btn btn-sm btn-primary" href="{{ route('dashboard.courses.edit', $course->id) }}"><i class="fas fa-edit"></i></a>
        <form class="d-inline" action="{{ route('dashboard.courses.destroy', $course->id) }}" method="POST">
            @csrf
            @method('delete')
            <button class="btn btn-sm btn-danger" onclick="confirm({{ __('Are You Sure ?') }})"><i class="fas fa-trash"></i></button>
        </form>
        </td>
    </tr>
    @endforeach
</table>
{{ $courses->links() }}
@stop