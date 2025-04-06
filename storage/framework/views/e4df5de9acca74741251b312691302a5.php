<?php $__env->startSection('title', 'Basic DataTables'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>



<h3>
    <?php switch(request('status')):
        case ('accepted'): ?> <?php echo app('translator')->get('lang.accepted_ads'); ?> <?php break; ?>
        <?php case ('under_review'): ?> <?php echo app('translator')->get('lang.under_review_ads'); ?> <?php break; ?>
        <?php case ('rejected'): ?> <?php echo app('translator')->get('lang.rejected_ads'); ?> <?php break; ?>
        <?php case ('outdated'): ?> <?php echo app('translator')->get('lang.outdated_ads'); ?> <?php break; ?>
        <?php default: ?> <?php echo app('translator')->get('lang.ads'); ?>
    <?php endswitch; ?>
</h3>





<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item"><?php echo app('translator')->get('lang.Dashboard'); ?></li>
<li class="breadcrumb-item active">
    <?php switch(request('status')):
        case ('accepted'): ?> <?php echo app('translator')->get('lang.accepted_ads'); ?> <?php break; ?>
        <?php case ('under_review'): ?> <?php echo app('translator')->get('lang.under_review_ads'); ?> <?php break; ?>
        <?php case ('rejected'): ?> <?php echo app('translator')->get('lang.rejected_ads'); ?> <?php break; ?>
        <?php case ('outdated'): ?> <?php echo app('translator')->get('lang.outdated_ads'); ?> <?php break; ?>
        <?php default: ?> <?php echo app('translator')->get('lang.ads'); ?>
    <?php endswitch; ?>
</li>

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
									<th><?php echo app('translator')->get('lang.number'); ?></th>
									<th class="text-center"><?php echo app('translator')->get('lang.Title'); ?></th>
									<th class="text-center"><?php echo app('translator')->get('lang.Start_Date'); ?></th>
									<th class="text-center"><?php echo app('translator')->get('lang.End_Date'); ?></th>
									
									<th></th>								
								</tr>
							</thead>
							

							<tbody>
								<?php $__empty_1 = true; $__currentLoopData = $ads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
									<tr>
										<td><?php echo e($ad->ad_number); ?></td>
										<td class="text-center"><?php echo e($ad->title); ?></td>
										<td class="text-center"><?php echo e($ad->start_date); ?></td>
										<td class="text-center"><?php echo e($ad->end_date); ?></td>
										<td class="text-center">
											<a href="<?php echo e(route('ads.details', $ad->id)); ?>" class="btn btn-info m-1"><?php echo app('translator')->get('lang.details'); ?></a>
										</td>
									</tr>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
									<tr>
										<td colspan="5" class="text-center text-muted"><?php echo app('translator')->get('lang.no_data'); ?></td>
									</tr>
								<?php endif; ?>
							</tbody>
							

							<tfoot>
								<tr>
									<th><?php echo app('translator')->get('lang.number'); ?></th>
									<th class="text-center"><?php echo app('translator')->get('lang.Title'); ?></th>
									<th class="text-center"><?php echo app('translator')->get('lang.Start_Date'); ?></th>
									<th class="text-center"><?php echo app('translator')->get('lang.End_Date'); ?></th>
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




<script>


    function filterTableByPhone() {
    const input = document.getElementById("searchPhone").value; // Input value
    const rows = document.querySelectorAll("#userTable tr"); // All table rows

    rows.forEach(row => {
        // Find the <td> containing the 'data-phone' attribute (the second <td>)
        const phoneCell = row.querySelector("td[data-phone]"); // Get the 'data-phone' td

        if (phoneCell) {
            const phone = phoneCell.getAttribute("data-phone"); // Get the data-phone value
			console.log(phone);
			

            if (input === "" || (phone && phone.includes(input))) {
                row.style.display = ""; // Show row if input is empty or matches
            } else {
                row.style.display = "none"; // Hide row if no match
            }
        } else {
            row.style.display = "none"; // Hide row if no phone data
        }
    });
}

function filterTableByOrderNumber() {
    const input = document.getElementById("searchOrderNumber").value.trim(); // Input value
    const rows = document.querySelectorAll("#userTable tr"); // All table rows

    rows.forEach(row => {
        // Find the <td> containing the order number (the first <td>)
        const orderNumberCell = row.querySelector("td#orderNumber"); // Use querySelector to get the <td>
        
        if (orderNumberCell) {
            const number = orderNumberCell.textContent.trim(); // Extract the text content of the <td>
            
            // Check if input is empty or matches the order number
            if (input === "" || (number && number.includes(input))) {
                row.style.display = ""; // Show row if input is empty or matches
            } else {
                row.style.display = "none"; // Hide row if no match
            }
        } else {
            row.style.display = "none"; // Hide row if no order number found
        }
    });
}


</script>


<script src="<?php echo e(asset('assets/js/datatable/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatables/datatable.custom.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\OneDrive\Desktop\_\codeing\work\mazen\wikala\resources\views/admin/ads/index.blade.php ENDPATH**/ ?>