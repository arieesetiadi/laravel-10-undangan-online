{{-- Master Template --}}
@extends('cms.layouts.master')

{{-- Content --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-description">
                    <h1>{{ $title ?? 'Title' }}</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card widget widget-stats">
                    <div class="card-body">
                        <div class="widget-stats-container d-flex">
                            <div class="widget-stats-icon widget-stats-icon-primary">
                                <i class="material-icons-outlined">paid</i>
                            </div>
                            <div class="widget-stats-content flex-fill">
                                <span class="widget-stats-title">Today's Sales</span>
                                <span class="widget-stats-amount">$38,211</span>
                                <span class="widget-stats-info">471 Orders Total</span>
                            </div>
                            <div class="widget-stats-indicator widget-stats-indicator-positive align-self-start">
                                <i class="material-icons">keyboard_arrow_up</i> 4%
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
