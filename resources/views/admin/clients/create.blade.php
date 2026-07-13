@extends('admin.layout.master')
@section('title', 'Validation Forms')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>@lang('lang.add_client')</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">@lang('lang.Users')</li>
<li class="breadcrumb-item"><a href="{{ route('admin.clients') }}">@lang('lang.Clients')</a></li>
<li class="breadcrumb-item active">@lang('lang.add_client')</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-body">

					@if ($errors->any())
						<div class="alert alert-danger">
							<ul class="mb-0">
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="needs-validation" novalidate="" method="POST" enctype="multipart/form-data" action="{{ route('admin.clients.store') }}">
						@csrf
						<div class="row">
							<div class="col-md-6 mb-3">
								<label for="clientName">@lang('lang.Name')</label>
								<input class="form-control" id="clientName" type="text" name="name" value="{{ old('name') }}" placeholder="name" required="">
								<div class="invalid-feedback">Please choose a name.</div>
							</div>

							<div class="col-md-6 mb-3">
								<label for="clientPhone">@lang('lang.phone')</label>
								<div class="input-group">
									<select class="form-select" name="country_code" style="max-width: 130px;">
										@if(isset($countries) && $countries->count() > 0)
											@foreach($countries as $country)
												@php
													$cleanCode = preg_replace('/^\+|^00/', '', $country->country_code);
												@endphp
												<option value="{{ $cleanCode }}" {{ $cleanCode == '965' ? 'selected' : '' }}>
													+{{ $cleanCode }} ({{ $country->name }})
												</option>
											@endforeach
										@else
											<option value="965" selected>+965</option>
										@endif
									</select>
									<input class="form-control" id="clientPhone" type="text" name="phone" value="{{ old('phone') }}" placeholder="phone" required="">
								</div>
								<div class="invalid-feedback">Please provide a valid phone.</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6 mb-3">
								<label for="clientEmail">@lang('lang.Email')</label>
								<input class="form-control" id="clientEmail" type="email" name="email" value="{{ old('email') }}" placeholder="email">
								<div class="invalid-feedback">Please provide a valid email.</div>
							</div>

							<div class="col-md-6 mb-3">
								<label for="clientPassword">@lang('lang.password')</label>
								<input class="form-control" id="clientPassword" type="password" name="password" value="" placeholder="********" required="">
								<div class="invalid-feedback">Please provide a valid password.</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6 mb-3">
								<label for="clientDob">@lang('lang.date_of_birth')</label>
								<input class="form-control" id="clientDob" type="date" name="date_of_birth" value="{{ old('date_of_birth') }}">
							</div>

							<div class="col-md-6 mb-3">
								<label for="clientBio">@lang('lang.bio')</label>
								<textarea class="form-control" id="clientBio" name="bio" rows="3">{{ old('bio') }}</textarea>
							</div>
						</div>

						<div class="text-center">
							<button class="btn btn-primary" type="submit">@lang('lang.save')</button>
						</div>
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
