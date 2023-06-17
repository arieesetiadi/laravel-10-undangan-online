{{-- Master Template --}}
@extends('cms.layouts.master')

{{-- Sidebar Configuration --}}
@php
    $sidebar['customers'] = 'active-page';
@endphp

{{-- Content --}}
@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col">
                <div class="page-description">
                    <h1>{{ $edit ? __('general.actions.edit') : __('general.actions.add') }} {{ $titles['singular'] }}</h1>
                    <h6 class="mt-2">
                        {{ Breadcrumbs::render('cms.customers.action', $edit ? __('general.actions.edit') : __('general.actions.add')) }}
                    </h6>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form id="customer-{{ $edit ? 'edit' : 'create' }}" action="{{ $edit ? route('cms.customers.update', $customer->id) : route('cms.customers.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method($edit ? 'PUT' : 'POST')

                            {{-- Input Username --}}
                            <div class="mb-4">
                                <label class="form-label d-block" id="label-username" for="username">
                                    {{ __('general.words.attributes.username') }}<span class="text-danger">*</span>
                                </label>
                                <input class="form-control" id="username" name="username" type="text" value="{{ old('username', $customer->username ?? null) }}" aria-describedby="label-username" placeholder="e.g. robert">
                                @error('username')
                                    <label class="text-danger mt-2" for="username">
                                        {{ $message }}
                                    </label>
                                @enderror
                            </div>

                            {{-- Input Name --}}
                            <div class="mb-4">
                                <label class="form-label d-block" id="label-name" for="name">
                                    {{ __('general.words.attributes.name') }}<span class="text-danger">*</span>
                                </label>
                                <input class="form-control" id="name" name="name" type="text" value="{{ old('name', $customer->name ?? null) }}" aria-describedby="label-name" placeholder="e.g. Robert Emerson">
                                @error('name')
                                    <label class="text-danger mt-2" for="name">
                                        {{ $message }}
                                    </label>
                                @enderror
                            </div>

                            {{-- Input Email --}}
                            <div class="mb-4">
                                <label class="form-label d-block" id="label-email" for="email">
                                    {{ __('general.words.attributes.email') }}<span class="text-danger">*</span>
                                </label>
                                <input class="form-control" id="email" name="email" type="email" value="{{ old('email', $customer->email ?? null) }}" aria-describedby="label-email" placeholder="e.g. robert@example.com">
                                @error('email')
                                    <label class="text-danger mt-2" for="email">
                                        {{ $message }}
                                    </label>
                                @enderror
                            </div>

                            {{-- Input Phone --}}
                            <div class="mb-4">
                                <label class="form-label d-block" id="label-phone" for="phone">
                                    {{ __('general.words.attributes.phone') }}
                                </label>
                                <input class="form-control input-number" id="phone" name="phone" type="text" value="{{ old('phone', $customer->phone ?? null) }}" aria-describedby="label-phone" placeholder="e.g. 0821xxxxxxxx">
                                @error('phone')
                                    <label class="text-danger mt-2" for="phone">
                                        {{ $message }}
                                    </label>
                                @enderror
                            </div>

                            {{-- Input Password --}}
                            <div class="mb-4">
                                <div class="d-flex">
                                    <label class="form-label d-block" id="label-password" for="password">
                                        {{ __('general.words.attributes.password') }}<span class="text-danger">*</span>
                                    </label>
                                    <div class="d-inline-block form-check form-switch px-5">
                                        <input class="form-check-input" id="toggle-password" name="toggle-password" type="checkbox" tabindex="-1" onchange="togglePassword(event, 'password')">
                                    </div>
                                </div>
                                <input class="form-control" id="password" name="password" type="password" aria-describedby="label-password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
                                @error('password')
                                    <label class="text-danger mt-2" for="password">
                                        {{ $message }}
                                    </label>
                                @enderror
                            </div>

                            <div class="d-flex mt-4 gap-2">
                                <a class="btn btn-light" type="submit" href="{{ route('cms.customers.index') }}">
                                    {{ __('general.actions.back') }}
                                </a>
                                <button class="btn btn-primary" type="submit">
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
                password: {
                    required: true,
                    minlength: 4,
                }
            },
            messages: {
                username: {
                    required: validatorRequiredMessage(`{{ __('validation.attributes.username') }}`),
                },
                name: {
                    required: validatorRequiredMessage(`{{ __('validation.attributes.name') }}`),
                },
                email: {
                    required: validatorRequiredMessage(`{{ __('validation.attributes.email') }}`),
                    email: validatorEmailMessage(`{{ __('validation.attributes.email') }}`),
                },
                password: {
                    required: validatorRequiredMessage(`{{ __('validation.attributes.password') }}`),
                    minlength: validatorMinMessage(`{{ __('validation.attributes.password') }}`, 4, 'string'),
                }
            },
            errorPlacement: function(label, element) {
                label.addClass(errorClasses());
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
                password: {
                    minlength: 4,
                }
            },
            messages: {
                username: {
                    required: validatorRequiredMessage(`{{ __('validation.attributes.username') }}`),
                },
                name: {
                    required: validatorRequiredMessage(`{{ __('validation.attributes.name') }}`),
                },
                email: {
                    required: validatorRequiredMessage(`{{ __('validation.attributes.email') }}`),
                    email: validatorEmailMessage(`{{ __('validation.attributes.email') }}`),
                },
                password: {
                    minlength: validatorMinMessage(`{{ __('validation.attributes.password') }}`, 4, 'string'),
                }
            },
            errorPlacement: function(label, element) {
                label.addClass(errorClasses());
                element.parent().append(label);
            },
        });
    </script>
@endPushOnce