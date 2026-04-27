@extends('admin.layout.master')
@section('title', 'Permissions')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
@endsection

@section('breadcrumb-title')
<h3>@lang('lang.permissions')</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">@lang('lang.Users')</li>
<li class="breadcrumb-item active">@lang('lang.permissions')</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="d-flex justify-content-end col-sm-12 mb-3">
			@can('create permission')
				<button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#addPermissionModal">@lang('lang.add_permission')</button>
			@endcan
		</div>

		<div class="col-sm-12">
			<div class="card">
				<div class="card-body">

					@if ($errors->any())
						<div class="alert alert-danger"><ul class="mb-0">@foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
					@endif

					<div class="table-responsive">
						<table class="display" id="advance-1">
							<thead>
								<tr>
									<th>#</th>
									<th>@lang('lang.Name')</th>
									<th>@lang('lang.guard')</th>
									<th class="text-end"></th>
								</tr>
							</thead>
							<tbody>
								@forelse ($permissions as $permission)
									<tr>
										<td>{{ $loop->iteration }}</td>
										<td>{{ $permission->name }}</td>
										<td>{{ $permission->guard_name }}</td>
										<td class="text-end">
											@can('update permission')
											<button class="btn btn-success btn-sm m-1" type="button" data-bs-toggle="modal" data-bs-target="#editPermissionModal" onclick="fillPermission({{ $permission }})">@lang('lang.edit')</button>
											@endcan
											@can('delete permission')
											<form action="{{ route('admin.permissions.destroy', $permission->id) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Are you sure?');">
												@csrf
												@method('DELETE')
												<button type="submit" class="btn btn-danger btn-sm m-1">@lang('lang.remove')</button>
											</form>
											@endcan
										</td>
									</tr>
								@empty
									<tr><td colspan="4" class="text-center text-muted">@lang('lang.no_data')</td></tr>
								@endforelse
							</tbody>
							<tfoot>
								<tr>
									<th>#</th>
									<th>@lang('lang.Name')</th>
									<th>@lang('lang.guard')</th>
									<th></th>
								</tr>
							</tfoot>
						</table>
					</div>

					<hr class="my-4">

					<h5 class="mb-3">@lang('lang.Roles')</h5>
					<a href="{{ route('roles.index') }}" class="btn btn-info">@lang('lang.manage_roles')</a>
					<small class="text-muted d-block mt-2">@lang('lang.permissions_role_hint')</small>
				</div>
			</div>
		</div>
	</div>
</div>

{{-- Add Permission Modal --}}
<div class="modal fade" id="addPermissionModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">@lang('lang.add_permission')</h5>
				<button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form method="POST" action="{{ route('admin.permissions.store') }}">
				@csrf
				<div class="modal-body">
					<div class="mb-3">
						<label>@lang('lang.Name')</label>
						<input class="form-control" type="text" name="name" placeholder="e.g. edit ads" required>
					</div>
					<div class="mb-3">
						<label>@lang('lang.guard')</label>
						<select class="form-control" name="guard_name">
							<option value="admin">admin</option>
							<option value="seller-api">seller-api</option>
							<option value="web">web</option>
							<option value="api">api</option>
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('lang.close')</button>
					<button type="submit" class="btn btn-primary">@lang('lang.save')</button>
				</div>
			</form>
		</div>
	</div>
</div>

{{-- Edit Permission Modal --}}
<div class="modal fade" id="editPermissionModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">@lang('lang.edit_permission')</h5>
				<button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form method="POST" action="{{ route('admin.permissions.update') }}">
				@csrf
				<input type="hidden" name="id" id="edit_permission_id">
				<div class="modal-body">
					<div class="mb-3">
						<label>@lang('lang.Name')</label>
						<input class="form-control" type="text" name="name" id="edit_permission_name" required>
					</div>
					<div class="mb-3">
						<label>@lang('lang.guard')</label>
						<select class="form-control" name="guard_name" id="edit_permission_guard">
							<option value="admin">admin</option>
							<option value="seller-api">seller-api</option>
							<option value="web">web</option>
							<option value="api">api</option>
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('lang.close')</button>
					<button type="submit" class="btn btn-primary">@lang('lang.save')</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection

<script>
function fillPermission(p){
	document.getElementById('edit_permission_id').value   = p.id;
	document.getElementById('edit_permission_name').value = p.name;
	const g = document.getElementById('edit_permission_guard');
	for (let i = 0; i < g.options.length; i++) {
		if (g.options[i].value === p.guard_name) { g.selectedIndex = i; break; }
	}
}
</script>

@section('script')
<script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
@endsection
