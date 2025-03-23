<?php $__env->startSection('title', 'Basic DataTables'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/select2.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/owlcarousel.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3> <?php echo app('translator')->get('lang.Products'); ?> </h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item"><?php echo app('translator')->get('lang.Dashboard'); ?></li>
<li class="breadcrumb-item active"><?php echo app('translator')->get('lang.Products'); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12 mt-3">
			<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add discount')): ?>
					<a href="<?php echo e(route('product.create')); ?>"  class="btn btn-primary"><?php echo app('translator')->get('lang.add_slider'); ?></a>
				<?php endif; ?>	
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table class="display" id="advance-1">
							<thead>
								<tr>
									<th><?php echo app('translator')->get('lang.Name'); ?></th>
									<th><?php echo app('translator')->get('lang.quantity'); ?></th>
									<th><?php echo app('translator')->get('lang.price'); ?></th>
									<th>price before discount</th>
									<th><?php echo app('translator')->get('lang.Seller'); ?></th>
									<th><?php echo app('translator')->get('lang.Main_Image'); ?></th>
									<th><?php echo app('translator')->get('lang.Category'); ?></th>
									<th></th>									
								</tr>
							</thead>
							<tbody>
								<?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
									<tr>
										<td><?php echo e($product->name); ?></td>
										<td><?php echo e($product->quantity); ?></td>
										<td><?php echo e($product->price); ?></td>
										<td><?php echo e($product->old_price); ?></td>
										<td><?php echo e($product->seller->name); ?></td>
										<td >
											<img src="<?php echo e(asset($product->main_image)); ?>"  alt=""  class="image-fluid"  height="90" width="90">
										</td>
										<td><?php echo e($product->category->name); ?></td>
										<td>
											<button class="btn btn-primary" id="addRow" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal"  onclick="getRow(<?php echo e($product); ?>)"><?php echo app('translator')->get('lang.details'); ?></button>
											<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('change product status')): ?>
											<a class="btn btn-primary" href="<?php echo e(route('product.edit',$product->id)); ?>" ><?php echo app('translator')->get('lang.edit'); ?></a>

											<?php if($product->is_available == 1): ?>
											<a href="<?php echo e(route('product.update',$product->id)); ?>" class="btn btn-danger mt-1" >
												<?php echo app('translator')->get('lang.Disable'); ?>
											</a>

											<?php else: ?>
												<a href="<?php echo e(route('product.update',$product->id)); ?>" class="btn btn-success mt-1" >
													<?php echo app('translator')->get('lang.Enable'); ?>
												</a>
											<?php endif; ?>

											<!--<?php if($product?->deleted_at == null): ?>-->
											<!--<a href="<?php echo e(route('product.hide_product',$product->id)); ?>" class="btn btn-success mt-1" >-->
											<!--	<?php echo app('translator')->get('lang.Hide'); ?>-->
											<!--</a>-->
						
											<!--<?php else: ?>-->
											<!--<a href="<?php echo e(route('product.hide_product',$product->id)); ?>" class="btn btn-danger mt-1" >-->
											<!--	<?php echo app('translator')->get('lang.Show'); ?>-->
											<!--</a>-->


											<!--<?php endif; ?>-->
											<!--<?php endif; ?>	-->
											
											
											

										</td>							
									</tr>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
									
								<?php endif; ?>
								
							</tbody>
							<tfoot>
								<tr>
									<th><?php echo app('translator')->get('lang.Name'); ?></th>
									<th><?php echo app('translator')->get('lang.quantity'); ?></th>
									<th><?php echo app('translator')->get('lang.price'); ?></th>
																	
									<th>price before discount</th>

									<th><?php echo app('translator')->get('lang.Seller'); ?></th>
									<th><?php echo app('translator')->get('lang.Main_Image'); ?></th>
									<th><?php echo app('translator')->get('lang.Category'); ?></th>
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
			 <h5 class="modal-title" id="exampleModalLabel">details</h5>
			 <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
		  </div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12 mb-3">
						<div class="col">
							<div class="mb-3 mb-0">
								<label for="exampleFormControlTextarea4">description</label>
								<textarea class="form-control" id="description" name="description" rows="3" readonly></textarea>
							</div>
						</div>
					</div>

					<div class="card">
					
						<label for="exampleFormControlTextarea4">images</label>
						<div class="card-body">
							<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
								<div class="carousel-inner" id="mazen">
								  <div class="carousel-item active">
									
								  </div>
								  
								  
								</div>
								<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
								  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
								  <span class="sr-only">Previous</span>
								</a>
								<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
								  <span class="carousel-control-next-icon" aria-hidden="true"></span>
								  <span class="sr-only">Next</span>
								</a>
							  </div>
							
						</div>
					</div>
				</div>
				
				
				<div class="modal-footer">
					<button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close</button>
					
				</div>			
			</div>
		  
	   </div>
	</div>
</div>

<?php $__env->stopSection(); ?>

<script>
	function getRow(data){

		if(data){
			document.getElementById("description").value=data['description'];
			data['images'].forEach((img,index) => {
				var temp=img['name'];
				var active='';
				document.getElementById("mazen").innerHTML += `
				<div class="carousel-item `+active+`">
					<img class="d-block w-100" src="<?php echo e(asset('`+temp+`')); ?>" 
					alt="">
				</div>`;
				
			});
		}
   }

</script>
<?php $__env->startSection('script'); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script src="<?php echo e(asset('assets/js/datatable/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatables/datatable.custom.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/form-validation-custom.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/select2/select2.full.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/select2/select2-custom.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/owlcarousel/owl.carousel.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/owlcarousel/owl-custom.js')); ?>"></script>
<script>
	 	$('#carouselExampleControls').carousel({
  		interval: 3000
	})
</script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\OneDrive\Desktop\_\codeing\work\mazen\ezhalhaUpTo9\ezhalha\resources\views/admin/product/index.blade.php ENDPATH**/ ?>