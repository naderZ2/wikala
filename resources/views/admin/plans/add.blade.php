@extends('admin.layout.master')
@section('title', 'Add Plan')

@section('breadcrumb-title')
<h3>@lang('lang.add_plan')</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">@lang('lang.plans')</li>
<li class="breadcrumb-item active">@lang('lang.add_plan')</li>
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
					<form class="needs-validation" novalidate="" method="POST" action="{{ route('plans.store') }}">
						@csrf
						<div class="row">
							<div class="col-md-6 mb-3">
								<label>@lang('lang.name_ar')</label>
								<input class="form-control" type="text" name="name_ar" value="{{ old('name_ar') }}" required>
							</div>

							<div class="col-md-6 mb-3">
								<label>@lang('lang.name_en')</label>
								<input class="form-control" type="text" name="name_en" value="{{ old('name_en') }}" required>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6 mb-3">
								<label>@lang('lang.description_ar')</label>
								<textarea class="form-control" name="description_ar" rows="3">{{ old('description_ar') }}</textarea>
							</div>

							<div class="col-md-6 mb-3">
								<label>@lang('lang.description_en')</label>
								<textarea class="form-control" name="description_en" rows="3">{{ old('description_en') }}</textarea>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6 mb-3">
								<label>@lang('lang.price') (KWD)</label>
								<input class="form-control" type="number" step="0.01" name="price" value="{{ old('price', 0) }}" required>
							</div>

							<div class="col-md-6 mb-3">
								<label>@lang('lang.ads_limit') (@lang('lang.0_for_unlimited'))</label>
								<input class="form-control" type="number" name="ads_limit" value="{{ old('ads_limit', 0) }}" required min="0">
							</div>
						</div>

						<button class="btn btn-primary" type="submit">@lang('lang.save')</button>
						<a href="{{ route('plans.index') }}" class="btn btn-secondary">@lang('lang.cancel')</a>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
