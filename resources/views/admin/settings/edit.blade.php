@extends('admin.layout.master')
@section('title', 'Validation Forms')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">

@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>@lang('lang.settings') </h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">@lang('lang.Dashboard')</li>
<li class="breadcrumb-item active">@lang('lang.settings')  </li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
			
				<div class="card-body">
					<form class="needs-validation" novalidate="" method="POST" enctype="multipart/form-data" action="{{ route('settings.update') }}">
                        @csrf
						<div class="row">
							<div class="col-md-6 mb-3">
								<label for="validationCustom01">@lang('lang.whatsapp_Number')
								    </label>
								<input class="form-control" id="validationCustom01" type="text" name="whatsapp_number" value="{{ $settings->whatsapp_number}}" placeholder="whatsapp Number" required="">
								<div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please choose a whatsapp Number.</div>
							</div>

							<div class="col-md-6 mb-3">
								<label for="validationCustom01">@lang('lang.phone')
								    </label>
								<input class="form-control" id="validationCustom01" type="text" name="phone" value="{{ $settings->phone}}" placeholder="Phone Number" required="">
								<div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please choose a Phone Number.</div>
							</div>
							<div class="col-md-6 mb-3">
								<label for="validationCustom01">@lang('lang.Email')
								    </label>
								<input class="form-control" id="validationCustom01" type="text" name="email" value="{{ $settings->email}}" placeholder="Email" required="">
								<div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please choose a Email.</div>
							</div>
				
						
						
							<!-- <div class="col-md-6 mb-3">
								<label for="validationCustom01">@lang('lang.facebook')</label>
								<input class="form-control" id="validationCustom01" type="text" name="facebook" value="{{ $settings->facebook}}" placeholder="facebook" required="">
								<div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please choose a facebook.</div>
							</div> -->
							<div class="col-md-6 mb-3">
								<label for="validationCustom01">@lang('lang.insta')</label>
								<input class="form-control" id="validationCustom01" type="text" name="insta" value="{{ $settings->insta}}" placeholder="insta" required="">
								<div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please choose a insta.</div>
							</div>
							<div class="col-md-6 mb-3">
								<label for="tiktokInput">TikTok</label>
								<input class="form-control" id="tiktokInput" type="text" name="tiktok" value="{{ $settings->tiktok}}" placeholder="TikTok">
								<div class="valid-feedback">Looks good!</div>
							</div>
							
							<div class="col-md-6 mb-3">
								<label for="validationCustom01">@lang('lang.image_limit_ad')</label>
								<input class="form-control" id="validationCustom01"type="number" name="image_limit" value="{{ $settings->image_limit}}" placeholder="image_limit" required="">
								<div class="valid-feedback">Looks good!</div>
								<div class="invalid-feedback">Please choose a image_limit.</div>
							</div>
							

							{{-- Disabled: These settings are no longer used (per-category limits are used instead) --}}
							{{-- <div class="col-md-6 mb-3">
								<label for="validationCustom01">@lang('lang.ads_time_user')</label>
								<input class="form-control" id="validationCustom01" type="number" name="ads_time_user" value="{{ $settings->ads_time_user}}" placeholder="ads_time_user" required="">
								<div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please choose a ads time user.</div>
							</div>

							<div class="col-md-6 mb-3">
								<label for="validationCustom01">@lang('lang.ads_time_business')</label>
								<input class="form-control" id="validationCustom01" type="number" name="ads_time_business" value="{{ $settings->ads_time_business}}" placeholder="ads_time_business" required="">
								<div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please choose a ads time business.</div>
							</div>
							<div class="col-md-6 mb-3">
								<label for="validationCustom01">@lang('lang.free_ads_user')</label>
								<input class="form-control" id="validationCustom01" type="number" name="free_ads_user" value="{{ $settings->free_ads_user}}" placeholder="free_ads_user" required="">
								<div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please choose a free ads user.</div>
							</div>
							<div class="col-md-6 mb-3">
								<label for="validationCustom01">@lang('lang.free_ads_business')</label>
								<input class="form-control" id="validationCustom01" type="number" name="free_ads_business" value="{{ $settings->free_ads_business}}" placeholder="free_ads_business" required="">
								<div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please choose a free ads business.</div>
							</div> --}}


							

							<div class="col-md-6 mb-3">
								<label for="validationCustom01">@lang('lang.instance')</label>
								<input class="form-control" id="validationCustom01" type="text" name="instance_id" value="{{ $settings->instance_id}}" required="">
								<div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please choose a instance_id.</div>
							</div>
							<div class="col-md-6 mb-3">
								<label for="validationCustom01">@lang('lang.access_token')</label>
								<input class="form-control" id="validationCustom01" type="text" name="access_token" value="{{ $settings->access_token}}" required="">
								<div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please choose a access_token.</div>
							</div>

							<div class="col-md-6 mb-3">
								<label for="validationCustom01">@lang('lang.delivery_fee')</label>
								<input class="form-control" id="validationCustom01" type="number" step="0.01" min="0" name="delivery_fee" value="{{ $settings->delivery_fee}}" placeholder="delivery fee per seller" required="">
								<div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please choose a delivery fee.</div>
							</div>
							<div class="col-md-6 mb-3">
								<label for="sliderPriceInput">Slider Price ({{ $settings->slider_days ?? 7 }} Days)</label>
								<input class="form-control" id="sliderPriceInput" type="number" step="0.01" min="0" name="slider_price" value="{{ $settings->slider_price ?? 10.00 }}" placeholder="slider price for {{ $settings->slider_days ?? 7 }} days" required="">
								<div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please enter a slider price.</div>
							</div>
							<div class="col-md-6 mb-3">
								<label for="sliderDaysInput">Slider Duration (Days)</label>
								<input class="form-control" id="sliderDaysInput" type="number" min="1" name="slider_days" value="{{ $settings->slider_days ?? 7 }}" placeholder="slider duration in days" required="">
								<div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please enter a slider duration in days.</div>
							</div>
				
						
					</div>
			
						{{-- <div class="mb-3">
                            <div class="col-md-12 mb-3">
                                <div class="col">
                                    <div class="mb-3 mb-0">
                                        <label for="exampleFormControlTextarea4">privacy</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea4" name="privacy" rows="10" required>{{ $settings->privacy }}</textarea>
                                    </div>
                                </div>
                            </div>
						</div> --}}
						
							{{-- <div class="mb-3">
                            <div class="col-md-12 mb-3">
                                <div class="col">
                                    <div class="mb-3 mb-0">
                                        <label for="exampleFormControlTextarea4">terms</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea4" name="terms" rows="10" required>{{ $settings->terms }}</textarea>
                                    </div>
                                </div>
                            </div>
						</div> --}}
						@can('update settings')
						<button class="btn btn-primary" type="submit">@lang('lang.edit')</button>
						@endcan
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
@endsection