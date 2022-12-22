@extends('dashboard.master')
@section('title', 'Subscription | ' . config('app.name'))

@section('content')
    <div class="container">
        <div class="mb-3">
            <label>{{ __('Name') }} :</label>
            <input type="text" class="form-control" disabled value="{{ $contact->name }}">

        </div>
        <div class="mb-3">
            <label>{{ __('Email') }} :</label>
            <input type="text" class="form-control" disabled value="{{ $contact->email }}">

        </div>
        <div class="mb-3">
            <label>{{ __('Number') }} :</label>
            <input type="text" class="form-control" disabled value="{{ $contact->number }}">

        </div>
        <div class="mb-3">
            <label>{{ __('Subject') }} :</label>
            <input type="text" class="form-control" disabled value="{{ $contact->subject }}">
        </div>
        <div class="mb-3">
            <label>{{ __('Message') }}</label>
            <textarea disabled rows="20" class="form-control">{{ $contact->message }}</textarea>

        </div>
    </div>
@stop
