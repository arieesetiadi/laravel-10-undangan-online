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
                        <h2 class="fw-bold">{{ $title }}</h2>
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
                            Tambah {{ $title }}
                        </a>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="w-100 table">
                            <thead>
                                <tr>
                                    <th>Pilihan</th>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Nomor Telepon</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($administrators as $administrator)
                                    <tr>
                                        <td class="d-flex text-nowrap gap-2">
                                            <a class="btn btn-sm btn-light" href="{{ route('cms.administrators.edit', $administrator->id) }}">
                                                Ubah
                                            </a>
                                            <a class="btn btn-sm btn-info" href="{{ route('cms.administrators.show', $administrator->id) }}">
                                                Detail
                                            </a>
                                            <form action="{{ route('cms.administrators.toggle', $administrator->id) }}" method="POST">
                                                @csrf
                                                <button class="btn btn-sm {{ $administrator->status ? 'btn-dark' : 'btn-success' }}" type="button" onclick="swalConfirm(event)">
                                                    Toggle
                                                </button>
                                            </form>
                                        </td>
                                        <td class="text-nowrap">{{ ($administrators->currentPage() - 1) * $administrators->perPage() + $loop->iteration }}</td>
                                        <td class="text-nowrap">{{ $administrator->name }}</td>
                                        <td class="text-nowrap">{{ $administrator->email }}</td>
                                        <td class="text-nowrap">{{ $administrator->phone ?: '-' }}</td>
                                        <td class="text-nowrap">{!! GeneralStatus::htmlLabel($administrator->status) !!}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" id="test" colspan="6">
                                            Data tidak tersedia.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        {{ $administrators->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
