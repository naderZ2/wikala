@extends('admin.layout.master')
@section('title', 'Validation Forms')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">

@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>@lang('lang.add_category')</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">@lang('lang.Categories')</li>
<li class="breadcrumb-item active">@lang('lang.add_category')</li>
@endsection

@section('content')
<div class="container-fluid">
	@if ($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif
	<div class="row">
		<div class="col-sm-12">
			<div class="card">

				<div class="card-body">
					<form class="needs-validation" novalidate="" method="POST" enctype="multipart/form-data" action="{{ route('category.store') }}">
						@csrf
						<div class="row">
							<div class="col-md-6 mb-3">
								<label for="validationCustom01">@lang('lang.name_ar')</label>
								<input class="form-control" id="validationCustom01" type="text" name="name_ar" value="{{ old('name_ar') }}" placeholder="" required="">
								<div class="valid-feedback">Looks good!</div>
								<div class="invalid-feedback">Please choose a name.</div>

							</div>

							<div class="col-md-6 mb-3">
								<label for="validationCustom01">@lang('lang.name_en')</label>
								<input class="form-control" id="validationCustom01" type="text" name="name_en" value="{{ old('name_en') }}" placeholder="" required="">
								<div class="valid-feedback">Looks good!</div>
								<div class="invalid-feedback">Please choose a name.</div>
								{{-- @error('phone')
								<div class="alert alert-danger">{{ $message }}
							</div>
							@enderror --}}
						</div>

				</div>

				<div class="row">
					<div class="col-md-6 mb-3">
						<label for="validationCustom03">@lang('lang.parent_category')</label>

						<select class="js-example-placeholder-multiple col-sm-12" id="validationCustom03" name="parent_id[]" multiple="multiple">
							<option value="" required></option>

							@forelse ($categories as $category)
							<option value="{{ $category->id }}">{{ $category->name }}</option>
							@empty

							@endforelse

						</select>
						<div class="invalid-feedback">Please provide a valid category.</div>

					</div>
					<div class="col-md-6">
						<div class="card-body animate-chk">
							<div class="row">
								<div class="col">
									<label class="d-block" for="chk-ani">
										<input class="checkbox_animated" id="chk-ani" type="checkbox" name="end_point" value="1">
										@lang('lang.final_category')
									</label>

								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="mb-3">
					<div class="col-md-12 mb-3">
						<div class="col">
							<div class="mb-3 row">
								<label class="col-sm-3 col-form-label">@lang('lang.add_image')</label>
								<div class="col-sm-9">
									<input class="form-control" type="file" name="image" value="{{ old('image') }}" required accept="image/*">
                                    <div class="mt-2 text-muted">
                                        <i class="fa fa-info-circle text-primary"></i> 
                                        <strong>@lang('lang.recommended_size'):</strong> @lang('lang.category_recommended_size')
                                        <span class="d-block mt-1">@lang('lang.category_size_hint')</span>
                                    </div>
								</div>
							</div>
						</div>
					</div>

					<!-- Free Ads Settings -->
					<div class="col-md-12 mb-3">
						<div class="row">
							<div class="col-md-6">
								<label class="d-block" for="is_free">
									<input class="checkbox_animated" id="is_free" type="checkbox" name="is_free" value="1" {{ old('is_free', true) ? 'checked' : '' }}>
									@lang('lang.is_free')
								</label>
								<small class="text-muted">@lang('lang.is_free_hint')</small>
							</div>
							<div class="col-md-6">
								<label for="free_ads_limit">@lang('lang.free_ads_limit')</label>
								<input class="form-control" id="free_ads_limit" type="number" name="free_ads_limit" value="{{ old('free_ads_limit', 0) }}" min="0">
								<small class="text-muted">@lang('lang.free_ads_limit_hint')</small>
							</div>
						</div>
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
@endsection