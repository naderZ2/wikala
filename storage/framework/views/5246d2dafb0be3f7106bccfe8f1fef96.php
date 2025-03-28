<?php $__env->startSection('title', 'Basic DataTables'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3><?php echo app('translator')->get('lang.Roles'); ?></h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item"><?php echo app('translator')->get('lang.Users'); ?></li>
<li class="breadcrumb-item active"><?php echo app('translator')->get('lang.Roles'); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
	<div class="row">
        <div class="row ">
            <div class="d-flex justify-content-end col-sm-12">
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add role')): ?>
                <button class="btn btn-primary"  type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal" ><?php echo app('translator')->get('lang.add_Role'); ?></button>
				<?php endif; ?>	
            </div>
		<div class="col-sm-12">
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table class="display" id="advance-1">
							<thead>
								<tr>
									<th class="text-center"><?php echo app('translator')->get('lang.Name'); ?></th>
									<th></th>								
								</tr>
							</thead>
							<tbody>
								<?php $__empty_1 = true; $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
									<tr>
										<td class="text-center"><?php echo e($role->name); ?></td>
										<td class="text-end">
											<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit permissions')): ?>
												<button class="btn btn-primary" type="button" data-bs-toggle="modal" onclick="getRecord(<?php echo e($role); ?>)" data-original-title="test" data-bs-target="#editModal" ><?php echo app('translator')->get('lang.edit'); ?></button>
											<?php endif; ?>	

											<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit permissions')): ?>
												<a class="btn btn-primary" href="<?php echo e(route('admin.permission',$role->id)); ?>"><?php echo app('translator')->get('lang.edit_Permissions'); ?> </a>
											<?php endif; ?>	
										</td>
									</tr>
								    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
									
								<?php endif; ?>
								
							</tbody>
							<tfoot>
							<tr>
									<th class="text-center"><?php echo app('translator')->get('lang.Name'); ?></th>
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
			 <h5 class="modal-title" id="exampleModalLabel"><?php echo app('translator')->get('lang.add_Role'); ?></h5>
			 <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
		  </div>
		  <div class="modal-body">

			<form class="needs-validation" novalidate="" method="POST"  action="<?php echo e(route('roles.store')); ?>">
				<?php echo csrf_field(); ?>
				<div class="row">
					<div class="col-md-12 mb-3">
						<label for="section_name"><?php echo app('translator')->get('lang.Name'); ?></label>
						<input class="form-control"  type="text" name="name" value="" placeholder="" required="">
						<div class="valid-feedback">Looks good!</div>
						<div class="invalid-feedback">Please choose a name.</div>
					</div>
				</div>
				
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><?php echo app('translator')->get('lang.cancel'); ?></button>
					<button class="btn btn-primary" type="submit"><?php echo app('translator')->get('lang.save'); ?></button>
				 </div>
			</form>

		  </div>
		  
	   </div>
	</div>
</div>


<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

	<div class="modal-dialog" role="document">
	   <div class="modal-content">
		  <div class="modal-header">
			 <h5 class="modal-title" id="exampleModalLabel"><?php echo app('translator')->get('lang.edit_Role'); ?></h5>
			 <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
		  </div>
		  <div class="modal-body">

			<form class="needs-validation" novalidate="" method="POST"  action="<?php echo e(route('roles.update')); ?>">
				<?php echo csrf_field(); ?>
				<input type="hidden" id="role_id" name="id">
				<div class="row">
					<div class="col-md-12 mb-3">
						<label for="section_name"><?php echo app('translator')->get('lang.Name'); ?></label>
						<input class="form-control"  type="text" name="name" id="role_name" value="" placeholder="" required="">
						<div class="valid-feedback">Looks good!</div>
						<div class="invalid-feedback">Please choose a name.</div>

					</div>
				
				</div>
				
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><?php echo app('translator')->get('lang.cancel'); ?></button>
					<button class="btn btn-primary" type="submit"><?php echo app('translator')->get('lang.edit'); ?></button>
				 </div>
			</form>

		  </div>
		  
	   </div>
	</div>
</div>

<?php $__env->stopSection(); ?>
<script>
	function getRecord(data){
		document.getElementById("role_id").value=data['id'];
		document.getElementById("role_name").value=data['name'];
	}
	</script>
<?php $__env->startSection('script'); ?>

<script src="<?php echo e(asset('assets/js/datatable/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatables/datatable.custom.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\OneDrive\Desktop\_\codeing\work\mazen\wikala\resources\views/admin/role/index.blade.php ENDPATH**/ ?>