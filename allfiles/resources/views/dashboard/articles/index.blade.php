@extends('dashboard.master')

@section('title', 'All Articles | ' . config('app.name'))
@section('content')
@php
$locale = App::getLocale();
@endphp
<!-- Page Heading -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{ __('All Articles') }}</h1>
    <a class="btn btn-dark" href="{{ route('dashboard.articles.create') }}">{{ __('Add New Article') }}</a>
</div>

<form action="{{ route('dashboard.articles.index') }}">
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search..." value="{{ request()->keyword }}" name="keyword">
        <button class="btn btn-success" type="submit" id="button-addon2">{{ __('Search') }}</button>
    </div>
</form>

<table class="table table-hover table-bordered table-striped">
    <tr>
        <th>{{ __('ID') }}</th>
        <th>{{ __('Title') }}</th>
        <th>{{ __('Summary') }}</th>
        <th>{{ __('Image') }}</th>
        <th>{{ __('Actions') }}</th>
    </tr>
    @foreach ($articles as $article)
    <tr>
        <td>{{ $article->id }}</td>
        <td>{{ $article['title_' . $locale] }}</td>
        <td>{!! $article['summary_' . $locale] !!}</td>
        <td><img width="100" src="{{ $article->image_url }}" alt=""></td>
        <td>
            <a class="btn btn-sm btn-primary" href="{{ route('dashboard.articles.edit', $article->id) }}"><i class="fas fa-edit"></i></a>
            <form class="d-inline" action="{{ route('dashboard.articles.destroy', $article->id) }}" method="POST">
                @csrf
                @method('delete')
                <button class="btn btn-sm btn-danger" onclick="return confirm({{ __('Are You Sure ?') }})"><i class="fas fa-trash"></i></button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
{{ $articles->links() }}
@stop