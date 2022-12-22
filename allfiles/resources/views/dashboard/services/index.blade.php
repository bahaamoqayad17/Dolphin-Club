@extends('dashboard.master')

@section('title', 'All Services | ' . config('app.name'))
@section('content')
    @php
        $locale = App::getLocale();
    @endphp
    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ __('All Services') }}</h1>
        <a class="btn btn-dark" href="{{ route('dashboard.services.create') }}">{{ __('Add New Service') }}</a>
    </div>


    <table class="table table-hover table-bordered table-striped">
        <tr>
            <th>{{ __('ID') }}</th>
            <th>{{ __('Title') }}</th>
            <th>{{ __('Content') }}</th>
            <th>{{ __('Icons') }}</th>
            <th>{{ __('Actions') }}</th>
        </tr>
        @foreach ($services as $service)
            <tr>
                <td>{{ $service->id }}</td>
                <td>{{ $service['title_' . $locale] }}</td>
                <td>{!! $service['content_' . $locale] !!}</td>
                <td style="font-size: 30px"><i class="flaticon-{{ $service->icon }}"></i></td>
                <td>
                    <a class="btn btn-sm btn-primary" href="{{ route('dashboard.services.edit', $service->id) }}"><i
                            class="fas fa-edit"></i></a>
                    <form class="d-inline" action="{{ route('dashboard.services.destroy', $service->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-sm btn-danger" onclick="return confirm({{ __('Are You Sure ?') }})"><i
                                class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@stop
