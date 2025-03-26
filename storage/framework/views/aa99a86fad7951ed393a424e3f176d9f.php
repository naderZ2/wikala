<?php $__env->startSection('title', 'Basic DataTables'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3><?php echo app('translator')->get('lang.Sellers'); ?>	</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item"> <?php echo app('translator')->get('lang.Users'); ?>	</li>
<li class="breadcrumb-item active"><?php echo app('translator')->get('lang.Sellers'); ?>	 </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
	<div class="row">
		  <div class="d-flex justify-content-end col-sm-12">
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add seller')): ?>
					<a href="<?php echo e(route('seller.create')); ?>"  class="btn btn-primary"><?php echo app('translator')->get('lang.add_slider'); ?></a>
				<?php endif; ?>	
        	</div>

		<!-- Column rendering  Starts-->
		<div class="col-sm-12">
			<div class="card">
				
				<div class="card-body">
					<div class="table-responsive">
						<table class="display" id="advance-1">
							<thead>
								<tr>
									<th><?php echo app('translator')->get('lang.Name'); ?></th>
									<th><?php echo app('translator')->get('lang.Email'); ?></th>
									<th><?php echo app('translator')->get('lang.Categories'); ?></th>
									<th><?php echo app('translator')->get('lang.Status'); ?></th>
									<th><?php echo app('translator')->get('lang.Image'); ?></th>
									<th><?php echo app('translator')->get('lang.joining_date'); ?></th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php $__empty_1 = true; $__currentLoopData = $sellers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
									<tr>
										<td><?php echo e($seller->name); ?></td>
										<td><?php echo e($seller->email); ?></td>
										<td>
											<?php $__currentLoopData = $seller->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<?php echo e($category->name); ?> <br>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</td>
										<td>
											<?php if($seller->active == 1): ?>
												<span class="font-success"><?php echo app('translator')->get('lang.active'); ?></span>
											<?php else: ?>
												<span class="font-danger"><?php echo app('translator')->get('lang.inactive'); ?></span>
											<?php endif; ?>
										</td>
										<td >
											<img src="<?php echo e(asset($seller?->img_path)); ?>"  alt=""  class="image-fluid"  height="90" width="90">
										</td>
										<td><?php echo e($seller->created_at->format('Y-m-d')); ?></td>
										
										<td>
											<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit seller')): ?>
											<a class="btn btn-success"  href="<?php echo e(route('seller.edit',$seller->id)); ?>">
												<?php echo app('translator')->get('lang.edit'); ?>											
											</a>
											<?php endif; ?>	
										
										
											<form action="<?php echo e(route('seller.change_activity_status')); ?>" onclick="getId(<?php echo e($seller->id); ?>)" method="post" id="form_id">
												<?php echo csrf_field(); ?>
												<input type="hidden" name="id" id="seller_id">
												<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit seller status')): ?>


												
												<?php if($seller->active == 1): ?>
												<button id="<?php echo e($loop->iteration); ?>" class="btn btn-danger mt-1 sweet-5" onclick="test()" type="button" ><?php echo app('translator')->get('lang.deactivation'); ?></button>
												<?php else: ?>
												<button id="<?php echo e($loop->iteration); ?>" class="btn btn-success mt-1 sweet-5" onclick="test()" type="button" ><?php echo app('translator')->get('lang.activation'); ?></button>
												<?php endif; ?>


												
												<?php endif; ?>	
											</form>
										
										</td>
									</tr>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
									
								<?php endif; ?>
								
							</tbody>
							<tfoot>
								<tr>
									<th><?php echo app('translator')->get('lang.Name'); ?></th>
									<th><?php echo app('translator')->get('lang.Email'); ?></th>
									<th><?php echo app('translator')->get('lang.Categories'); ?></th>
									<th><?php echo app('translator')->get('lang.Status'); ?></th>
									<th><?php echo app('translator')->get('lang.Image'); ?></th>
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
<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\OneDrive\Desktop\_\codeing\work\mazen\wikala\resources\views/admin/seller/index.blade.php ENDPATH**/ ?>