@extends('admin.layout.master')
@section('title', 'Ad Details')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/select2.css') }}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>@lang('lang.ad_details')</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">@lang('lang.ads')</li>
<li class="breadcrumb-item active">@lang('lang.ad_details')</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="mb-4">
				<a href="{{ route('ads.editStatus', $ad->id) }}" class="btn btn-primary">
					@lang('lang.change_status')
				</a>
			</div>
			<div class="card">
				<div class="card-body">
					{{-- <div class="row mb-3">
						<div class="col-md-3 fw-bold">@lang('lang.ID'):</div>
						<div class="col-md-9">{{ $ad->id }}</div>
					</div> --}}

					<div class="row mb-3">
						<div class="col-md-3 fw-bold">@lang('lang.Ad_Number'):</div>
						<div class="col-md-9">{{ $ad->ad_number }}</div>
					</div>

					<div class="row mb-3">
						<div class="col-md-3 fw-bold">@lang('lang.Title'):</div>
						<div class="col-md-9">{{ $ad->title }}</div>
					</div>

					<div class="row mb-3">
						<div class="col-md-3 fw-bold">@lang('lang.description'):</div>
						<div class="col-md-9">{{ $ad->description }}</div>
					</div>

					<div class="row mb-3">
						<div class="col-md-3 fw-bold">@lang('lang.Category'):</div>
						<div class="col-md-9">{{ $ad?->category?->name ?? '-' }}</div>
					</div>

					<div class="row mb-3">
						<div class="col-md-3 fw-bold">@lang('lang.Type'):</div>
						<div class="col-md-9">{{ $ad?->adsType?->name ?? '-' }}</div>
					</div>

					<div class="row mb-3">
						<div class="col-md-3 fw-bold">@lang('lang.Client'):</div>
						<div class="col-md-9">{{ $ad?->user?->name ?? '-' }}</div>
					</div>

					<div class="row mb-3">
						<div class="col-md-3 fw-bold">@lang('lang.Contact_Method'):</div>
						<div class="col-md-9">{{ ucfirst($ad?->contact_method) ?? '-' }}</div>
					</div>

					<div class="row mb-3">
						<div class="col-md-3 fw-bold">@lang('lang.Possibility_Negotiable'):</div>
						<div class="col-md-9">{{ $ad?->negotiable ? __('lang.Yes') : __('lang.No') }}</div>
					</div>

					<div class="row mb-3">
						<div class="col-md-3 fw-bold">@lang('lang.Status'):</div>
						<div class="col-md-9">@lang('lang.' . $ad?->status)</div>
					</div>
					@if($ad->status === 'rejected')
					<div class="row mb-3">
						<div class="col-md-3 fw-bold">@lang('lang.Rejected_Reason'):</div>
						<div class="col-md-9">{{ $ad?->rejectedReason?->name ?? '-' }}</div>
					</div>
					@endif

					<div class="row mb-3">
						<div class="col-md-3 fw-bold">@lang('lang.Start_Date'):</div>
						<div class="col-md-9">{{ $ad?->start_date }}</div>
					</div>

					<div class="row mb-3">
						<div class="col-md-3 fw-bold">@lang('lang.End_Date'):</div>
						<div class="col-md-9">{{ $ad?->end_date }}</div>
					</div>

					
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
@endsection
