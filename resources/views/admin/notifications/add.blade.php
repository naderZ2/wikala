@extends('admin.layout.master')
@section('title', trans('lang.add_Notification'))

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
                                <div class="valid-feedback">@lang('lang.looks_good')</div>
                                <div class="invalid-feedback">@lang('lang.please_choose_title')</div>
        
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="section_name">@lang('lang.Title_En')</label>
                                <input class="form-control" id="section_name" type="text" name="name_en" value="" placeholder="" required="">
                                <div class="valid-feedback">@lang('lang.looks_good')</div>
                                <div class="invalid-feedback">@lang('lang.please_choose_title')</div>
        
                            </div>
    
                            <div class="col-md-6 mb-3">
                                <div class="col">
                                    <div class="mb-3 mb-0">
                                        <label for="exampleFormControlTextarea4">@lang('lang.Body_ar')</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea4" name="description_ar" rows="3" required></textarea>
                                        <div class="valid-feedback">@lang('lang.looks_good')</div>
                                        <div class="invalid-feedback">@lang('lang.please_choose_desc')</div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="col">
                                    <div class="mb-3 mb-0">
                                        <label for="exampleFormControlTextarea4">@lang('lang.Body_En')</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea4" name="description_en" rows="3" required></textarea>
                                        <div class="valid-feedback">@lang('lang.looks_good')</div>
                                        <div class="invalid-feedback">@lang('lang.please_choose_desc')</div>
                                    </div>
                                </div>
                               
                            </div>
    

                            <div class="col-md-12 mb-3">
                                <label for="validationCustom03">@lang('lang.Type')</label>

                                <select class="form-control col-sm-12"  id="validationCustom03"  name="type" required >
                                    <option value="1">@lang('lang.general_notification')</option>
                                </select>
                                <div class="invalid-feedback">@lang('lang.please_provide_type')</div>

                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="recipient_type">@lang('lang.send_to')</label>
                                <select class="form-control col-sm-12" id="recipient_type" name="recipient_type" required>
                                    <option value="">@lang('lang.select_recipients')</option>
                                    <option value="all">@lang('lang.all_users_total_subs')</option>
                                    <option value="clients">@lang('lang.clients_only')</option>
                                    <option value="sellers">@lang('lang.sellers_only')</option>
                                    <option value="specific_seller">@lang('lang.specific_seller')</option>
                                </select>
                                <small class="form-text text-muted">
                                    <strong>@lang('lang.all_users')</strong> @lang('lang.sends_to_total_subs_hint')
                                </small>
                                <div class="invalid-feedback">@lang('lang.please_select_recipients')</div>
                            </div>
    
                            <div class="col-md-6 mb-3" id="seller_section" style="display: none;">
                                <label for="validationCustom01">@lang('lang.Sellers')</label>

                                <select class="js-example-placeholder-multiple col-sm-12"  id="seller_select"  name="seller_id"  >
                                    <option value=""></option>
                                    @forelse ($sellers as $seller)
                                        <option value="{{ $seller->id }}">{{ $seller->name }}</option>
                                    @empty

                                    @endforelse

                                </select>
                                <div class="invalid-feedback">@lang('lang.please_provide_seller')</div>

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
                                <div class="invalid-feedback">@lang('lang.please_provide_region')</div>

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
<script>
document.getElementById('recipient_type').addEventListener('change', function() {
    const sellerSection = document.getElementById('seller_section');
    if (this.value === 'specific_seller') {
        sellerSection.style.display = 'block';
        document.getElementById('seller_select').required = true;
    } else {
        sellerSection.style.display = 'none';
        document.getElementById('seller_select').required = false;
        document.getElementById('seller_select').value = '';
    }
});
</script>
@endsection