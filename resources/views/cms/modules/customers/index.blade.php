{{-- Master Template --}}
@extends('cms.layouts.master')

{{-- Sidebar Configuration --}}
@php
    $sidebar['customers'] = 'active-page';
@endphp

{{-- Content --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="page-description d-flex align-items-center">
                    <div class="page-description-content flex-grow-1">
                        <h2 class="fw-bold">{{ $titles['plural'] }}</h2>
                        <h6 class="text-dark mt-2">{{ Breadcrumbs::render('cms.customers.index') }}</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-start gap-2">
                        <a class="btn btn-sm btn-light" href="{{ route('cms.customers.create') }}">
                            {{ __('general.actions.add') }} {{ $titles['singular'] }}
                        </a>
                        <a class="btn btn-sm btn-light" href="{{ route('cms.customers.pdf') }}" target="_blank">
                            {{ __('general.actions.download') }} PDF
                        </a>
                        <a class="btn btn-sm btn-light" href="{{ route('cms.customers.excel') }}" target="_blank">
                            {{ __('general.actions.download') }} Excel
                        </a>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="datatable w-100 table">
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
                                        <td class="d-flex text-nowrap gap-2">
                                            <a class="btn btn-sm btn-light" href="{{ route('cms.customers.edit', $customer->id) }}">
                                                {{ __('general.actions.edit') }}
                                            </a>
                                            <a class="btn btn-sm btn-info" href="{{ route('cms.customers.show', $customer->id) }}">
                                                {{ __('general.actions.detail') }}
                                            </a>
                                            <form action="{{ route('cms.customers.toggle', $customer->id) }}" method="POST">
                                                @csrf
                                                <button class="btn btn-sm w-100 {{ $customer->status ? 'btn-dark' : 'btn-success' }}" type="button" onclick="swalConfirm(event)">
                                                    {{ __('general.actions.toggle') }}
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
