
<?php $__env->startSection('title', 'Basic DataTables'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3><?php echo app('translator')->get('lang.Clients'); ?></h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item"><?php echo app('translator')->get('lang.Users'); ?></li>
<li class="breadcrumb-item active"><?php echo app('translator')->get('lang.Clients'); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
	<div class="row">

		<div class="col-sm-12">
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table class="display" id="advance-1">
							<thead>
								<tr>
									<th><?php echo app('translator')->get('lang.Name'); ?></th>
									<th class="text-center"><?php echo app('translator')->get('lang.phone'); ?></th>
									<th class="text-center"><?php echo app('translator')->get('lang.Email'); ?></th>
									<th><?php echo app('translator')->get('lang.bio'); ?></th>
									<th><?php echo app('translator')->get('lang.date_of_birth'); ?></th>
									<th><?php echo app('translator')->get('lang.joining_date'); ?></th>
									<th></th>								
								</tr>
							</thead>
							<tbody>
								<?php $__empty_1 = true; $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
									<tr>
										<td><?php echo e($client->name); ?></td>
										<td class="text-center"><?php echo e($client->phone); ?></td>
										<td><?php echo e($client->email); ?></td>
										<td title="<?php echo e($client?->bio); ?>"><?php echo e(Str::limit($client?->bio, 30)); ?></td>
										<td><?php echo e($client?->date_of_birth); ?></td>
										<td><?php echo e($client?->created_at?->format('Y-m-d')); ?></td>
										<td>
											<button class="btn btn-primary" type="button" data-bs-toggle="modal" onclick="getRndInteger(),getId(<?php echo e($client->id); ?>)" data-original-title="test" data-bs-target="#exampleModal" ><?php echo app('translator')->get('lang.reset_password'); ?></button>

										</td>
									</tr>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
									
								<?php endif; ?>
								
							</tbody>
							<tfoot>
							<tr>
									<th><?php echo app('translator')->get('lang.Name'); ?></th>
									<th class="text-center"><?php echo app('translator')->get('lang.phone'); ?></th>
									<th class="text-center"><?php echo app('translator')->get('lang.Email'); ?></th>
									<th><?php echo app('translator')->get('lang.bio'); ?></th>
									<th><?php echo app('translator')->get('lang.date_of_birth'); ?></th>
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


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">


	<div class="modal-dialog" role="document">
	   <div class="modal-content">
		  <div class="modal-header">
			 <h5 class="modal-title" id="exampleModalLabel"><?php echo app('translator')->get('lang.reset_password'); ?></h5>
			 <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
		  </div>
		  <div class="modal-body">

			<form class="needs-validation" novalidate="" method="POST"  action="<?php echo e(route('admin.clients.reset_password')); ?>">
				<?php echo csrf_field(); ?>
				<input type="hidden" id="client_id" name="client_id">
				<div class="row">
					<div class="col-md-12 mb-3">
						<label for="section_name">New Password</label>
						<input class="form-control" id="password" type="text" name="password" value="" placeholder="******" required="">
						<div class="valid-feedback">Looks good!</div>
						<div class="invalid-feedback">Please choose a name.</div>

					</div>
				
				</div>
				
				<div class="modal-footer">
					<button class="btn btn-primary" type="button" data-bs-dismiss="modal"><?php echo app('translator')->get('lang.close'); ?></button>
					<button class="btn btn-secondary" type="submit"><?php echo app('translator')->get('lang.edit'); ?></button>
				 </div>
			</form>

		  </div>
		  
	   </div>
	</div>
 </div>

<?php $__env->stopSection(); ?>
<script>
	function getRndInteger() {
  	let password=Math.floor(Math.random() * (99999999 - 11111111)) + 11111111;
	  document.getElementById("password").value=password;
	}

	function getId(id){
		document.getElementById("client_id").value=id;
	}
	</script>
<?php $__env->startSection('script'); ?>

<script src="<?php echo e(asset('assets/js/datatable/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatables/datatable.custom.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\OneDrive\Desktop\_\codeing\work\mazen\wikala\resources\views/admin/clients/index.blade.php ENDPATH**/ ?>