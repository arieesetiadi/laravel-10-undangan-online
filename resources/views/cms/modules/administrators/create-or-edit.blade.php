{{-- Master Template --}}
@extends('cms.layouts.master')

{{-- Sidebar Configuration --}}
@php
    $sidebar['administrators'] = 'active-page';
@endphp

{{-- Content --}}
@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col">
                <div class="page-description">
                    <h1>{{ $edit ? __('general.actions.edit') : __('general.actions.add') }} {{ $titles['singular'] }}</h1>
                    <h6 class="mt-2">
                        {{ Breadcrumbs::render('cms.administrators.action', $edit ? __('general.actions.edit') : __('general.actions.add')) }}
                    </h6>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form id="administrator-{{ $edit ? 'edit' : 'create' }}" action="{{ $edit ? route('cms.administrators.update', $administrator->id) : route('cms.administrators.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method($edit ? 'PUT' : 'POST')

                            {{-- Preview Avatar --}}
                            <img class="rounded-circle mb-4 cursor-pointer" id="avatar-preview" data-bs-toggle="modal" data-bs-target="#modal-image-preview" src="{{ $administrator->avatar_path }}"
                                alt="{{ $administrator->name ?? $titles['singular'] }} avatar" width="100px" onclick="previewImageModal(event)">

                            {{-- Input Avatar --}}
                            <div class="mb-4">
                                <label class="form-label d-block" for="avatar">{{ __('validation.attributes.avatar') }}</label>
                                <input class="form-control" id="avatar" name="avatar" type="file" aria-describedby="Avatar image" onchange="previewImage(event, 'avatar-preview')">
                                @error('avatar')
                                    <label class="text-danger mt-2" for="avatar">
                                        {{ $message }}
                                    </label>
                                @enderror
                            </div>

                            {{-- Input Username --}}
                            <div class="mb-4">
                                <label class="form-label d-block" for="username">{{ __('general.words.attributes.username') }}<span class="text-danger">*</span></label>
                                <input class="form-control" id="username" name="username" type="text" value="{{ old('username', $administrator->username ?? null) }}" aria-describedby="username" placeholder="e.g. robert">
                                @error('username')
                                    <label class="text-danger mt-2" for="username">
                                        {{ $message }}
                                    </label>
                                @enderror
                            </div>

                            {{-- Input Name --}}
                            <div class="mb-4">
                                <label class="form-label d-block" for="name">{{ __('general.words.attributes.name') }}<span class="text-danger">*</span></label>
                                <input class="form-control" id="name" name="name" type="text" value="{{ old('name', $administrator->name ?? null) }}" aria-describedby="name" placeholder="e.g. Robert Emerson">
                                @error('name')
                                    <label class="text-danger mt-2" for="name">
                                        {{ $message }}
                                    </label>
                                @enderror
                            </div>

                            {{-- Input Email --}}
                            <div class="mb-4">
                                <label class="form-label d-block" for="email">{{ __('general.words.attributes.email') }}<span class="text-danger">*</span></label>
                                <input class="form-control" id="email" name="email" type="email" value="{{ old('email', $administrator->email ?? null) }}" aria-describedby="email" placeholder="e.g. email@example.com">
                                @error('email')
                                    <label class="text-danger mt-2" for="email">
                                        {{ $message }}
                                    </label>
                                @enderror
                            </div>

                            {{-- Input Password --}}
                            <div class="mb-4">
                                <div class="d-flex">
                                    <label class="form-label d-block" for="password">{{ __('general.words.attributes.password') }}<span class="text-danger">*</span></label>
                                    <div class="d-inline-block form-check form-switch px-5">
                                        <input class="form-check-input" id="toggle-password" name="toggle-password" type="checkbox" tabindex="-1" onchange="togglePassword(event, 'password')">
                                    </div>
                                </div>
                                <input class="form-control" id="password" name="password" type="password" aria-describedby="password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
                                @error('password')
                                    <label class="text-danger mt-2" for="password">
                                        {{ $message }}
                                    </label>
                                @enderror
                            </div>

                            <div class="d-flex mt-4 gap-2">
                                <a class="btn btn-light" type="submit" href="{{ route('cms.administrators.index') }}">
                                    <i class="fa-solid fa-arrow-left"></i>
                                    {{ __('general.actions.back') }}
                                </a>
                                <button class="btn btn-primary" type="submit">
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
        $('form#administrator-create').validate({
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
                avatar: {
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
                    required: `{{ __('validation.required', ['attribute' => __('validation.attributes.username')]) }}`,
                },
                name: {
                    required: `{{ __('validation.required', ['attribute' => __('validation.attributes.name')]) }}`,
                },
                email: {
                    required: `{{ __('validation.required', ['attribute' => __('validation.attributes.email')]) }}`,
                    email: `{{ __('validation.email', ['attribute' => __('validation.attributes.email')]) }}`,
                },
                avatar: {
                    extension: `{{ __('validation.mimes', ['attribute' => __('validation.attributes.avatar'), 'values' => 'png, jpg, jpeg']) }}`,
                    filesize: `{{ __('validation.max.file', ['attribute' => __('validation.attributes.avatar'), 'max' => 1024]) }}`,
                },
                password: {
                    required: `{{ __('validation.required', ['attribute' => __('validation.attributes.password')]) }}`,
                    minlength: `{{ __('validation.min.string', ['attribute' => __('validation.attributes.avatar'), 'min' => 4]) }}`,
                }
            },
            errorPlacement: function(label, element) {
                label.addClass(errorMessageClasses());
                element.parent().append(label);
            },
        });

        $('form#administrator-edit').validate({
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
                avatar: {
                    extension: "png|jpe?g",
                    filesize: 1048576 // Max 1MB (1024 * 1024)
                },
                password: {
                    minlength: 4,
                }
            },
            messages: {
                username: {
                    required: `{{ __('validation.required', ['attribute' => __('validation.attributes.username')]) }}`,
                },
                name: {
                    required: `{{ __('validation.required', ['attribute' => __('validation.attributes.name')]) }}`,
                },
                email: {
                    required: `{{ __('validation.required', ['attribute' => __('validation.attributes.email')]) }}`,
                    email: `{{ __('validation.email', ['attribute' => __('validation.attributes.email')]) }}`,
                },
                avatar: {
                    extension: extension: `{{ __('validation.mimes', ['attribute' => __('validation.attributes.avatar'), 'values' => 'png, jpg, jpeg']) }}`,
                    filesize: filesize: `{{ __('validation.max.file', ['attribute' => __('validation.attributes.avatar'), 'max' => 1024]) }}`,
                },
                password: {
                    minlength: minlength: `{{ __('validation.min.string', ['attribute' => __('validation.attributes.avatar'), 'min' => 4]) }}`,
                }
            },
            errorPlacement: function(label, element) {
                label.addClass(errorMessageClasses());
                element.parent().append(label);
            },
        });
    </script>
@endPushOnce
