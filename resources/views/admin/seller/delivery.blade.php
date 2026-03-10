@extends('admin.layout.master')
@section('title', 'Seller Delivery Options')

@section('style')
<style>
    /* Improved colors and spacing for better readability */
    .city-group {
        border-radius: 8px;
        overflow: hidden;
        border-color: #dee2e6 !important;
    }
    .city-header {
        background-color: #f1f5f9 !important; /* Soft distinct background */
        border-bottom: 2px solid #e2e8f0;
    }
    .city-header .form-check-label {
        font-size: 16px;
        color: #1e293b; /* Darker text for contrast */
    }
    .region-row {
        transition: background-color 0.2s;
        border-bottom: 1px solid #f1f5f9;
    }
    .region-row:hover {
        background-color: #f8fafc;
    }
    .region-label {
        color: #334155;
        font-weight: 500;
        font-size: 14.5px;
    }
    .region-price-input {
        max-width: 150px;
    }
    /* RTL/LTR specific fixes */
    html[dir="rtl"] .form-check {
        padding-right: 2.5em;
        padding-left: 0;
    }
    html[dir="rtl"] .form-check .form-check-input {
        float: right;
        margin-right: -2.5em;
        margin-left: 0;
    }
    html[dir="rtl"] .ms-2 {
        margin-right: 0.5rem !important;
        margin-left: 0 !important;
    }
</style>
@endsection

@section('breadcrumb-title')
<h3>@lang('lang.delivery_options'): {{ $seller->name }}</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item"><a href="{{ route('seller.index') }}">@lang('lang.Sellers')</a></li>
<li class="breadcrumb-item active">@lang('lang.delivery_options')</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('seller.update-delivery-options', $seller->id) }}">
                        @csrf
                        
                        <div class="alert alert-primary outline-2x mb-4" role="alert">
                            <i data-feather="info"></i>
                            <strong>@lang('lang.delivery_options_desc')</strong>
                        </div>

                        <div class="row">
                            @foreach ($cities as $city)
                            <div class="col-md-6 mb-4">
                                <div class="card shadow-sm border city-group h-100">
                                    {{-- City Header --}}
                                    <div class="card-header city-header py-3 d-flex justify-content-between align-items-center">
                                        <div class="form-check form-switch mb-0 d-flex align-items-center">
                                            <input class="form-check-input flexSwitchCheckDefault city-toggle" type="checkbox" id="city_{{ $city->id }}" onchange="toggleCityRegions({{ $city->id }})">
                                            <label class="form-check-label fw-bold mb-0 ms-2" for="city_{{ $city->id }}">
                                                {{ app()->getLocale() == 'ae' ? ($city->name_ar ?? $city->name) : ($city->name_en ?? $city->name) }}
                                            </label>
                                        </div>
                                        <span class="badge rounded-pill bg-primary px-3 py-2 text-white">@lang('lang.city_level')</span>
                                    </div>
                                    
                                    {{-- Regions List --}}
                                    <div class="card-body p-0" id="regions_for_city_{{ $city->id }}">
                                        {{-- City level "All regions" option --}}
                                        @php
                                            $cityKey = $city->id . '_0';
                                            $hasCityLevel = isset($sellerAreas[$cityKey]);
                                        @endphp
                                        <div class="region-row p-3 bg-light">
                                            <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                                                <div class="form-check mb-0 d-flex align-items-center">
                                                    <input class="form-check-input region-checkbox c-{{ $city->id }}" type="checkbox" name="delivery[{{ $city->id }}][0][active]" value="1" id="reg_{{ $cityKey }}" {{ $hasCityLevel ? 'checked' : '' }}>
                                                    <label class="form-check-label fw-bold text-primary region-label ms-2" for="reg_{{ $cityKey }}">
                                                        @lang('lang.entire_city')
                                                    </label>
                                                </div>
                                                <div class="input-group input-group-sm region-price-input">
                                                    <span class="input-group-text bg-white">@lang('lang.price')</span>
                                                    <input type="number" step="0.01" class="form-control text-center" name="delivery[{{ $city->id }}][0][price]" value="{{ $hasCityLevel ? $sellerAreas[$cityKey]->delivery_price : '0' }}" min="0">
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Individual Regions --}}
                                        <div class="p-0">
                                            @foreach($city->regions as $region)
                                            @php
                                                $regKey = $city->id . '_' . $region->id;
                                                $hasRegLevel = isset($sellerAreas[$regKey]);
                                            @endphp
                                            <div class="region-row p-3">
                                                <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                                                    <div class="form-check mb-0 d-flex align-items-center">
                                                        <input class="form-check-input region-checkbox c-{{ $city->id }}" type="checkbox" name="delivery[{{ $city->id }}][{{ $region->id }}][active]" value="1" id="reg_{{ $regKey }}" {{ $hasRegLevel ? 'checked' : '' }}>
                                                        <label class="form-check-label region-label ms-2" for="reg_{{ $regKey }}">
                                                            {{ app()->getLocale() == 'ae' ? ($region->name_ar ?? $region->name) : ($region->name_en ?? $region->name) }}
                                                        </label>
                                                    </div>
                                                    <div class="input-group input-group-sm region-price-input">
                                                        <span class="input-group-text bg-white">@lang('lang.price')</span>
                                                        <input type="number" step="0.01" class="form-control text-center" name="delivery[{{ $city->id }}][{{ $region->id }}][price]" value="{{ $hasRegLevel ? $sellerAreas[$regKey]->delivery_price : '0' }}" min="0">
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <div class="text-center mt-4 border-top pt-4">
                            <a href="{{ route('seller.index') }}" class="btn btn-secondary me-3 px-4">@lang('lang.cancel')</a>
                            <button type="submit" class="btn btn-primary px-5">@lang('lang.save_delivery_options')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    function toggleCityRegions(cityId) {
        let isChecked = document.getElementById('city_' + cityId).checked;
        if (!isChecked) return; // If toggled off, don't uncheck regions
        let checkboxes = document.querySelectorAll('.c-' + cityId);
        // Skip the city-level "entire city" checkbox (id ends with _0)
        checkboxes.forEach(function(cb) {
            if (cb.id !== 'reg_' + cityId + '_0') {
                cb.checked = true;
            }
        });
    }

    // On load, set city toggles to checked if any individual region is checked (skip city-level)
    document.addEventListener("DOMContentLoaded", function() {
        @foreach ($cities as $city)
            let regionCheckboxes{{ $city->id }} = document.querySelectorAll('.c-{{ $city->id }}:not(#reg_{{ $city->id }}_0)');
            let anyChecked{{ $city->id }} = false;
            regionCheckboxes{{ $city->id }}.forEach(function(cb) {
                if (cb.checked) anyChecked{{ $city->id }} = true;
            });
            if (anyChecked{{ $city->id }}) {
                document.getElementById('city_{{ $city->id }}').checked = true;
            }
        @endforeach
    });
</script>
@endsection
