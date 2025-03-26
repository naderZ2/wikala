<?php $__env->startSection('title', 'Basic DataTables'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/select2.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/owlcarousel.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3> <?php echo app('translator')->get('lang.Attributes'); ?> </h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item"><?php echo app('translator')->get('lang.Dashboard'); ?></li>
<li class="breadcrumb-item active"><?php echo app('translator')->get('lang.Attributes'); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
	<div class="row">
		<div class="d-flex justify-content-end col-sm-12">
			<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add category')): ?>
				<a href="<?php echo e(route('attributes.create')); ?>"  class="btn btn-primary"><?php echo app('translator')->get('lang.add_slider'); ?></a>
			<?php endif; ?>	
		</div>
		<div class="col-sm-12 mt-3">
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table class="display" id="advance-1">
							<thead>
								<tr>
									<th><?php echo app('translator')->get('lang.Name'); ?></th>
									<th><?php echo app('translator')->get('lang.image'); ?></th>
									<th><?php echo app('translator')->get('lang.Type'); ?></th>
									
									<th></th>									
								</tr>
							</thead>
							<tbody>
								<?php $__empty_1 = true; $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
									<tr>
										<td><?php echo e($attribute?->name); ?></td>
										<td >
											<img src="<?php echo e(asset($attribute->image)); ?>"  alt=""  class="image-fluid"  height="90" width="90">
										</td>
										<td><?php echo e(__('lang.'.$attribute->type)); ?></td>
										
										
										<td>
											
											
											<a class="btn btn-primary mt-1" href="<?php echo e(route('attributes.edit',$attribute->id)); ?>" ><?php echo app('translator')->get('lang.edit'); ?></a>
											<?php if($attribute->enable == 1): ?>
											<a class="btn btn-danger mt-1"  href="<?php echo e(route('attributes.enable', $attribute->id)); ?>" ><?php echo app('translator')->get('lang.Disable'); ?> </a>
											<?php else: ?>
												<a class="btn btn-success mt-1"  href="<?php echo e(route('attributes.enable', $attribute->id)); ?>" ><?php echo app('translator')->get('lang.Enable'); ?></a>
											<?php endif; ?>
											
											<button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="setDeleteAction('<?php echo e(route('attributes.destroy', $attribute->id)); ?>')"><?php echo app('translator')->get('lang.Delete'); ?></button>
										</td>							

											
											

									</tr>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
									
								<?php endif; ?>
								
							</tbody>
							<tfoot>
								<tr>
									<th><?php echo app('translator')->get('lang.Name'); ?></th>
									<th><?php echo app('translator')->get('lang.image'); ?></th>
									<th><?php echo app('translator')->get('lang.Type'); ?></th>
									
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


<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel"><?php echo app('translator')->get('lang.Delete'); ?> <?php echo app('translator')->get('lang.attribute'); ?></h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><?php echo app('translator')->get('lang.are_you_sure_to_delete'); ?></p>
            </div>
            <div class="modal-footer">
                <form id="delete-form" method="POST" action="" style="display: inline;">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo app('translator')->get('lang.cancel'); ?></button>
                    <button type="submit" class="btn btn-danger"><?php echo app('translator')->get('lang.Delete'); ?></button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="enableDisableModal" tabindex="-1" role="dialog" aria-labelledby="enableDisableModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="enableDisableModalLabel"><?php echo app('translator')->get('lang.Enable_Disable'); ?> <?php echo app('translator')->get('lang.attribute'); ?></h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><?php echo app('translator')->get('lang.are_you_sure_to_enable_disable'); ?></p>
            </div>
            <div class="modal-footer">
                <form id="enable-disable-form" method="POST" action="" style="display: inline;">
                    <?php echo csrf_field(); ?>
                    
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo app('translator')->get('lang.cancel'); ?></button>
                    <button type="submit" class="btn btn-warning" id="enable-disable-button"><?php echo app('translator')->get('lang.Enable'); ?></button>
                </form>
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
<script>
 function setDeleteAction(url) {
	 var form = document.getElementById('delete-form');
	 form.action = url;
 }

 <script>
    function setEnableDisableAction(url, id) {
        var form = document.getElementById('enable-disable-form');
        form.action = url;

        
        var button = document.getElementById('enable-disable-button');
        button.innerText = (button.innerText === '<?php echo app('translator')->get('lang.Enable'); ?>') ? '<?php echo app('translator')->get('lang.Disable'); ?>' : '<?php echo app('translator')->get('lang.Enable'); ?>';
    }
</script>
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


<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\OneDrive\Desktop\_\codeing\work\mazen\wikala\resources\views/admin/attributes/index.blade.php ENDPATH**/ ?>