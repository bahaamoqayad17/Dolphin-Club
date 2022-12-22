@extends('dashboard.master')

@section('title', 'All Products | ' . config('app.name'))
@section('content')
@php
$locale = App::getLocale();
@endphp
<!-- Page Heading -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{ __('All Products') }}</h1>
    <a class="btn btn-dark" href="{{ route('dashboard.products.create') }}">{{ __('Add New Product') }}</a>
</div>

<form action="{{ route('dashboard.products.index') }}">
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
        <th>{{ __('Image') }}</th>
        <th>{{ __('Actions') }}</th>
    </tr>
    @foreach ($products as $product)
    <tr>
        <td>{{ $product->id }}</td>
        <td>{{ $product['name_' . $locale] }}</td>
        <td>{{ $product->price }}</td>
        <td><img width="100" src="{{ $product->image_url }}" alt=""></td>
        <td>
            <a class="btn btn-sm btn-primary" href="{{ route('dashboard.products.edit', $product->id) }}"><i class="fas fa-edit"></i></a>
            <form class="d-inline" action="{{ route('dashboard.products.destroy', $product->id) }}" method="POST">
                @csrf
                @method('delete')
                <button class="btn btn-sm btn-danger" onclick="return confirm({{ __('Are You Sure ?') }})"><i class="fas fa-trash"></i></button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
{{ $products->links() }}
@stop