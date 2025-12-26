@extends('admin.layout.master')
@section('title', __('lang.Set_Sponsor'))

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>@lang('lang.Set_Sponsor')</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">@lang('lang.ads')</li>
<li class="breadcrumb-item active">@lang('lang.Set_Sponsor')</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0">
                    <h5>@lang('lang.Set_Sponsor_For_Ad'): {{ $ad->title }}</h5>
                </div>
                <div class="card-body">
                    <form class="needs-validation" method="POST" action="{{ route('ads.setSponsor', $ad->id) }}" novalidate>
                        @csrf

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label" for="ad_number">@lang('lang.Ad_Number')</label>
                                <input type="text" class="form-control" value="{{ $ad->ad_number }}" disabled>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="title">@lang('lang.Title')</label>
                                <input type="text" class="form-control" value="{{ $ad->title }}" disabled>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label" for="sponsored_price">@lang('lang.Sponsored_Price') (@lang('lang.sar')) <span class="text-danger">*</span></label>
                                <input type="number" step="0.01" min="0" class="form-control @error('sponsored_price') is-invalid @enderror"
                                    name="sponsored_price" id="sponsored_price"
                                    value="{{ old('sponsored_price', $ad->sponsored_price ?? 0) }}" required>
                                @error('sponsored_price')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="text-muted">@lang('lang.higher_price_appears_first')</small>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">@lang('lang.Current_Status')</label>
                                <div class="mt-2">
                                    @if($ad->is_sponsored)
                                    <span class="badge bg-success">@lang('lang.sponsored')</span>
                                    <span class="text-muted">@lang('lang.Current_Price'): {{ $ad->sponsored_price }} @lang('lang.sar')</span>
                                    @else
                                    <span class="badge bg-secondary">@lang('lang.not_sponsored')</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <button class="btn btn-success" type="submit">@lang('lang.Set_Sponsor')</button>
                                <a href="{{ route('ads.details', $ad->id) }}" class="btn btn-secondary">@lang('lang.cancel')</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('assets/js/form-validation-custom.js') }}"></script>
@endsection