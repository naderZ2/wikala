@extends('admin.layout.master')
@section('title', 'Ecommerce')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/chartist.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/owlcarousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/prism.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">

@endsection

@section('style')

<style>
    .avatar {
      vertical-align: middle;
      width: 50px;
      height: 50px;
      border-radius: 50%;
    }
    </style>
@endsection

@section('breadcrumb-title')
<h3>@lang('lang.Home')</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">@lang('lang.Dashboard')</li>
<li class="breadcrumb-item active">@lang('lang.Home')</li>
@endsection

@section('content')
<div class="container-fluid">
  <div class="row size-column">
    <div class="col-xl-7 box-col-12 xl-100">
      <div class="row dash-chart">

  
        {{-- E-commerce Statistics --}}
        <div class="col-xl-6 box-col-6 col-lg-6 col-md-6 ">
          <div class="card o-hidden">
            <div class="card-body text-center">
              <div class="ecommerce-widgets media">
                <div class="media-body">
                  <h4 class="f-w-500 font-roboto">@lang('lang.Sellers')</h4>
                  <h4 class="f-w-500 mb-0 f-26"><span class="counter">{{ $totalSellers }}</span></h4>
                </div>
                <div class="ecommerce-box light-bg-primary"><i style="font-size: 30px" class="fas fa-users"></i></div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-6 box-col-6 col-lg-6 col-md-6 ">
          <div class="card o-hidden">
            <div class="card-body text-center">
              <div class="ecommerce-widgets media">
                <div class="media-body">
                  <h4 class="f-w-500 font-roboto">@lang('lang.total_income')</h4>
                  <h4 class="f-w-500 mb-0 f-26"><span class="counter">{{ number_format($totalIncome, 2) }}</span> <span class="f-14">@lang('lang.sar')</span></h4>
                </div>
                <div class="ecommerce-box light-bg-primary"><i style="font-size: 30px" class="fas fa-money-bill-wave"></i></div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-6 box-col-6 col-lg-6 col-md-6 ">
          <div class="card o-hidden">
            <div class="card-body text-center">
              <div class="ecommerce-widgets media">
                <div class="media-body">
                  <h4 class="f-w-500 font-roboto">@lang('lang.Products')</h4>
                  <h4 class="f-w-500 mb-0 f-26"><span class="counter">{{ $totalProducts }}</span></h4>
                </div>
                <div class="ecommerce-box light-bg-primary"><i style="font-size: 30px" class="fas fa-box-open"></i></div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-6 box-col-6 col-lg-6 col-md-6 ">
          <div class="card o-hidden">
            <div class="card-body text-center">
              <div class="ecommerce-widgets media">
                <div class="media-body">
                  <h4 class="f-w-500 font-roboto">@lang('lang.Orders')</h4>
                  <h4 class="f-w-500 mb-0 f-26"><span class="counter">{{ $totalOrders }}</span></h4>
                </div>
                <div class="ecommerce-box light-bg-primary"><i style="font-size: 30px" class="fas fa-shopping-cart"></i></div>
              </div>
            </div>
          </div>
        </div>

        {{-- @foreach ($sections as $section) --}}
            {{-- <div class="col-xl-6 box-col-6 col-lg-12 col-md-6">
                <div class="card o-hidden">
                <div class="card-body">
                    <div class="ecommerce-widgets media">
                    <div class="media-body">
                        <p class="f-w-500 font-roboto">{{ $section->name }}</p>
                        <h4 class="f-w-500 mb-0 f-26"><span class="counter">{{ $section->consultations_count }}</span></h4>
                    </div>
                    <div class="ecommerce-box light-bg-primary"><img src="{{ asset('storage/'.$section->image) }}" alt="Avatar" class="avatar">
                    </div>
                    </div>
                </div>
                </div>
            </div>  --}}
        {{-- @endforeach --}}

       
     





      </div>
    </div>

 
  </div>
</div>

@endsection

@section('script')
{{-- <script src="{{asset('assets/js/chart/apex-chart/apex-chart.js')}}"></script>
<script src="{{asset('assets/js/chart/apex-chart/stock-prices.js')}}"></script>
<script src="{{asset('assets/js/chart/apex-chart/chart-custom.js')}}"></script> --}}

<script src="{{asset('assets/js/chart/chartjs/chart.min.js')}}"></script>
<script src="{{asset('assets/js/chart/chartjs/chart.custom.js')}}"></script>


  <script src="{{asset('assets/js/chart/chartist/chartist.js')}}"></script>
  <script src="{{asset('assets/js/chart/chartist/chartist-plugin-tooltip.js')}}"></script>
  <script src="{{asset('assets/js/chart/apex-chart/apex-chart.js')}}"></script>
  <script src="{{asset('assets/js/chart/apex-chart/stock-prices.js')}}"></script>
  <script src="{{asset('assets/js/prism/prism.min.js')}}"></script>
  <script src="{{asset('assets/js/clipboard/clipboard.min.js')}}"></script>
  <script src="{{asset('assets/js/counter/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('assets/js/counter/jquery.counterup.min.js')}}"></script>
  <script src="{{asset('assets/js/counter/counter-custom.js')}}"></script>
  <script src="{{asset('assets/js/custom-card/custom-card.js')}}"></script>
  <script src="{{asset('assets/js/owlcarousel/owl.carousel.js')}}"></script>
  <script src="{{asset('assets/js/dashboard/dashboard_2.js')}}"></script>
  <script src="{{asset('assets/js/select2/select2.full.min.js')}}"></script>
<script src="{{asset('assets/js/select2/select2-custom.js')}}"></script>

<script>
  $(document).ready(function () {
      // Setup logic for E-commerce stats if needed
  });
</script>


@endsection

