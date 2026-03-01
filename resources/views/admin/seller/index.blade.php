@extends('admin.layout.master')
@section('title', 'Sellers')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
@endsection

@section('style')
<style>
.seller-tabs .nav-link {
    font-weight: 500;
    padding: 10px 20px;
    border-radius: 5px;
    margin-right: 5px;
}
.seller-tabs .nav-link.active {
    background-color: #7366ff;
    color: #fff;
}
.badge-pending {
    background-color: #f39c12;
    color: #fff;
    padding: 3px 10px;
    border-radius: 12px;
    font-size: 12px;
}
.badge-active {
    background-color: #27ae60;
    color: #fff;
    padding: 3px 10px;
    border-radius: 12px;
    font-size: 12px;
}
</style>
@endsection

@section('breadcrumb-title')
<h3>@lang('lang.Sellers')</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item"> @lang('lang.Users')	</li>
<li class="breadcrumb-item active">@lang('lang.Sellers')	 </li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			{{-- Status filter tabs --}}
			<ul class="nav nav-pills seller-tabs mb-3">
				<li class="nav-item">
					<a class="nav-link {{ $status == 'all' ? 'active' : '' }}" href="{{ route('seller.index') }}">
						@lang('lang.all') ({{ $allCount }})
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link {{ $status == 'pending' ? 'active' : '' }}" href="{{ route('seller.index', ['status' => 'pending']) }}">
						<i class="fa fa-clock-o"></i> Pending Requests ({{ $pendingCount }})
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link {{ $status == 'active' ? 'active' : '' }}" href="{{ route('seller.index', ['status' => 'active']) }}">
						<i class="fa fa-check-circle"></i> Active ({{ $activeCount }})
					</a>
				</li>
			</ul>

			<div class="d-flex justify-content-end mb-3">
				@can('add seller')
					<a href="{{route('seller.create')}}" class="btn btn-primary">@lang('lang.add_Seller')</a>
				@endcan	
        	</div>

		<!-- Column rendering  Starts-->
		<div class="col-sm-12">
			<div class="card">
				
				<div class="card-body">
					<div class="table-responsive">
						<table class="display" id="advance-1">
							<thead>
								<tr>
									<th>@lang('lang.Name')</th>
									<th>Phone</th>
									<th>Shop Name</th>
									<th>@lang('lang.Email')</th>
									<th>@lang('lang.Categories')</th>
									<th>@lang('lang.Status')</th>
									<th>@lang('lang.Image')</th>
									<th>@lang('lang.joining_date')</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@forelse ($sellers as $seller)
									<tr>
										<td>{{ $seller->name }}</td>
										<td>{{ $seller->phone ?? '-' }}</td>
										<td>{{ $seller->shop_name_en ?? $seller->shop_name_ar ?? '-' }}</td>
										<td>{{ $seller->email }}</td>
										<td>
											@foreach ($seller->categories as $category )
												{{ $category->name }} <br>
											@endforeach
										</td>
										<td>
											@if ($seller->active == 1)
												<span class="badge-active">@lang('lang.active')</span>
											@else
												<span class="badge-pending">Pending</span>
											@endif
										</td>
										<td >
											<img src="{{ asset($seller?->img_path) }}"  alt=""  class="image-fluid rounded-circle"  height="50" width="50">
										</td>
										<td>{{ $seller->created_at ? $seller->created_at->format('Y-m-d') : '-' }}</td>
										
										<td>
											@can('edit seller')
											<a class="btn btn-success btn-sm"  href="{{ route('seller.edit',$seller->id) }}">
												@lang('lang.edit')										
											</a>
											
											<a class="btn btn-warning btn-sm mt-1" href="{{ route('seller.delivery-options', $seller->id) }}">
												@lang('lang.delivery_options')
											</a>
											@endcan	
										
										
											<form action="{{ route('seller.change_activity_status') }}" onclick="getId({{ $seller->id }})" method="post" id="form_id" style="display:inline;">
												@csrf
												<input type="hidden" name="id" id="seller_id_{{ $seller->id }}">
												@can('edit seller status')

												
												@if ($seller->active == 1)
												<button id="{{ $loop->iteration }}" class="btn btn-danger btn-sm mt-1 sweet-5" onclick="setId({{ $seller->id }})" type="button" >@lang('lang.deactivation')</button>
												@else
												<button id="{{ $loop->iteration }}" class="btn btn-primary btn-sm mt-1 sweet-5" onclick="setId({{ $seller->id }})" type="button" >@lang('lang.activation')</button>
												@endif

												
												@endcan	
											</form>
										
										</td>
									</tr>
								@empty
									
								@endforelse
								
							</tbody>
							<tfoot>
								<tr>
									<th>@lang('lang.Name')</th>
									<th>Phone</th>
									<th>Shop Name</th>
									<th>@lang('lang.Email')</th>
									<th>@lang('lang.Categories')</th>
									<th>@lang('lang.Status')</th>
									<th>@lang('lang.Image')</th>
									<th>@lang('lang.joining_date')</th>
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
</div>
@endsection

@section('script')
<script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
<script src="{{asset('assets/js/sweet-alert/sweetalert.min.js')}}"></script>
<script src="{{asset('assets/js/sweet-alert/app.js')}}"></script>
<script>

function getId(id){
	    document.getElementById("seller_id").value=id;
   }

function setId(id){
	document.getElementById("seller_id_" + id).value = id;
}
</script>
@endsection