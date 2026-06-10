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
				
						<div class="row">
							<div class="col-md-6 mb-3">
								<label for="validationCustom01">@lang('lang.name_ar')</label>
								<input class="form-control" id="validationCustom01"  value="{{ $dailyEvents->name_ar}}" placeholder="" readonly>
							</div>
							
							<div class="col-md-6 mb-3">
								<label for="validationCustom01">التاريخ</label>
								<input class="form-control" id="validationCustom01"  value="{{ $dailyEvents->date." ".$dailyEvents->time}}" placeholder="" readonly>
							
							</div>
							
							@if($dailyEvents->address)
    							<div class="col-md-6 mb-3">
    								<label for="validationCustom01"> العنوان للرجال</label>
    								<input class="form-control" id="validationCustom01"  value="{{ $dailyEvents->address}}" placeholder="" readonly>
    						    </div>
								@endif
							@if($dailyEvents->f_address)
    							<div class="col-md-6 mb-3">
    								<label for="validationCustom01"> العنوان للنساء</label>
    								<input class="form-control" id="validationCustom01"  value="{{ $dailyEvents->f_address}}" placeholder="" readonly>
    
    							</div>
						
								@endif
								
									@if($dailyEvents->f_phone)
    							<div class="col-md-6 mb-3">
    								<label for="validationCustom01">  رقم الهاتف للنساء</label>
    								<input class="form-control" id="validationCustom01"  value="{{ $dailyEvents->f_phone}}" placeholder="" readonly>
    
    							</div>
						
								@endif
								
									@if($dailyEvents->phone)
    							<div class="col-md-6 mb-3">
    								<label for="validationCustom01">  رقم الهاتف للرجال</label>
    								<input class="form-control" id="validationCustom01"  value="{{ $dailyEvents->phone}}" placeholder="" readonly>
    
    							</div>
						
								@endif
								
									@if($dailyEvents->whatsApp_number)
    							<div class="col-md-6 mb-3">
    								<label for="validationCustom01">  رقم الواتس للرجال</label>
    								<input class="form-control" id="validationCustom01"  value="{{ $dailyEvents->whatsApp_number}}" placeholder="" readonly>
    
    							</div>
						
								@endif
								
									@if($dailyEvents->f_whatsApp_number)
    							<div class="col-md-6 mb-3">
    								<label for="validationCustom01">  رقم الواتس للنساء</label>
    								<input class="form-control" id="validationCustom01"  value="{{ $dailyEvents->f_whatsApp_number}}" placeholder="" readonly>
    
    							</div>
						
								@endif
							
							<div class="col-md-6 mb-3">
								<label for="validationCustom01">@lang('lang.family_name')</label>
								<input class="form-control" id="validationCustom01"  value="{{ $dailyEvents->family_name}}" placeholder="" readonly>

							</div>
							
			
							
                            <div class="col-md-12 mb-3">
                                <div class="col">
                                    <div class="mb-3 mb-0">
                                        <label for="exampleFormControlTextarea4">الوصف</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea4"  rows="10"  readonly>{{ $dailyEvents->description_ar }}</textarea>
                                    </div>
                                </div>
                            </div>

															
						</div>

						<div class="row">
							<div class="col-md-6 mb-3">
                             
                                 	@if ($dailyEvents->active ==1)
										<a class="btn btn-success"  href="{{ route('daily_events.change_status',$dailyEvents->id) }}">		@lang('lang.active')	</a>
											@else
											<a class="btn btn-danger"  href="{{ route('daily_events.change_status',$dailyEvents->id) }}">		@lang('lang.inactive')	</a>
											

											@endif
											
                              

                            </div>
					
						</div>

					
					
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