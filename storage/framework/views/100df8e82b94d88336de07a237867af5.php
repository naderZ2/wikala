
<?php $__env->startSection('title', 'Validation Forms'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/select2.css')); ?>">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3><?php echo app('translator')->get('lang.contact_us'); ?> </h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item"><?php echo app('translator')->get('lang.contact_us'); ?></li>
<li class="breadcrumb-item active"><?php echo app('translator')->get('lang.contact_us'); ?>  </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
			
				<div class="card-body">
					<form class="needs-validation" novalidate="" method="POST" enctype="multipart/form-data" action="<?php echo e(route('settings.update')); ?>">
                        <?php echo csrf_field(); ?>
						<div class="row">
							<div class="col-md-6 mb-3">
								<label for="validationCustom01"><?php echo app('translator')->get('lang.whatsapp_Number'); ?>
								    </label>
								<input class="form-control" id="validationCustom01" type="text" name="whatsapp_number" value="<?php echo e($settings->whatsapp_number); ?>" placeholder="whatsapp Number" required="">
								<div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please choose a whatsapp Number.</div>
							</div>

							<div class="col-md-6 mb-3">
								<label for="validationCustom01"><?php echo app('translator')->get('lang.phone'); ?>
								    </label>
								<input class="form-control" id="validationCustom01" type="text" name="phone" value="<?php echo e($settings->phone); ?>" placeholder="Phone Number" required="">
								<div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please choose a Phone Number.</div>
							</div>
							<div class="col-md-6 mb-3">
								<label for="validationCustom01"><?php echo app('translator')->get('lang.Email'); ?>
								    </label>
								<input class="form-control" id="validationCustom01" type="text" name="email" value="<?php echo e($settings->email); ?>" placeholder="Email" required="">
								<div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please choose a Email.</div>
							</div>
				
						
						
							<div class="col-md-6 mb-3">
								<label for="validationCustom01"><?php echo app('translator')->get('lang.facebook'); ?></label>
								<input class="form-control" id="validationCustom01" type="text" name="facebook" value="<?php echo e($settings->facebook); ?>" placeholder="facebook" required="">
								<div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please choose a facebook.</div>
							</div>
							<div class="col-md-6 mb-3">
								<label for="validationCustom01"><?php echo app('translator')->get('lang.insta'); ?></label>
								<input class="form-control" id="validationCustom01" type="text" name="insta" value="<?php echo e($settings->insta); ?>" placeholder="insta" required="">
								<div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please choose a insta.</div>

							</div>

							<div class="col-md-6 mb-3">
								<label for="validationCustom01"><?php echo app('translator')->get('lang.instance'); ?></label>
								<input class="form-control" id="validationCustom01" type="text" name="instance_id" value="<?php echo e($settings->instance_id); ?>" required="">
								<div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please choose a instance_id.</div>
							</div>
							<div class="col-md-6 mb-3">
								<label for="validationCustom01"><?php echo app('translator')->get('lang.access_token'); ?></label>
								<input class="form-control" id="validationCustom01" type="text" name="access_token" value="<?php echo e($settings->access_token); ?>" required="">
								<div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please choose a access_token.</div>
							</div>

							
				
						
					</div>
			
						
						
							
						<button class="btn btn-primary" type="submit"><?php echo app('translator')->get('lang.edit'); ?></button>
					</form>
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
<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\OneDrive\Desktop\_\codeing\work\mazen\wikala\resources\views/admin/settings/edit.blade.php ENDPATH**/ ?>