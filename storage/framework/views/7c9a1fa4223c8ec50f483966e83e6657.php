<?php $__env->startSection('title', 'Basic DataTables'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/select2.css')); ?>">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3> <?php echo app('translator')->get('lang.seller_services'); ?></h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item"> <?php echo app('translator')->get('lang.Dashboard'); ?></li>
<li class="breadcrumb-item active"><?php echo app('translator')->get('lang.Categories'); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
	<div class="row">
		<div class="d-flex justify-content-end col-sm-12">
				<a href="<?php echo e(route('admin.sellerServices.create')); ?>"  class="btn btn-primary"><?php echo app('translator')->get('lang.add_slider'); ?></a>
		</div>
		<div class="col-sm-12 mt-3">
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table class="display" id="advance-1">
							<thead>
								<tr>
									<th>#</th>
									<th><?php echo app('translator')->get('lang.Seller'); ?></th>
									<th><?php echo app('translator')->get('lang.Category'); ?></th>
									<th><?php echo app('translator')->get('lang.Product'); ?></th>
									<th><?php echo app('translator')->get('lang.date'); ?></th>
									<th><?php echo app('translator')->get('lang.availability'); ?></th>
								</tr>
							</thead>
							<tbody>
								<?php $__empty_1 = true; $__currentLoopData = $sellerServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
									<tr>
										<td>
											<?php echo e($loop->iteration); ?>

										</td>
										<td>
											<?php echo e($service?->seller->name); ?>

										</td>
										<td>
											<?php echo e($service?->category?->name_ar); ?>

										</td>
										<td>
											<?php echo e($service?->product?->name_ar); ?>

										</td>
										<td>
											<?php echo e($service?->date); ?>

										</td>
									
										<td>
											<?php if($service->availability == 1): ?>
											<a href="<?php echo e(route('admin.sellerServices.updateAvailability',$service->id)); ?>" class="btn btn-danger mt-1" >
												<?php echo app('translator')->get('lang.not_available'); ?>
											</a>

											<?php else: ?>
												<a href="<?php echo e(route('admin.sellerServices.updateAvailability',$service->id)); ?>" class="btn btn-success mt-1" >
													<?php echo app('translator')->get('lang.available'); ?>
												</a>
											<?php endif; ?>
										</td>
										
										
									</tr>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
								<?php endif; ?>
							</tbody>
							<tfoot>
								<tr>
									<th><?php echo app('translator')->get('lang.Seller'); ?></th>
									<th><?php echo app('translator')->get('lang.Category'); ?></th>
									<th><?php echo app('translator')->get('lang.Product'); ?></th>
									<th><?php echo app('translator')->get('lang.date'); ?></th>
									<th><?php echo app('translator')->get('lang.availability'); ?></th>
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

<script src="<?php echo e(asset('assets/js/sweet-alert/sweetalert.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/sweet-alert/app.js')); ?>"></script>
<?php $__env->stopSection(); ?>
</script>
<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\OneDrive\Desktop\_\codeing\work\mazen\ezhalhaUpTo9\ezhalha\resources\views/admin/sellerServices/index.blade.php ENDPATH**/ ?>