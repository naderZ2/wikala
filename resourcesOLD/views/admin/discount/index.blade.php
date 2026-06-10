@extends('admin.layout.master')
@section('title', 'Basic DataTables')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">

@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3> @lang('lang.discounts')</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item"> @lang('lang.Dashboard')</li>
<li class="breadcrumb-item active">@lang('lang.discounts')</li>
@endsection

@section('content')
<div class="container-fluid">

	<div class="row">
		   <div class="d-flex justify-content-end col-sm-12">
				@can('add discount')
					<a href="{{route('discounts.create')}}"  class="btn btn-primary">@lang('lang.add_slider')</a>
				@endcan	
        	</div>
		<div class="col-sm-12 mt-3">
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table class="display" id="advance-1">
							<thead>
								<tr>
									<th>#</th>
									<th>@lang('lang.code')</th>
									<th>@lang('lang.Total_Coupons')</th>
									<th>@lang('lang.User_Coupons')</th>
									<th>@lang('lang.Start_Date')</th>
									<th>@lang('lang.End_Date')</th>
									<th>@lang('lang.Seller')</th>
									<th>@lang('lang.Type')</th>
									<th>@lang('lang.Value')</th>
									<th></th>
									
								</tr>
							</thead>
							<tbody>
                                @foreach ($discounts as $discount )
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{ $discount->code }}</td>
                                        <td>{{ $discount->coupons_number }}</td>
                                        <td>{{ $discount->coupons_user_number }}</td>
                                        <td>{{ $discount->start_date }}</td>
                                        <td>{{ $discount->end_date }}</td>
										<td>
											@foreach ($discount?->sellers as $seller )
												{{ $seller?->name }} <br>
											@endforeach
										</td>
                                        {{-- <td>{{ $discount?->seller?->name }}</td> --}}
                                        <td>{{ $discount->type }}</td>
                                        <td>{{ $discount->value }}</td>
										<td>
											@can('disable discount')
											@if ($discount->active == true)
												<a class="btn btn-danger"  href="{{ route('change_active',$discount->id) }}" >@lang('lang.Disable') </a>

											@else
												<a class="btn btn-success"  href="{{ route('change_active',$discount->id) }}" >@lang('lang.Enable')</a>
											@endif
											@endcan	
										</td>
                                    </tr>
                                @endforeach
							</tbody>
							<tfoot>
								<tr>
									<th>#</th>
									<th>@lang('lang.code')</th>
									<th>@lang('lang.Total_Coupons')</th>
									<th>@lang('lang.User_Coupons')</th>
									<th>@lang('lang.Start_Date')</th>
									<th>@lang('lang.End_Date')</th>
									<th>@lang('lang.Seller')</th>
									<th>@lang('lang.Type')</th>
									<th>@lang('lang.Value')</th>
									<th></th>
									
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

@endsection
