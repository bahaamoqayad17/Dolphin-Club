@extends('dashboard.index')
@section('title', 'Contacts | ' . config('app.name'))

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ __('All Contact Messages') }}</h1>
        <a class="btn btn-dark" onclick="history.back()">{{ __('Go Back') }}</a>
    </div>
    <table class="table table-hover table-bordered table-striped">
        <tr>
            <td>{{ __('Name') }}</td>
            <td>{{ __('Email') }}</td>
            <td>{{ __('Number') }}</td>
            <td>{{ __('Subject') }}</td>
            <th>{{ __('Actions') }}</th>
        </tr>
        @foreach ($contacts as $contact)
            <tr>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->number }}</td>
                <td>{{ $contact->subject }}</td>
                <td>
                    <form class="d-inline" action="{{ route('dashboard.contacts.destroy', $contact->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('{{ __('Are You Sure ?') }}')"><i
                                class="fas fa-trash"></i></button>
                    </form>
                    <a href="{{ route('dashboard.contacts.show', $contact->id) }}" class="btn btn-sm btn-secondary"><i
                            class="fas fa-eye"></i></a>
                </td>
            </tr>
        @endforeach
    </table>
@stop
