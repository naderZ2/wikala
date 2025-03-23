@extends('admin.layout.master')
@section('title', 'Basic DataTables')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>@lang('lang.Clients')</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">@lang('lang.Users')</li>
<li class="breadcrumb-item active">@lang('lang.Clients')</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">

		<div class="col-sm-12">
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table class="display" id="advance-1">
							<thead>
								<tr>
									<th>@lang('lang.Name')</th>
									<th class="text-center">@lang('lang.phone')</th>
									<th class="text-center">@lang('lang.Email')</th>
									<th>@lang('lang.joining_date')</th>
									<th></th>								
								</tr>
							</thead>
							<tbody>
								@forelse ($clients as $client)
									<tr>
										<td>{{ $client->name }}</td>
										<td class="text-center">{{ $client->phone}}</td>
										<td>{{ $client->email}}</td>
										<td>{{ $client?->created_at?->format('Y-m-d') }}</td>
										<td>
											<button class="btn btn-primary" type="button" data-bs-toggle="modal" onclick="getRndInteger(),getId({{ $client->id }})" data-original-title="test" data-bs-target="#exampleModal" >@lang('lang.reset_password')</button>

										</td>
									</tr>
								@empty
									
								@endforelse
								
							</tbody>
							<tfoot>
							<tr>
									<th>@lang('lang.Name')</th>
									<th class="text-center">@lang('lang.phone')</th>
									<th class="text-center">@lang('lang.Email')</th>
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


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">


	<div class="modal-dialog" role="document">
	   <div class="modal-content">
		  <div class="modal-header">
			 <h5 class="modal-title" id="exampleModalLabel">@lang('lang.reset_password')</h5>
			 <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
		  </div>
		  <div class="modal-body">

			<form class="needs-validation" novalidate="" method="POST"  action="{{ route('admin.clients.reset_password') }}">
				@csrf
				<input type="hidden" id="client_id" name="client_id">
				<div class="row">
					<div class="col-md-12 mb-3">
						<label for="section_name">New Password</label>
						<input class="form-control" id="password" type="text" name="password" value="" placeholder="******" required="">
						<div class="valid-feedback">Looks good!</div>
						<div class="invalid-feedback">Please choose a name.</div>

					</div>
				
				</div>
				
				<div class="modal-footer">
					<button class="btn btn-primary" type="button" data-bs-dismiss="modal">@lang('lang.close')</button>
					<button class="btn btn-secondary" type="submit">@lang('lang.edit')</button>
				 </div>
			</form>

		  </div>
		  
	   </div>
	</div>
 </div>

@endsection
<script>
	function getRndInteger() {
  	let password=Math.floor(Math.random() * (99999999 - 11111111)) + 11111111;
	  document.getElementById("password").value=password;
	}

	function getId(id){
		document.getElementById("client_id").value=id;
	}
	</script>
@section('script')

<script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
@endsection