@extends('admin.layout.master')
@section('title', 'Ad Details')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/select2.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/photoswipe.css')}}">

@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>@lang('lang.ad_details')</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">@lang('lang.ads')</li>
<li class="breadcrumb-item active">@lang('lang.ad_details')</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="mb-4">
				<a href="{{ route('ads.editStatus', $ad->id) }}" class="btn btn-primary">
					@lang('lang.change_status')
				</a>
				@if($ad->is_sponsored)
				<form action="{{ route('ads.removeSponsor', $ad->id) }}" method="POST" class="d-inline">
					@csrf
					<button type="submit" class="btn btn-warning">
						@lang('lang.remove_sponsor')
					</button>
				</form>
				<span class="badge bg-success ms-2">@lang('lang.sponsored') - {{ $ad->sponsored_price }} @lang('lang.sar')</span>
				@else
				<a href="{{ route('ads.editSponsor', $ad->id) }}" class="btn btn-success">
					@lang('lang.set_sponsor')
				</a>
				@endif
			</div>
			<div class="card">
				<div class="card-body">
					{{-- <div class="row mb-3">
						<div class="col-md-3 fw-bold">@lang('lang.ID'):</div>
						<div class="col-md-9">{{ $ad->id }}
				</div>
			</div> --}}

			<div class="row mb-3">
				<div class="col-md-3 fw-bold">@lang('lang.Ad_Number'):</div>
				<div class="col-md-9">{{ $ad?->ad_number }}</div>
			</div>

			<div class="row mb-3">
				<div class="col-md-3 fw-bold">@lang('lang.Title'):</div>
				<div class="col-md-9">{{ $ad->title }}</div>
			</div>
			<div class="row mb-3">
				<div class="col-md-3 fw-bold">@lang('lang.city'):</div>
				<div class="col-md-9">{{ $ad?->city?->name }}</div>
			</div>
			<div class="row mb-3">
				<div class="col-md-3 fw-bold">@lang('lang.region'):</div>
				<div class="col-md-9">{{ $ad?->region?->name }}</div>
			</div>

			<div class="row mb-3">
				<div class="col-md-3 fw-bold">@lang('lang.description'):</div>
				<div class="col-md-9">{{ $ad->description }}</div>
			</div>

			<div class="row mb-3">
				<div class="col-md-3 fw-bold">@lang('lang.Category'):</div>
				<div class="col-md-9">{{ $ad?->category?->name ?? '-' }}</div>
			</div>

			<div class="row mb-3">
				<div class="col-md-3 fw-bold">@lang('lang.Type'):</div>
				<div class="col-md-9">{{ $ad?->adsType?->name ?? '-' }}</div>
			</div>

			<div class="row mb-3">
				<div class="col-md-3 fw-bold">@lang('lang.Client'):</div>
				<div class="col-md-9">{{ $ad?->user?->name ?? '-' }}</div>
			</div>

			<div class="row mb-3">
				<div class="col-md-3 fw-bold">@lang('lang.Contact_Method'):</div>
				<div class="col-md-9">{{ ucfirst($ad?->contact_method) ?? '-' }}</div>
			</div>

			<div class="row mb-3">
				<div class="col-md-3 fw-bold">@lang('lang.Possibility_Negotiable'):</div>
				<div class="col-md-9">{{ $ad?->negotiable ? __('lang.Yes') : __('lang.No') }}</div>
			</div>

			<div class="row mb-3">
				<div class="col-md-3 fw-bold">@lang('lang.Status'):</div>
				<div class="col-md-9">@lang('lang.' . $ad?->status)</div>
			</div>
			@if($ad->status === 'rejected')
			<div class="row mb-3">
				<div class="col-md-3 fw-bold">@lang('lang.Rejected_Reason'):</div>
				<div class="col-md-9">{{ $ad?->rejectedReason?->name ?? '-' }}</div>
			</div>
			@elseif($ad->rejectedReason)
			<div class="row mb-3">
				<div class="col-md-3 fw-bold">@lang('lang.Old_Rejected_Reason'):</div>
				<div class="col-md-9">{{ $ad?->rejectedReason?->name ?? '-' }}</div>
			</div>
			@endif

			<div class="row mb-3">
				<div class="col-md-3 fw-bold">@lang('lang.Start_Date'):</div>
				<div class="col-md-9">{{ $ad?->start_date }}</div>
			</div>

			<div class="row mb-3">
				<div class="col-md-3 fw-bold">@lang('lang.End_Date'):</div>
				<div class="col-md-9">{{ $ad?->end_date }}</div>
			</div>


		</div>
	</div>
	<div class="card">
		<div class="card-body">
			<div class="card-header">
				<h5>@lang('lang.ad_attributes')</h5>
			</div>
			{{-- <div class="row mb-3">
						<div class="col-md-3 fw-bold">@lang('lang.ID'):</div>
						<div class="col-md-9">{{ $ad->id }}
		</div>
	</div> --}}

	@foreach ($ad->attributes as $attributes)

	<div class="row mb-3">
		<div class="col-md-3 fw-bold">@lang('lang.Name'):</div>
		<div class="col-md-9">{{ $attributes?->attribute?->name }}</div>
	</div>
	<div class="row mb-3">
		<div class="col-md-3 fw-bold">@lang('lang.Image'):




		</div>

		{{-- <div class="col-md-9">{{ $attributes->attribute->image }}
	</div> --}}
	<div class="gallery my-gallery card-body row" itemscope="">
		<figure class="col-xl-3 col-md-4 col-6" itemprop="associatedMedia" itemscope="">
			<a href="{{asset($attributes?->attribute?->image)}}" itemprop="contentUrl" data-size="1600x950"><img class="img-thumbnail" src='{{asset($attributes?->attribute?->image)}}' itemprop="thumbnail" alt="Image description"></a>
			{{-- <figcaption itemprop="caption description"></figcaption> --}}
		</figure>
	</div>
