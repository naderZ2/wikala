@extends('admin.layout.master')
@section('title', 'Basic DataTables')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">

@endsection

@section('style')
<style>
    #uploadOverlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.6);
        z-index: 99999;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }
    #uploadOverlay.active {
        display: flex;
    }
    .upload-spinner {
        width: 60px;
        height: 60px;
        border: 5px solid rgba(255,255,255,0.3);
        border-top: 5px solid #fff;
        border-radius: 50%;
        animation: spin 0.8s linear infinite;
    }
    @keyframes spin {
        to { transform: rotate(360deg); }
    }
    .upload-text {
        color: #fff;
        margin-top: 18px;
        font-size: 18px;
        font-weight: 500;
    }
    .upload-progress {
        color: rgba(255,255,255,0.8);
        margin-top: 8px;
        font-size: 14px;
    }
</style>
@endsection

@section('breadcrumb-title')
<h3> @lang('lang.slider')</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item"> @lang('lang.Dashboard')</li>
<li class="breadcrumb-item active">@lang('lang.slider')</li>
@endsection

@section('content')
<!-- Upload Loading Overlay -->
<div id="uploadOverlay">
    <div class="upload-spinner"></div>
    <div class="upload-text">Uploading... Please wait</div>
    <div class="upload-progress" id="uploadProgress"></div>
</div>
<div class="container-fluid">

	<div class="row">
       <div class="d-flex justify-content-end col-sm-12">
				@can('add role')
                <button class="btn btn-primary"  type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModalAdd" >@lang('lang.add_slider')</button>
				@endcan	
        	</div>
		<div class="col-sm-12 mt-3">
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table class="display" id="advance-1">
							<thead>
								<tr>
									<th>#</th>
									<th>@lang('lang.Image')</th>
									<th>Type</th>
									<th></th>									
								</tr>
							</thead>
							<tbody>
								@forelse ($sliders as $category)
									<tr>
										<td>
											{{ $loop->iteration }}
										</td>
					
										<td>
											@if($category->type == 'video')
												<video src="{{ asset($category->video) }}" height="90" muted autoplay loop style="max-width:160px;"></video>
											@else
												<img src="{{ asset($category->name) }}" alt="" class="image-fluid" height="90">
											@endif
										</td>
										<td>
											<span class="badge {{ $category->type == 'video' ? 'bg-primary' : ($category->type == 'gif' ? 'bg-warning' : 'bg-success') }}">{{ $category->type ?? 'image' }}</span>
										</td>							
										
										<td>
											@can('edit category')
											<button class="btn btn-primary" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal"  onclick="getRecord({{ $category }})">@lang('lang.edit')</button>
											{{-- <button class="btn btn-secondary" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal">Delete</button> --}}
											@endcan	

                                            <form action="{{ route('slider.destroy') }}" onclick="getId({{ $category->id }})" method="Post" id="form_id">
                                                @method("delete")
                                                @csrf
                                                <input type="hidden" name="id" id="notification_id">
                                                @can('delete notification')
                                                <button id="{{ $loop->iteration }}" class="btn btn-danger sweet-5" onclick="test()" type="button" >@lang('lang.remove')</button>
                                                @endcan	
                                            </form>
										</td>
							
									</tr>
								@empty
									
								@endforelse
								
							</tbody>
							<tfoot>
								<tr>
									<th>#</th>
									<th>@lang('lang.Image')</th>
									<th>Type</th>
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
			 <h5 class="modal-title" id="exampleModalLabel">@lang('lang.add_slider')</h5>
			 <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
		  </div>
		  <div class="modal-body">

			<form class="needs-validation upload-form" novalidate="" method="POST" enctype="multipart/form-data" action="{{ route('slider.store') }}">
				@csrf
				<div class="mb-3">
					<div class="col-md-12 mb-3">
						<div class="col">
							<div class="mb-3 row">
								<label class="col-sm-3 col-form-label">@lang('lang.Image') / Video / GIF</label>
								<div class="col-sm-9">
									<input class="form-control" type="file" name="name" accept="image/*,video/*,.gif">
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12 mb-3">
								<label for="validationCustom01">@lang('lang.link')</label>
								<input class="form-control" id="validationCustom01" type="text" name="link" value="{{ old('link') }}" placeholder="" >
								<div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please choose a link.</div>

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

			<form class="needs-validation upload-form" novalidate="" method="POST" enctype="multipart/form-data" action="{{ route('dashboard.slider.update') }}">
				@csrf
				<input type="hidden" id="section_id" name="id">
				
				
				<div class="mb-3">
					<div class="col-md-12 mb-3">
						<div class="col">
							<div class="mb-3 row">
								<label class="col-sm-3 col-form-label">@lang('lang.Image') / Video / GIF</label>
								<div class="col-sm-9">
									<input class="form-control" type="file" name="name" accept="image/*,video/*,.gif">
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-md-12 mb-3">
								<label for="validationCustom01">@lang('lang.link')</label>
								<input class="form-control" id="section_link" type="text" name="link" value="{{ old('link') }}" placeholder="" >
								<div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please choose a link.</div>

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
	    document.getElementById("section_link").value=data['link'];
   }

   function getId(id){
	    document.getElementById("notification_id").value=id;
   }

   // Show upload loading overlay on form submit
   document.addEventListener('DOMContentLoaded', function() {
       document.querySelectorAll('.upload-form').forEach(function(form) {
           form.addEventListener('submit', function(e) {
               var fileInput = form.querySelector('input[type="file"]');
               if (fileInput && fileInput.files.length > 0) {
                   var overlay = document.getElementById('uploadOverlay');
                   overlay.classList.add('active');

                   // Show file size info
                   var file = fileInput.files[0];
                   var sizeMB = (file.size / (1024 * 1024)).toFixed(2);
                   document.getElementById('uploadProgress').textContent = file.name + ' (' + sizeMB + ' MB)';
               }
           });
       });
   });
</script>