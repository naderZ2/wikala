@extends('layouts.simple.master')
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
<h3>Home</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Dashboard</li>
<li class="breadcrumb-item active">Home</li>
@endsection

{{-- @section('content')
<div class="container-fluid">
  <div class="row size-column">
    <div class="col-xl-7 box-col-12 xl-100">
      <div class="row dash-chart">

  
        <div class="col-xl-12 box-col-12 col-lg-12 col-md-12 ">
          <div class="card o-hidden">
            <div class="card-body text-center">
              <div class="ecommerce-widgets media">
                <div class="media-body">
                  <p class="f-w-500 font-roboto">Total Consultations Number</p>
                  <h4 class="f-w-500 mb-0 f-26"><span class="counter">{{ $totalConsultations }}</span></h4>
                </div>
                <div class="ecommerce-box light-bg-primary"><i class="icofont icofont-ebook"></i></div>
              </div>
            </div>
          </div>
        </div>

        @foreach ($sections as $section)
            <div class="col-xl-6 box-col-6 col-lg-12 col-md-6">
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
            </div> 
        @endforeach

       
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
            
              <div class="card-body">
                <form class="needs-validation" novalidate="" method="GET" enctype="multipart/form-data" action="{{ route('index') }}">
                    @csrf
                    <div class="col-md-6 mb-3">
                      <label for="validationCustom03">Countries</label>

                      <select class="js-example-placeholder-multiple col-sm-12l"  id="validationCustom03"  name="country_id"  required="">
                          @forelse ($countries as $country)
                              <option value="{{ $country->id }}">{{ $country->name }}</option>
                          @empty
                              
                          @endforelse
                    
                      </select>
                      <div class="invalid-feedback">Please provide a valid country.</div>
    
                  </div>


                  <div class="row">
                      <div class="col-md-6 mb-3">
                          <label for="validationCustom03">Sections</label>

                          <select class="js-example-placeholder-multiple col-sm-12"  id="validationCustom03"  name="section_id" >
                            <option value=""></option>
                              @forelse ($sections as $section)
                                <option value="{{ $section->id }}">{{ $section->name }}</option>
                              @empty
                                  
                              @endforelse
                        
                          </select>
                        <div class="invalid-feedback">Please provide a valid Sections.</div>
      
                    </div>
      
                    <div class="col-md-6 mb-3">
                      <label for="validationCustom03">Gender</label>
                      <h1>{{ old('gender') }}</h1>
                      <select class="form-control" select2  id="validationCustom03"  name="gender"  required="">
                          <option value=""></option>
                          <option value="male" @selected( 'male' == old('gender'))>ذكر</option>  
                          <option value="female" @selected('female' ==old('gender'))>انثي</option>  
                      </select>
                      <div class="invalid-feedback">Please provide a valid country.</div>
                     </div>
                
                  </div>
             
                  <button class="btn btn-primary" type="submit">search </button>

                  <div class="col-xl-12 box-col-12 col-lg-12 col-md-12 mt-2">
                    <div class="card o-hidden">
                      <div class="card-body text-center">
                        <div class="ecommerce-widgets media">
                          <div class="media-body">
                            <p class="f-w-500 font-roboto">Results  Number</p>
                            <h4 class="f-w-500 mb-0 f-26"><span class="">{{ $searchResult  }}</span></h4>
                          </div>
                          <div class="ecommerce-box light-bg-primary"><i class="icofont icofont-ebook"></i></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            
          
          </div>
        </div>
      </div>
    </div>

 
  </div>
</div>

@endsection --}}

@section('script')
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
@endsection

