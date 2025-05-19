@extends('admin.layout.master')
@section('title', 'Basic DataTables')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>@lang('lang.Roles')</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">@lang('lang.Users')</li>
<li class="breadcrumb-item active">@lang('lang.Roles')</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
        <div class="row ">
            <div class="d-flex justify-content-end col-sm-12">
				@can('add role')
                <button class="btn btn-primary"  type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal" >@lang('lang.add_Role')</button>
				@endcan	
            </div>
		<div class="col-sm-12">
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table class="display" id="advance-1">
							<thead>
								<tr>
									<th class="text-center">@lang('lang.Name')</th>
									<th></th>								
								</tr>
							</thead>
							<tbody>
								@forelse ($roles as $role)
									<tr>
										<td class="text-center">{{ $role->name }}</td>
										<td class="text-end">
											@can('edit permissions')
												<button class="btn btn-primary" type="button" data-bs-toggle="modal" onclick="getRecord({{ $role }})" data-original-title="test" data-bs-target="#editModal" >@lang('lang.edit')</button>
											@endcan	

											@can('edit permissions')
												<a class="btn btn-primary" href="{{route('admin.permission',$role->id)  }}">@lang('lang.edit_Permissions') </a>
											@endcan	
										</td>
									</tr>
								    @empty
									
								@endforelse
								
							</tbody>
							<tfoot>
							<tr>
									<th class="text-center">@lang('lang.Name')</th>
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
			 <h5 class="modal-title" id="exampleModalLabel">@lang('lang.add_Role')</h5>
			 <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
		  </div>
		  <div class="modal-body">

			<form class="needs-validation" novalidate="" method="POST"  action="{{ route('roles.store') }}">
				@csrf
				<div class="row">
					<div class="col-md-12 mb-3">
						<label for="section_name">@lang('lang.Name')</label>
						<input class="form-control"  type="text" name="name" value="" placeholder="" required="">
						<div class="valid-feedback">Looks good!</div>
						<div class="invalid-feedback">Please choose a name.</div>
					</div>
				</div>
				
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-bs-dismiss="modal">@lang('lang.cancel')</button>
					<button class="btn btn-primary" type="submit">@lang('lang.save')</button>
				 </div>
			</form>

		  </div>
		  
	   </div>
	</div>
</div>


<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

	<div class="modal-dialog" role="document">
	   <div class="modal-content">
		  <div class="modal-header">
			 <h5 class="modal-title" id="exampleModalLabel">@lang('lang.edit_Role')</h5>
			 <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
		  </div>
		  <div class="modal-body">

			<form class="needs-validation" novalidate="" method="POST"  action="{{ route('roles.update') }}">
				@csrf
				<input type="hidden" id="role_id" name="id">
				<div class="row">
					<div class="col-md-12 mb-3">
						<label for="section_name">@lang('lang.Name')</label>
						<input class="form-control"  type="text" name="name" id="role_name" value="" placeholder="" required="">
						<div class="valid-feedback">Looks good!</div>
						<div class="invalid-feedback">Please choose a name.</div>

					</div>
				
				</div>
				
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-bs-dismiss="modal">@lang('lang.cancel')</button>
					<button class="btn btn-primary" type="submit">@lang('lang.edit')</button>
				 </div>
			</form>

		  </div>
		  
	   </div>
	</div>
</div>

@endsection
<script>
	function getRecord(data){
		document.getElementById("role_id").value=data['id'];
		document.getElementById("role_name").value=data['name'];
	}
	</script>
@section('script')

<script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
@endsection