
<?php $__env->startSection('title', 'Basic DataTables'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/select2.css')); ?>">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3> <?php echo app('translator')->get('lang.rejected_reasons'); ?></h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item"> <?php echo app('translator')->get('lang.Dashboard'); ?></li>
<li class="breadcrumb-item active"><?php echo app('translator')->get('lang.rejected_reasons'); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">

	<div class="row">
       <div class="d-flex justify-content-end col-sm-12">
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add role')): ?>
                <button class="btn btn-primary"  type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModalAdd" ><?php echo app('translator')->get('lang.add_rejected_reasons'); ?></button>
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
									<th><?php echo app('translator')->get('lang.Name'); ?></th>
									<th><?php echo app('translator')->get('lang.description'); ?></th>
									
									<th></th>									
								</tr>
							</thead>
							<tbody>
								<?php $__empty_1 = true; $__currentLoopData = $reasons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reason): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
									<tr>
										<td>
											<?php echo e($loop->iteration); ?>

										</td>
					
										<td >
											<?php echo e($reason?->name); ?>

										</td>							
										<td >
											<?php echo e($reason?->description); ?>

										</td>							
															
										
										<td>
											<?php if($reason->enable == 1): ?>
											<a class="btn btn-danger m-1"  href="<?php echo e(route('rejected-reasons.enable', $reason->id)); ?>" ><?php echo app('translator')->get('lang.Disable'); ?> </a>
										<?php else: ?>
												<a class="btn btn-success m-1"  href="<?php echo e(route('rejected-reasons.enable', $reason->id)); ?>" ><?php echo app('translator')->get('lang.Enable'); ?></a>
										<?php endif; ?>	
											<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit category')): ?>
											<button class="btn btn-primary" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal"  onclick="getRecord(<?php echo e($reason); ?>)"><?php echo app('translator')->get('lang.edit'); ?></button>
											
											<?php endif; ?>	

                                            
										</td>
							
									</tr>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
									
								<?php endif; ?>
								
							</tbody>
							<tfoot>
								<tr>
									<th>#</th>
									<th><?php echo app('translator')->get('lang.Name'); ?></th>
									<th><?php echo app('translator')->get('lang.description'); ?></th>
									
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


<div class="modal fade" id="exampleModalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">


	<div class="modal-dialog" role="document">
	   <div class="modal-content">
		  <div class="modal-header">
			 <h5 class="modal-title" id="exampleModalLabel"><?php echo app('translator')->get('lang.add_rejected_reasons'); ?></h5>
			 <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
		  </div>
		  <div class="modal-body">

			<form class="needs-validation" novalidate="" method="POST" enctype="multipart/form-data" action="<?php echo e(route('rejected-reasons.store')); ?>">
				<?php echo csrf_field(); ?>
				<div class="mb-3">
					
					<div class="col-md-12 mb-3">
						<label for="validationCustom01"><?php echo app('translator')->get('lang.Name'); ?></label>
						<input class="form-control" id="validationCustom01" type="text" name="name" value="<?php echo e(old('name')); ?>" placeholder="" >
						<div class="valid-feedback">Looks good!</div>
						<div class="invalid-feedback">Please choose a name.</div>
					</div>	
					<div class="col-md-12 mb-3">
						<label for="validationCustom01"><?php echo app('translator')->get('lang.description'); ?></label>
						<textarea  class="form-control" id="validationCustom01"  name="description" >
							<?php echo e(old('description')); ?>

						</textarea>
						<div class="valid-feedback">Looks good!</div>
						<div class="invalid-feedback">Please choose a description.</div>
					</div>	


				</div>
				
				<div class="modal-footer">
					<button class="btn btn-primary" type="button" data-bs-dismiss="modal"><?php echo app('translator')->get('lang.close'); ?></button>
					<button class="btn btn-secondary" type="submit"><?php echo app('translator')->get('lang.save'); ?></button>
				 </div>
			</form>

		  </div>
		  
	   </div>
	</div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">


	<div class="modal-dialog" role="document">
	   <div class="modal-content">
		  <div class="modal-header">
			 <h5 class="modal-title" id="exampleModalLabel"><?php echo app('translator')->get('lang.edit'); ?></h5>
			 <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
		  </div>
		  <div class="modal-body">

			<form class="needs-validation" novalidate="" method="POST" enctype="multipart/form-data" action="<?php echo e(route('dashboard.rejected-reasons.update',)); ?>">
				<?php echo csrf_field(); ?>
				<input type="hidden" id="section_id" name="id">
				
				
				<div class="mb-3">
					<div class="col-md-12 mb-3">
						<label for="validationCustom01"><?php echo app('translator')->get('lang.Name'); ?></label>
						<input class="form-control" id="section_name" type="text" name="name" value="<?php echo e(old('name')); ?>" placeholder="" >
						<div class="valid-feedback">Looks good!</div>
						<div class="invalid-feedback">Please choose a name.</div>
					</div>
					
					<div class="col-md-12 mb-3">
						<label for="validationCustom01"><?php echo app('translator')->get('lang.description'); ?></label>
						<textarea  class="form-control" id="section_description"  name="description" >
							<?php echo e(old('description')); ?>

						</textarea>
						<div class="valid-feedback">Looks good!</div>
						<div class="invalid-feedback">Please choose a description.</div>

					</div>
				</div>
				
				<div class="modal-footer">
					<button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close</button>
					<button class="btn btn-secondary" type="submit"><?php echo app('translator')->get('lang.edit'); ?></button>
				 </div>
			</form>

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

<script>

	function getRecord(data){
	    document.getElementById("section_id").value=data['id'];
	    document.getElementById("section_name").value=data['name'];
	    document.getElementById("section_description").value=data['description'];
	    // document.getElementById("section_enable").value=data['link'];
   }

   function getId(id){
	    document.getElementById("notification_id").value=id;
   }
</script>
<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\OneDrive\Desktop\_\codeing\work\mazen\wikala\resources\views/admin/rejected_reason/index.blade.php ENDPATH**/ ?>