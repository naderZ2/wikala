<?php $__env->startSection('title', 'Basic DataTables'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/select2.css')); ?>">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3> <?php echo app('translator')->get('lang.Categories'); ?></h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item"> <?php echo app('translator')->get('lang.Dashboard'); ?></li>
<li class="breadcrumb-item active"><?php echo app('translator')->get('lang.Categories'); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">

	<div class="row">
	      <div class="d-flex justify-content-end col-sm-12">
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add category')): ?>
					<a href="<?php echo e(route('category.create')); ?>"  class="btn btn-primary"><?php echo app('translator')->get('lang.add_slider'); ?></a>
				<?php endif; ?>	
        	</div>
		<div class="col-sm-12 mt-3">
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table class="display" id="advance-1">
							<thead>
								<tr>
									<th><?php echo app('translator')->get('lang.order'); ?></th>
									<th><?php echo app('translator')->get('lang.Name'); ?></th>
									<th><?php echo app('translator')->get('lang.Image'); ?></th>
									<th><?php echo app('translator')->get('lang.Status'); ?></th>
									<th></th>									
								</tr>
							</thead>
							<tbody>
								<?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
									<tr>
										<td >
											<?php echo e($category->order); ?>

										</td>
										<td>
											<?php echo e(app()->getLocale() == "en"? $category->name_en:$category->name_ar); ?>

										</td>
					
										<td >
											<img src="<?php echo e(asset($category->image)); ?>"  alt=""  class="image-fluid"  height="90">
										</td>
									
										<td>
											<?php if($category->end_point ==1): ?>
												<?php echo app('translator')->get('lang.active'); ?>
											<?php else: ?>
												<?php echo app('translator')->get('lang.inactive'); ?>
												
											<?php endif; ?>
										</td>										
										
										<td>
											<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit category')): ?>
											<a class="btn btn-success"  href="<?php echo e(route('category_updateStatus',$category->id)); ?>">
												<?php echo app('translator')->get('lang.change_status'); ?></a>
											<button class="btn btn-primary" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal"  onclick="getRecord(<?php echo e($category); ?>)"><?php echo app('translator')->get('lang.edit'); ?></button>
											
											<?php endif; ?>	
										</td>
							
									</tr>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
									
								<?php endif; ?>
								
							</tbody>
							<tfoot>
								<tr>
									<th><?php echo app('translator')->get('lang.order'); ?></th>
									<th><?php echo app('translator')->get('lang.Name'); ?></th>
									<th><?php echo app('translator')->get('lang.Image'); ?></th>
									<th><?php echo app('translator')->get('lang.Status'); ?></th>
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
			 <h5 class="modal-title" id="exampleModalLabel"><?php echo app('translator')->get('lang.edit'); ?></h5>
			 <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
		  </div>
		  <div class="modal-body">

			<form class="needs-validation" novalidate="" method="POST" enctype="multipart/form-data" action="<?php echo e(route('category.update')); ?>">
				<?php echo csrf_field(); ?>
				<input type="hidden" id="section_id" name="id">
				<div class="row">
					<div class="col-md-12 mb-3">
						<label for="section_name"><?php echo app('translator')->get('lang.name_ar'); ?></label>
						<input class="form-control" id="section_name_ar" type="text" name="name_ar" value="" placeholder="name" required="">
						<div class="valid-feedback">Looks good!</div>
						<div class="invalid-feedback">Please choose a name.</div>

					</div>
					<div class="col-md-12 mb-3">
						<label for="section_name"><?php echo app('translator')->get('lang.name_en'); ?></label>
						<input class="form-control" id="section_name_en" type="text" name="name_en" value="" placeholder="name" required="">
						<div class="valid-feedback">Looks good!</div>
						<div class="invalid-feedback">Please choose a name.</div>

					</div>
				
				</div>
				<div class="col-md-12 mb-3">
					<label for="section_name"><?php echo app('translator')->get('lang.order'); ?></label>
					<input class="form-control" id="section_order" type="number" name="order" value="" placeholder="order" required="">
					<div class="valid-feedback">Looks good!</div>
					<div class="invalid-feedback">Please choose a order.</div>
				</div>

				<div class="mb-3">
					<div class="col-md-12 mb-3">
						<div class="col">
							<div class="mb-3 row">
								<label class="col-sm-3 col-form-label"><?php echo app('translator')->get('lang.Image'); ?></label>
								<div class="col-sm-9">
									<input class="form-control" type="file" name="image"  accept="image/*">
								</div>
							</div>
						</div>
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

<?php $__env->stopSection(); ?>

<script>

	function getRecord(data){
	    document.getElementById("section_name_ar").value=data['name_ar'];
	    document.getElementById("section_name_en").value=data['name_en'];
	    document.getElementById("section_order").value=data['order'];
	    document.getElementById("section_id").value=data['id'];
   }
</script>
<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\OneDrive\Desktop\_\codeing\work\mazen\ezhalhaUpTo9\ezhalha\resources\views/admin/category/details.blade.php ENDPATH**/ ?>