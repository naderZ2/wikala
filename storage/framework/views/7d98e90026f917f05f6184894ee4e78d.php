
<?php $__env->startSection('title', 'Validation Forms'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/select2.css')); ?>">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3><?php echo app('translator')->get('lang.edit'); ?></h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item"><?php echo app('translator')->get('lang.Attributes'); ?></li>
<li class="breadcrumb-item active"><?php echo app('translator')->get('lang.edit'); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
			
				<div class="card-body">
					<form class="needs-validation" novalidate="" method="POST" enctype="multipart/form-data" action="<?php echo e(route('attributes.update',$attribute->id)); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
						<div class="row">
                            <input class="form-control" id="validationCustom01" type="hidden" name="id" value="<?php echo e($attribute->id); ?>" placeholder="" required="">
							<div class="col-md-6 mb-3">
								<label for="validationCustom01"><?php echo app('translator')->get('lang.name_ar'); ?></label>
								<input class="form-control" id="validationCustom01" type="text" name="name_ar" value="<?php echo e(old('name_ar', $attribute?->name_ar)); ?>" placeholder="" required="">
								<div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please choose a name.</div>
                                <?php $__errorArgs = ['name_ar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
								<div class="alert alert-danger"><?php echo e($message); ?></div>
							    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
							</div>
							<div class="col-md-6 mb-3">
								<label for="validationCustom01"><?php echo app('translator')->get('lang.name_en'); ?></label>
								<input class="form-control" id="validationCustom01" type="text" name="name_en" value="<?php echo e(old('name_en', $attribute?->name_en)); ?>" placeholder="" required="">
								<div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please choose a name.</div>
								<?php $__errorArgs = ['name_en'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
								<div class="alert alert-danger"><?php echo e($message); ?></div>
							    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
							</div>
							

							<div class="col-md-6 mb-3">
                                <label for="validationCustom03"><?php echo app('translator')->get('lang.Type'); ?></label>

                                <select class="js-example-placeholder-multiple col-sm-12" id="validationCustom03" required="" name="type">
                                    <option value="string" <?php echo e(old('type', $attribute->type) == 'string' ? 'selected' : ''); ?>><?php echo app('translator')->get('lang.string'); ?></option>
                                    <option value="number" <?php echo e(old('type', $attribute->type) == 'number' ? 'selected' : ''); ?>><?php echo app('translator')->get('lang.number'); ?></option>
                                    <option value="select" <?php echo e(old('type', $attribute->type) == 'select' ? 'selected' : ''); ?>><?php echo app('translator')->get('lang.select'); ?></option>
                                </select>
                                <div class="invalid-feedback">Please provide a valid type.</div>
								<?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
								<div class="alert alert-danger"><?php echo e($message); ?></div>
							    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                            </div>
                            
                            


						
                            <div class="col-md-12 mb-3">
                                <div class="col-lg-12">
                                    <div id="inputFormRow">
                                        <label for="exampleFormControlTextarea4"><?php echo app('translator')->get('lang.Image'); ?></label>

                                        <div class="input-group mb-3">

                                            <input class="form-control" onchange="previewImage(event)" type="file" name="image" value="<?php echo e(old('image')); ?>"  accept="image/*" >
                                        
                                        </div>
										<img src="<?php echo e(asset($attribute?->image)); ?>" id="imagePreview" alt=""  class="image-fluid"  height="150" width="150">
										<?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
										<div class="alert alert-danger"><?php echo e($message); ?></div>
									    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

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


    function previewImage(event) {
    var image = document.getElementById('imagePreview');
    var file = event.target.files[0];

    if (file) {
        var reader = new FileReader();
        reader.onload = function(e) {
            image.src = e.target.result; // Set image source to the file's data
            image.style.display = 'block'; // Display the image element
        };
        reader.readAsDataURL(file); // Convert image file to base64 string
    }
}
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\OneDrive\Desktop\_\codeing\work\mazen\wikala\resources\views/admin/attributes/edit.blade.php ENDPATH**/ ?>