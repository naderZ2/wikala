@extends('admin.layout.master')
@section('title', 'Basic DataTables')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">

@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>@lang('lang.events')</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item"></li>
<li class="breadcrumb-item active"> @lang('lang.add_slider')</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
			
				<div class="card-body">
					<form class="needs-validation" enctype="multipart/form-data" novalidate="" method="POST" action="{{ route('daily_events.save') }}">
                        @csrf
						<div class="row">
						    	<div class="col-md-6 mb-3">
                                    <label for="validationCustom01">@lang('lang.Categories')</label>
    
                                    <select class="js-example-placeholder-multiple col-sm-12"  id="validationCustom01"  name="event_category_id"  required="">
    									@foreach($categories as $seller)
    									{{-- <option value="{{ $seller->id }}" >{{ $seller->name  ." - ".$seller->name }}</option> --}}
    									<option value="{{ $seller?->id }}"  >{{ $seller?->name }}</option>
                                        {{-- @empty --}}
                                            @endforeach
                                        {{-- @endforelse --}}
                                  
                                    </select>
                                    <div class="invalid-feedback">Please provide a valid Categories.</div>

                            </div>
                            
                            	<div class="col-md-6 mb-3">
                                    <label for="validationCustom01">@lang('lang.regions')</label>
    
                                    <select class="js-example-placeholder-multiple col-sm-12"  id="validationCustom01"  name="city_id"  required="">
    									@foreach($cities as $city)
    									{{-- <option value="{{ $city->id }}" >{{ $city->name  ." - ".$city->name }}</option> --}}
    									<option value="{{ $city?->id }}"  >{{ $city?->name }}</option>
                                        {{-- @empty --}}
                                            @endforeach
                                        {{-- @endforelse --}}
                                  
                                    </select>
                                    <div class="invalid-feedback">Please provide a valid Categories.</div>

                            </div>
                            
                            	<div class="col-md-6 mb-3">
                                <label for="validationCustom03">@lang('lang.Type')</label>

                                <select class="js-example-placeholder-multiple col-sm-12"  id="validationCustom03"  name="type"  required="">
                                    <option value="both" @selected( old('type')=='both')>@lang('lang.both')</option>
                                    
                                      <option value="female" @selected( old('type')=='female')>@lang('lang.female')</option>     
                                      
                                        <option value="male" @selected( old('type')=='male')>@lang('lang.male')</option>   
                                        
                                                               
                                </select>
                                <div class="invalid-feedback">Please provide a valid Type.</div>

                            </div>

							    <div class="col-md-6 mb-3">
								<label for="validationCustom01">@lang('lang.family_name')</label>
								<input class="form-control" id="validationCustom01" type="text" name="family_name" 
                                value="{{ old('family_name') }}" placeholder="@lang('lang.family_name')" required="">
								<div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please choose a name.</div>
                                @error('family_name')
								<div class="alert alert-danger">{{ $message }}</div>
							    @enderror

							</div>
							
    							<div class="col-md-6 mb-3">
    								<label for="validationCustom01">@lang('lang.name_ar')</label>
    								<input class="form-control" id="validationCustom01" type="text" name="name_ar" 
                                    value="{{ old('name_ar') }}" placeholder="@lang('lang.name_ar')" required="">
    								<div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please choose a name.</div>
                                    @error('name_ar')
    								<div class="alert alert-danger">{{ $message }}</div>
    							    @enderror
    
    							</div>
							
							
    							<div class="col-md-6 mb-3">
    								<label for="validationCustom01">@lang('lang.name_en')</label>
    								<input class="form-control" id="validationCustom01" type="text" name="name_en" 
                                    value="{{ old('name_en') }}" placeholder="@lang('lang.name_en')" required="">
    								<div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please choose a name.</div>
                                    @error('name_en')
    								<div class="alert alert-danger">{{ $message }}</div>
    							    @enderror
    
    							</div>
							
							
								<div class="col-md-6 mb-3">
    								<label for="validationCustom01">@lang('lang.f_phone')</label>
    								<input class="form-control" id="validationCustom01" type="text" name="f_phone" 
                                    value="{{ old('f_phone') }}" placeholder="@lang('lang.f_phone')" required="">
    								<div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please choose a name.</div>
                                    @error('f_phone')
    								<div class="alert alert-danger">{{ $message }}</div>
    							    @enderror

							    </div>
							
								<div class="col-md-6 mb-3">
								<label for="validationCustom01">@lang('lang.f_whatsApp_number')</label>
								<input class="form-control" id="validationCustom01" type="text" name="f_whatsApp_number" 
                                value="{{ old('f_whatsApp_number') }}" placeholder="@lang('lang.f_whatsApp_number')" required="">
								<div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please choose a name.</div>
                                @error('f_whatsApp_number')
								<div class="alert alert-danger">{{ $message }}</div>
							    @enderror

							</div>
							
								<div class="col-md-6 mb-3">
								<label for="validationCustom01">@lang('lang.f_address')</label>
								<input class="form-control" id="validationCustom01" type="text" name="f_address" 
                                value="{{ old('f_address') }}" placeholder="@lang('lang.f_address')" required="">
								<div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please choose a name.</div>
                                @error('f_address')
								<div class="alert alert-danger">{{ $message }}</div>
							    @enderror

							</div>
							
								<div class="col-md-6 mb-3">
								<label for="validationCustom01">@lang('lang.f_latitude')</label>
								<input class="form-control" id="validationCustom01" type="text" name="f_latitude" 
                                value="{{ old('f_latitude') }}" placeholder="@lang('lang.f_latitude')" required="">
								<div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please choose a name.</div>
                                @error('f_latitude')
								<div class="alert alert-danger">{{ $message }}</div>
							    @enderror

							</div>
							
								<div class="col-md-6 mb-3">
								<label for="validationCustom01">@lang('lang.f_longitude')</label>
								<input class="form-control" id="validationCustom01" type="text" name="f_longitude" 
                                value="{{ old('f_longitude') }}" placeholder="@lang('lang.f_longitude')" required="">
								<div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please choose a name.</div>
                                @error('f_longitude')
								<div class="alert alert-danger">{{ $message }}</div>
							    @enderror

							</div>
							
							
							
								<div class="col-md-6 mb-3">
								<label for="validationCustom01">@lang('lang.phone')</label>
								<input class="form-control" id="validationCustom01" type="text" name="phone" 
                                value="{{ old('phone') }}" placeholder="@lang('lang.phone')" required="">
								<div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please choose a name.</div>
                                @error('phone')
								<div class="alert alert-danger">{{ $message }}</div>
							    @enderror

							</div>
							
							
								<div class="col-md-6 mb-3">
								<label for="validationCustom01">@lang('lang.whatsApp_number')</label>
								<input class="form-control" id="validationCustom01" type="text" name="whatsApp_number" 
                                value="{{ old('whatsApp_number') }}" placeholder="@lang('lang.whatsApp_number')" required="">
								<div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please choose a name.</div>
                                @error('whatsApp_number')
								<div class="alert alert-danger">{{ $message }}</div>
							    @enderror

							</div>
							
							
								<div class="col-md-6 mb-3">
								<label for="validationCustom01">@lang('lang.address')</label>
								<input class="form-control" id="validationCustom01" type="text" name="address" 
                                value="{{ old('address') }}" placeholder="@lang('lang.address')" required="">
								<div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please choose a name.</div>
                                @error('address')
								<div class="alert alert-danger">{{ $message }}</div>
							    @enderror

							</div>
							
								<div class="col-md-6 mb-3">
    								<label for="validationCustom01">@lang('lang.latitude')</label>
    								<input class="form-control" id="validationCustom01" type="text" name="latitude" 
                                    value="{{ old('latitude') }}" placeholder="@lang('lang.latitude')" required="">
    								<div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please choose a name.</div>
                                    @error('latitude')
    								<div class="alert alert-danger">{{ $message }}</div>
							    @enderror

							</div>
							
							
								<div class="col-md-6 mb-3">
    								<label for="validationCustom01">@lang('lang.longitude')</label>
    								<input class="form-control" id="validationCustom01" type="text" name="longitude" 
                                    value="{{ old('longitude') }}" placeholder="@lang('lang.longitude')" required="">
    								<div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please choose a name.</div>
                                    @error('longitude')
    								<div class="alert alert-danger">{{ $message }}</div>
    							    @enderror

							</div>
							
							
        						<div class="mb-3">
                                    <div class="col-md-12 mb-3">
                                        <div class="col">
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">@lang('lang.image')</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="file" name="image" value="{{ old('image') }}" required accept="image/*">
                                                </div>
                                            </div>
                                        </div>
                                    </div>							
        						</div>
							
					
						</div>
						
					
						<div class="row">
						
							<div class="col-md-6 mb-3">
								<label for="validationCustom06">@lang('lang.date')</label>
								<input class="form-control" id="validationCustom06" type="date" placeholder="date" name="date" value="{{ old('date') }}" required="">
								<div class="invalid-feedback">Please provide a valid date.</div>
							</div>

							<div class="col-md-6 mb-3">
								<label for="validationCustom07">@lang('lang.time')</label>
								<input class="form-control" id="validationCustom07" type="time" placeholder="time" name="time" value="{{ old('time') }}" required="">
								<div class="invalid-feedback">Please provide a valid date.</div>
                                @error('time')
								<div class="alert alert-danger">{{ $message }}</div>
							    @enderror
							</div>
							
							<div class="mb-3">
                            <div class="col-md-12 mb-3">
                                <div class="col">
                                    <div class="mb-3 mb-0">
                                        <label for="exampleFormControlTextarea4">@lang('lang.description_en')</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea4" name="description_en" rows="5" required></textarea>
                                    </div>
                                </div>
                            </div>
						</div>
						
						<div class="mb-3">
                            <div class="col-md-12 mb-3">
                                <div class="col">
                                    <div class="mb-3 mb-0">
                                        <label for="exampleFormControlTextarea4">@lang('lang.description_ar')</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea4" name="description_ar" rows="5" required></textarea>
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