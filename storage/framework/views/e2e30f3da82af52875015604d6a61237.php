<?php $__env->startSection('title', 'Ad Details'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/select2.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/photoswipe.css')); ?>">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3><?php echo app('translator')->get('lang.ad_details'); ?></h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item"><?php echo app('translator')->get('lang.ads'); ?></li>
<li class="breadcrumb-item active"><?php echo app('translator')->get('lang.ad_details'); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="mb-4">
				<a href="<?php echo e(route('ads.editStatus', $ad->id)); ?>" class="btn btn-primary">
					<?php echo app('translator')->get('lang.change_status'); ?>
				</a>
			</div>
			<div class="card">
				<div class="card-body">
					

					<div class="row mb-3">
						<div class="col-md-3 fw-bold"><?php echo app('translator')->get('lang.Ad_Number'); ?>:</div>
						<div class="col-md-9"><?php echo e($ad->ad_number); ?></div>
					</div>

					<div class="row mb-3">
						<div class="col-md-3 fw-bold"><?php echo app('translator')->get('lang.Title'); ?>:</div>
						<div class="col-md-9"><?php echo e($ad->title); ?></div>
					</div>

					<div class="row mb-3">
						<div class="col-md-3 fw-bold"><?php echo app('translator')->get('lang.description'); ?>:</div>
						<div class="col-md-9"><?php echo e($ad->description); ?></div>
					</div>

					<div class="row mb-3">
						<div class="col-md-3 fw-bold"><?php echo app('translator')->get('lang.Category'); ?>:</div>
						<div class="col-md-9"><?php echo e($ad?->category?->name ?? '-'); ?></div>
					</div>

					<div class="row mb-3">
						<div class="col-md-3 fw-bold"><?php echo app('translator')->get('lang.Type'); ?>:</div>
						<div class="col-md-9"><?php echo e($ad?->adsType?->name ?? '-'); ?></div>
					</div>

					<div class="row mb-3">
						<div class="col-md-3 fw-bold"><?php echo app('translator')->get('lang.Client'); ?>:</div>
						<div class="col-md-9"><?php echo e($ad?->user?->name ?? '-'); ?></div>
					</div>

					<div class="row mb-3">
						<div class="col-md-3 fw-bold"><?php echo app('translator')->get('lang.Contact_Method'); ?>:</div>
						<div class="col-md-9"><?php echo e(ucfirst($ad?->contact_method) ?? '-'); ?></div>
					</div>

					<div class="row mb-3">
						<div class="col-md-3 fw-bold"><?php echo app('translator')->get('lang.Possibility_Negotiable'); ?>:</div>
						<div class="col-md-9"><?php echo e($ad?->negotiable ? __('lang.Yes') : __('lang.No')); ?></div>
					</div>

					<div class="row mb-3">
						<div class="col-md-3 fw-bold"><?php echo app('translator')->get('lang.Status'); ?>:</div>
						<div class="col-md-9"><?php echo app('translator')->get('lang.' . $ad?->status); ?></div>
					</div>
					<?php if($ad->status === 'rejected'): ?>
					<div class="row mb-3">
						<div class="col-md-3 fw-bold"><?php echo app('translator')->get('lang.Rejected_Reason'); ?>:</div>
						<div class="col-md-9"><?php echo e($ad?->rejectedReason?->name ?? '-'); ?></div>
					</div>
					<?php endif; ?>

					<div class="row mb-3">
						<div class="col-md-3 fw-bold"><?php echo app('translator')->get('lang.Start_Date'); ?>:</div>
						<div class="col-md-9"><?php echo e($ad?->start_date); ?></div>
					</div>

					<div class="row mb-3">
						<div class="col-md-3 fw-bold"><?php echo app('translator')->get('lang.End_Date'); ?>:</div>
						<div class="col-md-9"><?php echo e($ad?->end_date); ?></div>
					</div>

					
				</div>
			</div>
			<div class="card">
				<div class="card-body">
					<div class="card-header">
						<h5><?php echo app('translator')->get('lang.ad_attributes'); ?></h5>
					 </div>
					

					<?php $__currentLoopData = $ad->attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attributes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					
					<div class="row mb-3">
						<div class="col-md-3 fw-bold"><?php echo app('translator')->get('lang.Name'); ?>:</div>
						<div class="col-md-9"><?php echo e($attributes->attribute->name); ?></div>
					</div>
					<div class="row mb-3">
						
						<div class="col-md-3 fw-bold"><?php echo app('translator')->get('lang.Image'); ?>:</div>
					</div>
					<div class="gallery my-gallery card-body row" itemscope="">
						<figure class="col-xl-3 col-md-4 col-6" itemprop="associatedMedia" itemscope="">
							<a href="<?php echo e(asset($attributes->attribute->image)); ?>" itemprop="contentUrl" data-size="1600x950"><img class="img-thumbnail" src='<?php echo e(asset($attributes->attribute->image)); ?>' itemprop="thumbnail" alt="Image description"></a>
							
						</figure>
					</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



					
				</div>
			</div>
			

			<div class="card">
				<div class="card-header">
				   <h5><?php echo app('translator')->get('lang.images'); ?></h5>
				</div>
				<div class="gallery my-gallery card-body row" itemscope="">
					<?php $__currentLoopData = $ad->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					
					<figure class="col-xl-3 col-md-4 col-6" itemprop="associatedMedia" itemscope="">
						<a href="<?php echo e(asset($image->image_path)); ?>" itemprop="contentUrl" data-size="1600x950"><img class="img-thumbnail" src='<?php echo e(asset($image->image_path)); ?>' itemprop="thumbnail" alt="Image description"></a>
						
					</figure>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				   
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('assets/js/select2/select2.full.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/select2/select2-custom.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/form-validation-custom.js')); ?>"></script>

<script src="<?php echo e(asset('assets/js/photoswipe/photoswipe.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/photoswipe/photoswipe-ui-default.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/photoswipe/photoswipe.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\OneDrive\Desktop\_\codeing\work\mazen\wikala\resources\views/admin/ads/details.blade.php ENDPATH**/ ?>