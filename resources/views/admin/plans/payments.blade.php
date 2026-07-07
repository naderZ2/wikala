@extends('admin.layout.master')
@section('title', 'Seller Payments History')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
@endsection

@section('breadcrumb-title')
<h3>@lang('lang.payment_history')</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">@lang('lang.Dashboard')</li>
<li class="breadcrumb-item active">@lang('lang.payment_history')</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12 mt-3">
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table class="display" id="advance-1">
							<thead>
								<tr>
									<th>@lang('lang.Seller')</th>
									<th>@lang('lang.Plan')</th>
									<th>@lang('lang.amount')</th>
									<th>@lang('lang.payment_method')</th>
									<th>@lang('lang.Transaction_ID')</th>
									<th>@lang('lang.Status')</th>
									<th>@lang('lang.starts_at')</th>
									<th>@lang('lang.ends_at')</th>
									<th>@lang('lang.created_at')</th>
								</tr>
							</thead>
							<tbody>
								@forelse ($payments as $payment)
								<tr>
									<td>
										{{ $payment->seller?->shop_name_en ?? $payment->seller?->name ?? trans('lang.no_data') }}
									</td>
									<td>
										{{ $payment->plan ? (app()->getLocale() == "en" ? $payment->plan->name_en : $payment->plan->name_ar) : trans('lang.no_data') }}
									</td>
									<td>
										{{ $payment->amount }} KWD
									</td>
									<td>
										{{ $payment->payment_method ?? 'Payzah' }}
									</td>
									<td>
										{{ $payment->transaction_id ?? '-' }}
									</td>
									<td>
										@if ($payment->status === 'paid')
											<span class="badge bg-success">@lang('lang.paid')</span>
										@elseif ($payment->status === 'pending')
											<span class="badge bg-warning text-dark">@lang('lang.pending')</span>
										@else
											<span class="badge bg-danger">@lang('lang.failed')</span>
										@endif
									</td>
									<td>
										{{ $payment->starts_at ? $payment->starts_at->format('Y-m-d H:i') : '-' }}
									</td>
									<td>
										{{ $payment->ends_at ? $payment->ends_at->format('Y-m-d H:i') : '-' }}
									</td>
									<td>
										{{ $payment->created_at ? $payment->created_at->format('Y-m-d H:i') : '-' }}
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
<script>
    $(document).ready(function() {
        $('#advance-1').DataTable({
            order: [[8, 'desc']] // Order by created_at desc
        });
    });
</script>
@endsection
