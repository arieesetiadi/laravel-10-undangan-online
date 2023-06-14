{{-- Master Template --}}
@extends('cms.layouts.master')

{{-- Sidebar Configuration --}}
@php
    $sidebar['administrators'] = 'active-page';
@endphp

{{-- Content --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="page-description d-flex align-items-center">
                    <div class="page-description-content flex-grow-1">
                        <h2 class="fw-bold">{{ $titles['plural'] }}</h2>
                        <h6 class="text-dark mt-2">{{ Breadcrumbs::render('cms.administrators.index') }}</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-start gap-2">
                        <a class="btn btn-sm btn-light" href="{{ route('cms.administrators.create') }}">
                            {{ __('general.actions.add') }} {{ $titles['singular'] }}
                        </a>
                        <a class="btn btn-sm btn-light" href="{{ route('cms.administrators.pdf') }}" target="_blank">
                            {{ __('general.actions.download') }} PDF
                        </a>
                        <a class="btn btn-sm btn-light" href="{{ route('cms.administrators.excel') }}" target="_blank">
                            {{ __('general.actions.download') }} Excel
                        </a>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="datatable w-100 table">
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
                                        <td class="d-flex text-nowrap gap-2">
                                            <a class="btn btn-sm btn-light" href="{{ route('cms.administrators.edit', $administrator->id) }}">
                                                {{ __('general.actions.edit') }}
                                            </a>
                                            <a class="btn btn-sm btn-info" href="{{ route('cms.administrators.show', $administrator->id) }}">
                                                {{ __('general.actions.detail') }}
                                            </a>
                                            <form action="{{ route('cms.administrators.toggle', $administrator->id) }}" method="POST">
                                                @csrf
                                                <button class="btn btn-sm {{ $administrator->status ? 'btn-dark' : 'btn-success' }}" type="button" onclick="swalConfirm(event)">
                                                    {{ __('general.actions.toggle') }}
                                                </button>
                                            </form>
                                        </td>
                                        <td class="text-nowrap">{{ $i + 1 }}</td>
                                        <td class="text-nowrap">
                                            <img class="rounded-circle cursor-pointer" data-bs-toggle="modal" data-bs-target="#modal-image-preview" src="{{ $administrator->avatar_path }}" alt="{{ $administrator->name . ' profile image.' }}"
                                                width="25px" height="25px" onclick="previewImageModal(event)">
                                        </td>
                                        <td class="text-nowrap">{{ $administrator->name }}</td>
                                        <td class="text-nowrap">{{ $administrator->email }}</td>
                                        <td class="text-nowrap">{!! GeneralStatus::htmlLabel($administrator->status) !!}</td>
                                        <td class="text-nowrap">{{ human_datetime($administrator->updated_at) }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" id="test" colspan="7">
                                            {{ __('general.sentences.no-content') }}
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
