<?php $__env->startSection('title', 'Basic DataTables'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/select2.css')); ?>">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3> <?php echo app('translator')->get('lang.events'); ?></h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item"> <?php echo app('translator')->get('lang.Dashboard'); ?></li>
<li class="breadcrumb-item active"><?php echo app('translator')->get('lang.events'); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
   <div class="d-flex justify-content-end col-sm-12">
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add discount')): ?>
					<a href="<?php echo e(route('daily_events.create')); ?>"  class="btn btn-primary"><?php echo app('translator')->get('lang.add_slider'); ?></a>
				<?php endif; ?>	
        	</div>
	<div class="row">
		<div class="col-sm-12 mt-3">
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table class="display" id="advance-1">
							<thead>
								<tr>
									<th><?php echo app('translator')->get('lang.Category'); ?></th>
									<th><?php echo app('translator')->get('lang.family_name'); ?></th>
									<!--<th><?php echo app('translator')->get('lang.Image'); ?></th>-->
									<th><?php echo app('translator')->get('lang.Image'); ?></th>
									<th><?php echo app('translator')->get('lang.date'); ?></th>
									<th><?php echo app('translator')->get('lang.Status'); ?></th>
									<th></th>									
								</tr>
							</thead>
							<tbody>
								<?php $__empty_1 = true; $__currentLoopData = $dailyEvents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dailyEvent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
									<tr>
										<td>
											<?php echo e($dailyEvent?->eventCategory?->name); ?>

										</td>
					
										<td><?php echo e($dailyEvent->family_name); ?></td>
										<!--<td >-->
										<!--	<img src="<?php echo e(asset($dailyEvent->eventCategory?->image)); ?>"  alt=""  class="image-fluid"  height="90">-->
										<!--</td>-->
										<td >
											<img src="<?php echo e(asset($dailyEvent?->image)); ?>"  alt=""  class="image-fluid"  height="90">
										</td>
										<td>
										<?php echo e($dailyEvent->date ." ".$dailyEvent->time); ?>

										</td>										
										<td>
										   
											<?php if($dailyEvent->active ==1): ?>
												<?php echo app('translator')->get('lang.active'); ?>
											<?php else: ?>
												<?php echo app('translator')->get('lang.inactive'); ?>
												
											<?php endif; ?>
										</td>										
										
										<td>
										<a class="btn btn-success"  href="<?php echo e(route('daily_events.details',$dailyEvent->id)); ?>">
												<?php echo app('translator')->get('lang.details'); ?></a>

												<input type="hidden" name="id" id="teest">

												<?php if(request()->get('eventiFlter') == 'under_review'): ?>
											<button class="btn btn-danger" type="button" data-bs-toggle="modal" onclick="getId(<?php echo e($dailyEvent->id); ?>)" data-original-title="test" data-bs-target="#exampleModal" ><?php echo app('translator')->get('lang.rejected'); ?></button>

										<!--<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit seller status')): ?>-->
	
	
													
													
												
	
										<!--			<button id="<?php echo e($loop->iteration); ?>" name='sasa'   class="btn btn-danger" onclick="rejection()" type="button" ><?php echo app('translator')->get('lang.rejected'); ?></button>-->
	
													
										<!--			<?php endif; ?>	-->
										<!--		</form>-->

												<?php endif; ?>
												


												<?php if(request()->get('eventiFlter') == 'rejected'): ?>

												<button id="<?php echo e($loop->iteration); ?>" class="btn btn-danger" onclick="reason(document.getElementById('reason'+<?php echo e($dailyEvent->id); ?>).value)" type="button" ><?php echo app('translator')->get('lang.rejection_reason'); ?></button>
												<input type="hidden" id="reason<?php echo e($dailyEvent->id); ?>" value="<?php echo e($dailyEvent?->rejection_reason); ?>" name="reason">
												
												<?php endif; ?>
												<form method="POST" action="<?php echo e(route('daily_events.destroy',$dailyEvent->id)); ?>" style="display: inline-block">
													<?php echo csrf_field(); ?>
													<button  class="btn btn-danger"  ><?php echo app('translator')->get('lang.Delete'); ?></button>
													
												</form>

										</td>
							
									</tr>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
									
								<?php endif; ?>
								
							</tbody>
							<tfoot>
								<tr>
									<th><?php echo app('translator')->get('lang.Name'); ?></th>
									<th><?php echo app('translator')->get('lang.parent_category'); ?></th>
									<!--<th><?php echo app('translator')->get('lang.Image'); ?></th>-->
									<th><?php echo app('translator')->get('lang.Image'); ?></th>
									<th><?php echo app('translator')->get('lang.date'); ?></th>
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
			 <h5 class="modal-title" id="exampleModalLabel"><?php echo app('translator')->get('lang.rejection_reason'); ?></h5>
			 <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
		  </div>
		  <div class="modal-body">

			<form class="needs-validation" novalidate="" method="POST"  action="<?php echo e(route('daily_events.rejection')); ?>">
				<?php echo csrf_field(); ?>
				<input type="hidden" id="client_id"  name="id">
				<div class="row">
					<div class="col-md-12 mb-3">
						<label for="section_name"><?php echo app('translator')->get('lang.rejection_reason'); ?></label>
						<input class="form-control" id="rejection_reason" type="text" name="rejection_reason" value="" placeholder="" required="">
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

// 	function getId(id){
// 			document.getElementById("reason").value=id;
			
			
// 	   }
	   
// 	   function getRndInteger() {
//   	let password=Math.floor(Math.random() * (99999999 - 11111111)) + 11111111;
// 	  document.getElementById("password").value=password;
// 	}

	function getId(id){
	    if(id){
	        document.getElementById("client_id").value=id;
	    }
	}
	</script>


</script>
<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\OneDrive\Desktop\_\codeing\work\mazen\ezhalhaUpTo9\ezhalha\resources\views/admin/events/daily_events.blade.php ENDPATH**/ ?>