@extends('admin.layout.master')
@section('title', 'Basic DataTables')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">

@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3> @lang('lang.events')</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item"> @lang('lang.Dashboard')</li>
<li class="breadcrumb-item active">@lang('lang.events')</li>
@endsection

@section('content')
<div class="container-fluid">
   <div class="d-flex justify-content-end col-sm-12">
				@can('add discount')
					<a href="{{route('daily_events.create')}}"  class="btn btn-primary">@lang('lang.add_slider')</a>
				@endcan	
        	</div>
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
									<!--<th>@lang('lang.Image')</th>-->
									<th>@lang('lang.Image')</th>
									<th>@lang('lang.date')</th>
									<th>@lang('lang.Status')</th>
									<th></th>									
								</tr>
							</thead>
							<tbody>
								@forelse ($dailyEvents as $dailyEvent)
									<tr>
										<td>
											{{ $dailyEvent?->eventCategory?->name }}
										</td>
					
										<td>{{$dailyEvent->family_name}}</td>
										<!--<td >-->
										<!--	<img src="{{ asset($dailyEvent->eventCategory?->image) }}"  alt=""  class="image-fluid"  height="90">-->
										<!--</td>-->
										<td >
											<img src="{{ asset($dailyEvent?->image) }}"  alt=""  class="image-fluid"  height="90">
										</td>
										<td>
										{{$dailyEvent->date ." ".$dailyEvent->time}}
										</td>										
										<td>
										   
											@if ($dailyEvent->active ==1)
												@lang('lang.active')
											@else
												@lang('lang.inactive')
												
											@endif
										</td>										
										
										<td>
										<a class="btn btn-success"  href="{{ route('daily_events.details',$dailyEvent->id) }}">
												@lang('lang.details')</a>

												<input type="hidden" name="id" id="teest">

												@if (request()->get('eventiFlter') == 'under_review')
											<button class="btn btn-danger" type="button" data-bs-toggle="modal" onclick="getId({{ $dailyEvent->id }})" data-original-title="test" data-bs-target="#exampleModal" >@lang('lang.rejected')</button>

										<!--@can('edit seller status')-->
	
	
													
													
												
	
										<!--			<button id="{{ $loop->iteration }}" name='sasa'   class="btn btn-danger" onclick="rejection()" type="button" >@lang('lang.rejected')</button>-->
	
													
										<!--			@endcan	-->
										<!--		</form>-->

												@endif
												


												@if (request()->get('eventiFlter') == 'rejected')

												<button id="{{ $loop->iteration }}" class="btn btn-danger" onclick="reason(document.getElementById('reason'+{{$dailyEvent->id}}).value)" type="button" >@lang('lang.rejection_reason')</button>
												<input type="hidden" id="reason{{$dailyEvent->id}}" value="{{$dailyEvent?->rejection_reason}}" name="reason">
												
												@endif
												<form method="POST" action="{{route('daily_events.destroy',$dailyEvent->id)}}" style="display: inline-block">
													@csrf
													<button  class="btn btn-danger"  >@lang('lang.Delete')</button>
													{{-- <a href="{{route('daily_events.destroy')}}" class="btn btn-danger"   >@lang('lang.rejection_reason')</a> --}}
												</form>

										</td>
							
									</tr>
								@empty
									
								@endforelse
								
							</tbody>
							<tfoot>
								<tr>
									<th>@lang('lang.Name')</th>
									<th>@lang('lang.parent_category')</th>
									<!--<th>@lang('lang.Image')</th>-->
									<th>@lang('lang.Image')</th>
									<th>@lang('lang.date')</th>
									<th>@lang('lang.Status')</th>
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
			 <h5 class="modal-title" id="exampleModalLabel">@lang('lang.rejection_reason')</h5>
			 <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
		  </div>
		  <div class="modal-body">

			<form class="needs-validation" novalidate="" method="POST"  action="{{ route('daily_events.rejection') }}">
				@csrf
				<input type="hidden" id="client_id"  name="id">
				<div class="row">
					<div class="col-md-12 mb-3">
						<label for="section_name">@lang('lang.rejection_reason')</label>
						<input class="form-control" id="rejection_reason" type="text" name="rejection_reason" value="" placeholder="" required="">
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

// 	function getId(id){
// 			document.getElementById("reason").value=id;
			
			
// 	   }
	   
// 	   function getRndInteger() {
//   	let password=Math.floor(Math.random() * (99999999 - 11111111)) + 11111111;
// 	  document.getElementById("password").value=password;
// 	}

	function getId(id){
	    if(id){
	        document.getElementById("client_id").value=id;
	    }
	}
	</script>


</script>