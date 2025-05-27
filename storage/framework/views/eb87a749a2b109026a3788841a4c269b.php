
<?php $__env->startSection('title', __('lang.edit_home_page_category')); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/select2.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3><?php echo app('translator')->get('lang.edit_home_page_category'); ?></h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item"><?php echo app('translator')->get('lang.home_page_categories'); ?></li>
<li class="breadcrumb-item active"><?php echo app('translator')->get('lang.edit_home_page_category'); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form class="needs-validation" novalidate method="POST" action="<?php echo e(route('home_page_category.update', $item->id)); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <input class="form-control" type="hidden" name="id" value="<?php echo e(old('id', $item->id)); ?>" required>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label><?php echo app('translator')->get('lang.name_ar'); ?></label>
                                <input class="form-control" type="text" name="name_ar" value="<?php echo e(old('name_ar', $item->name_ar)); ?>" required>
                                <div class="invalid-feedback"><?php echo app('translator')->get('lang.required'); ?></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label><?php echo app('translator')->get('lang.name_en'); ?></label>
                                <input class="form-control" type="text" name="name_en" value="<?php echo e(old('name_en', $item->name_en)); ?>" required>
                                <div class="invalid-feedback"><?php echo app('translator')->get('lang.required'); ?></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label><?php echo app('translator')->get('lang.Category'); ?></label>
                                <select class="form-control select2" name="category_id" required>
                                    <option value=""><?php echo app('translator')->get('lang.choose'); ?></option>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($category->id); ?>" <?php echo e($item->category_id == $category->id ? 'selected' : ''); ?>><?php echo e(app()->getLocale() == 'en' ? $category->name_en : $category->name_ar); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <div class="invalid-feedback"><?php echo app('translator')->get('lang.required'); ?></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label><?php echo app('translator')->get('lang.Sort_Order'); ?></label>
                                <input class="form-control" type="number" name="sort_order" value="<?php echo e(old('sort_order', $item->sort_order)); ?>" required>
                                <div class="invalid-feedback"><?php echo app('translator')->get('lang.required'); ?></div>
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

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\OneDrive\Desktop\_\codeing\work\mazen\wikala\resources\views/admin/home_page_category/edit.blade.php ENDPATH**/ ?>