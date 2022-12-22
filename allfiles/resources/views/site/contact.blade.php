@extends('site.master')
@section('title', 'Contact | ' . config('app.name'))
@section('content')

    <!-- Inner Banner -->
    <div class="inner-banner bg-shape2 bg-color2">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="conatiner">
                    <div class="inner-title text-center">
                        <h3>{{ __('Contact Us') }}</h3>
                        <ul>
                            <li>
                                <a href="{{ route('site.index') }}">{{ __('Home') }}</a>
                            </li>
                            <li>
                                <i class="fas fa-chevron-right"></i>
                            </li>
                            <li>
                                {{ __('Contact Us') }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Inner Banner End -->

    <!-- Contact Area -->
    <div class="contact-area pt-100 pb-70">
        <div class="container">
            <div class="contact-title text-center mb-50">
                {{-- <h2>
                    {{ __('Our Dolphin CLub is Available From') }}
                    {{ isset($data['contact']['value']['work_time']) ? $data['contact']['value']['work_time'] : '' }}
                    {{ __('and Contact is Available 24/7') }}
                </h2> --}}
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="contact-item">
                        <div class="icon-contact text-center"><i class="far fa-clock"></i></div>
                        <h3>{{ isset($data['contact']['value']['work_time']) ? $data['contact']['value']['work_time'] : '' }}
                        </h3>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="contact-item">
                        <div class="icon-contact text-center"><i class="fas fa-map-marker-alt"></i></div>
                        <h3>{{ isset($data['contact']['value']['location']) ? $data['contact']['value']['location'] : '' }}
                        </h3>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0">
                    <div class="contact-item text-center">
                        <div class="icon-contact"><i class="flaticon-telephone"></i></div>
                        <h3>
                            <a
                                href="{{ isset($data['contact']['value']['number']) ? $data['contact']['value']['number'] : '' }}">
                                {{ isset($data['contact']['value']['number']) ? $data['contact']['value']['number'] : '' }}
                            </a>
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Area End -->

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
                            <h2>{{ __('What Do You Want to Know?') }}</h2>
                            <form id="contactForm" method="POST" action="{{ route('dashboard.contacts.store') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <input type="text" name="name" id="name"
                                                class="form-control @error('name') is-invalid @enderror" required
                                                data-error="{{ __('Please enter your name') }}"
                                                placeholder="{{ __('Your Name') }}">
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
                                            <input type="text" name="number" id="phone_number" required
                                                data-error="{{ __('Please enter your phone number') }}"
                                                class="form-control @error('number') is-invalid @enderror"
                                                placeholder="{{ __('Your Phone Number') }}">
                                            @error('number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <input type="text" name="subject" id="msg_subject"
                                                class="form-control @error('subject') is-invalid @enderror" required
                                                data-error="{{ __('Please enter your subject') }}"
                                                placeholder="{{ __('Subject') }}">
                                            @error('subject')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <textarea name="message" class="form-message textarea-hight @error('message') is-invalid @enderror" id="message"
                                                cols="30" rows="5" required data-error="{{ __('Write your message') }}"
                                                placeholder="{{ __('Your Message') }}"></textarea>
                                            @error('message')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <button onclick="submit()" class="default-btn1 btn-two">
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
