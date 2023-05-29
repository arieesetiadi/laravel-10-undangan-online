{{-- Master Template --}}
@extends('cms.layouts.master')

{{-- Sidebar Configuration --}}
@php
    $sidebar['administrator'] = 'active-page';
@endphp

{{-- Content --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="page-description d-flex align-items-center">
                    <div class="page-description-content flex-grow-1">
                        <h2 class="fw-bold">{{ $title }}</h2>
                        <h6 class="mt-2 text-dark">{{ Breadcrumbs::render('cms.administrator.index') }}</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-start gap-2">
                        <a href="{{ route('cms.administrator.create') }}" class="btn btn-sm btn-light">
                            {{ __('general.actions.add') }} {{ $title }}
                        </a>
                        <a href="{{ route('cms.administrator.pdf') }}" target="_blank" class="btn btn-sm btn-light">Export
                            PDF</button>
                            <a href="{{ route('cms.administrator.excel') }}" target="_blank"
                                class="btn btn-sm btn-light">Export
                                Excel</a>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="datatable table w-100">
                            <thead>
                                <tr>
                                    <th>{{ __('general.words.attributes.actions') }}</th>
                                    <th>#</th>
                                    <th>{{ __('general.words.attributes.image') }}</th>
                                    <th>{{ __('general.words.attributes.name') }}</th>
                                    <th>{{ __('general.words.attributes.email') }}</th>
                                    <th>{{ __('general.words.attributes.status') }}</th>
                                    <th>{{ __('general.words.attributes.updated_at') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($administrators as $i => $administrator)
                                    <tr>
                                        <td class="d-flex gap-2 text-nowrap">
                                            <a class="btn btn-sm btn-light"
                                                href="{{ route('cms.administrator.edit', $administrator->id) }}">
                                                {{ __('general.actions.edit') }}
                                            </a>
                                            <a class="btn btn-sm btn-info"
                                                href="{{ route('cms.administrator.show', $administrator->id) }}">
                                                {{ __('general.actions.detail') }}
                                            </a>
                                            <form action="{{ route('cms.administrator.toggle', $administrator->id) }}"
                                                method="POST">
                                                @csrf
                                                <button type="button"
                                                    class="btn btn-sm {{ $administrator->status ? 'btn-dark' : 'btn-success' }}"
                                                    onclick="swalConfirm(event)">
                                                    {{ $administrator->status ? 'In-activate' : 'Activate' }}
                                                </button>
                                            </form>
                                        </td>
                                        <td class="text-nowrap">{{ $i + 1 }}</td>
                                        <td class="text-nowrap">
                                            <img src="{{ $administrator->avatar_path }}"
                                                alt="{{ $administrator->name . ' profile image.' }}" width="30px"
                                                height="30px" class="rounded-circle cursor-pointer" data-bs-toggle="modal"
                                                data-bs-target="#modal-image-preview" onclick="previewImageModal(event)">
                                        </td>
                                        <td class="text-nowrap">{{ $administrator->name }}</td>
                                        <td class="text-nowrap">{{ $administrator->email }}</td>
                                        <td class="text-nowrap">{!! GeneralStatus::htmlLabel($administrator->status) !!}</td>
                                        <td class="text-nowrap">{{ human_datetime($administrator->updated_at) }}</td>
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
