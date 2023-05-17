{{-- Master Template --}}
@extends('cms.layouts.master')

{{-- Content --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="page-description d-flex align-items-center">
                    <div class="page-description-content flex-grow-1">
                        <h1>{{ $title }}</h1>
                        <h6 class="mt-2 text-dark">{{ Breadcrumbs::render('cms.administrator.index') }}</h6>
                    </div>
                    <div class="page-description-actions">
                        <a href="{{ route('cms.administrator.create') }}" class="btn btn-primary">
                            <i class="material-icons-outlined">add_circle_outline</i>
                            {{ __('general.action.add') . ' ' . $title }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title">{{ __('general.action.list') . ' ' . $title }}</h6>
                    </div>
                    <div class="card-body">
                        <table class="datatable w-100 nowrap">
                            <thead>
                                <tr>
                                    <th>Action</th>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Last Updated</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($administrators as $i => $administrator)
                                    <tr>
                                        <td>
                                            <div class="dropdend">
                                                <button type="button" class="btn btn-sm px-1" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="material-icons-outlined text-grey mx-0">
                                                        settings
                                                    </i>
                                                </button>
                                                <ul class="dropdown-menu border">
                                                    <li>
                                                        <a class="dropdown-item btn btn-sm" href="{{ route('cms.administrator.edit', $administrator->id) }}">
                                                            Edit</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item btn btn-sm" href="{{ route('cms.administrator.show', $administrator->id) }}">Detail</a>
                                                    </li>
                                                    <li>
                                                        <form action="{{ route('cms.administrator.toggle-status', $administrator->id) }}" method="POST">
                                                            @csrf
                                                            <button type="button" class="dropdown-item btn btn-sm {{ $administrator->status ? 'btn-danger' : 'btn-success' }}" onclick="swalConfirm(event)">
                                                                {{ $administrator->status ? 'Inactivate' : 'Activate' }}
                                                            </button>
                                                        </form>
                                                    </li>
                                                    <li>
                                                        <hr class="dropdown-divider">
                                                    </li>
                                                    <li>
                                                        <form action="{{ route('cms.administrator.destroy', $administrator->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="dropdown-item btn btn-sm btn-danger" onclick="swalConfirm(event)">Delete</button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td>{{ $i + 1 }}</td>
                                        <td>
                                            <img src="{{ $administrator->avatar_path }}" alt="{{ $administrator->name . ' profile image.' }}" width="30px" class="rounded-circle cursor-pointer" data-bs-toggle="modal"
                                                data-bs-target="#modal-image-preview" onclick="previewImageModal(event)">
                                        </td>
                                        <td>{{ $administrator->name }}</td>
                                        <td>{{ $administrator->email }}</td>
                                        <td>{!! \App\Constants\GeneralStatus::htmlLabel(false) !!}</td>
                                        <td>{{ human_datetime($administrator->updated_at) }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td id="test" colspan="7" class="text-center">
                                            Administrators data is not available right now.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
