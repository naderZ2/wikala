
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
            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold"><?php echo app('translator')->get('lang.Report_ID'); ?>:</div>
                        <div class="col-md-9"><?php echo e($report->id); ?></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold"><?php echo app('translator')->get('lang.Reporter'); ?>:</div>
                        <div class="col-md-9"><?php echo e($report->reporter->name); ?></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold"><?php echo app('translator')->get('lang.Report_Option'); ?>:</div>
                        <div class="col-md-9"><?php echo e($report->reportOption->title_en); ?></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold"><?php echo app('translator')->get('lang.Additional_Notes'); ?>:</div>
                        <div class="col-md-9"><?php echo e($report->additional_notes ?? trans('lang.no_data')); ?></div>
                    </div>
                    
					
					<?php if($report->adSpecificRelation): ?>
					<div class="row mb-3">
						<div class="col-md-3 fw-bold"><?php echo app('translator')->get('lang.Ad_Title'); ?>:</div>
						<div class="col-md-9"><?php echo e($report->adSpecificRelation->title ?? trans('lang.no_data')); ?></div>
					</div>
					<div class="row mb-3">
						<div class="col-md-3 fw-bold"><?php echo app('translator')->get('lang.Ad_Number'); ?>:</div>
						<div class="col-md-9"><?php echo e($report->adSpecificRelation->ad_number ?? trans('lang.no_data')); ?></div>
					</div>
					<?php endif; ?>

					<?php if($report->UserSpecificRelation): ?>
					<div class="row mb-3">
						<div class="col-md-3 fw-bold"><?php echo app('translator')->get('lang.User_Specific_Relation'); ?>:</div>
						<div class="col-md-9"><?php echo e($report->user_specific_relation->name ?? trans('lang.no_data')); ?></div>
					</div>
					<?php endif; ?>
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

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\OneDrive\Desktop\_\codeing\work\mazen\wikala\resources\views/admin/reports/details.blade.php ENDPATH**/ ?>