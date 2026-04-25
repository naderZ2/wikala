@extends('admin.layout.master')
@section('title', 'Validation Forms')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">

@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>@lang('lang.add_Product')</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">@lang('lang.Products')</li>
<li class="breadcrumb-item active">@lang('lang.add_Product')</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
			
				<div class="card-body">
					<form class="needs-validation" novalidate="" method="POST" enctype="multipart/form-data" action="{{ route('product.store') }}">
                        @csrf
						<div class="row">
							<div class="col-md-6 mb-3">
								<label for="validationCustom01">@lang('lang.name_ar')</label>
								<input class="form-control" id="validationCustom01" type="text" name="name_ar" value="{{ old('name_ar') }}" placeholder="" required="">
								<div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please choose a name.</div>
                                {{-- @error('phone')
								<div class="alert alert-danger">{{ $message }}</div>
							    @enderror --}}
							</div>
							<div class="col-md-6 mb-3">
								<label for="validationCustom01">@lang('lang.name_en')</label>
								<input class="form-control" id="validationCustom01" type="text" name="name_en" value="{{ old('name_en') }}" placeholder="" required="">
								<div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please choose a name.</div>
							</div>
							<div class="col-md-6 mb-3">
								<label for="validationCustom01">title Ar</label>
								<input class="form-control" id="validationCustom01" type="text" name="title_ar" value="{{ old('title_ar') }}" placeholder="" required="">
								<div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please choose a title_ar.</div>
             
							</div>
							<div class="col-md-6 mb-3">
								<label for="validationCustom01">title En</label>
								<input class="form-control" id="validationCustom01" type="text" name="title_en" value="{{ old('title_en') }}" placeholder="" required="">
								<div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please choose a title_en.</div>
							</div>

							<div class="col-md-6 mb-3">
                                <label for="validationCustom03">@lang('lang.Category')</label>

                                <select class="js-example-placeholder-multiple col-sm-12"  id="validationCustom03"  name="category_id"  >
                                    <option value="">fff</option>
                                    @forelse ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @empty
                                        
                                    @endforelse
                              
                                </select>
                                <div class="invalid-feedback">Please provide a valid country.</div>

                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom03">@lang('lang.Sellers')</label>
                                <select class="js-example-placeholder-multiple col-sm-12"  id="validationCustom03"  name="seller_id"  required="">
									{{-- @dd($discounts) --}}
									<option value="null" >@lang('lang.Seller')</option>                                  
                                
									@foreach ($sellers as $seller)
                                    <option value="{{$seller?->id}}">{{$seller?->name}}</option>                                  
										
									@endforeach
                                </select>
                                <div class="invalid-feedback">Please provide a valid Type.</div>
                            </div>
                            
                            <!--<div class="col-md-6 mb-3">-->
                            <!--    <label for="validationCustom03"></label>-->

                            <!--    <select class="js-example-placeholder-multiple col-sm-12"  id="validationCustom03"  name="picture"  >-->
                            <!--        <option value="0"> @lang('lang.withoutFile')</option>-->
                            <!--        <option value="1">@lang('lang.withFile')</option>-->
                                   
                            <!--    </select>-->
                            <!--    <div class="invalid-feedback">Please provide a valid country.</div>-->

                            <!--</div>-->
						</div>

						<div class="row">
						
							<div class="col-md-6 mb-3">
								<label for="validationCustom04">@lang('lang.quantity') </label>
								<input class="form-control" id="validationCustom04" type="number" placeholder="@lang('lang.quantity')" name="serving" value="{{ old('serving') }}"  >
								<div class="invalid-feedback">Please provide a valid state.</div>
							</div>
							<div class="col-md-6 mb-3">
								<label for="validationCustom05">@lang('lang.price') </label>
								<input class="form-control" id="validationCustom05" type="number" placeholder="@lang('lang.price')" name="price" value="{{ old('price') }}" required="">
								<div class="invalid-feedback">Please provide a valid Price.</div>
							</div>
							
							<div class="col-md-6 mb-3">
								<label for="validationCustom05">price before discount </label>
								<input class="form-control" id="validationCustom05" type="number" placeholder="@lang('lang.price')" name="old_price" value="{{ old('old_price') }}" required="">
								<div class="invalid-feedback">Please provide a valid Price.</div>
							</div>

						</div>

						<div class="row">
							
						</div>
						<div class="mb-3">
                          
                            <div class="col-md-12 mb-3">
                                <div class="col">
                                    <div class="mb-3 mb-0">
                                        <label for="exampleFormControlTextarea4">@lang('lang.description_ar')</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea4" name="description_ar" rows="3" required>{{ old('description_ar') }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="col">
                                    <div class="mb-3 mb-0">
                                        <label for="exampleFormControlTextarea4">@lang('lang.description_en')</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea4" name="description_en" rows="3" required>{{ old('description_en') }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <div class="col-lg-12">
                                    <div id="inputFormRow">
                                        <label for="exampleFormControlTextarea4">@lang('lang.Main_Image')</label>

                                        <div class="input-group mb-3">

                                            <input class="form-control" type="file" name="main_image" value="{{ old('images') }}" required accept="image/*" >
                                            {{-- <div class="input-group-append">
                                                <button id="removeRow" type="button" class="btn btn-danger">Remove</button>
                                            </div> --}}
                                        </div>
                                    </div>
                
                                </div>
                            </div>


                            </div>
                            
                            <div class="col-md-12 mb-3">
                                <label>@lang('lang.Attributes')</label>
                                <div id="attributes-container" class="row">
                                    {{-- Attributes will be loaded here via AJAX --}}
                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label>Variations</label>
                                <button type="button" class="btn btn-secondary btn-sm mb-2" id="addVariation">Add Variation</button>
                                <div id="variations-container">
                                    {{-- Variations will be added here --}}
                                </div>
                            </div>
                            
                            <div class="col-md-12 mb-3">

                                <div class="row">
                                    <div class="col-lg-12">
                                        <label for="exampleFormControlTextarea4">@lang('lang.Other_Images')</label>

                                        <div id="inputFormRow">
                                            <div class="input-group mb-3">
                                                <input class="form-control" type="file" name="images[]" value="{{ old('images') }}" required accept="image/*,video/*" >
                                                {{-- <div class="input-group-append">
                                                    <button id="removeRow" type="button" class="btn btn-danger">Remove</button>
                                                </div> --}}
                                            </div>
                                        </div>
                    
                                        <div id="newRow"></div>
                                        <button id="addRow" type="button" class="btn btn-info">@lang('lang.add_image')</button>
                                    </div>
                                </div>
                                {{-- <div class="input-group control-group increment" >
                                    <input type="file" name="filename[]" class="form-control">
                                    <div class="input-group-btn"> 
                                      <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                                    </div>
                                  </div>
                                  <div class="clone hide">
                                    <div class="control-group input-group" style="margin-top:10px">
                                      <input type="file" name="filename[]" class="form-control">
                                      <div class="input-group-btn"> 
                                        <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                      </div>
                                    </div>
                                  </div> --}}
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
        html += '<input class="form-control" type="file" name="images[]" value="{{ old("images") }}" required accept="image/*,video/*">';
        html += '<div class="input-group-append">';
        html += '<button id="removeRow" type="button" class="btn btn-danger">@lang("lang.remove")</button>';
        html += '</div>';
        html += '</div>';

        $('#newRow').append(html);
    });

    // remove row
    $(document).on('click', '#removeRow', function () {
        $(this).closest('#inputFormRow').remove();
    });

    var availableAttributes = [];
    var variationIndex = 0;

    // Fetch attributes when category changes
    $('select[name="category_id"]').on('change', function() {
        var categoryId = $(this).val();
        if (categoryId) {
            $.ajax({
                url: "{{ route('product.getCategoryAttributes') }}",
                type: "GET",
                data: { category_id: categoryId },
                success: function(response) {
                    $('#attributes-container').empty();
                    availableAttributes = response.attributes || [];
                    
                    if (availableAttributes.length > 0) {
                        $.each(availableAttributes, function(key, attribute) {
                            var inputType = 'text'; // Default to text
                            
                            var html = '<div class="col-md-6 mb-3">';
                            html += '<label>' + (attribute.name_ar || attribute.name_en) + '</label>';
                            html += '<input type="' + inputType + '" name="attributes[' + attribute.id + ']" class="form-control" placeholder="' + (attribute.name_en || '') + '">';
                            html += '</div>';
                            
                            $('#attributes-container').append(html);
                        });
                    } else {
                        $('#attributes-container').html('<div class="col-12"><p class="text-muted">No attributes found for this category.</p></div>');
                    }
                    // Clear variations when category changes as attributes might change
                    $('#variations-container').empty();
                    variationIndex = 0;
                }
            });
        } else {
            $('#attributes-container').empty();
            availableAttributes = [];
            $('#variations-container').empty();
        }
    });

    // Add Variation
    $("#addVariation").click(function () {
        if(availableAttributes.length === 0){
            alert("Please select a category with attributes first.");
            return;
        }

        var html = '<div class="variation-row card body p-3 mb-3" style="border: 1px solid #ddd;">';
        html += '<h6 class="mb-3">Variation ' + (variationIndex + 1) + ' <button type="button" class="btn btn-danger btn-xs float-right removeVariation">X</button></h6>';
        html += '<div class="row">';

        // Add attribute inputs for this variation
        $.each(availableAttributes, function(key, attribute) {
            html += '<div class="col-md-4 mb-2">';
            html += '<label>' + (attribute.name_ar || attribute.name_en) + '</label>';
            html += '<input type="text" name="variations[' + variationIndex + '][attributes][' + attribute.id + ']" class="form-control" placeholder="Value (e.g., Red)">';
            html += '</div>';
        });

        html += '</div>'; // End attributes row

        html += '<div class="row mt-2">';
        html += '<div class="col-md-4"><label>Price (Override)</label><input type="number" step="0.01" name="variations[' + variationIndex + '][price]" class="form-control" placeholder="Original Price"></div>';
        html += '<div class="col-md-4"><label>Quantity</label><input type="number" name="variations[' + variationIndex + '][quantity]" class="form-control" value="0"></div>';
        html += '<div class="col-md-4"><label>SKU</label><input type="text" name="variations[' + variationIndex + '][sku]" class="form-control" placeholder="SKU"></div>';
        html += '</div>'; // End details row

        html += '</div>'; // End variation-row

        $('#variations-container').append(html);
        variationIndex++;
    });

    // Remove variation
    $(document).on('click', '.removeVariation', function () {
        $(this).closest('.variation-row').remove();
    });
</script>
@endsection

