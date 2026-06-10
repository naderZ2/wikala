@extends('admin.layout.master')
@section('title', 'Validation Forms')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">

@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>@lang('lang.add_Driver')</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">@lang('lang.Drivers')</li>
<li class="breadcrumb-item active">@lang('lang.add_Driver')</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-body">
					<form class="needs-validation" novalidate="" method="POST" enctype="multipart/form-data" action="{{ route('driver.store') }}">
                        @csrf
						<div class="row">
							<div class="col-md-6 mb-3">
								<label for="validationCustom01">@lang('lang.Name')</label>
								<input class="form-control" id="validationCustom01" type="text" name="name" value="{{ old('name') }}" placeholder="" required="">
								<div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please choose a name.</div>
							</div>
							<div class="col-md-6 mb-3">
								<label for="validationCustom02">@lang('lang.Email')</label>
								<input class="form-control" id="validationCustom02" type="text" name="email"  value="{{ old('email') }}" placeholder="" required="">
								<div class="valid-feedback">Looks good!</div>
								@error('email')
								    <div class="alert alert-danger">{{ $message }}</div>
							    @enderror
							</div>
							<div class="col-md-6 mb-3">
								<label for="validationCustom02">@lang('lang.phone')</label>
								<input class="form-control" id="validationCustom02" type="text" name="phone"  value="{{ old('phone') }}" placeholder="" required="">
								<div class="valid-feedback">Looks good!</div>
								@error('phone')
								    <div class="alert alert-danger">{{ $message }}</div>
							    @enderror
							</div>
							<div class="col-md-6 mb-3">
                                <label for="validationCustom01">@lang('lang.regions')</label>

                                <select class="js-example-placeholder-multiple col-sm-12"  id="validationCustom01"  name="cities[]" multiple="multiple" required="">
                                    @forelse ($cities as $city)

                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @empty
                                        
                                    @endforelse
                              
                                </select>
                                <div class="invalid-feedback">Please provide a valid Categories.</div>

                            </div>
					
						</div>
						<div class="row">

							<div class="col-md-6 mb-3">
								<label for="validationCustom05">@lang('lang.password')</label>
								<input class="form-control" id="validationCustom05" type="password" placeholder="********" name="password" value="{{ old('password') }}" required="">
								<div class="invalid-feedback">Please provide a valid password.</div>
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