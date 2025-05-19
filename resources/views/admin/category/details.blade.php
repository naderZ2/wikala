@extends('admin.layout.master')
@section('title', 'Basic DataTables')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">

@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3> @lang('lang.Categories')</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item"> @lang('lang.Dashboard')</li>
<li class="breadcrumb-item active">@lang('lang.Categories')</li>
@endsection

@section('content')
<div class="container-fluid">

	<div class="row">
	      <div class="d-flex justify-content-end col-sm-12">
				@can('add category')
					<a href="{{route('category.create')}}"  class="btn btn-primary">@lang('lang.add_slider')</a>
				@endcan	
        	</div>
		<div class="col-sm-12 mt-3">
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table class="display" id="advance-1">
							<thead>
								<tr>
									<th>@lang('lang.order')</th>
									<th>@lang('lang.Name')</th>
									<th>@lang('lang.Image')</th>
									<th>@lang('lang.Status')</th>
									<th></th>									
								</tr>
							</thead>
							<tbody>
								@forelse ($categories as $category)
									<tr>
										<td >
											{{$category->order}}
										</td>
										<td>
											{{ app()->getLocale() == "en"? $category->name_en:$category->name_ar }}
										</td>
					
										<td >
											<img src="{{ asset($category->image) }}"  alt=""  class="image-fluid"  height="90">
										</td>
									
										<td>
											@if ($category->end_point ==1)
												@lang('lang.active')
											@else
												@lang('lang.inactive')
												
											@endif
										</td>										
										
										<td>
											@can('edit category')
											<a class="btn btn-success"  href="{{ route('category_updateStatus',$category->id) }}">
												@lang('lang.change_status')</a>
											<button class="btn btn-primary" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal"  onclick="getRecord({{ $category }})">@lang('lang.edit')</button>
											{{-- <button class="btn btn-secondary" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal">Delete</button> --}}
											@endcan	
										</td>
							
									</tr>
								@empty
									
								@endforelse
								
							</tbody>
							<tfoot>
								<tr>
									<th>@lang('lang.order')</th>
									<th>@lang('lang.Name')</th>
									<th>@lang('lang.Image')</th>
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
			 <h5 class="modal-title" id="exampleModalLabel">@lang('lang.edit')</h5>
			 <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
		  </div>
		  <div class="modal-body">

			<form class="needs-validation" novalidate="" method="POST" enctype="multipart/form-data" action="{{ route('category.update') }}">
				@csrf
				<input type="hidden" id="section_id" name="id">
				<div class="row">
					<div class="col-md-12 mb-3">
						<label for="section_name">@lang('lang.name_ar')</label>
						<input class="form-control" id="section_name_ar" type="text" name="name_ar" value="" placeholder="name" required="">
						<div class="valid-feedback">Looks good!</div>
						<div class="invalid-feedback">Please choose a name.</div>

					</div>
					<div class="col-md-12 mb-3">
						<label for="section_name">@lang('lang.name_en')</label>
						<input class="form-control" id="section_name_en" type="text" name="name_en" value="" placeholder="name" required="">
						<div class="valid-feedback">Looks good!</div>
						<div class="invalid-feedback">Please choose a name.</div>

					</div>
				
				</div>
				<div class="col-md-12 mb-3">
					<label for="section_name">@lang('lang.order')</label>
					<input class="form-control" id="section_order" type="number" name="order" value="" placeholder="order" required="">
					<div class="valid-feedback">Looks good!</div>
					<div class="invalid-feedback">Please choose a order.</div>
				</div>

				<div class="mb-3">
					<div class="col-md-12 mb-3">
						<div class="col">
							<div class="mb-3 row">
								<label class="col-sm-3 col-form-label">@lang('lang.Image')</label>
								<div class="col-sm-9">
									<input class="form-control" type="file" name="image"  accept="image/*">
								</div>
							</div>
						</div>
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

@endsection

<script>

	function getRecord(data){
	    document.getElementById("section_name_ar").value=data['name_ar'];
	    document.getElementById("section_name_en").value=data['name_en'];
	    document.getElementById("section_order").value=data['order'];
	    document.getElementById("section_id").value=data['id'];
   }
</script>