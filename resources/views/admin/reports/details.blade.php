@extends('admin.layout.master')
@section('title', 'Report Details')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/select2.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/photoswipe.css')}}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>@lang('lang.reports')</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item"><a href="{{ route('admin.reports.index') }}">@lang('lang.reports')</a></li>
<li class="breadcrumb-item active">@lang('lang.details')</li>
@endsection

@section('content')

@php
    $isEn = app()->getLocale() === 'en';
    $optionTitle = $report->reportOption
        ? ($isEn
            ? ($report->reportOption->title_en ?? $report->reportOption->title_ar)
            : ($report->reportOption->title_ar ?? $report->reportOption->title_en))
        : trans('lang.no_data');
    $adRelation   = $report->adSpecificRelation;
    $userRelation = $report->userSpecificRelation;
@endphp

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">@lang('lang.Report_ID'):</div>
                        <div class="col-md-9">{{ $report->id }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">@lang('lang.Reporter'):</div>
                        <div class="col-md-9">{{ $report->reporter?->name ?? trans('lang.no_data') }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">@lang('lang.Report_Option'):</div>
                        <div class="col-md-9">{{ $optionTitle }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">@lang('lang.Additional_Notes'):</div>
                        <div class="col-md-9">{{ $report->additional_notes ?? trans('lang.no_data') }}</div>
                    </div>

                    @if($adRelation)
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">@lang('lang.Ad_Title'):</div>
                        <div class="col-md-9">{{ $adRelation->title ?? trans('lang.no_data') }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">@lang('lang.Ad_Number'):</div>
                        <div class="col-md-9">{{ $adRelation->ad_number ?? trans('lang.no_data') }}</div>
                    </div>
                    @endif

                    @if($userRelation)
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">@lang('lang.User_Specific_Relation'):</div>
                        <div class="col-md-9">{{ $userRelation->name ?? trans('lang.no_data') }}</div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('assets/js/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('assets/js/select2/select2-custom.js') }}"></script>
<script src="{{ asset('assets/js/form-validation-custom.js') }}"></script>

<script src="{{asset('assets/js/photoswipe/photoswipe.min.js')}}"></script>
<script src="{{asset('assets/js/photoswipe/photoswipe-ui-default.min.js')}}"></script>
<script src="{{asset('assets/js/photoswipe/photoswipe.js')}}"></script>
@endsection
