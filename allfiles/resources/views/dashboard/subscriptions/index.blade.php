@extends('dashboard.master')

@section('title', 'All Subscriptions | ' . config('app.name'))
@section('content')
    @php
        $locale = App::getLocale();
    @endphp
    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ __('All Subscriptions') }}</h1>
        <a class="btn btn-dark" onclick="history.back()">{{ __('Go Back') }}</a>
    </div>

    <form action="{{ route('subscriptions.index') }}">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search..." value="{{ request()->keyword }}" name="keyword">
            <button class="btn btn-success" type="submit" id="button-addon2">{{ __('Search') }}</button>
        </div>
    </form>


    <table class="table table-hover table-bordered table-striped">
        <tr>
            <th>{{ __('Identity Number') }}</th>
            <th>{{ __('Name') }}</th>
            <th>{{ __('Birth Date') }}</th>
            <th>{{ __('Gender') }}</th>
            <th>{{ __('Location') }}</th>
            <th>{{ __('Telephone') }}</th>
            <th>{{ __('Course Name') }}</th>
            <th>{{ __('Training Days') }}</th>
            <th>{{ __('Status') }}</th>
            <th>{{ __('Actions') }}</th>
        </tr>
        @foreach ($subscriptions as $sub)
            <tr>
                <td>{{ $sub->id_number }}</td>
                <td>{{ $sub->name }}</td>
                <td>{{ $sub->birth_date }}</td>
                <td>
                    @if ($sub->gender == 'Female')
                        {{ __('Female') }}
                    @else
                        {{ __('Male') }}
                    @endif
                </td>
                <td>{{ $sub->location }}</td>
                <td>{{ $sub->telephone }}</td>
                <td>
                    {{ $sub->course['name_' . $locale] }}
                </td>
                <td>
                    @if ($sub->training_days == 0)
                        {{ __('Sat,Mon,Wed') }}
                    @elseif($sub->training_days == 1)
                        {{ __('Sun,Tue,Thu') }}
                    @else
                        {{ __('All Days') }}
                    @endif
                </td>

                <td class="badge badge-{{ $sub->status == 0 ? 'danger' : 'success' }}">
                    @if ($sub->status == 0)
                        {{ __('Not Payed') }}
                    @else
                        {{ __('Payed') }}
                    @endif
                </td>
                <td>
                    <form class="d-inline" action="{{ route('subscriptions.update', $sub->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <button class="btn btn-sm btn-success"><i class="fas fa-link"></i></button>
                    </form>
                    <a class="btn btn-sm btn-secondary" href="{{ route('subscriptions.show', $sub->id) }}"><i
                            class="fas fa-eye"></i></a>
                    {{-- <a class="btn btn-sm btn-secondary" href="{{ route('site.createPDF', $sub->id) }}"><i
                            class="fas fa-print"></i></a> --}}
                    <a class="btn btn-sm btn-primary" href="{{ route('subscriptions.edit', $sub->id) }}"><i
                            class="fas fa-edit"></i></a>
                    <form class="d-inline" action="{{ route('subscriptions.destroy', $sub->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Are you Sure')"><i
                                class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@stop
