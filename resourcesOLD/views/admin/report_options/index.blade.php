@extends('admin.layout.master')
@section('title', 'Basic DataTables')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">

@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3> @lang('lang.report_options')</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item"> @lang('lang.Dashboard')</li>
<li class="breadcrumb-item active">@lang('lang.report_options')</li>
@endsection

@section('content')
<div class="container-fluid">



@if ($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
				<li >{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif

	<div class="row">
       <div class="d-flex justify-content-end col-sm-12">
				{{-- @can('add role') --}}
                <button class="btn btn-primary"  type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModalAdd" >@lang('lang.add_report_options')</button>
				{{-- @endcan	 --}}
        	</div>
		<div class="col-sm-12 mt-3">
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table class="display" id="advance-1">
							<thead>
								<tr>
									<th>#</th>
									<th>@lang('lang.title_ar')</th>
									<th>@lang('lang.title_en')</th>
									{{-- <th>@lang('lang.Enable')</th> --}}
									<th></th>									
								</tr>
							</thead>
							<tbody>
								@forelse ($reportOption as $Option)
									<tr>
										<td>
											{{ $loop->iteration }}
										</td>
					
										<td >
											{{$Option?->title_ar }}
										</td>							
										<td >
											{{$Option?->title_en }}
										</td>							
															
										
										<td>
											{{-- @dd($Option) --}}
											@if ($Option->enable == 1)

											<a class="btn btn-danger m-1"  href="{{ route('reportOption.enable', $Option->id) }}" >@lang('lang.Disable') </a>
										@else
												<a class="btn btn-success m-1"  href="{{ route('reportOption.enable', $Option->id) }}" >@lang('lang.Enable')</a>
										@endif	
											{{-- @can('edit category') --}}
											<button class="btn btn-primary" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal"  onclick="getRecord({{ $Option }})">@lang('lang.edit')</button>
											{{-- <button class="btn btn-secondary" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal">Delete</button> --}}
											{{-- @endcan	 --}}

                                            {{-- <form action="{{ route('rejected-reasons.destroy') }}" onclick="getId({{ $reason->id }})" method="Post" id="form_id">
                                                @method("delete")
                                                @csrf
                                                <input type="hidden" name="id" id="notification_id">
                                                @can('delete notification')
                                                <button id="{{ $loop->iteration }}" class="btn btn-danger sweet-5" onclick="test()" type="button" >@lang('lang.remove')</button>
                                                @endcan	
                                            </form> --}}
										</td>
							
									</tr>
								@empty
									
								@endforelse
								
							</tbody>
							<tfoot>
								<tr>
									<th>#</th>
									<th>@lang('lang.title_ar')</th>
									<th>@lang('lang.title_en')</th>
									{{-- <th>@lang('lang.Enable')</th> --}}
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


<div class="modal fade" id="exampleModalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">


	<div class="modal-dialog" role="document">
	   <div class="modal-content">
		  <div class="modal-header">
			 <h5 class="modal-title" id="exampleModalLabel">@lang('lang.add_report_options')</h5>
			 <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
		  </div>
		  <div class="modal-body">

			<form class="needs-validation" novalidate="" method="POST" enctype="multipart/form-data" action="{{ route('reportOption.store') }}">
				@csrf
				<div class="mb-3">
					
					<div class="col-md-12 mb-3">
						<label for="validationCustom01">@lang('lang.title_ar')</label>
						<input class="form-control" id="validationCustom01" type="text" name="title_ar" value="{{ old('title_ar') }}" placeholder="" >
						<div class="valid-feedback">Looks good!</div>
						<div class="invalid-feedback">Please choose a title_ar.</div>
					</div>	
					<div class="col-md-12 mb-3">
						<label for="validationCustom01">@lang('lang.title_en')</label>
						<input class="form-control" id="validationCustom01" type="text" name="title_en" value="{{ old('title_en') }}" placeholder="" >
						<div class="valid-feedback">Looks good!</div>
						<div class="invalid-feedback">Please choose a title_en.</div>
					</div>	
						


				</div>
				{{-- <button class="btn btn-primary" type="submit">Submit form</button> --}}
				<div class="modal-footer">
					<button class="btn btn-primary" type="button" data-bs-dismiss="modal">@lang('lang.close')</button>
					<button class="btn btn-secondary" type="submit">@lang('lang.save')</button>
				 </div>
			</form>

		  </div>
		  
	   </div>
	</div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">


	<div class="modal-dialog" role="document">
	   <div class="modal-content">
		  <div class="modal-header">
			 <h5 class="modal-title" id="exampleModalLabel">@lang('lang.edit')</h5>
			 <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
		  </div>
		  <div class="modal-body">

			<form class="needs-validation" novalidate="" method="POST" enctype="multipart/form-data" action="{{ route('reportOption.update') }}">
				@csrf
				<input type="hidden" id="section_id" name="id">
				
				
				<div class="mb-3">
					<div class="col-md-12 mb-3">
						<label for="validationCustom01">@lang('lang.title_ar')</label>
						<input class="form-control" id="section_title_ar" type="text" name="title_ar" value="{{ old('title_ar') }}" placeholder="" >
						<div class="valid-feedback">Looks good!</div>
						<div class="invalid-feedback">Please choose a title_ar.</div>
					</div>
					<div class="col-md-12 mb-3">
						<label for="validationCustom01">@lang('lang.title_en')</label>
						<input class="form-control" id="section_title_en" type="text" name="title_en" value="{{ old('title_en') }}" placeholder="" >
						<div class="valid-feedback">Looks good!</div>
						<div class="invalid-feedback">Please choose a title_en.</div>
					</div>
					
					
				</div>
				{{-- <button class="btn btn-primary" type="submit">Submit form</button> --}}
				<div class="modal-footer">
					<button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close</button>
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

	function getRecord(data){
	    document.getElementById("section_id").value=data['id'];
	    document.getElementById("section_title_en").value=data['title_en'];
	    document.getElementById("section_title_ar").value=data['title_ar'];
	    // document.getElementById("section_enable").value=data['link'];
   }

   function getId(id){
	    document.getElementById("notification_id").value=id;
   }
</script>