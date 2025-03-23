@extends('admin.layout.master')
@section('title', 'Basic DataTables')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>@lang('lang.admins')</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item"> @lang('lang.Users')</li>
<li class="breadcrumb-item active">@lang('lang.admins') </li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
	       <div class="d-flex justify-content-end col-sm-12">
				@can('add admin')
					<a href="{{route('admins.create')}}"  class="btn btn-primary">@lang('lang.add_slider')</a>
				@endcan	
        	</div>
		<div class="col-sm-12">
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table class="display" id="advance-1">
							<thead>
								<tr>
									<th> @lang('lang.Name')</th>
									<th>@lang('lang.Email')</th>
									<th class="text-center">@lang('lang.Status')</th>
									<th>@lang('lang.joining_date')</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@forelse ($admins as $driver)
									<tr>
										<td>{{ $driver->name }}</td>
										<td>{{ $driver->email }}</td>
										<td class="text-center">
											@if ($driver->active == 1)
												<span class="font-success">@lang('lang.active')</span>
											@else
											<span class="font-danger">@lang('lang.inactive')</span>
											@endif
										</td>
										<td>{{ $driver->created_at->format('Y-m-d') }}</td>
										<td>
											@can('edit admin')
											<a class="btn btn-success"  href="{{ route('admins.edit',$driver->id) }}">
												@lang('lang.edit')</a>
											@endcan	
										
											
											{{-- <form action="{{ route('driver.change_activity_status') }}" onclick="getId({{ $driver->id }})" method="post" id="form_id">
												@csrf
												<input type="hidden" name="id" id="seller_id">
												<button id="{{ $loop->iteration }}" class="btn btn-primary sweet-5" onclick="test()" type="button" >@lang('lang.change_status')</button>
											</form> --}}
										
										</td>
									</tr>
								@empty
									
								@endforelse
								
							</tbody>
							<tfoot>
								<tr>
									<th>@lang('lang.Name')</th>
									<th>@lang('lang.Email')</th>
									<th class="text-center">@lang('lang.Status')</th>
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