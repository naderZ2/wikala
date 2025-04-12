<?php $__env->startSection('title', 'Ecommerce'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/animate.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/chartist.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/owlcarousel.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/prism.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/select2.css')); ?>">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>

<style>
    .avatar {
      vertical-align: middle;
      width: 50px;
      height: 50px;
      border-radius: 50%;
    }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3><?php echo app('translator')->get('lang.Home'); ?></h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item"><?php echo app('translator')->get('lang.Dashboard'); ?></li>
<li class="breadcrumb-item active"><?php echo app('translator')->get('lang.Home'); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
  <div class="row size-column">
    <div class="col-xl-7 box-col-12 xl-100">
      <div class="row dash-chart">

  
        <div class="col-xl-6 box-col-6 col-lg-6 col-md-6 ">
          <div class="card o-hidden">
            <div class="card-body text-center">
              <div class="ecommerce-widgets media">
                <div class="media-body">
                  <h4 class="f-w-500 font-roboto"><?php echo app('translator')->get('lang.all_ads'); ?></h4>
                  <h4 class="f-w-500 mb-0 f-26"><span id="SpanOrders" class="counter"><?php echo e($allAds); ?></span></h4>
                </div>
                <div class="ecommerce-box light-bg-primary">
                  
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
                  <h4 class="f-w-500 font-roboto"><?php echo app('translator')->get('lang.active_ads'); ?></h4>
                  <h4 class="f-w-500 mb-0 f-26"><span id="SpanOrderDelivered" class="counter"><?php echo e($activeAds); ?></span></h4>
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
                  <h4 class="f-w-500 font-roboto"><?php echo app('translator')->get('lang.under_review_ads'); ?></h4>
                  <h4 class="f-w-500 mb-0 f-26"><span id="SpanOrderNotDelivered" class="counter"><?php echo e($underReviewAds); ?></span></h4>
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
                  <h4 class="f-w-500 font-roboto"><?php echo app('translator')->get('lang.rejected_ads'); ?></h4>
                  <h4 class="f-w-500 mb-0 f-26"><span id="SpanOrderNotDelivered" class="counter"><?php echo e($rejectedAds); ?></span></h4>
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
                  <h4 class="f-w-500 font-roboto"><?php echo app('translator')->get('lang.outdated_ads'); ?></h4>
                  <h4 class="f-w-500 mb-0 f-26"><span id="SpanOrderNotDelivered" class="counter"><?php echo e($outdatedAds); ?></span></h4>
                </div>
                <div class="ecommerce-box light-bg-primary"><i style="font-size: 30px" class="fas fa-clock"></i></div>
              </div>
            </div>
          </div>
        </div>

        
            
        

       
     


        <div class="row">



          <div class="col-sm-6">
            <div class="card">
            
              <div class="card-body">
              

                <h4 class="f-w-500 font-roboto"><?php echo app('translator')->get('lang.city'); ?></h4>
                <div class="d-flex justify-content-start col-sm-12 mt-3">
                  <select class="js-example-placeholder-multiple col-sm-12" id="sellerSelect" name="seller_id">
                    <option value="All"><?php echo app('translator')->get('lang.All'); ?></option>
                    
                </select>
              </div>
              

              
              </div>
            </div>
            
            
          </div>
          <div class="col-sm-6">
            <div class="card">
            
              <div class="card-body">
              

                <h4 class="f-w-500 font-roboto"><?php echo app('translator')->get('lang.region'); ?></h4>
              <div class="d-flex justify-content-start col-sm-12 mt-3">
                <select class="js-example-placeholder-multiple col-sm-12" id="sellerSelect" name="seller_id">
                      <option value="All"><?php echo app('translator')->get('lang.All'); ?></option>
                      
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

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>


<script src="<?php echo e(asset('assets/js/chart/chartjs/chart.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/chart/chartjs/chart.custom.js')); ?>"></script>


  <script src="<?php echo e(asset('assets/js/chart/chartist/chartist.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/js/chart/chartist/chartist-plugin-tooltip.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/js/chart/apex-chart/apex-chart.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/js/chart/apex-chart/stock-prices.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/js/prism/prism.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/js/clipboard/clipboard.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/js/counter/jquery.waypoints.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/js/counter/jquery.counterup.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/js/counter/counter-custom.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/js/custom-card/custom-card.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/js/owlcarousel/owl.carousel.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/js/dashboard/dashboard_2.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/js/select2/select2.full.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/select2/select2-custom.js')); ?>"></script>

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
          sellerDataContainer.html('<p class="text-center"><?php echo app('translator')->get("lang.Loading"); ?>...</p>');

          // Make an AJAX request to fetch seller data
          $.ajax({
              url: "<?php echo e(route('seller.details')); ?>", // Add this route in your web.php
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
                  // sellerDataContainer.html('<p class="text-center text-danger"><?php echo app('translator')->get("lang.Error_Fetching_Data"); ?></p>');
              }
          });
      });
  });
</script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\OneDrive\Desktop\_\codeing\work\mazen\wikala\resources\views/admin/home.blade.php ENDPATH**/ ?>