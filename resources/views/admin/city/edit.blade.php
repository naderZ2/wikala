@extends('admin.layout.master')
@section('title', 'Validation Forms')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">

@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>@lang('lang.add_region')</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">@lang('lang.regions')</li>
<li class="breadcrumb-item active">@lang('lang.add_region')</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
			
				<div class="card-body">
					<form class="needs-validation" novalidate="" method="POST" enctype="multipart/form-data" action="{{ route('city.store') }}">
                        @csrf
						<div class="row">
							<div class="col-md-6 mb-3">
								<label for="validationCustom01">@lang('lang.name_ar')</label>
								<input class="form-control" id="validationCustom01" type="text" name="name_ar" value="{{ $city?->name_ar }}" placeholder="" required="">
								<div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please choose a name.</div>

							</div>

							<div class="col-md-6 mb-3">
								<label for="validationCustom01">@lang('lang.name_en')</label>
								<input class="form-control" id="validationCustom01" type="text" name="name_en" value="{{ $city?->name_en }}" placeholder="" required="">
								<div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please choose a name.</div>
                                {{-- @error('phone')
								<div class="alert alert-danger">{{ $message }}</div>
							    @enderror --}}
							</div>											
						</div>

						<div class="row">
							<div class="col-md-6 mb-3">
                                <label for="country_id">@lang('lang.country')</label>
                                <select class="js-example-placeholder-multiple col-sm-12" id="country_id" name="country_id">
                                    <option value=""></option>
                                    @foreach ($countries as $country)
                                        <option {{ $city?->country_id == $country->id ? 'selected' : '' }} value="{{ $country->id }}">{{ app()->getLocale() == "en" ? $country->name_en : $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>

							<div class="col-md-6 mb-3">
                                <label for="validationCustom03">@lang('lang.region')</label>
                                <select class="js-example-placeholder-multiple col-sm-12" id="validationCustom03" name="parent_id" {{ $city?->country_id ? '' : 'disabled' }}>
                                    <option value=""></option>
                                    @if($city?->country_id)
                                        @foreach($cities as $parentCity)
                                            <option {{ $city?->parent_id == $parentCity->id ? 'selected' : '' }} value="{{ $parentCity->id }}">{{ $parentCity->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <div class="invalid-feedback">Please provide a valid category.</div>
                            </div>
						</div>

						<button class="btn btn-primary" type="submit">@lang('lang.save')</button>
					</form>
				</div>
			</div>
			
		
		</div>
	</div>
</div>
@endsection

@section('script')
<script src="{{asset('assets/js/select2/select2.full.min.js')}}"></script>
<script src="{{asset('assets/js/select2/select2-custom.js')}}"></script>
<script src="{{asset('assets/js/form-validation-custom.js')}}"></script>
<script>
    $('#country_id').on('change', function () {
        var countryId = $(this).val();
        $('#validationCustom03').html('<option value=""></option>').val('').trigger('change');
        if (countryId) {
            $('#validationCustom03').prop('disabled', false);
            $.ajax({
                url: "{{ route('get_city') }}?country_id=" + countryId,
                type: 'get',
                dataType: 'json',
                success: function (res) {
                    if (res.length > 0) {
                        res.forEach(function (item) {
                            $('#validationCustom03').append(`
                                <option value="${item.id}">${document.documentElement.dir == 'rtl' ? item.name_ar : item.name_en}</option>
                            `);
                        });
                    }
                }
            });
        } else {
            $('#validationCustom03').prop('disabled', true);
        }
    });
</script>
@endsection