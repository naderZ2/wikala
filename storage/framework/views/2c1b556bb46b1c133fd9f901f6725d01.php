
<?php $__env->startSection('title', 'Basic DataTables'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/select2.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/owlcarousel.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3> <?php echo app('translator')->get('lang.category_attributes'); ?> </h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item"><?php echo app('translator')->get('lang.Dashboard'); ?></li>
<li class="breadcrumb-item active"><?php echo app('translator')->get('lang.category_attributes'); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
	<div class="row">
		<div class="d-flex justify-content-end col-sm-12">
			<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add category')): ?>
				<a href="<?php echo e(route('category-attributes.create')); ?>"  class="btn btn-primary"><?php echo app('translator')->get('lang.add_category_attribute'); ?></a>
			<?php endif; ?>	
		</div>
		<div class="col-sm-12 mt-3">
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table class="display" id="advance-1">
							<thead>
								<tr>
									<th><?php echo app('translator')->get('lang.Category'); ?></th>
									<th><?php echo app('translator')->get('lang.Attributes'); ?></th>
									<th><?php echo app('translator')->get('lang.mandatory'); ?></th>
									
									<th></th>									
								</tr>
							</thead>
							<tbody>
								<?php $__empty_1 = true; $__currentLoopData = $categoryAttributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
									<tr>
										<td><?php echo e($value?->category?->name); ?></td>

										<td><?php echo e($value?->attribute?->name); ?></td>
										
										<td><?php echo e($value?->mandatory == 1 ? __('lang.required') : __('lang.not_required')); ?></td>
										
										
										
										
										<td>
											
											
											<a class="btn btn-primary mt-1" href="<?php echo e(route('category-attributes.edit',$value->id)); ?>" ><?php echo app('translator')->get('lang.edit'); ?></a>
											<?php if($value?->enable == 1): ?>
											<a class="btn btn-danger mt-1"  href="<?php echo e(route('category-attributes.enable', $value->id)); ?>" ><?php echo app('translator')->get('lang.Disable'); ?> </a>
											<?php else: ?>
												<a class="btn btn-success mt-1"  href="<?php echo e(route('category-attributes.enable', $value->id)); ?>" ><?php echo app('translator')->get('lang.Enable'); ?></a>
											<?php endif; ?>
											
											<form action="<?php echo e(route('categories_attributes.delete')); ?>" style="display:inline;" onclick="getId(<?php echo e($value->id); ?>)" method="Post" id="form_id">
                                                <?php echo method_field("delete"); ?>
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="id" id="notification_id">
                                                
                                                <button id="<?php echo e($loop->iteration); ?>" class="btn btn-danger sweet-5" onclick="test()" type="button" ><?php echo app('translator')->get('lang.remove'); ?></button>
                                                
                                            </form>
											
										</td>							

											
											

									</tr>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
									
								<?php endif; ?>
								
							</tbody>
							<tfoot>
								<tr>
									<th><?php echo app('translator')->get('lang.Category'); ?></th>
									<th><?php echo app('translator')->get('lang.Attributes'); ?></th>
									<th><?php echo app('translator')->get('lang.mandatory'); ?></th>
									
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
<script src="<?php echo e(asset('assets/js/sweet-alert/sweetalert.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/sweet-alert/app.js')); ?>"></script>

<script>
	 	$('#carouselExampleControls').carousel({
  		interval: 3000
	})

	function getRecord(data){
	    document.getElementById("section_id").value=data['id'];
	    document.getElementById("section_link").value=data['link'];
   }

   function getId(id){
	    document.getElementById("notification_id").value=id;
   }
</script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\OneDrive\Desktop\_\codeing\work\mazen\wikala\resources\views/admin/categories_attributes/index.blade.php ENDPATH**/ ?>