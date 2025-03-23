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

  
        <div class="col-xl-6 box-col-6 col-lg-6 col-md-6 ">
          <div class="card o-hidden">
            <div class="card-body text-center">
              <div class="ecommerce-widgets media">
                <div class="media-body">
                  <h4 class="f-w-500 font-roboto">@lang('lang.Orders_Count')</h4>
                  <h4 class="f-w-500 mb-0 f-26"><span id="SpanOrders" class="counter">{{ $orders->count() }}</span></h4>
                </div>
                <div class="ecommerce-box light-bg-primary"><i style="font-size: 30px" class="icofont icofont-ebook"></i></div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-6 box-col-6 col-lg-6 col-md-6 ">
          <div class="card o-hidden">
            <div class="card-body text-center">
              <div class="ecommerce-widgets media">
                <div class="media-body">
                  <h4 class="f-w-500 font-roboto">@lang(
                  'lang.Order_Delivereds_Number')</h4>
                  <h4 class="f-w-500 mb-0 f-26"><span id="SpanOrderDelivered" class="counter">{{ $orderDelivered->count() }}</span></h4>
                </div>
                <div class="ecommerce-box light-bg-primary"><i style="font-size: 30px" class="icofont icofont-thumbs-up"></i></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6 box-col-6 col-lg-6 col-md-6 ">
          <div class="card o-hidden">
            <div class="card-body text-center">
              <div class="ecommerce-widgets media">
                <div class="media-body">
                  <h4 class="f-w-500 font-roboto">@lang('lang.Order_Not_Delivereds_Number')</h4>
                  <h4 class="f-w-500 mb-0 f-26"><span id="SpanOrderNotDelivered" class="counter">{{ $orderNotDelivered->count() }}</span></h4>
                </div>
                <div class="ecommerce-box light-bg-primary"><i style="font-size: 30px" class="icofont icofont-not-allowed"></i></div>
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

       
        <div class="row">



          <div class="col-sm-6">
            <div class="card">
            
              <div class="card-body">
              

              <div class="d-flex justify-content-start col-sm-12 mt-3">
                <select class="js-example-placeholder-multiple col-sm-12" id="sellerSelect" name="seller_id">
                      <option value="All">@lang('lang.All')</option>
                      @foreach ($sellers as $seller)
                          <option value="{{ $seller->id }}">{{ $seller->name }}</option>
                      @endforeach
                </select>
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
      // Handle seller selection
      $('#sellerSelect').on('change', function () {
          var sellerId = $(this).val();
          var sellerDataContainer = $('#sellerData');
          var SpanOrderNotDelivered = $('#SpanOrderNotDelivered');
          var SpanOrderDelivered = $('#SpanOrderDelivered');
          var SpanOrders = $('#SpanOrders');

          // Clear previous data
          sellerDataContainer.html('<p class="text-center">@lang("lang.Loading")...</p>');

          // Make an AJAX request to fetch seller data
          $.ajax({
              url: "{{ route('seller.details') }}", // Add this route in your web.php
              type: 'GET',
              data: { seller_id: sellerId },
              success: function (response) {
                
                console.log(response);
                
                if (response) {
                    console.log("done");
                    SpanOrderNotDelivered.html(`${response.orderNotDelivered}`)
                      SpanOrderDelivered.html(`${response.orderDelivered}`)
                        SpanOrders.html(`${response.orders}`)


                    // $('#totalOrders').text(response.total_orders || 0);
                    //     $('#deliveredOrders').text(response.delivered_orders || 0);
                    //     $('#notDeliveredOrders').text(response.not_delivered_orders || 0);
                  
                    
                      // Populate seller details
                    

                      
                
                      
                  } else {
                    // console.log(response.orders);
                      sellerDataContainer.html('<p class="counter">0</p>');
                  }
              },
              error: function (xhr) {
                  console.error(xhr.responseText);
                  // sellerDataContainer.html('<p class="text-center text-danger">@lang("lang.Error_Fetching_Data")</p>');
              }
          });
      });
  });
</script>

@endsection

