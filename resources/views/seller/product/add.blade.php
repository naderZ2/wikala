@extends('seller.layout.master')
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
					<form class="needs-validation" novalidate="" method="POST" enctype="multipart/form-data" action="{{ route('seller.product.store') }}">
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


                            <div class="col-md-12 mb-3">

                                <div class="row">
                                    <div class="col-lg-12">
                                        <label for="exampleFormControlTextarea4">@lang('lang.Other_Images')</label>

                                        <div id="inputFormRow">
                                            <div class="input-group mb-3">
                                                <input class="form-control" type="file" name="images[]" value="{{ old('images') }}" required accept="image/*" >
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

