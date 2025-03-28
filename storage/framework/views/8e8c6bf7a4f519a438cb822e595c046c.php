
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
<li class="breadcrumb-item"><?php echo app('translator')->get('lang.category_attributes'); ?></li>
<li class="breadcrumb-item active"><?php echo app('translator')->get('lang.edit'); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
			
				<div class="card-body">
					<form class="needs-validation" novalidate="" method="POST" enctype="multipart/form-data" action="<?php echo e(route('category-attributes.update',$categoryAttribute->id)); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
						<div class="row">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="alert alert-danger"><?php echo e($error); ?></div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <input class="form-control" id="validationCustom01" type="hidden" name="id" value="<?php echo e($categoryAttribute->id); ?>" placeholder="" required="">
                            
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom03"><?php echo app('translator')->get('lang.Category'); ?></label>
                                <select class="js-example-placeholder-multiple col-sm-12" id="validationCustom03" name="category_id" required>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($category->id); ?>" <?php echo e($category->id == old('category_id', $categoryAttribute->category_id) ? 'selected' : ''); ?>>
                                            <?php echo e($category->name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <div class="invalid-feedback"><?php echo app('translator')->get('lang.please_select_category'); ?></div>
                                
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="validationCustom03"><?php echo app('translator')->get('lang.Attribute'); ?></label>
                                <select class="js-example-placeholder-multiple col-sm-12" id="validationCustom03" name="attribute_id" required>
                                    <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($attr?->id); ?>" <?php echo e($attr?->id == old('attribute_id', $categoryAttribute->attribute_id) ? 'selected' : ''); ?>>
                                            <?php echo e($attr?->name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <div class="invalid-feedback"><?php echo app('translator')->get('lang.please_select_attribute'); ?></div>
                                
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="validationCustom03"><?php echo app('translator')->get('lang.mandatory'); ?></label>
                                <select class="js-example-placeholder-multiple col-sm-12" id="validationCustom03" name="mandatory" required>
                                    <option value="1" <?php echo e(old('mandatory', $categoryAttribute->mandatory) == 1 ? 'selected' : ''); ?>><?php echo app('translator')->get('lang.required'); ?></option>
                                    <option value="0" <?php echo e(old('mandatory', $categoryAttribute->mandatory) == 0 ? 'selected' : ''); ?>><?php echo app('translator')->get('lang.not_required'); ?></option>
                                </select>
                                <div class="invalid-feedback"><?php echo app('translator')->get('lang.please_select_mandatory'); ?></div>
                                <?php $__errorArgs = ['mandatory'];
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


<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\OneDrive\Desktop\_\codeing\work\mazen\wikala\resources\views/admin/categories_attributes/edit.blade.php ENDPATH**/ ?>