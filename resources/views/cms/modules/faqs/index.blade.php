{{-- Master Template --}}
@extends('cms.layouts.master')

{{-- Sidebar Configuration --}}
@php
$sidebar['faqs'] = 'active-page';
@endphp

{{-- Content --}}
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="page-description d-flex align-items-center">
                <div class="page-description-content flex-grow-1">
                    <h3 class="fw-bold">{{ $title }}</h3>
                    <h6 class="text-dark mt-2">{{ Breadcrumbs::render('cms.faqs.index') }}</h6>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-start gap-2">
                    <a class="btn btn-sm btn-primary" href="{{ route('cms.faqs.create') }}">
                        Tambah {{ $title }}
                    </a>
                </div>
                <div class="card-body table-responsive">
                    <table class="w-100 table">
                        <thead>
                            <tr>
                                <th class="align-top">Pilihan</th>
                                <th class="align-top">#</th>
                                <th class="align-top">
                                    <span class="d-block">Pertanyaan</span>
                                    <small>Klik pertanyaan untuk melihat jawaban!</small>
                                <th class="align-top">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($faqs as $faq)
                            <tr>
                                <td class="d-flex text-nowrap gap-2">
                                    <a class="btn btn-sm btn-light" href="{{ route('cms.faqs.edit', $faq->id) }}">
                                        Ubah
                                    </a>
                                    <a class="btn btn-sm btn-light" href="{{ route('cms.faqs.show', $faq->id) }}">
                                        Detail
                                    </a>
                                    <form action="{{ route('cms.faqs.toggle', $faq->id) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-sm {{ $faq->status ? 'btn-dark' : 'btn-success' }}" type="button" onclick="swalConfirm(event)">
                                            Toggle
                                        </button>
                                    </form>
                                </td>
                                <td class="text-nowrap">{{ ($faqs->currentPage() - 1) * $faqs->perPage() + $loop->iteration }}</td>
                                <td class="text-nowrap">
                                    <a tabindex="0" class="text-decoration-none text-dark" role="button" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-content="{{ $faq->answer }}">
                                        {{ $faq->question }}
                                    </a>
                                </td>
                                <td class="text-nowrap">{!! GeneralStatus::htmlLabel($faq->status) !!}</td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center" id="test" colspan="5">
                                    Data tidak tersedia.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Pagination Links --}}
                @if ($faqs->total() > $faqs->perPage())
                <div class="card-footer">
                    {{ $faqs->links() }}
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection