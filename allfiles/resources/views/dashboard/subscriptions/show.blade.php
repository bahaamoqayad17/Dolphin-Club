@extends('dashboard.master')
@section('title', 'Subscription | ' . config('app.name'))

@section('content')
    <div class="container">
        <div class="mb-3">
            <label>{{ __('Identity Number') }} :</label>
            <input type="text" class="form-control" disabled value="{{ $subscription->id_number }}">

        </div>
        <div class="mb-3">
            <label>{{ __('Name') }} :</label>
            <input type="text" class="form-control" disabled value="{{ $subscription->name }}">

        </div>
        <div class="mb-3">
            <label>{{ __('Birth Date') }} :</label>
            <input type="text" class="form-control" disabled value="{{ $subscription->birth_date }}">

        </div>
        <div class="mb-3">
            <label>{{ __('Gender') }} :</label>
            <input type="text" class="form-control" disabled value="{{ $subscription->gender }}">

        </div>
        <div class="mb-3">
            <label>{{ __('Blood Type') }} :</label>
            <input type="text" class="form-control" disabled value="{{ $subscription->blood_type }}">

        </div>
        <div class="mb-3">
            <label>{{ __('Location') }} :</label>
            <input type="text" class="form-control" disabled value="{{ $subscription->location }}">

        </div>
        <div class="mb-3">
            <label>{{ __('Telephone') }} :</label>
            <input type="text" class="form-control" disabled value="{{ $subscription->telephone }}">

        </div>
        <div class="mb-3">
            <label>{{ __('Phone Number') }} :</label>
            <input type="text" class="form-control" disabled value="{{ $subscription->phone_number }}">

        </div>
        <div class="mb-3">
            <label>{{ __('Email') }} :</label>
            <input type="text" class="form-control" disabled value="{{ $subscription->email }}">

        </div>
        <div class="mb-3">
            <label>{{ __('Course Name') }} :</label>
            <input type="text" class="form-control" disabled value="{{ $subscription->course->name }}">
        </div>
        <div class="mb-3">
            <label>{{ __('Training Days') }} :</label>
            <input type="text" disabled
                value="@if ($subscription->training_days == 0) {{ __('Sat,Mon,Wed') }}
            @elseif($subscription->training_days == 1)
                {{ __('Sun,Tue,Thu') }}
            @else{{ __('All Days') }} @endif"
                class="form-control">
        </div>
        <div class="mb-3">
            <label>{{ __('Status') }} :</label>
            <input class="form-control" type="text" disabled
                value="@if ($subscription->status == 0) {{ __('Not Payed') }}
            @else{{ __('Payed') }} @endif">
        </div>
    </div>
@stop
