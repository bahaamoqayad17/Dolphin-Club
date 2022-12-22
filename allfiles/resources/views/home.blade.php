@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                    <a class="mt-5 btn btn-success" href="{{ route('dashboard.settings.index') }}">{{ __('Go to Dashboard') }}
                    </a>
                    <a class="mt-5 btn btn-primary" href="{{ route('site.index') }}">{{ __('Go to WebSite') }} </a>
                </div>
            </div>
        </div>
    </div>
@endsection
