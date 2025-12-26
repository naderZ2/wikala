@extends('admin.layout.master')
@section('title', __('lang.edit_limit'))

@section('css')
@endsection

@section('breadcrumb-title')
<h3>@lang('lang.edit_limit')</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">@lang('lang.Users')</li>
<li class="breadcrumb-item"><a href="{{ route('admin.userCategoryLimits.index', $user->id) }}">@lang('lang.user_category_limits')</a></li>
<li class="breadcrumb-item active">@lang('lang.edit_limit')</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0">
                    <h5>@lang('lang.edit_limit'): {{ $user->name }} - {{ $category->name ?? $category->name_en }}</h5>
                </div>
                <div class="card-body">
                    <form class="needs-validation" method="POST" action="{{ route('admin.userCategoryLimits.update', [$user->id, $category->id]) }}" novalidate>
                        @csrf

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">@lang('lang.Client')</label>
                                <input type="text" class="form-control" value="{{ $user->name }}" disabled>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">@lang('lang.Category')</label>
                                <input type="text" class="form-control" value="{{ $category->name ?? $category->name_en }}" disabled>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">@lang('lang.default_limit')</label>
                                <input type="text" class="form-control" value="{{ $category->free_ads_limit }}" disabled>
                                <small class="text-muted">@lang('lang.free_ads_limit_hint')</small>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label" for="free_ads_limit">@lang('lang.custom_limit') <span class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('free_ads_limit') is-invalid @enderror"
                                    name="free_ads_limit" id="free_ads_limit"
                                    value="{{ old('free_ads_limit', $userLimit->free_ads_limit ?? $category->free_ads_limit) }}"
                                    min="0" required>
                                @error('free_ads_limit')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="used_ads_count">@lang('lang.used_ads')</label>
                                <input type="number" class="form-control @error('used_ads_count') is-invalid @enderror"
                                    name="used_ads_count" id="used_ads_count"
                                    value="{{ old('used_ads_count', $userLimit->used_ads_count ?? 0) }}"
                                    min="0">
                                @error('used_ads_count')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">@lang('lang.save')</button>
                                <a href="{{ route('admin.userCategoryLimits.index', $user->id) }}" class="btn btn-secondary">@lang('lang.cancel')</a>
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