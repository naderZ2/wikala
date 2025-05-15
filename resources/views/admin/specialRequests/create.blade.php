@extends('admin.layout.master')
@section('title', 'Validation Forms')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">

@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>@lang('lang.add_category')</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">@lang('lang.events_category')</li>
<li class="breadcrumb-item active">@lang('lang.add_category')</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
			
				<div class="card-body">
					<form class="needs-validation" novalidate method="POST" enctype="multipart/form-data" action="{{ route('admin.specialRequest.store',$id) }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">@lang('lang.content')</label>
                                <input 
                                    class="form-control" 
                                    id="validationCustom01" 
                                    type="text" 
                                    name="content" 
                                    placeholder="" 
                                    required>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please write a content.</div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="fileUpload">@lang('lang.upload_file')</label>
                                <input 
                                    class="form-control" 
                                    id="fileUpload" 
                                    type="file" 
                                    name="content" 
                                    disabled>
                                <div class="invalid-feedback">Please upload a file.</div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom03">@lang('lang.Type')</label>
                                <select 
                                    class="js-example-placeholder-multiple col-sm-12"  
                                    id="validationCustom03"  
                                    name="type"  
                                    required
                                    onchange="toggleInputs()">
                                    <option value="text">@lang('lang.text')</option>
                                    <option value="file">@lang('lang.file')</option>
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                    <input type="hidden" value="{{$id}}" name="special_requests_id">
                    <input type="hidden" value="{{auth()->id()}}" name="user_id">
                    
                        <button class="btn btn-primary" type="submit">@lang('lang.save')</button>
                    </form>
                    
				</div>
			</div>
			
		
		</div>
	</div>
</div>
@endsection


@section('script')
<script src="{{asset('assets/js/select2/select2.full.min.js')}}"></script>
<script src="{{asset('assets/js/select2/select2-custom.js')}}"></script>
<script src="{{asset('assets/js/form-validation-custom.js')}}"></script>

<script>
    function toggleInputs() {
        const typeSelector = document.getElementById('validationCustom03');
        const contentInput = document.getElementById('validationCustom01');
        const fileInput = document.getElementById('fileUpload');

        if (typeSelector.value === 'file') {
            // Disable text input and remove "required" attribute
            contentInput.disabled = true;
            contentInput.removeAttribute('required');
            
            // Enable file input and add "required" attribute
            fileInput.disabled = false;
            fileInput.setAttribute('required', true);
        } else if (typeSelector.value === 'text') {
            // Enable text input and add "required" attribute
            contentInput.disabled = false;
            contentInput.setAttribute('required', true);
            
            // Disable file input and remove "required" attribute
            fileInput.disabled = true;
            fileInput.removeAttribute('required');
        }
    }
</script>

@endsection