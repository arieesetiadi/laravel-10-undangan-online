{{-- Master Template --}}
@extends('cms.layouts.master')

{{-- Sidebar Configuration --}}
@php
    $sidebar['customer'] = 'active-page';
@endphp

{{-- Content --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="page-description d-flex align-items-center">
                    <div class="page-description-content flex-grow-1">
                        <h2 class="fw-bold">{{ $title }}</h2>
                        <h6 class="mt-2 text-dark">{{ Breadcrumbs::render('cms.customer.index') }}</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-start gap-2">
                        <a href="{{ route('cms.customer.create') }}" class="btn btn-sm btn-light">
                            {{ __('general.actions.add') }} {{ $title }}
                        </a>
                        <a href="{{ route('cms.customer.pdf') }}" target="_blank" class="btn btn-sm btn-light">Export PDF</a>
                        <a href="{{ route('cms.customer.excel') }}" target="_blank" class="btn btn-sm btn-light">Export Excel</a>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="datatable table w-100">
                            <thead>
                                <tr>
                                    <th>{{ __('general.words.attributes.actions') }}</th>
                                    <th>#</th>
                                    <th>{{ __('general.words.attributes.name') }}</th>
                                    <th>{{ __('general.words.attributes.email') }}</th>
                                    <th>{{ __('general.words.attributes.status') }}</th>
                                    <th>{{ __('general.words.attributes.updated_at') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($customers as $i => $customer)
                                    <tr>
                                        <td class="d-flex gap-2 text-nowrap">
                                            <a class="btn btn-sm btn-light" href="{{ route('cms.customer.edit', $customer->id) }}">
                                                {{ __('general.actions.edit') }}
                                            </a>
                                            <a class="btn btn-sm btn-info" href="{{ route('cms.customer.show', $customer->id) }}">
                                                {{ __('general.actions.detail') }}
                                            </a>
                                            <form action="{{ route('cms.customer.toggle', $customer->id) }}" method="POST">
                                                @csrf
                                                <button type="button" class="btn btn-sm w-100 {{ $customer->status ? 'btn-dark' : 'btn-success' }}" onclick="swalConfirm(event)">
                                                    Toggle
                                                </button>
                                            </form>
                                        </td>
                                        <td class="text-nowrap">{{ $i + 1 }}</td>
                                        <td class="text-nowrap">{{ $customer->name }}</td>
                                        <td class="text-nowrap">{{ $customer->email }}</td>
                                        <td class="text-nowrap">{!! GeneralStatus::htmlLabel($customer->status) !!}</td>
                                        <td class="text-nowrap">{{ human_datetime($customer->updated_at) }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td id="test" colspan="7" class="text-center">
                                            Customers data is not available right now.
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