</div>
@endforeach




</div>
</div>


<div class="card">
	<div class="card-header">
		<h5>@lang('lang.images')</h5>
	</div>
	<div class="gallery my-gallery card-body row" itemscope="">
		@foreach ( $ad->images as $image )

		<figure class="col-xl-3 col-md-4 col-6" itemprop="associatedMedia" itemscope="">
			<a href="{{asset($image->image_path)}}" itemprop="contentUrl" data-size="1600x950"><img class="img-thumbnail" src='{{asset($image->image_path)}}' itemprop="thumbnail" alt="Image description"></a>
			{{-- <figcaption itemprop="caption description"></figcaption> --}}
		</figure>
		@endforeach

	</div>
	<!-- Root element of PhotoSwipe. Must have class pswp.-->
	<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="pswp__bg"></div>
		<div class="pswp__scroll-wrap">
			<div class="pswp__container">
				<div class="pswp__item"></div>
				<div class="pswp__item"></div>
				<div class="pswp__item"></div>
			</div>
			<div class="pswp__ui pswp__ui--hidden">
				<div class="pswp__top-bar">
					<div class="pswp__counter"></div>
					<button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
					<button class="pswp__button pswp__button--share" title="Share"></button>
					<button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
					<button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
					<div class="pswp__preloader">
						<div class="pswp__preloader__icn">
							<div class="pswp__preloader__cut">
								<div class="pswp__preloader__donut"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
					<div class="pswp__share-tooltip"></div>
				</div>
				<button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
				<button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
				<div class="pswp__caption">
					<div class="pswp__caption__center"></div>
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
<script src="{{ asset('assets/js/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('assets/js/select2/select2-custom.js') }}"></script>
<script src="{{ asset('assets/js/form-validation-custom.js') }}"></script>

<script src="{{asset('assets/js/photoswipe/photoswipe.min.js')}}"></script>
<script src="{{asset('assets/js/photoswipe/photoswipe-ui-default.min.js')}}"></script>
<script src="{{asset('assets/js/photoswipe/photoswipe.js')}}"></script>
@endsection