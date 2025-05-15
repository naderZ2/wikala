<?php $__env->startSection('title', 'Basic DataTables'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/sweetalert2.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/select2.css')); ?>">


<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3> <?php echo app('translator')->get('lang.Notifications'); ?> </h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item"><?php echo app('translator')->get('lang.Dashboard'); ?> </li>
<li class="breadcrumb-item active"><?php echo app('translator')->get('lang.Notifications'); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">

        <div class="row">   
           <div class="d-flex justify-content-end col-sm-12">
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add notification')): ?>
					<a href="<?php echo e(route('admin.notifications.create')); ?>"  class="btn btn-primary"><?php echo app('translator')->get('lang.add_slider'); ?></a>
				<?php endif; ?>	
        	</div>
            <div class="col-sm-12 mt-3">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="advance-1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th><?php echo app('translator')->get('lang.Title'); ?></th>
                                        <th><?php echo app('translator')->get('lang.Body'); ?></th>
                                        <th><?php echo app('translator')->get('lang.Type'); ?></th>
                                        <th><?php echo app('translator')->get('lang.Seller'); ?></th>
                                        <th><?php echo app('translator')->get('lang.Product'); ?></th>
                                        <th><?php echo app('translator')->get('lang.region'); ?></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td><?php echo e(app()->getLocale() == "en"? $notification->name_en:$notification->name_ar); ?></td>
                                        <td><?php echo e(app()->getLocale() == "en"? $notification->description_en:$notification->description_ar); ?></td>
                                        <td>
                                            <?php if($notification->type == 1): ?>
                                                <span class="badge badge-primary">
                                                    عام
                                                </span>
                                                
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php echo e($notification->seller->name ??""); ?>

                                        
                                        </td>
                                        <td>
                                            <?php echo e($notification->product->name??""); ?>

                                        
                                        </td>
                                        <td>
                                            <?php echo e($notification->region->name ??""); ?>

                                        
                                        </td>
                                        <td>
                                            <form action="<?php echo e(route('admin.notifications.delete',$notification->id)); ?>" onclick="getId(<?php echo e($notification->id); ?>)" method="get" id="form_id">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="id" id="notification_id">
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete notification')): ?>
                                                <button id="<?php echo e($loop->iteration); ?>" class="btn btn-danger sweet-5" onclick="test()" type="button" ><?php echo app('translator')->get('lang.remove'); ?></button>
                                                <?php endif; ?>	
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th><?php echo app('translator')->get('lang.Title'); ?></th>
                                        <th><?php echo app('translator')->get('lang.Body'); ?></th>
                                        <th><?php echo app('translator')->get('lang.Type'); ?></th>
                                        <th><?php echo app('translator')->get('lang.Seller'); ?></th>
                                        <th><?php echo app('translator')->get('lang.Product'); ?></th>
                                        <th><?php echo app('translator')->get('lang.region'); ?></th>
                                        <th></th>
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

<script src="<?php echo e(asset('assets/js/select2/select2.full.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/select2/select2-custom.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/form-validation-custom.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/sweet-alert/sweetalert.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/sweet-alert/app.js')); ?>"></script>

<?php $__env->stopSection(); ?>

<script>
	function getId(id){
	    document.getElementById("notification_id").value=id;
   }
</script>
<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\OneDrive\Desktop\_\codeing\work\mazen\ezhalhaUpTo9\ezhalha\resources\views/admin/notifications/index.blade.php ENDPATH**/ ?>