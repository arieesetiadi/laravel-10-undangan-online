{{-- Master Template --}}
@extends('cms.layouts.master')

{{-- Content --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="page-description">
                    <h1>{{ $title }}</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card widget widget-stats">
                    <div class="card-body row">
                        <div class="col-12 col-md-7 col-lg-7">
                            <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link {{ !$errors->any() ? 'active' : '' }}" id="pills-view-mode" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                        aria-selected="true">View Mode</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link {{ $errors->any() ? 'active' : '' }}" id="pills-edit-mode" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                                        aria-selected="false">Edit Mode</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                {{-- View Mode --}}
                                <div class="tab-pane fade {{ !$errors->any() ? 'show active' : '' }}" id="pills-home" role="tabpanel" aria-labelledby="pills-view-mode">
                                    <form>
                                        <div class="auth-credentials m-b-xxl">
                                            <div class="m-b-md">
                                                <label for="username" class="form-label d-block">Username</label>
                                                <input name="username" type="text" class="form-control" id="username" aria-describedby="username" value="{{ administrator()->username }}" disabled aria-disabled="true">
                                            </div>

                                            <div class="m-b-md">
                                                <label for="name" class="form-label d-block">Name</label>
                                                <input name="name" type="text" class="form-control" id="name" aria-describedby="name" value="{{ administrator()->name }}" disabled aria-disabled="true">
                                            </div>

                                            <div class="m-b-md">
                                                <label for="email" class="form-label d-block">Email</label>
                                                <input name="email" type="email" class="form-control" id="email" aria-describedby="email" value="{{ administrator()->email }}" disabled aria-disabled="true">
                                            </div>

                                            <div class="m-b-md">
                                                <label for="created_at" class="form-label d-block">Created At</label>
                                                <input name="created_at" type="text" class="form-control" id="created_at" aria-describedby="created_at" value="{{ human_datetime(administrator()->created_at) }}" disabled aria-disabled="true">
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                {{-- Edit Mode --}}
                                <div class="tab-pane fade {{ $errors->any() ? 'show active' : '' }}" id="pills-profile" role="tabpanel" aria-labelledby="pills-edit-mode">
                                    <form id="profile-edit" action="{{ route('cms.profile.update') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="auth-credentials m-b-xxl">
                                            <div class="m-b-md">
                                                <label for="username" class="form-label d-block">Username</label>
                                                <input name="username" type="text" class="form-control" id="username" aria-describedby="username" placeholder="e.g. robert" value="{{ old('username', administrator()->username) }}">
                                                @error('username')
                                                    <label for="username" class="mt-2 text-danger">
                                                        {{ $message }}
                                                    </label>
                                                @enderror
                                            </div>

                                            <div class="m-b-md">
                                                <label for="name" class="form-label d-block">Name</label>
                                                <input name="name" type="text" class="form-control" id="name" aria-describedby="name" placeholder="e.g. Robert" value="{{ old('name', administrator()->name) }}">
                                                @error('name')
                                                    <label for="name" class="mt-2 text-danger">
                                                        {{ $message }}
                                                    </label>
                                                @enderror
                                            </div>

                                            <div class="m-b-md">
                                                <label for="email" class="form-label d-block">Email</label>
                                                <input name="email" type="email" class="form-control" id="email" aria-describedby="email" placeholder="e.g. Robert" value="{{ old('email', administrator()->email) }}">
                                                @error('email')
                                                    <label for="email" class="mt-2 text-danger">
                                                        {{ $message }}
                                                    </label>
                                                @enderror
                                            </div>

                                            <div class="m-b-md">
                                                <label for="profile-image" class="form-label d-block">Profile Image</label>
                                                <input name="avatar" type="file" class="form-control" id="profile-image" aria-describedby="Profile image" onchange="previewImage(event, 'avatar-preview')">
                                                @error('avatar')
                                                    <label for="avatar" class="mt-2 text-danger">
                                                        {{ $message }}
                                                    </label>
                                                @enderror
                                            </div>

                                            <div class="m-b-md">
                                                <label for="password" class="form-label d-block">Password (Optional)</label>
                                                <input name="password" type="password" class="form-control" id="password" aria-describedby="password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
                                                @error('password')
                                                    <label for="password" class="mt-2 text-danger">
                                                        {{ $message }}
                                                    </label>
                                                @enderror
                                            </div>

                                            <div class="m-b-md">
                                                <label for="password_confirmation" class="form-label d-block">Password Confirmation</label>
                                                <input name="password_confirmation" type="password" class="form-control" id="password_confirmation" aria-describedby="password_confirmation"
                                                    placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
                                                @error('password_confirmation')
                                                    <label for="password_confirmation" class="mt-2 text-danger">
                                                        {{ $message }}
                                                    </label>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="auth-submit">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                            <span class="auth-forgot-password float-end">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-7 col-lg-5">
                            <div class="d-flex justify-content-center pt-5">
                                <img id="avatar-preview" width="200px" src="{{ administrator()->avatar_path }}" alt="Administrator profile image" class="rounded-circle cursor-pointer" data-bs-toggle="modal"
                                    data-bs-target="#modal-image-preview" onclick="previewImageModal(event)">
                            </div>
                        </div>
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
        $('form#profile-edit').validate({
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
                    required: messageRequired('username'),
                },
                name: {
                    required: messageRequired('name'),
                },
                email: {
                    required: messageRequired('email address'),
                    email: messageEmail(),
                },
                avatar: {
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
