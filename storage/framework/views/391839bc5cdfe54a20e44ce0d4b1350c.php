<?php $__env->startSection('title', 'Basic DataTables'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3><?php echo app('translator')->get('lang.admins'); ?></h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item"> <?php echo app('translator')->get('lang.Users'); ?></li>
<li class="breadcrumb-item active"><?php echo app('translator')->get('lang.admins'); ?> </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
	<div class="row">
	       <div class="d-flex justify-content-end col-sm-12">
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add admin')): ?>
					<a href="<?php echo e(route('admins.create')); ?>"  class="btn btn-primary"><?php echo app('translator')->get('lang.add_slider'); ?></a>
				<?php endif; ?>	
        	</div>
		<div class="col-sm-12">
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table class="display" id="advance-1">
							<thead>
								<tr>
									<th> <?php echo app('translator')->get('lang.Name'); ?></th>
									<th><?php echo app('translator')->get('lang.Email'); ?></th>
									<th class="text-center"><?php echo app('translator')->get('lang.Status'); ?></th>
									<th><?php echo app('translator')->get('lang.joining_date'); ?></th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php $__empty_1 = true; $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $driver): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
									<tr>
										<td><?php echo e($driver->name); ?></td>
										<td><?php echo e($driver->email); ?></td>
										<td class="text-center">
											<?php if($driver->active == 1): ?>
												<span class="font-success"><?php echo app('translator')->get('lang.active'); ?></span>
											<?php else: ?>
											<span class="font-danger"><?php echo app('translator')->get('lang.inactive'); ?></span>
											<?php endif; ?>
										</td>
										<td><?php echo e($driver->created_at->format('Y-m-d')); ?></td>
										<td>
											<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit admin')): ?>
											<a class="btn btn-success"  href="<?php echo e(route('admins.edit',$driver->id)); ?>">
												<?php echo app('translator')->get('lang.edit'); ?></a>
											<?php endif; ?>	
										
											
											
										
										</td>
									</tr>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
									
								<?php endif; ?>
								
							</tbody>
							<tfoot>
								<tr>
									<th><?php echo app('translator')->get('lang.Name'); ?></th>
									<th><?php echo app('translator')->get('lang.Email'); ?></th>
									<th class="text-center"><?php echo app('translator')->get('lang.Status'); ?></th>
									<th><?php echo app('translator')->get('lang.joining_date'); ?></th>
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
<script src="<?php echo e(asset('assets/js/sweet-alert/sweetalert.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/sweet-alert/app.js')); ?>"></script>
<script>

function getId(id){
	    document.getElementById("seller_id").value=id;
   }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\OneDrive\Desktop\_\codeing\work\mazen\wikala\resources\views/admin/admins/index.blade.php ENDPATH**/ ?>