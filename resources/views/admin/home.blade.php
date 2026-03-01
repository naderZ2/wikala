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
                  <h4 class="f-w-500 font-roboto">@lang('lang.all_ads')</h4>
                  <h4 class="f-w-500 mb-0 f-26"><span id="SpanOrders" class="counter">{{ $allAds }}</span></h4>
                </div>
                <div class="ecommerce-box light-bg-primary">
                  {{-- <i style="font-size: 30px" class="icofont icofont-ebook"></i> --}}
                  <i style="font-size: 30px" class="fas fa-ad"></i></div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-6 box-col-6 col-lg-6 col-md-6 ">
          <div class="card o-hidden">
            <div class="card-body text-center">
              <div class="ecommerce-widgets media">
                <div class="media-body">
                  <h4 class="f-w-500 font-roboto">@lang('lang.active_ads')</h4>
                  <h4 class="f-w-500 mb-0 f-26"><span id="SpanOrderDelivered" class="counter">{{ $activeAds }}</span></h4>
                </div>
                <div class="ecommerce-box light-bg-primary"><i style="font-size: 30px" class="fas fa-bullhorn"></i></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6 box-col-6 col-lg-6 col-md-6 ">
          <div class="card o-hidden">
            <div class="card-body text-center">
              <div class="ecommerce-widgets media">
                <div class="media-body">
                  <h4 class="f-w-500 font-roboto">@lang('lang.under_review_ads')</h4>
                  {{-- <h4 class="f-w-500 mb-0 f-26"><span id="SpanOrderNotDelivered" class="counter">{{ $underReviewAds }}</span></h4> --}}
                  <h4 class="f-w-500 mb-0 f-26"><span id="SpanUnderReview" class="counter">{{ $underReviewAds }}</span></h4>

                </div>
                <div class="ecommerce-box light-bg-primary"><i style="font-size: 30px" class="fas fa-search"></i></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6 box-col-6 col-lg-6 col-md-6 ">
          <div class="card o-hidden">
            <div class="card-body text-center">
              <div class="ecommerce-widgets media">
                <div class="media-body">
                  <h4 class="f-w-500 font-roboto">@lang('lang.rejected_ads')</h4>
                  {{-- <h4 class="f-w-500 mb-0 f-26"><span id="SpanOrderNotDelivered" class="counter">{{ $rejectedAds }}</span></h4> --}}
                  <h4 class="f-w-500 mb-0 f-26"><span id="SpanRejected" class="counter">{{ $rejectedAds }}</span></h4>

                </div>
                <div class="ecommerce-box light-bg-primary"><i style="font-size: 30px" class="icofont icofont-not-allowed"></i></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6 box-col-6 col-lg-6 col-md-6 ">
          <div class="card o-hidden">
            <div class="card-body text-center">
              <div class="ecommerce-widgets media">
                <div class="media-body">
                  <h4 class="f-w-500 font-roboto">@lang('lang.outdated_ads')</h4>
                  {{-- <h4 class="f-w-500 mb-0 f-26"><span id="SpanOrderNotDelivered" class="counter">{{ $outdatedAds }}</span></h4> --}}
                  <h4 class="f-w-500 mb-0 f-26"><span id="SpanOutdated" class="counter">{{ $outdatedAds }}</span></h4>

                </div>
                <div class="ecommerce-box light-bg-primary"><i style="font-size: 30px" class="fas fa-clock"></i></div>
              </div>
            </div>
          </div>
        </div>

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

       
     


        <div class="row">



          <div class="col-sm-6">
            <div class="card">
            
              <div class="card-body">
              

                <h4 class="f-w-500 font-roboto">@lang('lang.city')</h4>
                <div class="d-flex justify-content-start col-sm-12 mt-3">
                  <select class="js-example-placeholder-multiple col-sm-12" id="citySelect" name="city_id">
                    <option value="All">@lang('lang.All')</option>
                    @foreach ($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </select>
              </div>
              

              
              </div>
            </div>
            
            
          </div>
          <div class="col-sm-6">
            <div class="card">
            
              <div class="card-body">
              

                <h4 class="f-w-500 font-roboto">@lang('lang.region')</h4>
              <div class="d-flex justify-content-start col-sm-12 mt-3">
                <select class="js-example-placeholder-multiple col-sm-12" id="regionSelect" name="region_id">
                  <option value="All">@lang('lang.All')</option>
                  
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
      
      function updateStats(cityId, regionId) {
          $('#SpanOrders').text('...');
          $('#SpanOrderDelivered').text('...');
          $('#SpanUnderReview').text('...');
          $('#SpanRejected').text('...');
          $('#SpanOutdated').text('...');

          $.ajax({
              url: "{{ route('ads.filteredStats') }}",
              type: 'GET',
              data: {
                  city_id: cityId,
                  region_id: regionId
              },
              success: function (response) {
                  if (response) {
                      $('#SpanOrders').text(response.allAds || 0);
                      $('#SpanOrderDelivered').text(response.activeAds || 0);
                      $('#SpanUnderReview').text(response.underReviewAds || 0);
                      $('#SpanRejected').text(response.rejectedAds || 0);
                      $('#SpanOutdated').text(response.outdatedAds || 0);
                  }
              },
              error: function (xhr) {
                  console.error(xhr.responseText);
              }
          });
      }

      $('#citySelect').on('change', function () {
          let cityId = $(this).val();

          $('#regionSelect').html('<option value="All">@lang("lang.Loading")...</option>');

          $.ajax({
              url: "{{ route('regions.byCity') }}",
              type: 'GET',
              data: { city_id: cityId },
              success: function (response) {
                  let options = `<option value="All">@lang('lang.All')</option>`;
                  if (response && response.length > 0) {
                      response.forEach(function (region) {
                          options += `<option value="${region.id}">${region.name}</option>`;
                      });
                  }
                  $('#regionSelect').html(options);
              }
          });

          updateStats(cityId, 'All');
      });

      $('#regionSelect').on('change', function () {
          let cityId = $('#citySelect').val();
          let regionId = $(this).val();
          updateStats(cityId, regionId);
      });
  });
</script>


@endsection

