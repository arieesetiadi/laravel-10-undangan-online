{{-- Master Template --}}
@extends('cms.layouts.master')

{{-- Sidebar Configuration --}}
@php
    $sidebar['customer'] = 'active-page';
@endphp

{{-- Content --}}
@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col">
                <div class="page-description">
                    <h1>{{ $title }}</h1>
                    <h6 class="mt-2">
                        {{ Breadcrumbs::render('cms.customer.action', $edit ? __('general.actions.edit') : __('general.actions.add')) }}
                    </h6>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form id="customer-{{ $edit ? 'edit' : 'create' }}"
                            action="{{ $edit ? route('cms.customer.update', $customer->id) : route('cms.customer.store') }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @method($edit ? 'PUT' : 'POST')

                            {{-- Input Username --}}
                            <div class="mb-4">
                                <label for="username" class="form-label d-block">Username<span
                                        class="text-danger">*</span></label>
                                <input name="username" type="text" class="form-control" id="username"
                                    aria-describedby="username" placeholder="e.g. robert"
                                    value="{{ old('username', $customer->username ?? null) }}">
                                @error('username')
                                    <label for="username" class="mt-2 text-danger">
                                        {{ $message }}
                                    </label>
                                @enderror
                            </div>

                            {{-- Input Name --}}
                            <div class="mb-4">
                                <label for="name" class="form-label d-block">Name<span
                                        class="text-danger">*</span></label>
                                <input name="name" type="text" class="form-control" id="name"
                                    aria-describedby="name" placeholder="e.g. Robert Emerson"
                                    value="{{ old('name', $customer->name ?? null) }}">
                                @error('name')
                                    <label for="name" class="mt-2 text-danger">
                                        {{ $message }}
                                    </label>
                                @enderror
                            </div>

                            {{-- Input Email --}}
                            <div class="mb-4">
                                <label for="email" class="form-label d-block">Email<span
                                        class="text-danger">*</span></label>
                                <input name="email" type="email" class="form-control" id="email"
                                    aria-describedby="email" placeholder="e.g. email@example.com"
                                    value="{{ old('email', $customer->email ?? null) }}">
                                @error('email')
                                    <label for="email" class="mt-2 text-danger">
                                        {{ $message }}
                                    </label>
                                @enderror
                            </div>

                            {{-- Input Password --}}
                            <div class="mb-4">
                                <div class="d-flex">
                                    <label for="password" class="form-label d-block">Password<span
                                            class="text-danger">*</span></label>
                                    <div class="d-inline-block px-5 form-check form-switch">
                                        <input name="toggle-password" class="form-check-input" type="checkbox"
                                            tabindex="-1" id="toggle-password"
                                            onchange="togglePassword(event, 'password')">
                                    </div>
                                </div>
                                <input name="password" type="password" class="form-control" id="password"
                                    aria-describedby="password"
                                    placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
                                @error('password')
                                    <label for="password" class="mt-2 text-danger">
                                        {{ $message }}
                                    </label>
                                @enderror
                            </div>

                            <div class="mt-4 d-flex gap-2">
                                <a href="{{ route('cms.customer.index') }}" type="submit" class="btn btn-light">
                                    <i class="fa-solid fa-arrow-left"></i>
                                    {{ __('general.actions.back') }}
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa-solid fa-circle-check"></i>
                                    {{ $edit ? __('general.actions.update') : __('general.actions.submit') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- Custom Scripts --}}
@pushOnce('after-scripts')
    {{-- Form Validation --}}
    <script>
        $('form#customer-create').validate({
            rules: {
                username: {
                    required: true,
                },
                name: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true,
                },
                'profile-image': {
                    extension: "png|jpe?g",
                    filesize: 1048576 // Max 1MB (1024 * 1024)
                },
                password: {
                    required: true,
                    minlength: 4,
                }
            },
            messages: {
                username: {
                    required: messageRequired('username'),
                },
                name: {
                    required: messageRequired('name'),
                },
                email: {
                    required: messageRequired('email address'),
                    email: messageEmail(),
                },
                'profile-image': {
                    extension: messageExtension('profile image', 'PNG or JPG'),
                    filesize: messageFileSize('profile image', '1MB'),
                },
                password: {
                    required: messageRequired('password'),
                    minlength: messageMinLength('password', 4),
                }
            },
            errorPlacement: function(label, element) {
                label.addClass(errorMessageClasses());
                element.parent().append(label);
            },
        });

        $('form#customer-edit').validate({
            rules: {
                username: {
                    required: true,
                },
                name: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true,
                },
                'profile-image': {
                    extension: "png|jpe?g",
                    filesize: 1048576 // Max 1MB (1024 * 1024)
                },
                password: {
                    minlength: 4,
                }
            },
            messages: {
                username: {
                    required: messageRequired('username'),
                },
                name: {
                    required: messageRequired('name'),
                },
                email: {
                    required: messageRequired('email address'),
                    email: messageEmail(),
                },
                'profile-image': {
                    extension: messageExtension('profile image', 'PNG or JPG'),
                    filesize: messageFileSize('profile image', '1MB'),
                },
                password: {
                    minlength: messageMinLength('password', 4),
                }
            },
            errorPlacement: function(label, element) {
                label.addClass(errorMessageClasses());
                element.parent().append(label);
            },
        });
    </script>
@endPushOnce
