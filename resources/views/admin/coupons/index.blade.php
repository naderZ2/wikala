@extends('admin.layout.master')
@section('title', 'Coupons')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
@endsection

@section('breadcrumb-title')
<h3>@lang('lang.coupons')</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">@lang('lang.Dashboard')</li>
<li class="breadcrumb-item active">@lang('lang.coupons')</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="d-flex justify-content-end col-sm-12 mb-3">
			<a href="{{ route('admin.coupons.create') }}" class="btn btn-primary">@lang('lang.add_coupon')</a>
		</div>
		<div class="col-sm-12">
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table class="display" id="advance-1">
							<thead>
								<tr>
									<th>@lang('lang.code')</th>
									<th>@lang('lang.Type')</th>
									<th>@lang('lang.Value')</th>
									<th>@lang('lang.coupon_min_amount')</th>
									<th>@lang('lang.coupon_max_amount')</th>
									<th>@lang('lang.coupon_max_discount')</th>
									<th>@lang('lang.usage_limit')</th>
									<th>@lang('lang.usage_per_user')</th>
									<th>@lang('lang.used_count')</th>
									<th>@lang('lang.Start_Date')</th>
									<th>@lang('lang.End_Date')</th>
									<th>@lang('lang.Status')</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@forelse ($coupons as $coupon)
									<tr>
										<td><strong>{{ $coupon->code }}</strong></td>
										<td>@lang('lang.' . $coupon->discount_type)</td>
										<td>
											{{ $coupon->value }}{{ $coupon->discount_type === 'percentage' ? '%' : '' }}
										</td>
										<td>{{ $coupon->min_order_amount ?? '-' }}</td>
										<td>{{ $coupon->max_order_amount ?? '-' }}</td>
										<td>{{ $coupon->max_discount_amount ?? '-' }}</td>
										<td>{{ $coupon->usage_limit ?? '-' }}</td>
										<td>{{ $coupon->usage_limit_per_user ?? '-' }}</td>
										<td>{{ $coupon->used_count }}</td>
										<td>{{ $coupon->starts_at?->format('Y-m-d') ?? '-' }}</td>
										<td>{{ $coupon->expires_at?->format('Y-m-d') ?? '-' }}</td>
										<td>
											@if ($coupon->active)
												<span class="font-success">@lang('lang.active')</span>
											@else
												<span class="font-danger">@lang('lang.inactive')</span>
											@endif
										</td>
										<td>
											<a href="{{ route('admin.coupons.edit', $coupon->id) }}" class="btn btn-success btn-sm m-1">@lang('lang.edit')</a>
											<a href="{{ route('admin.coupons.toggle', $coupon->id) }}" class="btn btn-warning btn-sm m-1">
												{{ $coupon->active ? trans('lang.Disable') : trans('lang.Enable') }}
											</a>
											<form action="{{ route('admin.coupons.destroy', $coupon->id) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Are you sure?');">
												@csrf
												@method('DELETE')
												<button type="submit" class="btn btn-danger btn-sm m-1">@lang('lang.remove')</button>
											</form>
										</td>
									</tr>
								@empty
								@endforelse
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('script')
<script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
@endsection
