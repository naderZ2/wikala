
<?php $__env->startSection('title', 'Basic DataTables'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/select2.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3><?php echo app('translator')->get('lang.home_page_categories'); ?></h3>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item"><?php echo app('translator')->get('lang.Dashboard'); ?></li>
<li class="breadcrumb-item active"><?php echo app('translator')->get('lang.home_page_categories'); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="d-flex justify-content-end col-sm-12">
            <a href="<?php echo e(route('home_page_category.create')); ?>" class="btn btn-primary"><?php echo app('translator')->get('lang.Add'); ?></a>
        </div>
        <div class="col-sm-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display" id="advance-1">
                            <thead>
                                <tr>
                                    <th><?php echo app('translator')->get('lang.Name'); ?></th>
                                    <th><?php echo app('translator')->get('lang.Category'); ?></th>
                                    <th><?php echo app('translator')->get('lang.Sort_Order'); ?></th>
                                    <th><?php echo app('translator')->get('lang.actions'); ?></th>
                                   

                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e(app()->getLocale() == 'en' ? $item->name_en : $item->name_ar); ?></td>
                                        <td><?php echo e($item->category ? (app()->getLocale() == 'en' ? $item->category->name_en : $item->category->name_ar) : ''); ?></td>
                                        <td><?php echo e($item->sort_order); ?></td>
                                        <td>
                                            <a href="<?php echo e(route('home_page_category.edit', $item->id)); ?>" class="btn btn-sm btn-info"><?php echo app('translator')->get('lang.edit'); ?></a>
                                            <form action="<?php echo e(route('home_page_category.destroy', $item->id)); ?>" method="POST" style="display:inline-block;">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('<?php echo app('translator')->get('lang.confirm_delete'); ?>')"><?php echo app('translator')->get('lang.Delete'); ?></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            <tfoot>
								<tr>
									<th><?php echo app('translator')->get('lang.Name'); ?></th>
                                    <th><?php echo app('translator')->get('lang.Category'); ?></th>
                                    <th><?php echo app('translator')->get('lang.Sort_Order'); ?></th>
                                    <th><?php echo app('translator')->get('lang.actions'); ?></th>
                                   								
								</tr>							
							</tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('assets/js/datatable/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatables/datatable.custom.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/form-validation-custom.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/select2/select2.full.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/select2/select2-custom.js')); ?>"></script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\OneDrive\Desktop\_\codeing\work\mazen\wikala\resources\views/admin/home_page_category/index.blade.php ENDPATH**/ ?>