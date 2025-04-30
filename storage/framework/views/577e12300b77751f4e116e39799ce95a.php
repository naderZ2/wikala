
<?php $__env->startSection('title', 'Basic DataTables'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/select2.css')); ?>">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3> <?php echo app('translator')->get('lang.report_options'); ?></h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item"> <?php echo app('translator')->get('lang.Dashboard'); ?></li>
<li class="breadcrumb-item active"><?php echo app('translator')->get('lang.report_options'); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">



<?php if($errors->any()): ?>
	<div class="alert alert-danger">
		<ul>
			<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<li ><?php echo e($error); ?></li>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</ul>
	</div>
<?php endif; ?>

	<div class="row">
       <div class="d-flex justify-content-end col-sm-12">
				
                <button class="btn btn-primary"  type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModalAdd" ><?php echo app('translator')->get('lang.add_report_options'); ?></button>
				
        	</div>
		<div class="col-sm-12 mt-3">
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table class="display" id="advance-1">
							<thead>
								<tr>
									<th>#</th>
									<th><?php echo app('translator')->get('lang.title_ar'); ?></th>
									<th><?php echo app('translator')->get('lang.title_en'); ?></th>
									
									<th></th>									
								</tr>
							</thead>
							<tbody>
								<?php $__empty_1 = true; $__currentLoopData = $reportOption; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
									<tr>
										<td>
											<?php echo e($loop->iteration); ?>

										</td>
					
										<td >
											<?php echo e($Option?->title_ar); ?>

										</td>							
										<td >
											<?php echo e($Option?->title_en); ?>

										</td>							
															
										
										<td>
											
											<?php if($Option->enable == 1): ?>

											<a class="btn btn-danger m-1"  href="<?php echo e(route('reportOption.enable', $Option->id)); ?>" ><?php echo app('translator')->get('lang.Disable'); ?> </a>
										<?php else: ?>
												<a class="btn btn-success m-1"  href="<?php echo e(route('reportOption.enable', $Option->id)); ?>" ><?php echo app('translator')->get('lang.Enable'); ?></a>
										<?php endif; ?>	
											
											<button class="btn btn-primary" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal"  onclick="getRecord(<?php echo e($Option); ?>)"><?php echo app('translator')->get('lang.edit'); ?></button>
											
											

                                            
										</td>
							
									</tr>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
									
								<?php endif; ?>
								
							</tbody>
							<tfoot>
								<tr>
									<th>#</th>
									<th><?php echo app('translator')->get('lang.title_ar'); ?></th>
									<th><?php echo app('translator')->get('lang.title_en'); ?></th>
									
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
			 <h5 class="modal-title" id="exampleModalLabel"><?php echo app('translator')->get('lang.add_report_options'); ?></h5>
			 <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
		  </div>
		  <div class="modal-body">

			<form class="needs-validation" novalidate="" method="POST" enctype="multipart/form-data" action="<?php echo e(route('reportOption.store')); ?>">
				<?php echo csrf_field(); ?>
				<div class="mb-3">
					
					<div class="col-md-12 mb-3">
						<label for="validationCustom01"><?php echo app('translator')->get('lang.title_ar'); ?></label>
						<input class="form-control" id="validationCustom01" type="text" name="title_ar" value="<?php echo e(old('title_ar')); ?>" placeholder="" >
						<div class="valid-feedback">Looks good!</div>
						<div class="invalid-feedback">Please choose a title_ar.</div>
					</div>	
					<div class="col-md-12 mb-3">
						<label for="validationCustom01"><?php echo app('translator')->get('lang.title_en'); ?></label>
						<input class="form-control" id="validationCustom01" type="text" name="title_en" value="<?php echo e(old('title_en')); ?>" placeholder="" >
						<div class="valid-feedback">Looks good!</div>
						<div class="invalid-feedback">Please choose a title_en.</div>
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

			<form class="needs-validation" novalidate="" method="POST" enctype="multipart/form-data" action="<?php echo e(route('reportOption.update')); ?>">
				<?php echo csrf_field(); ?>
				<input type="hidden" id="section_id" name="id">
				
				
				<div class="mb-3">
					<div class="col-md-12 mb-3">
						<label for="validationCustom01"><?php echo app('translator')->get('lang.title_ar'); ?></label>
						<input class="form-control" id="section_title_ar" type="text" name="title_ar" value="<?php echo e(old('title_ar')); ?>" placeholder="" >
						<div class="valid-feedback">Looks good!</div>
						<div class="invalid-feedback">Please choose a title_ar.</div>
					</div>
					<div class="col-md-12 mb-3">
						<label for="validationCustom01"><?php echo app('translator')->get('lang.title_en'); ?></label>
						<input class="form-control" id="section_title_en" type="text" name="title_en" value="<?php echo e(old('title_en')); ?>" placeholder="" >
						<div class="valid-feedback">Looks good!</div>
						<div class="invalid-feedback">Please choose a title_en.</div>
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
	    document.getElementById("section_title_en").value=data['title_en'];
	    document.getElementById("section_title_ar").value=data['title_ar'];
	    // document.getElementById("section_enable").value=data['link'];
   }

   function getId(id){
	    document.getElementById("notification_id").value=id;
   }
</script>
<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\OneDrive\Desktop\_\codeing\work\mazen\wikala\resources\views/admin/report_options/index.blade.php ENDPATH**/ ?>