@extends('admin.layout.master')
@section('title', 'Validation Forms')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">

@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>@lang('lang.contact_us') </h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">@lang('lang.contact_us')</li>
<li class="breadcrumb-item active">@lang('lang.contact_us')  </li>
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
								<label for="validationCustom01">@lang('lang.facebook')</label>
								<input class="form-control" id="validationCustom01" type="text" name="facebook" value="{{ $settings->facebook}}" placeholder="facebook" required="">
								<div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please choose a facebook.</div>
							</div>
							<div class="col-md-6 mb-3">
								<label for="validationCustom01">@lang('lang.insta')</label>
								<input class="form-control" id="validationCustom01" type="text" name="insta" value="{{ $settings->insta}}" placeholder="insta" required="">
								<div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please choose a insta.</div>

							</div>

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
								<input class="form-control" id="validationCustom01" type="text" name="delivery_fee" value="{{ $settings->delivery_fee}}" required="">
								<div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please choose a access_token.</div>
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
						<button class="btn btn-primary" type="submit">@lang('lang.edit')</button>
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