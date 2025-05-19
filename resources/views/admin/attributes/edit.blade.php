@extends('admin.layout.master')
@section('title', 'Validation Forms')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">

@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>@lang('lang.edit')</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">@lang('lang.Attributes')</li>
<li class="breadcrumb-item active">@lang('lang.edit')</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
			
				<div class="card-body">
					<form class="needs-validation" novalidate="" method="POST" enctype="multipart/form-data" action="{{ route('attributes.update',$attribute->id) }}">
                        @csrf
                        @method('PUT')
						<div class="row">
                            <input class="form-control" id="validationCustom01" type="hidden" name="id" value="{{ $attribute->id }}" placeholder="" required="">
							<div class="col-md-6 mb-3">
								<label for="validationCustom01">@lang('lang.name_ar')</label>
								<input class="form-control" id="validationCustom01" type="text" name="name_ar" value="{{ old('name_ar', $attribute?->name_ar) }}" placeholder="" required="">
								<div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please choose a name.</div>
                                @error('name_ar')
								<div class="alert alert-danger">{{ $message }}</div>
							    @enderror
							</div>
							<div class="col-md-6 mb-3">
								<label for="validationCustom01">@lang('lang.name_en')</label>
								<input class="form-control" id="validationCustom01" type="text" name="name_en" value="{{ old('name_en', $attribute?->name_en) }}" placeholder="" required="">
								<div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please choose a name.</div>
								@error('name_en')
								<div class="alert alert-danger">{{ $message }}</div>
							    @enderror
							</div>
							

							<div class="col-md-6 mb-3">
                                <label for="validationCustom03">@lang('lang.Type')</label>

                                <select class="js-example-placeholder-multiple col-sm-12" id="validationCustom03" required="" name="type">
                                    <option value="string" {{ old('type', $attribute->type) == 'string' ? 'selected' : '' }}>@lang('lang.string')</option>
                                    <option value="number" {{ old('type', $attribute->type) == 'number' ? 'selected' : '' }}>@lang('lang.number')</option>
                                    <option value="select" {{ old('type', $attribute->type) == 'select' ? 'selected' : '' }}>@lang('lang.select')</option>
                                </select>
                                <div class="invalid-feedback">Please provide a valid type.</div>
								@error('type')
								<div class="alert alert-danger">{{ $message }}</div>
							    @enderror

                            </div>
                            
                            


						
                            <div class="col-md-12 mb-3">
                                <div class="col-lg-12">
                                    <div id="inputFormRow">
                                        <label for="exampleFormControlTextarea4">@lang('lang.Image')</label>

                                        <div class="input-group mb-3">

                                            <input class="form-control" onchange="previewImage(event)" type="file" name="image" value="{{ old('image') }}"  accept="image/*" >
                                        
                                        </div>
										<img src="{{ asset($attribute?->image) }}" id="imagePreview" alt=""  class="image-fluid"  height="150" width="150">
										@error('image')
										<div class="alert alert-danger">{{ $message }}</div>
									    @enderror

                                    </div>
                
                                </div>
                            </div>

						</div>
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
<script type="text/javascript">
    // add row
    $("#addRow").click(function () {
        var html = '';
        html += '<div id="inputFormRow">';
        html += '<div class="input-group mb-3">';
        html += '<input class="form-control" type="file" name="images[]" value="{{ old('images') }}" required accept="image/*">';
        html += '<div class="input-group-append">';
        html += '<button id="removeRow" type="button" class="btn btn-danger">@lang('lang.remove')</button>';
        html += '</div>';
        html += '</div>';

        $('#newRow').append(html);
    });

    // remove row
    $(document).on('click', '#removeRow', function () {
        $(this).closest('#inputFormRow').remove();
    });


    function previewImage(event) {
    var image = document.getElementById('imagePreview');
    var file = event.target.files[0];

    if (file) {
        var reader = new FileReader();
        reader.onload = function(e) {
            image.src = e.target.result; // Set image source to the file's data
            image.style.display = 'block'; // Display the image element
        };
        reader.readAsDataURL(file); // Convert image file to base64 string
    }
}
</script>
@endsection

