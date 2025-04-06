<?php $__env->startSection('title', 'Ad Details'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/select2.css')); ?>">
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
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('assets/js/select2/select2.full.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/select2/select2-custom.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/form-validation-custom.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\OneDrive\Desktop\_\codeing\work\mazen\wikala\resources\views/admin/ads/details.blade.php ENDPATH**/ ?>