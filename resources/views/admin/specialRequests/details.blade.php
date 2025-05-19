@extends('admin.layout.master')
@section('title', 'Validation Forms')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">

@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>@lang('lang.details')</h3>
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
								<h4>@lang('lang.family_name') : {{$specialRequest->family_name}}</h4>
								<h4>@lang('lang.Category') : {{app()->getLocale() == "en"? $specialRequest?->category?->name_en:$specialRequest?->category?->name_ar }}</h4>
								<h4>@lang('lang.regions') : {{app()->getLocale() == "en"? $specialRequest?->area?->name_en:$specialRequest?->area?->name_ar }}</h4>
								<h4>@lang('lang.budget') : {{$specialRequest->budget}}</h4>
								<h4>@lang('lang.date') : {{ $specialRequest->date}} </h4>
								<h4>@lang('lang.Time') : {{ $specialRequest->time}} </h4>
								<h4>@lang('lang.description') : {{$specialRequest->description}}</h4>
							</div>
						</div>

						
						<div class="row">
							<div class="col-sm-12">
								<a href="{{route('admin.specialRequest.create',$specialRequest->id)}}"  class="btn btn-primary">@lang('lang.addSpecialRequest')</a>
								<div class="card">

									<div class="table-responsive">
										<table class="table">
											<thead>
												<tr>
													<th scope="col">#</th>
													<th scope="col">@lang('lang.Name')</th>
													<th class="text-center">@lang('lang.Type')</th>
													<th class="text-center">@lang('lang.content')</th>
												</tr>
											</thead>
											<tbody>
												@foreach ($specialRequestDetails as $Request)
													<tr>
														<th scope="row">{{$loop->iteration}}</th>
														@if ($Request->role=='admin')
															<td>{{ $Request->admin?->name}}</td>
														@else
															<td>{{ $Request->user?->name}}</td>
														@endif

														<td class="text-center">{{  $Request->type }}</td>
														@if ($Request->type == 'text')
														<td class="text-center">{{  $Request->content }}</td>
														@endif
														@if ($Request->type == 'file')
														
														<td class="text-center"><a href="{{asset($Request->content)}}" target="_blank">@lang('lang.content')</a></td>
														@endif
														
															


													</tr> 
												@endforeach
											</tbody>
											<tfoot>
												<tr>
													{{-- <td>@lang('lang.Total_Price')</td> --}}
													{{-- <td>{{ $order['total_price'] }}</td> --}}
												</tr>
											</tfoot>
										</table>
								
					
					
									</div>
								</div>
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