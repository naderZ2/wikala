@extends('admin.layout.master')
@section('title', 'Validation Forms')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">

@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>@lang('lang.add_category_attribute')</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">@lang('lang.category_attributes')</li>
<li class="breadcrumb-item active">@lang('lang.add_category_attribute')</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
        
		<div class="col-sm-12">
			<div class="card">
			
				<div class="card-body">
					<form class="needs-validation" novalidate="" method="POST" enctype="multipart/form-data" action="{{ route('category-attributes.store') }}">
                        @csrf
                        <div class="row">
                            <input class="form-control" id="validationCustom01" type="hidden" name="id"  placeholder="" required="">
							
							

                            <div class="col-md-6 mb-3">
                                <label for="validationCustom03">@lang('lang.Category')</label>
                                <select class="js-example-placeholder-multiple col-sm-12" id="validationCustom03" name="category_id" required>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">@lang('lang.please_select_category')</div>
                                @error('category_id')
								<div class="alert alert-danger">{{ $message }}</div>
							    @enderror
                            </div>


                            <div class="col-md-6 mb-3">
                                <label for="validationCustom03">@lang('lang.Attribute')</label>
                                <select class="js-example-placeholder-multiple col-sm-12" id="validationCustom03" name="attribute_id" required>
                                    @foreach($attributes as $attribute)
                                        <option value="{{ $attribute?->id }}">{{ $attribute?->name }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">@lang('lang.please_select_attribute')</div>
                                @error('attribute_id')
								<div class="alert alert-danger">{{ $message }}</div>
							    @enderror
                            </div>
                            
                            
							<div class="col-md-6 mb-3">
                                <label for="validationCustom03">@lang('lang.mandatory')</label>
                                <select class="js-example-placeholder-multiple col-sm-12" id="validationCustom03" name="mandatory" required>
                                    <option value="1" >@lang('lang.required')</option>
                                    <option value="0" >@lang('lang.not_required')</option>
                                </select>
                                <div class="invalid-feedback">@lang('lang.please_select_mandatory')</div>
                                @error('mandatory')
								<div class="alert alert-danger">{{ $message }}</div>
							    @enderror
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
</script>
@endsection

