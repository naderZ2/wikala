@extends('admin.layout.master')
@section('title', 'Basic DataTables')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>@lang('lang.Sellers')	</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item"> @lang('lang.Users')	</li>
<li class="breadcrumb-item active">@lang('lang.Sellers')	 </li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		  <div class="d-flex justify-content-end col-sm-12">
				@can('add seller')
					<a href="{{route('seller.create')}}"  class="btn btn-primary">@lang('lang.add_slider')</a>
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
										<td>{{ $seller->email }}</td>
										<td>
											@foreach ($seller->categories as $category )
												{{ $category->name }} <br>
											@endforeach
										</td>
										<td>
											@if ($seller->active == 1)
												<span class="font-success">@lang('lang.active')</span>
											@else
												<span class="font-danger">@lang('lang.inactive')</span>
											@endif
										</td>
										<td >
											<img src="{{ asset($seller?->img_path) }}"  alt=""  class="image-fluid"  height="90" width="90">
										</td>
										<td>{{ $seller->created_at->format('Y-m-d') }}</td>
										
										<td>
											@can('edit seller')
											<a class="btn btn-success"  href="{{ route('seller.edit',$seller->id) }}">
												@lang('lang.edit')											
											</a>
											@endcan	
										
										
											<form action="{{ route('seller.change_activity_status') }}" onclick="getId({{ $seller->id }})" method="post" id="form_id">
												@csrf
												<input type="hidden" name="id" id="seller_id">
												@can('edit seller status')


												
												@if ($seller->active == 1)
												<button id="{{ $loop->iteration }}" class="btn btn-danger mt-1 sweet-5" onclick="test()" type="button" >@lang('lang.deactivation')</button>
												@else
												<button id="{{ $loop->iteration }}" class="btn btn-success mt-1 sweet-5" onclick="test()" type="button" >@lang('lang.activation')</button>
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
</script>
@endsection