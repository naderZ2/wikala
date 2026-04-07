@extends('admin.layout.master')
@section('title', 'Seller Employees')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
@endsection

@section('style')
<style>
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
<h3>@lang('lang.Employees') - {{ $parentSeller->name }}</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item"> @lang('lang.Sellers') </li>
<li class="breadcrumb-item"><a href="{{ route('seller.edit', $parentSeller->id) }}">{{ $parentSeller->name }}</a></li>
<li class="breadcrumb-item active">@lang('lang.Employees')</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="d-flex justify-content-end mb-3">
				<a href="{{ route('admin.seller.employees.create', $parentSeller->id) }}" class="btn btn-primary">@lang('lang.add_admin')</a>
        	</div>

		<div class="col-sm-12">
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table class="display" id="advance-1">
							<thead>
								<tr>
									<th>@lang('lang.Name')</th>
									<th>@lang('lang.Email')</th>
									<th>Roles</th>
									<th>@lang('lang.Status')</th>
									<th>@lang('lang.joining_date')</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@forelse ($employees as $emp)
									<tr>
										<td>{{ $emp->name }}</td>
										<td>{{ $emp->email }}</td>
										<td>
											@foreach ($emp->roles as $role)
												<span class="badge badge-info">{{ $role->name }}</span>
											@endforeach
										</td>
										<td>
											<span class="badge-active">@lang('lang.active')</span>
										</td>
										<td>{{ $emp->created_at ? $emp->created_at->format('Y-m-d') : '-' }}</td>
										
										<td>
											<a class="btn btn-success btn-sm" href="{{ route('admin.seller.employees.edit', $emp->id) }}">
												@lang('lang.edit')
											</a>
											
											<form action="{{ route('admin.seller.employees.destroy', $emp->id) }}" method="post" id="del_form_{{ $emp->id }}" style="display:inline;">
												@csrf
												@method('DELETE')
												<button class="btn btn-danger btn-sm mt-1" onclick="confirmAction(event, {{ $emp->id }})" type="button">Delete</button>
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
									<th>Roles</th>
									<th>@lang('lang.Status')</th>
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
<script>
function confirmAction(e, id){
    e.preventDefault();
	swal({
		title: "Are you sure you want to delete this employee?",
		icon: "warning",
		buttons: true,
		dangerMode: true,
	})
	.then((willProceed) => {
		if (willProceed) {
			document.getElementById("del_form_" + id).submit();
		}
	});
}
</script>
@endsection
