<?php $__env->startSection('title', 'Validation Forms'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/select2.css')); ?>">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3><?php echo app('translator')->get('lang.add_Product'); ?></h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item"><?php echo app('translator')->get('lang.Products'); ?></li>
<li class="breadcrumb-item active"><?php echo app('translator')->get('lang.add_Product'); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
			
				<div class="card-body">
					<form class="needs-validation" novalidate="" method="POST" enctype="multipart/form-data" action="<?php echo e(route('product.store')); ?>">
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
								<label for="validationCustom01">title Ar</label>
								<input class="form-control" id="validationCustom01" type="text" name="title_ar" value="<?php echo e(old('title_ar')); ?>" placeholder="" required="">
								<div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please choose a title_ar.</div>
             
							</div>
							<div class="col-md-6 mb-3">
								<label for="validationCustom01">title En</label>
								<input class="form-control" id="validationCustom01" type="text" name="title_en" value="<?php echo e(old('title_en')); ?>" placeholder="" required="">
								<div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please choose a title_en.</div>
							</div>

							<div class="col-md-6 mb-3">
                                <label for="validationCustom03"><?php echo app('translator')->get('lang.Category'); ?></label>

                                <select class="js-example-placeholder-multiple col-sm-12"  id="validationCustom03"  name="category_id"  >
                                    <option value="">fff</option>
                                    <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        
                                    <?php endif; ?>
                              
                                </select>
                                <div class="invalid-feedback">Please provide a valid country.</div>

                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom03"><?php echo app('translator')->get('lang.Sellers'); ?></label>
                                <select class="js-example-placeholder-multiple col-sm-12"  id="validationCustom03"  name="seller_id"  required="">
									
									<option value="null" ><?php echo app('translator')->get('lang.Seller'); ?></option>                                  
                                
									<?php $__currentLoopData = $sellers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($seller?->id); ?>"><?php echo e($seller?->name); ?></option>                                  
										
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <div class="invalid-feedback">Please provide a valid Type.</div>
                            </div>
                            
                            <!--<div class="col-md-6 mb-3">-->
                            <!--    <label for="validationCustom03"></label>-->

                            <!--    <select class="js-example-placeholder-multiple col-sm-12"  id="validationCustom03"  name="picture"  >-->
                            <!--        <option value="0"> <?php echo app('translator')->get('lang.withoutFile'); ?></option>-->
                            <!--        <option value="1"><?php echo app('translator')->get('lang.withFile'); ?></option>-->
                                   
                            <!--    </select>-->
                            <!--    <div class="invalid-feedback">Please provide a valid country.</div>-->

                            <!--</div>-->
						</div>

						<div class="row">
						
							<div class="col-md-6 mb-3">
								<label for="validationCustom04"><?php echo app('translator')->get('lang.quantity'); ?> </label>
								<input class="form-control" id="validationCustom04" type="number" placeholder="<?php echo app('translator')->get('lang.quantity'); ?>" name="serving" value="<?php echo e(old('serving')); ?>"  >
								<div class="invalid-feedback">Please provide a valid state.</div>
							</div>
							<div class="col-md-6 mb-3">
								<label for="validationCustom05"><?php echo app('translator')->get('lang.price'); ?> </label>
								<input class="form-control" id="validationCustom05" type="number" placeholder="<?php echo app('translator')->get('lang.price'); ?>" name="price" value="<?php echo e(old('price')); ?>" required="">
								<div class="invalid-feedback">Please provide a valid Price.</div>
							</div>
							
							<div class="col-md-6 mb-3">
								<label for="validationCustom05">price before discount </label>
								<input class="form-control" id="validationCustom05" type="number" placeholder="<?php echo app('translator')->get('lang.price'); ?>" name="old_price" value="<?php echo e(old('old_price')); ?>" required="">
								<div class="invalid-feedback">Please provide a valid Price.</div>
							</div>

						</div>

						<div class="row">
							
						</div>
						<div class="mb-3">
                          
                            <div class="col-md-12 mb-3">
                                <div class="col">
                                    <div class="mb-3 mb-0">
                                        <label for="exampleFormControlTextarea4"><?php echo app('translator')->get('lang.description_ar'); ?></label>
                                        <textarea class="form-control" id="exampleFormControlTextarea4" name="description_ar" rows="3" required><?php echo e(old('description_ar')); ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="col">
                                    <div class="mb-3 mb-0">
                                        <label for="exampleFormControlTextarea4"><?php echo app('translator')->get('lang.description_en'); ?></label>
                                        <textarea class="form-control" id="exampleFormControlTextarea4" name="description_en" rows="3" required><?php echo e(old('description_en')); ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <div class="col-lg-12">
                                    <div id="inputFormRow">
                                        <label for="exampleFormControlTextarea4"><?php echo app('translator')->get('lang.Main_Image'); ?></label>

                                        <div class="input-group mb-3">

                                            <input class="form-control" type="file" name="main_image" value="<?php echo e(old('images')); ?>" required accept="image/*" >
                                            
                                        </div>
                                    </div>
                
                                </div>
                            </div>


                            <div class="col-md-12 mb-3">

                                <div class="row">
                                    <div class="col-lg-12">
                                        <label for="exampleFormControlTextarea4"><?php echo app('translator')->get('lang.Other_Images'); ?></label>

                                        <div id="inputFormRow">
                                            <div class="input-group mb-3">
                                                <input class="form-control" type="file" name="images[]" value="<?php echo e(old('images')); ?>" required accept="image/*" >
                                                
                                            </div>
                                        </div>
                    
                                        <div id="newRow"></div>
                                        <button id="addRow" type="button" class="btn btn-info"><?php echo app('translator')->get('lang.add_image'); ?></button>
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
<script type="text/javascript">
    // add row
    $("#addRow").click(function () {
        var html = '';
        html += '<div id="inputFormRow">';
        html += '<div class="input-group mb-3">';
        html += '<input class="form-control" type="file" name="images[]" value="<?php echo e(old('images')); ?>" required accept="image/*">';
        html += '<div class="input-group-append">';
        html += '<button id="removeRow" type="button" class="btn btn-danger"><?php echo app('translator')->get('lang.remove'); ?></button>';
        html += '</div>';
        html += '</div>';

        $('#newRow').append(html);
    });

    // remove row
    $(document).on('click', '#removeRow', function () {
        $(this).closest('#inputFormRow').remove();
    });
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\OneDrive\Desktop\_\codeing\work\mazen\ezhalhaUpTo9\ezhalha\resources\views/admin/product/add.blade.php ENDPATH**/ ?>