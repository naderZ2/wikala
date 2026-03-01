@extends('admin.layout.master')
@section('title', 'Seller Delivery Options')

@section('css')
@endsection

@section('style')
<style>
    .region-row { padding: 10px; border-bottom: 1px solid #eee; }
    .city-header { background: #f8f9fa; padding: 15px; border-radius: 5px; margin-top: 20px; font-weight: bold; font-size: 16px; }
</style>
@endsection

@section('breadcrumb-title')
<h3>Delivery Options: {{ $seller->name }}</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item"><a href="{{ route('seller.index') }}">@lang('lang.Sellers')</a></li>
<li class="breadcrumb-item active">Delivery Options</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('seller.update-delivery-options', $seller->id) }}">
                        @csrf
                        
                        <div class="alert alert-info">
                            Select the cities/regions where this seller provides delivery and set the delivery price. Note: The seller must be assigned to these cities in their main 'Edit Seller' profile for them to see them.
                        </div>

                        @foreach ($cities as $city)
                        <div class="city-group mb-4">
                            <div class="city-header d-flex align-items-center">
                                <div class="form-check form-switch mb-0">
                                    <input class="form-check-input flexSwitchCheckDefault city-toggle" type="checkbox" id="city_{{ $city->id }}" onchange="toggleCityRegions({{ $city->id }})">
                                    <label class="form-check-label ms-2" for="city_{{ $city->id }}">{{ $city->name }} (City Level)</label>
                                </div>
                            </div>
                            
                            <div class="p-3 border border-top-0 rounded-bottom" id="regions_for_city_{{ $city->id }}">
                                {{-- City level "All regions" option --}}
                                @php
                                    $cityKey = $city->id . '_0';
                                    $hasCityLevel = isset($sellerAreas[$cityKey]);
                                @endphp
                                <div class="row region-row align-items-center bg-light">
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input region-checkbox c-{{ $city->id }}" type="checkbox" name="delivery[{{ $city->id }}][0][active]" value="1" id="reg_{{ $cityKey }}" {{ $hasCityLevel ? 'checked' : '' }}>
                                            <label class="form-check-label" for="reg_{{ $cityKey }}">
                                                <strong>Entire City (All Regions)</strong>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text">Price</span>
                                            <input type="number" step="0.01" class="form-control" name="delivery[{{ $city->id }}][0][price]" value="{{ $hasCityLevel ? $sellerAreas[$cityKey]->delivery_price : '0' }}" min="0">
                                        </div>
                                    </div>
                                </div>

                                {{-- Individual Regions --}}
                                @foreach($city->regions as $region)
                                @php
                                    $regKey = $city->id . '_' . $region->id;
                                    $hasRegLevel = isset($sellerAreas[$regKey]);
                                @endphp
                                <div class="row region-row align-items-center">
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input region-checkbox c-{{ $city->id }}" type="checkbox" name="delivery[{{ $city->id }}][{{ $region->id }}][active]" value="1" id="reg_{{ $regKey }}" {{ $hasRegLevel ? 'checked' : '' }}>
                                            <label class="form-check-label" for="reg_{{ $regKey }}">
                                                {{ $region->name }}
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text">Price</span>
                                            <input type="number" step="0.01" class="form-control" name="delivery[{{ $city->id }}][{{ $region->id }}][price]" value="{{ $hasRegLevel ? $sellerAreas[$regKey]->delivery_price : '0' }}" min="0">
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endforeach

                        <div class="text-center mt-4 border-top pt-4">
                            <a href="{{ route('seller.index') }}" class="btn btn-secondary me-2">Cancel</a>
                            <button type="submit" class="btn btn-primary">Save Delivery Options</button>
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
        let checkboxes = document.querySelectorAll('.c-' + cityId);
        checkboxes.forEach(function(cb) {
            cb.checked = isChecked;
        });
    }

    // On load, set city toggles to checked if any sub-region is checked
    document.addEventListener("DOMContentLoaded", function() {
        @foreach ($cities as $city)
            let anyChecked{{ $city->id }} = document.querySelectorAll('.c-{{ $city->id }}:checked').length > 0;
            if (anyChecked{{ $city->id }}) {
                document.getElementById('city_{{ $city->id }}').checked = true;
            }
        @endforeach
    });
</script>
@endsection
