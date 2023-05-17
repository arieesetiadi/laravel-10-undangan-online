{{-- Master Template --}}
@extends('cms.layouts.master')

{{-- Content --}}
@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col">
                <div class="page-description">
                    <h1>{{ $title }}</h1>
                    <h6 class="mt-2">
                        {{ Breadcrumbs::render('cms.administrator.action', $onEdit ? __('general.action.edit') : __('general.action.add')) }}
                    </h6>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title">
                            {{ $onEdit ? __('general.action.edit') : __('general.action.add') }}
                            {{ $title }}
                        </h6>
                    </div>
                    <div class="card-body">
                        <form id="administrator-{{ $onEdit ? 'edit' : 'create' }}"
                            action="{{ $onEdit ? route('cms.administrator.update', $administrator->id) : route('cms.administrator.store') }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @method($onEdit ? 'PUT' : '')

                            <img id="profile-image-preview" width="100px"
                                src="{{ $administrator->avatar_path ?? asset('assets/cms/uploads/images/profiles/default.png') }}"
                                alt="{{ $administrator->name ?? 'Administrator' }} profile image"
                                class="rounded-circle m-b-md cursor-pointer" data-bs-toggle="modal"
                                data-bs-target="#modal-image-preview" onclick="previewImageModal(event)">

                            <div class="m-b-md">
                                <label for="profile-image" class="form-label d-block">Profile Image</label>
                                <input name="avatar" type="file" class="form-control" id="profile-image"
                                    aria-describedby="Profile image"
                                    onchange="previewImage(event, 'profile-image-preview')">
                                @error('avatar')
                                    <label for="avatar" class="mt-2 text-danger">
                                        {{ $message }}
                                    </label>
                                @enderror
                            </div>

                            <div class="m-b-md">
                                <label for="username" class="form-label d-block">Username</label>
                                <input name="username" type="text" class="form-control" id="username"
                                    aria-describedby="username" placeholder="e.g. robert"
                                    value="{{ old('username', $administrator->username ?? null) }}">
                                @error('username')
                                    <label for="username" class="mt-2 text-danger">
                                        {{ $message }}
                                    </label>
                                @enderror
                            </div>

                            <div class="m-b-md">
                                <label for="name" class="form-label d-block">Name</label>
                                <input name="name" type="text" class="form-control" id="name"
                                    aria-describedby="name" placeholder="e.g. Robert Emerson"
                                    value="{{ old('name', $administrator->name ?? null) }}">
                                @error('name')
                                    <label for="name" class="mt-2 text-danger">
                                        {{ $message }}
                                    </label>
                                @enderror
                            </div>

                            <div class="m-b-md">
                                <label for="email" class="form-label d-block">Email</label>
                                <input name="email" type="email" class="form-control" id="email"
                                    aria-describedby="email" placeholder="e.g. email@example.com"
                                    value="{{ old('email', $administrator->email ?? null) }}">
                                @error('email')
                                    <label for="email" class="mt-2 text-danger">
                                        {{ $message }}
                                    </label>
                                @enderror
                            </div>

                            <div class="m-b-md">
                                <label for="password" class="form-label d-block">Password</label>
                                <input name="password" type="password" class="form-control" id="password"
                                    aria-describedby="password"
                                    placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
                                @error('password')
                                    <label for="password" class="mt-2 text-danger">
                                        {{ $message }}
                                    </label>
                                @enderror
                            </div>

                            <div class="m-b-md">
                                <button type="submit" class="btn btn-primary">
                                    <i class="material-icons-outlined">
                                        check_circle
                                    </i>
                                    {{ $onEdit ? __('general.action.update') : __('general.action.submit') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
