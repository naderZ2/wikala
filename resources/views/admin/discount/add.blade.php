@extends('admin.layout.master')
@section('title', 'Basic DataTables')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">

@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>@lang('lang.add_discount')</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item"></li>
<li class="breadcrumb-item active"> @lang('lang.add_discount')</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
			
				<div class="card-body">
					<form class="needs-validation" novalidate="" method="POST" action="{{ route('discounts.store') }}">
                        @csrf
						<div class="row">
							<div class="col-md-6 mb-3">
								<label for="validationCustom01">@lang('lang.code')</label>
								<input class="form-control" id="validationCustom01" type="text" name="code" 
                                value="{{ old('code') }}" placeholder="code" required="">
								<div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please choose a name.</div>
                                @error('code')
								<div class="alert alert-danger">{{ $message }}</div>
							    @enderror

							</div>
							<div class="col-md-6 mb-3">
								<label for="validationCustom02">@lang('lang.Total_Coupons')</label>
								<input class="form-control" id="validationCustom02" min="0" type="number" name="coupons_number"  value="{{ old('coupons_number') }}" placeholder="Total Coupons" required="">
								<div class="valid-feedback">Looks good!</div>
								@error('coupons_number')
								<div class="alert alert-danger">{{ $message }}</div>
							    @enderror
							</div>


                            <div class="col-md-6 mb-3">
								<label for="validationCustom04">@lang('lang.User_Coupons')</label>
								<input class="form-control" id="validationCustom04" type="number" min="0" placeholder="User Coupons" name="coupons_user_number" 
                                value="{{ old('coupons_user_number') }}" required="">
								<div class="invalid-feedback">Please provide a valid User Coupons.</div>
							</div>


                            {{-- <div class="col-md-6 mb-3">
                                <label for="validationCustom03">@lang('lang.Sellers')</label>
                                <select class="js-example-placeholder-multiple col-sm-12"  id="validationCustom03"  name="seller_id"  required="">
									
									<option value="null" @selected( old('ssssssss')=='percentage')>@lang('lang.Seller')</option>                                  
                                
									@foreach ($sellers as $seller)
                                    <option value="{{$seller?->id}}">{{$seller?->name}}</option>                                  
										
									@endforeach
                                </select>
                                <div class="invalid-feedback">Please provide a valid Type.</div>
                            </div> --}}
							<div class="col-md-6 mb-3">
                                <label for="validationCustom01">@lang('lang.Sellers')</label>

                                <select class="js-example-placeholder-multiple col-sm-12"  id="validationCustom01"  name="sellers[]" multiple="multiple" required="">
									@foreach($sellers as $seller)
									{{-- <option value="{{ $seller->id }}" >{{ $seller->name  ." - ".$seller->name }}</option> --}}
									<option value="{{ $seller?->id }}"  >{{ $seller?->name }}</option>
                                    {{-- @empty --}}
                                        @endforeach
                                    {{-- @endforelse --}}
                              
                                </select>
                                <div class="invalid-feedback">Please provide a valid Categories.</div>

                            </div>

					
						</div>
						<div class="row">

							<div class="col-md-6 mb-3">
                                <label for="validationCustom03">@lang('lang.Type')</label>

                                <select class="js-example-placeholder-multiple col-sm-12"  id="validationCustom03"  name="type"  required="">
                                    <option value="percentage" @selected( old('type')=='percentage')>@lang('lang.percentage')</option>                                  
                                    <option value="cash" @selected( old('type')=='cash')>@lang('lang.cash')</option>                                  
                                </select>
                                <div class="invalid-feedback">Please provide a valid Type.</div>

                            </div>

                            <div class="col-md-6 mb-3">
								<label for="validationCustom05">@lang('lang.Value')</label>
								<input class="form-control" id="validationCustom05" type="number" min="0" placeholder="Value" name="value" 
                                value="{{ old('value') }}" required="">
								<div class="invalid-feedback">Please provide a valid Value.</div>
                                @error('value')
								<div class="alert alert-danger">{{ $message }}</div>
							    @enderror
							</div>
						
							<div class="col-md-6 mb-3">
								<label for="validationCustom06">@lang('lang.Start_Date')</label>
								<input class="form-control" id="validationCustom06" type="date" placeholder="Price" name="start_date" value="{{ old('start_date') }}" required="">
								<div class="invalid-feedback">Please provide a valid date.</div>
							</div>

							<div class="col-md-6 mb-3">
								<label for="validationCustom07">@lang('lang.End_Date')</label>
								<input class="form-control" id="validationCustom07" type="date" placeholder="Price" name="end_date" value="{{ old('end_date') }}" required="">
								<div class="invalid-feedback">Please provide a valid date.</div>
                                @error('end_date')
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
@endsection