@extends('dashboard.master')

@section('title', 'All Testimonials | ' . config('app.name'))
@section('content')
@php
$locale = App::getLocale();
@endphp
<!-- Page Heading -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{ __('All Testimonials') }}</h1>
    <a class="btn btn-dark" href="{{ route('dashboard.testimonials.create') }}">{{ __('Add New Testimonial') }}</a>
</div>

<table class="table table-hover table-bordered table-striped">
    <tr>
        <th>{{ __('ID') }}</th>
        <th>{{ __('Name') }}</th>
        <th>{{ __('Field') }}</th>
        <th>{{ __('Image') }}</th>
        <th>{{ __('Actions') }}</th>
    </tr>
    @foreach ($testimonials as $testimonial)
    <tr>
        <td>{{ $testimonial->id }}</td>
        <td>{{ $testimonial['name_' . $locale] }}</td>
        <td>{{ $testimonial['field_' . $locale] }}</td>
        <td><img width="100" src="{{ $testimonial->image_url }}" alt=""></td>
        <td>
            <a class="btn btn-sm btn-primary" href="{{ route('dashboard.testimonials.edit', $testimonial->id) }}"><i class="fas fa-edit"></i></a>
            <form class="d-inline" action="{{ route('dashboard.testimonials.destroy', $testimonial->id) }}" method="POST">
                @csrf
                @method('delete')
                <button class="btn btn-sm btn-danger" onclick="return confirm({{ __('Are You Sure ?') }})"><i class="fas fa-trash"></i></button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@stop