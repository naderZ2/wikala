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
<li class="breadcrumb-item">@lang('lang.Categories')</li>
<li class="breadcrumb-item active">@lang('lang.add_category')</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
			
				<div class="card-body">
					<form class="needs-validation" novalidate="" method="POST" enctype="multipart/form-data" action="{{ route('category.store') }}">
                        @csrf
						<div class="row">
							<div class="col-md-6 mb-3">
								<label for="validationCustom01">@lang('lang.name_ar')</label>
								<input class="form-control" id="validationCustom01" type="text" name="name_ar" value="{{ old('name_ar') }}" placeholder="" required="">
								<div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please choose a name.</div>

							</div>

							<div class="col-md-6 mb-3">
								<label for="validationCustom01">@lang('lang.name_en')</label>
								<input class="form-control" id="validationCustom01" type="text" name="name_en" value="{{ old('name_en') }}" placeholder="" required="">
								<div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please choose a name.</div>
                                {{-- @error('phone')
								<div class="alert alert-danger">{{ $message }}</div>
							    @enderror --}}
							</div>											
							<div class="col-md-6 mb-3">
								<label for="validationCustom01">@lang('lang.order')</label>
								<input class="form-control" id="validationCustom01" type="number" name="order" value="{{ old('order') }}" placeholder="" required="">
								<div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please choose a order.</div>
                                {{-- @error('phone')
								<div class="alert alert-danger">{{ $message }}</div>
							    @enderror --}}
							</div>											
						</div>

						<div class="row">
							<div class="col-md-6 mb-3">
                                <label for="validationCustom03">@lang('lang.parent_category')</label>

                                <select class="js-example-placeholder-multiple col-sm-12"  id="validationCustom03"  name="parent_id[]"  multiple="multiple">
                                    <option value="" required></option>

                                    @forelse ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @empty
                                        
                                    @endforelse
                              
                                </select>
                                <div class="invalid-feedback">Please provide a valid category.</div>

                            </div>
							<!--<div class="col-md-6">-->
							<!--		<div class="card-body animate-chk">-->
							<!--			<div class="row">-->
							<!--				<div class="col">-->
							<!--					<label class="d-block" for="chk-ani">-->
							<!--					<input class="checkbox_animated" id="chk-ani" type="checkbox" name="end_point" value="1">           -->
							<!--					@lang('lang.final_category')-->
							<!--					</label>-->
												
							<!--				</div>-->
							<!--			</div>-->
							<!--		</div>-->
							<!--</div>-->
						</div>

						<div class="mb-3">
                            <div class="col-md-12 mb-3">
                                <div class="col">
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">@lang('lang.add_image')</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="file" name="image" value="{{ old('image') }}" required accept="image/*">
                                        </div>
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
@endsection