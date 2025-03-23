<?php $__env->startSection('title', 'Validation Forms'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/select2.css')); ?>">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3><?php echo app('translator')->get('lang.add_category'); ?></h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item"><?php echo app('translator')->get('lang.Categories'); ?></li>
<li class="breadcrumb-item active"><?php echo app('translator')->get('lang.add_category'); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
			
				<div class="card-body">
					<form class="needs-validation" novalidate="" method="POST" enctype="multipart/form-data" action="<?php echo e(route('category.store')); ?>">
                        <?php echo csrf_field(); ?>
						<div class="row">
							<div class="col-md-6 mb-3">
								<label for="validationCustom01"><?php echo app('translator')->get('lang.name_ar'); ?></label>
								<input class="form-control" id="validationCustom01" type="text" name="name_ar" value="<?php echo e(old('name_ar')); ?>" placeholder="" required="">
								<div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please choose a name.</div>

							</div>

							<div class="col-md-6 mb-3">
								<label for="validationCustom01"><?php echo app('translator')->get('lang.name_en'); ?></label>
								<input class="form-control" id="validationCustom01" type="text" name="name_en" value="<?php echo e(old('name_en')); ?>" placeholder="" required="">
								<div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please choose a name.</div>
                                
							</div>											
							<div class="col-md-6 mb-3">
								<label for="validationCustom01"><?php echo app('translator')->get('lang.order'); ?></label>
								<input class="form-control" id="validationCustom01" type="number" name="order" value="<?php echo e(old('order')); ?>" placeholder="" required="">
								<div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please choose a order.</div>
                                
							</div>											
						</div>

						<div class="row">
							<div class="col-md-6 mb-3">
                                <label for="validationCustom03"><?php echo app('translator')->get('lang.parent_category'); ?></label>

                                <select class="js-example-placeholder-multiple col-sm-12"  id="validationCustom03"  name="parent_id[]"  multiple="multiple">
                                    <option value="" required></option>

                                    <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        
                                    <?php endif; ?>
                              
                                </select>
                                <div class="invalid-feedback">Please provide a valid category.</div>

                            </div>
							<!--<div class="col-md-6">-->
							<!--		<div class="card-body animate-chk">-->
							<!--			<div class="row">-->
							<!--				<div class="col">-->
							<!--					<label class="d-block" for="chk-ani">-->
							<!--					<input class="checkbox_animated" id="chk-ani" type="checkbox" name="end_point" value="1">           -->
							<!--					<?php echo app('translator')->get('lang.final_category'); ?>-->
							<!--					</label>-->
												
							<!--				</div>-->
							<!--			</div>-->
							<!--		</div>-->
							<!--</div>-->
						</div>

						<div class="mb-3">
                            <div class="col-md-12 mb-3">
                                <div class="col">
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label"><?php echo app('translator')->get('lang.add_image'); ?></label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="file" name="image" value="<?php echo e(old('image')); ?>" required accept="image/*">
                                        </div>
                                    </div>
                                </div>
                            </div>							
						</div>
						<button class="btn btn-primary" type="submit"><?php echo app('translator')->get('lang.save'); ?></button>
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
<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\OneDrive\Desktop\_\codeing\work\mazen\ezhalhaUpTo9\ezhalha\resources\views/admin/category/add.blade.php ENDPATH**/ ?>