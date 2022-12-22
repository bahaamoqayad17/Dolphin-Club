@extends('dashboard.master')

@section('title', 'Gallery | ' . config('app.name'))
@section('content')
@php
$locale = App::getLocale();
@endphp
<!-- Page Heading -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{ __('Gallery') }}</h1>
    <a class="btn btn-dark" href="{{ route('dashboard.galleries.create') }}">{{ __('Add New Photo') }}</a>
</div>


<table class="table table-hover table-bordered table-striped">
    <tr>
        <th>{{ __('ID') }}</th>
        <th>{{ __('Title') }}</th>
        <th>{{ __('Image') }}</th>
        <th>{{ __('Actions') }}</th>
    </tr>
    @foreach ($galleries as $pic)
    <tr>
        <td>{{ $pic->id }}</td>
        <td>{{ $pic['title_' . $locale] }}</td>
        <td><img width="100" src="{{ $pic->image_url }}" alt=""></td>
        <td>
            <a class="btn btn-sm btn-primary" href="{{ route('dashboard.galleries.edit', $pic->id) }}"><i class="fas fa-edit"></i></a>
            <form class="d-inline" action="{{ route('dashboard.galleries.destroy', $pic->id) }}" method="POST">
                @csrf
                @method('delete')
                <button class="btn btn-sm btn-danger" onclick="return confirm({{ __('Are You Sure ?') }})"><i class="fas fa-trash"></i></button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@stop