@extends('dashboard.index')
@section('title', 'Settings | ' . config('app.name'))
@section('styles')
    <style>
        .setting {
            padding: 30px;
            box-shadow: 0px 0px 20px 20px #ddd;
            border-radius: 20px;
        }

        textarea {
            resize: none;
        }
    </style>
@stop
@section('content')
    <div class="bg-white mb-5 container setting">
        <form action="{{ route('dashboard.settings.store') }}" method="POST">
            @csrf
            <h3 class="mb-4">{{ __('Contact') }}</h3>
            <input type="hidden" value="contact" name="key">
            <div class="mb-3">
                <label>{{ __('Facebook Link') }}</label>
                <input type="text" class="form-control" placeholder="{{ __('Facebook Link') }}"
                    value="{{ isset($data['contact']['value']['facebook']) ? $data['contact']['value']['facebook'] : '' }}"
                    name="value[facebook]">
            </div>
            <div class="mb-3">
                <label>{{ __('TikTok Link') }}</label>
                <input type="text" class="form-control" placeholder="{{ __('TikTok Link') }}"
                    value="{{ isset($data['contact']['value']['tiktok']) ? $data['contact']['value']['tiktok'] : '' }}"
                    name="value[tiktok]">
            </div>
            <div class="mb-3">
                <label>{{ __('Instagram Link') }}</label>
                <input type="text" class="form-control" placeholder="{{ __('Instagram Link') }}"
                    value="{{ isset($data['contact']['value']['instagram']) ? $data['contact']['value']['instagram'] : '' }}"
                    name="value[instagram]">
            </div>
            <div class="mb-3">
                <label>{{ __('Email') }}</label>
                <input type="text" class="form-control" placeholder="{{ __('Email') }}"
                    value="{{ isset($data['contact']['value']['email']) ? $data['contact']['value']['email'] : '' }}"
                    name="value[email]">
            </div>
            <div class="mb-3">
                <label>{{ __('Number') }}</label>
                <input type="text" class="form-control" placeholder="{{ __('Number') }}"
                    value="{{ isset($data['contact']['value']['number']) ? $data['contact']['value']['number'] : '' }}"
                    name="value[number]">
            </div>
            <div class="mb-3">
                <label>{{ __('WhatsApp') }}</label>
                <input type="text" class="form-control" placeholder="{{ __('WhatsApp') }}"
                    value="{{ isset($data['contact']['value']['whatsapp']) ? $data['contact']['value']['whatsapp'] : '' }}"
                    name="value[whatsapp]">
            </div>

            <div class="mb-3">
                <label>{{ __('Arabic Location') }}</label>
                <input type="text" class="form-control" placeholder="{{ __('Arabic Location') }}"
                    value="{{ isset($data['contact']['value']['location']['ar']) ? $data['contact']['value']['location']['ar'] : '' }}"
                    name="value[location][ar]">
            </div>

            <div class="mb-3">
                <label>{{ __('English Location') }}</label>
                <input type="text" class="form-control" placeholder="{{ __('English Location') }}"
                    value="{{ isset($data['contact']['value']['location']['en']) ? $data['contact']['value']['location']['en'] : '' }}"
                    name="value[location][en]">
            </div>

            <div class="mb-3">
                <label>{{ __('Work Time') }}</label>
                <input type="text" class="form-control" placeholder="{{ __('Work Time') }}"
                    value="{{ isset($data['contact']['value']['work_time']) ? $data['contact']['value']['work_time'] : '' }}"
                    name="value[work_time]">
            </div>
            <div class="mb-3">
                <label>{{ __('Youtube Link') }}</label>
                <input type="text" class="form-control" placeholder="{{ __('Youtube Link') }}"
                    value="{{ isset($data['contact']['value']['youtube']) ? $data['contact']['value']['youtube'] : '' }}"
                    name="value[youtube]">
            </div>
            <button class="btn btn-success">{{ __('Save') }}</button>

        </form>
    </div>
    <div class="container mb-5 setting bg-white">
        <h3 class="mb-3">{{ __('About Us') }}</h3>
        <form action="{{ route('dashboard.settings.store') }}" method="POST">
            @csrf
            <input type="hidden" value="about" name="key">
            <div class="mb-3">
                <div class="mb-3">
                    <label>{{ __('Arabic Summary') }}</label>
                    <input type="text" class="form-control tinytext" name="value[ar][summary]"
                        placeholder="{{ __('Arabic Summary') }}"
                        value="{{ isset($data['about']['value']['ar']['summary']) ? $data['about']['value']['ar']['summary'] : '' }}">
                </div>
                <div class="mb-3">
                    <label>{{ __('English Summary') }}</label>
                    <input type="text" class="form-control tinytext" name="value[en][summary]"
                        placeholder="{{ __('English Summary') }}"
                        value="{{ isset($data['about']['value']['en']['summary']) ? $data['about']['value']['en']['summary'] : '' }}">
                </div>
                <div class="mb-3">
                    <label>{{ __('Arabic Content') }}</label>
                    <textarea name="value[ar][content]" class="form-control tinytext" placeholder="{{ __('Arabic Content') }}"
                        cols="30" rows="10">{{ isset($data['about']['value']['ar']['content']) ? $data['about']['value']['ar']['content'] : '' }}</textarea>
                </div>
                <div class="mb-3">
                    <label>{{ __('English Content') }}</label>
                    <textarea name="value[en][content]" class="form-control tinytext" placeholder="{{ __('English Content') }}"
                        cols="30" rows="10">{{ isset($data['about']['value']['en']['content']) ? $data['about']['value']['en']['content'] : '' }}</textarea>
                </div>
            </div>
            <button class="btn btn-success">{{ __('Save') }}</button>
        </form>
    </div>
@stop
