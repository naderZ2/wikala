@extends('admin.layout.master')
@section('title', 'Edit Coupon')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">
@endsection

@section('breadcrumb-title')
<h3>@lang('lang.edit_coupon')</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item"><a href="{{ route('admin.coupons.index') }}">@lang('lang.coupons')</a></li>
<li class="breadcrumb-item active">@lang('lang.edit_coupon')</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-body">
					@if ($errors->any())
						<div class="alert alert-danger"><ul class="mb-0">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
					@endif

					<form method="POST" action="{{ route('admin.coupons.update', $coupon->id) }}">
						@csrf
						@method('PUT')
						@include('admin.coupons._form', ['coupon' => $coupon])
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
<script>
	$(document).ready(function() {
		$('.select2').select2({
			placeholder: "Select options"
		});
	});
</script>
@endsection
