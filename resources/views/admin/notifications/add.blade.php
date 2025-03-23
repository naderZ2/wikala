@extends('admin.layout.master')
@section('title', 'Validation Forms')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">

@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>@lang('lang.Notifications')</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">@lang('lang.Notifications')</li>
<li class="breadcrumb-item active"> @lang('lang.add_Notification')</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
			
				<div class="card-body">
					<form class="needs-validation" novalidate="" method="POST" enctype="multipart/form-data" action="{{ route('admin.notifications.store') }}">
                        @csrf
						
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="section_name">@lang('lang.Title_ar')</label>
                                <input class="form-control" id="section_name" type="text" name="name_ar" value="" placeholder="" required="">
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please choose a Title.</div>
        
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="section_name">@lang('lang.Title_En')</label>
                                <input class="form-control" id="section_name" type="text" name="name_en" value="" placeholder="" required="">
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please choose a Title.</div>
        
                            </div>
    
                            <div class="col-md-6 mb-3">
                                <div class="col">
                                    <div class="mb-3 mb-0">
                                        <label for="exampleFormControlTextarea4">@lang('lang.Body_ar')</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea4" name="description_ar" rows="3" required></textarea>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please choose a Description.</div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="col">
                                    <div class="mb-3 mb-0">
                                        <label for="exampleFormControlTextarea4">@lang('lang.Body_En')</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea4" name="description_en" rows="3" required></textarea>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please choose a Description.</div>
                                    </div>
                                </div>
                               
                            </div>
    
                            
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom03">@lang('lang.Type')</label>
    
                                <select class="form-control col-sm-12"  id="validationCustom03"  name="type" required >
                                    <option value="1">general</option>
                                </select>
                                <div class="invalid-feedback">Please provide a valid Type.</div>
    
                            </div>
    
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">@lang('lang.Sellers')</label>

                                <select class="js-example-placeholder-multiple col-sm-12"  id="validationCustom01"  name="seller_id"  >
                                    <option value=""></option>
                                    @forelse ($sellers as $seller)
                                        <option value="{{ $seller->id }}">{{ $seller->name }}</option>
                                    @empty
                                        
                                    @endforelse
                              
                                </select>
                                <div class="invalid-feedback">Please provide a valid seller.</div>

                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">@lang('lang.Products')</label>

                                <select class="js-example-placeholder-multiple col-sm-12"  id="validationCustom01"  name="product_id" >
                                    <option value=""></option>
                                    @forelse ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @empty
                                        
                                    @endforelse
                              
                                </select>
                                <div class="invalid-feedback">Please provide a valid product.</div>

                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">@lang('lang.regions')</label>

                                <select class="js-example-placeholder-multiple col-sm-12"  id="validationCustom01"  name="region_id" >
                                    <option value=""></option>
                                    @forelse ($regions as $region)
                                        <option value="{{ $region->id }}">{{ $region->name }}</option>
                                    @empty
                                        
                                    @endforelse
                              
                                </select>
                                <div class="invalid-feedback">Please provide a valid region.</div>

                            </div>
    
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary" type="submit">@lang('lang.send')</button>
                        </div>
						
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