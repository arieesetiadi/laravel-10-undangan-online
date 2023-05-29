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
                        {{ Breadcrumbs::render('cms.customer.action', 'Detail') }}
                    </h6>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form>
                            {{-- Info Username --}}
                            <div class="m-b-md">
                                <label for="username" class="form-label d-block">Username</label>
                                <input name="username" type="text" class="form-control" id="username"
                                    aria-describedby="username" placeholder="e.g. robert"
                                    value="{{ $customer->username }}" disabled aria-disabled="true">
                            </div>

                            {{-- Info Name --}}
                            <div class="m-b-md">
                                <label for="name" class="form-label d-block">Name</label>
                                <input name="name" type="text" class="form-control" id="name"
                                    aria-describedby="name" placeholder="e.g. Robert Emerson"
                                    value="{{ $customer->name }}" disabled aria-disabled="true">
                            </div>

                            {{-- Info Email --}}
                            <div class="m-b-md">
                                <label for="email" class="form-label d-block">Email</label>
                                <input name="email" type="email" class="form-control" id="email"
                                    aria-describedby="email" placeholder="e.g. email@example.com"
                                    value="{{ $customer->email }}" disabled aria-disabled="true">
                            </div>

                            {{-- Info CreatedAt --}}
                            <div class="m-b-md">
                                <label for="created-at" class="form-label d-block">Created At</label>
                                <input name="created_at" type="text" class="form-control" id="created-at"
                                    aria-describedby="created_at" value="{{ human_datetime($customer->created_at) }}"
                                    disabled aria-disabled="true">
                            </div>

                            {{-- Info UpdatedAt --}}
                            <div class="m-b-md">
                                <label for="updated-at" class="form-label d-block">Updated At</label>
                                <input name="updated_at" type="text" class="form-control" id="updated-at"
                                    aria-describedby="updated_at" value="{{ human_datetime($customer->updated_at) }}"
                                    disabled aria-disabled="true">
                            </div>

                            <div class="mt-4 d-flex gap-2">
                                <a href="{{ route('cms.customer.index') }}" type="submit" class="btn btn-light">
                                    <i class="fa-solid fa-arrow-left"></i>
                                    {{ __('general.actions.back') }}
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
