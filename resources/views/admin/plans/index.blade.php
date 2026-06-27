@extends('admin.layout.master')
@section('title', 'Plans')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
@endsection

@section('breadcrumb-title')
<h3>@lang('lang.plans')</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">@lang('lang.Dashboard')</li>
<li class="breadcrumb-item active">@lang('lang.plans')</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="d-flex justify-content-end col-sm-12">
			<a href="{{route('plans.create')}}" class="btn btn-primary">@lang('lang.add_plan')</a>
		</div>
		<div class="col-sm-12 mt-3">
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table class="display" id="advance-1">
							<thead>
								<tr>
									<th>@lang('lang.Name')</th>
									<th>@lang('lang.description')</th>
									<th>@lang('lang.price')</th>
									<th>@lang('lang.Status')</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@forelse ($plans as $plan)
								<tr>
									<td>
										{{ app()->getLocale() == "en" ? $plan->name_en : $plan->name_ar }}
									</td>
									<td>
										{{ app()->getLocale() == "en" ? $plan->description_en : $plan->description_ar }}
									</td>
									<td>
										{{ $plan->price }} KWD
									</td>
									<td>
										@if ($plan->is_active)
											<span class="badge bg-success">@lang('lang.active')</span>
										@else
											<span class="badge bg-danger">@lang('lang.deactivated')</span>
										@endif
									</td>
									<td>
										<a class="btn btn-primary" href="{{ route('plans.edit', $plan->id) }}">@lang('lang.edit')</a>
										<a class="btn btn-warning" href="{{ route('plans.toggle', $plan->id) }}">
											{{ $plan->is_active ? __('lang.deactivation') : __('lang.activation') }}
										</a>
										<form action="{{ route('plans.destroy', $plan->id) }}" method="POST" style="display:inline-block">
											@csrf
											@method('DELETE')
											<input type="hidden" name="id" value="{{ $plan->id }}">
											<button type="submit" class="btn btn-danger" style="display:inline-block"
												onclick="return confirm('@lang('lang.are_you_sure_delete')');">
												@lang('lang.delete')
											</button>
										</form>
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
<script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
@endsection
