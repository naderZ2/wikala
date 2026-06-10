@extends('admin.layout.master')
@section('title', 'Basic DataTables')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">

@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3> @lang('lang.seller_services')</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item"> @lang('lang.Dashboard')</li>
<li class="breadcrumb-item active">@lang('lang.Categories')</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="d-flex justify-content-end col-sm-12">
				<a href="{{route('admin.sellerServices.create')}}"  class="btn btn-primary">@lang('lang.add_slider')</a>
		</div>
		<div class="col-sm-12 mt-3">
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table class="display" id="advance-1">
							<thead>
								<tr>
									<th>#</th>
									<th>@lang('lang.Seller')</th>
									<th>@lang('lang.Category')</th>
									<th>@lang('lang.Product')</th>
									<th>@lang('lang.date')</th>
									<th>@lang('lang.availability')</th>
								</tr>
							</thead>
							<tbody>
								@forelse ($sellerServices as $service)
									<tr>
										<td>
											{{$loop->iteration}}
										</td>
										<td>
											{{$service?->seller->name}}
										</td>
										<td>
											{{$service?->category?->name_ar}}
										</td>
										<td>
											{{$service?->product?->name_ar}}
										</td>
										<td>
											{{$service?->date}}
										</td>
									
										<td>
											@if ($service->availability == 1)
											<a href="{{ route('admin.sellerServices.updateAvailability',$service->id) }}" class="btn btn-danger mt-1" >
												@lang('lang.not_available')
											</a>

											@else
												<a href="{{ route('admin.sellerServices.updateAvailability',$service->id) }}" class="btn btn-success mt-1" >
													@lang('lang.available')
												</a>
											@endif
										</td>
										
										
									</tr>
								@empty
								@endforelse
							</tbody>
							<tfoot>
								<tr>
									<th>@lang('lang.Seller')</th>
									<th>@lang('lang.Category')</th>
									<th>@lang('lang.Product')</th>
									<th>@lang('lang.date')</th>
									<th>@lang('lang.availability')</th>
								</tr>							
							</tfoot>
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
<script src="{{asset('assets/js/form-validation-custom.js')}}"></script>
<script src="{{asset('assets/js/select2/select2.full.min.js')}}"></script>
<script src="{{asset('assets/js/select2/select2-custom.js')}}"></script>

<script src="{{asset('assets/js/sweet-alert/sweetalert.min.js')}}"></script>
<script src="{{asset('assets/js/sweet-alert/app.js')}}"></script>
@endsection
</script>