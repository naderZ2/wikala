@extends('admin.layout.master')
@section('title', 'Basic DataTables')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">

@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3> @lang('lang.specialRequest')</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item"> @lang('lang.Dashboard')</li>
<li class="breadcrumb-item active">@lang('lang.Categories')</li>
@endsection

@section('content')
<div class="container-fluid">

	<div class="row">
		<div class="col-sm-12 mt-3">
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table class="display" id="advance-1">
							<thead>
								<tr>
									<th>@lang('lang.Category')</th>
									<th>@lang('lang.family_name')</th>
									<th>@lang('lang.regions')</th>
									<th>@lang('lang.budget')</th>
									<th>@lang('lang.date')</th>
									<th></th>									
								</tr>
							</thead>
							<tbody>
								@forelse ($specialRequests as $specialRequest)
									<tr>
										<td>
											{{app()->getLocale() == "en"? $specialRequest?->category?->name_en:$specialRequest?->category?->name_ar  }}
										</td>
					
										<td>{{  $specialRequest->family_name}}</td>
										<td >
											{{app()->getLocale() == "en"? $specialRequest?->area?->name_en:$specialRequest?->area?->name_ar  }}
										</td>
										<td >
											{{$specialRequest->budget}}
										</td>
										<td>
											{{ $specialRequest->date}}
										</td>										
										<td>
										<a class="btn btn-success"  href="{{route('admin.specialRequest.details',$specialRequest->id)}}">
												@lang('lang.details')</a>
										</td>
							
									</tr>
								@empty
									
								@endforelse
								
							</tbody>
							<tfoot>
								<tr>
									<th>@lang('lang.Category')</th>
									<th>@lang('lang.family_name')</th>
									<th>@lang('lang.regions')</th>
									<th>@lang('lang.budget')</th>
									<th>@lang('lang.date')</th>
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

<script src="{{asset('assets/js/sweet-alert/sweetalert.min.js')}}"></script>
<script src="{{asset('assets/js/sweet-alert/app.js')}}"></script>
@endsection
<script>

	function getId(id){
			document.getElementById("reason").value=id;
			
			
	   }
	</script>


</script>