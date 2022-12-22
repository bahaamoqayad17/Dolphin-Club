@extends('dashboard.master')

@section('title', 'All Pictures | ' . config('app.name'))
@section('content')
<!-- Page Heading -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{ __('All Pictures') }}</h1>
    <a class="btn btn-dark" href="{{ route('dashboard.pics.create') }}">{{ __('Add New Picture') }}</a>
</div>

<table class="table table-hover table-bordered table-striped">
    <tr>
        <th>{{ __('ID') }}</th>
        <th>{{ __('Image') }}</th>
        <th>{{ __('Actions') }}</th>
    </tr>
    @foreach ($pics as $pic)
    <tr>
        <td>{{ $pic->id }}</td>
        <td><img width="100" src="{{  $pic->image_url }}" alt=""></td>
        <td>
            <a class="btn btn-sm btn-primary" href="{{ route('dashboard.pics.edit', $pic->id) }}"><i class="fas fa-edit"></i></a>
            <form class="d-inline" action="{{ route('dashboard.pics.destroy', $pic->id) }}" method="POST">
                @csrf
                @method('delete')
                <button class="btn btn-sm btn-danger" onclick="return confirm({{ __('Are You Sure ?') }})"><i class="fas fa-trash"></i></button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@stop