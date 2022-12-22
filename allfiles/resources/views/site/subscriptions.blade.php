@extends('site.master')
@section('title', 'Subscription | ' . config('app.name'))
@section('styles')
    <style>
        .test .list {
            color: #000 !important
        }
    </style>
@stop
@section('content')
    @php
        $locale = App::getLocale();
    @endphp
    <!-- Inner Banner -->
    <div class="inner-banner bg-shape2 bg-color2">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="conatiner">
                    <div class="inner-title text-center">
                        <h3>{{ __('Subscriptions') }}</h3>
                        <ul>
                            <li>
                                <a href="{{ route('site.index') }}">{{ __('Home') }}</a>
                            </li>
                            <li>
                                <i class="fas fa-chevron-right"></i>
                            </li>
                            <li>
                                {{ __('Subscriptions') }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Inner Banner End -->

    <!-- Contact Form -->
    <div class="contact-form pb-70">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6 p-0">
                    <div class="contact-img">
                        <img src="{{ asset('siteassets/img/contact.avif') }}" alt="Contact Images">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-area">
                        <div class="form-section">
                            <h2>{{ __('Here You Can Subscribe Please Enter The Your Data') }}</h2>
                            @if (isset($course['name_' . $locale]))
                                <h5>{{ __('Name of The Course : ') }}{{ $course['name_' . $locale] }}</h5>
                            @endif
                            <form id="contactForm" method="POST" action="{{ route('subscriptions.store') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <input type="text" name="id_number" id="name"
                                                class="form-control @error('id_number') is-invalid @enderror" required
                                                data-error="{{ __('Please enter your Identity Number') }}"
                                                placeholder="{{ __('Your Identity Number') }}">
                                            @error('id_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <input type="text" name="name" id="name"
                                                class="form-control @error('name') is-invalid @enderror" required
                                                data-error="{{ __('Please enter your full name') }}"
                                                placeholder="{{ __('Your Full Name') }}">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <input type="date" name="birth_date" id="name"
                                                class="form-control @error('birth_date') is-invalid @enderror" required
                                                data-error="{{ __('Please enter your Birth Date') }}"
                                                placeholder="{{ __('Your Birth Date') }}">
                                            @error('birth_date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gender" id="male"
                                                    data-error="{{ __('Please enter Gender') }}" checked value="Male">
                                                <label class="form-check-label" for="male">
                                                    {{ __('Male') }}
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gender" id="female"
                                                    data-error="{{ __('Please enter Gender') }}" value="Female">
                                                <label class="form-check-label" for="female">
                                                    {{ __('Female') }}
                                                </label>
                                            </div>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <input type="text" name="blood_type" id="blood_type"
                                                class="form-control @error('blood_type') is-invalid @enderror" required
                                                data-error="{{ __('Please enter Blood Type') }}"
                                                placeholder="{{ __('Your Blood Type') }}">
                                            @error('blood_type')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <input type="text" name="location" id="name"
                                                class="form-control @error('location') is-invalid @enderror" required
                                                data-error="{{ __('Please enter your Location') }}"
                                                placeholder="{{ __('Your Location') }}">
                                            @error('location')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <input type="text" name="telephone" id="phone_number" required
                                                data-error="{{ __('Please enter your Telephone') }}"
                                                class="form-control @error('telephone') is-invalid @enderror"
                                                placeholder="{{ __('Your Telephone') }}">
                                            @error('telephone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <input type="text" name="phone_number" id="phone_number" required
                                                data-error="{{ __('Please enter your phone number') }}"
                                                class="form-control @error('phone_number') is-invalid @enderror"
                                                placeholder="{{ __('Your Phone Number') }}">
                                            @error('phone_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <input type="email" name="email" id="email"
                                                class="form-control @error('email') is-invalid @enderror" required
                                                data-error="{{ __('Please enter your email') }}"
                                                placeholder="{{ __('Your Email') }}">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <div class="input-group mb-3 test">
                                                <select name="course_id" {{ isset($course->id) ? 'disabled' : '' }}
                                                    class="form-control @error('course_id') is-invalid @enderror" required>
                                                    <option value="" selected disabled>{{ __('Choose The Course') }}
                                                    </option>
                                                    @foreach ($courses as $item)
                                                        <option style="color: #000 !important"
                                                            @if (isset($course->id)) {{ $course->id == $item->id ? 'selected' : '' }} @endif
                                                            value="{{ $item->id }}">
                                                            {{ $item['name_' . $locale] }}</option>
                                                    @endforeach
                                                </select>
                                                @error('course_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="training_days"
                                                    id="sat" data-error="{{ __('Please enter Training Days') }}"
                                                    checked value="0">
                                                <label class="form-check-label" for="sat">
                                                    {{ __('Saturday , Monday , Wednesday') }}
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="training_days"
                                                    id="sun" data-error="{{ __('Please enter Training Days') }}"
                                                    value="1">
                                                <label class="form-check-label" for="sun">
                                                    {{ __('Sunday , Tuesday , Thursday') }}
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="training_days"
                                                    id="all" data-error="{{ __('Please enter Training Days') }}"
                                                    value="2">
                                                <label class="form-check-label" for="all">
                                                    {{ __('All Days') }}
                                                </label>
                                            </div>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="mb-5 form-group">
                                        <p style="color: red">
                                            {{ __('Note : Fees are paid directly to the Administration and are Non-Refundable') }}
                                        </p>
                                        <br>
                                        <br>
                                        <input id="check" type="checkbox" class="form-check-input" required
                                            data-error="{{ __('Do you any illness ?') }}">
                                        {{ __('I declare that I do not have any heart or blood/arterial disease/pressure/Diabetes/asthma etc..etc and that I am in good health.') }}
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <button id="btn"
                                            onclick="if(document.getElementById('check').checked) { document.getElementById('blood_type').value = document.getElementById('blood_type').value.toUpperCase();submit() }else{alert('{{ __('Forget Somthing Empty ?') }}')}"
                                            class="default-btn1 btn-two">
                                            {{ __('Submit') }}
                                        </button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Contact Form End -->
@stop
@section('scripts')
    <script>
        function test() {
            console.log(document.getElementById('check').checked);
            document.getElementById('blood_type').value = document.getElementById('blood_type').value.toUpperCase();
            if (document.getElementById('check').checked) {
                document.getElementById('btn').submit();
            }
        }
    </script>
@stop
