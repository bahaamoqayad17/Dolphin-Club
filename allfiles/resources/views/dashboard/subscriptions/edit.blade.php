@extends('dashboard.master')

@section('title', 'Edit Subscription | ' . config('app.name'))

@section('content')
    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Subscription</h1>
        <a class="btn btn-dark" href="{{ route('subscriptions.index') }}">All Subscriptions</a>
    </div>

    @include('dashboard.errors')

    <form action="{{ route('subscriptions.store') }}" method="POST"">
        @csrf

        <input type="hidden" value="{{ $subscription->id }}" name="id">

        <div class="mb-3">
            <label>{{ __('Identity Number') }}</label>
            <input type="text" name="id_number" class="form-control" value="{{ $subscription->id_number }}"
                placeholder="Identity Number" />
        </div>

        <div class="mb-3">
            <label>{{ __('Full Name') }}</label>
            <input type="text" name="name" class="form-control" value="{{ $subscription->name }}"
                placeholder="{{ __('Full Name') }}" />
        </div>

        <div class="mb-3">
            <label>{{ __('Birth Date') }}</label>
            <input type="date" name="birth_date" class="form-control" value="{{ $subscription->birth_date }}"
                placeholder="{{ __('Birth Date') }}" />
        </div>

        <div class="mb-3">
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="male"
                        {{ $subscription->gender == 'Male' ? 'checked' : '' }} value="Male">
                    <label class="form-check-label" for="male">
                        {{ __('Male') }}
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="female"
                        value="Female"{{ $subscription->gender == 'Female' ? 'checked' : '' }}>
                    <label class="form-check-label" for="female">
                        {{ __('Female') }}
                    </label>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label>{{ __('Blood Type') }}</label>
            <input type="text" name="blood_type" class="form-control" value="{{ $subscription->blood_type }}"
                placeholder="{{ __('Blood Type') }}" />
        </div>

        <div class="mb-3">
            <label>{{ __('Location') }}</label>
            <input type="text" name="location" class="form-control" value="{{ $subscription->location }}"
                placeholder="{{ __('Location') }}" />
        </div>

        <div class="mb-3">
            <label>{{ __('Telephone') }}</label>
            <input type="text" name="telephone" class="form-control" value="{{ $subscription->telephone }}"
                placeholder="{{ __('Telephone') }}" />
        </div>

        <div class="mb-3">
            <label>{{ __('Phone Number') }}</label>
            <input type="text" name="phone_number" class="form-control" value="{{ $subscription->phone_number }}"
                placeholder="{{ __('Phone Number') }}" />
        </div>

        <div class="mb-3">
            <label>{{ __('Email') }}</label>
            <input type="email" name="email" class="form-control" value="{{ $subscription->email }}"
                placeholder="{{ __('Email') }}" />
        </div>

        <div class="mb-3">
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="subscription_type"
                        id="Beginner"{{ $subscription->subscription_type == 0 ? 'checked' : '' }}>
                    <label class="form-check-label" for="Beginner" value="0">
                        {{ __('Beginner') }}
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="subscription_type" id="Advanced"
                        {{ $subscription->subscription_type == 1 ? 'checked' : '' }} value="1">
                    <label class="form-check-label" for="Advanced">
                        {{ __('Advanced') }}
                    </label>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="training_days" id="sat" value="0"
                        {{ $subscription->training_days == 0 ? ' checked' : '' }}>
                    <label class="form-check-label" for="Beginner">
                        {{ __('Saturday , Monday , Wednesday') }}
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="training_days" id="sun" value="1"
                        {{ $subscription->training_days == 1 ? ' checked' : '' }}>
                    <label class="form-check-label" for="Advanced">
                        {{ __('Sunday , Tuesday , Thursday') }}
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="training_days" id="all" value="2"
                        {{ $subscription->training_days == 2 ? ' checked' : '' }}>
                    <label class="form-check-label" for="all">
                        {{ __('All Days') }}
                    </label>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="not" value="0"
                        {{ $subscription->status == 0 ? ' checked' : '' }}>
                    <label class="form-check-label" for="not">
                        {{ __('Not Payed') }}
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="yes" value="1"
                        {{ $subscription->status == 1 ? ' checked' : '' }}>
                    <label class="form-check-label" for="yes">
                        {{ __('Payed') }}
                    </label>
                </div>
            </div>
        </div>
        <button class="btn btn-info px-5">{{ __('Edit') }}</button>
    </form>
@stop
