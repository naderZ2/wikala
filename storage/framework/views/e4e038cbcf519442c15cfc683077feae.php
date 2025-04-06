<?php $__env->startSection('title', 'Basic DataTables'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>


<?php if(Route::currentRouteName() == 'order.under_preparation'): ?>

<h3> <?php echo app('translator')->get('lang.Under_Preparation_Orders'); ?> </h3>

<?php elseif(Route::currentRouteName() == 'order.completed'): ?>

<h3> <?php echo app('translator')->get('lang.Completed_Orders'); ?> </h3>

<?php elseif(Route::currentRouteName() == 'order.new'): ?>

<h3> <?php echo app('translator')->get('lang.New_Orders'); ?> </h3>

<?php else: ?>

<h3> <?php echo app('translator')->get('lang.All_Orders'); ?> </h3>

<?php endif; ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item"><?php echo app('translator')->get('lang.Dashboard'); ?></li>
<li class="breadcrumb-item active">
	<?php echo app('translator')->get('lang.Orders'); ?>


</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-body">

					<div class="table-responsive">
						<div class="col-sm-4 mb-2">
							<input 
								type="number" 
								id="searchPhone" 
								placeholder="Search by phone" 
								class="form-control" 
								oninput="filterTableByPhone()"
							>
						</div>
						
						<div class="col-sm-4 mb-2">
							<input 
								type="number" 
								id="searchOrderNumber" 
								placeholder="Search by order number" 
								class="form-control" 
								oninput="filterTableByOrderNumber()"
							>
						</div>

						<table class="display" id="advance-1">
							<thead>
								<tr>
									<th><?php echo app('translator')->get('lang.Order_Number'); ?></th>
									<th class="text-center"><?php echo app('translator')->get('lang.Total_Price'); ?></th>
									<th class="text-center"><?php echo app('translator')->get('lang.Status'); ?></th>
									<th><?php echo app('translator')->get('lang.Client'); ?></th>
									<th><?php echo app('translator')->get('lang.delivery_fee'); ?></th>
									<th class="text-center"><?php echo app('translator')->get('lang.Time'); ?></th>
									<th class="text-center"><?php echo app('translator')->get('lang.delivery_time'); ?></th>

									<th></th>								
								</tr>
							</thead>
							<tbody id="userTable">
								<?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
									<tr>
										<td id="orderNumber"><?php echo e($order->order_number); ?></td>
										<td class="text-center"><?php echo e($order->total_price); ?></td>
										<td class="text-center"><?php echo e($order->status); ?></td>

										

										<td data-phone="<?php echo e($order?->user?->phone); ?>" >
											
											<?php echo e($order?->user?->name); ?>

											
										</td>
										<td>
											
											<?php echo e($order?->delivery_fee); ?>

											
										</td>
										<td class="text-center"><?php echo e($order->created_at->format('Y-m-d - H:i')); ?></td>
										<td class="text-center"><?php echo e($order?->delivery_time?->format('Y-m-d - H:i')); ?></td>
										<td>
											
											<a href="<?php echo e(route('order.details',$order->id)); ?>" class="btn btn-info m-1" ><?php echo app('translator')->get('lang.details'); ?></a>
											
											<?php if( $order->status !=='delivered' && $order->status !=='cancel'): ?>
												
											<a href="<?php echo e(route('order.change_status',[$order->id,'normal'])); ?>" class="btn btn-primary m-1" ><?php echo app('translator')->get('lang.change_status'); ?></a>
											
											
											<a href="<?php echo e(route('order.change_status',[$order->id,'cancel'])); ?>" class="btn btn-danger m-1" ><?php echo app('translator')->get('lang.cancel'); ?></a>
											
											<?php endif; ?>
											<!--<?php if($order->file): ?>-->
    							<!--				<a href="<?php echo e(asset($order->file)); ?>" download rel="noopener noreferrer" target="_blank" class="btn btn-success">-->
           <!--                                        <?php echo app('translator')->get('lang.downloadFile'); ?>-->
           <!--                                     </a>-->
           <!--                                 <?php endif; ?>-->
										</td>
									</tr>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
									
								<?php endif; ?>
								
							</tbody>
							<tfoot>
								<tr>
									<th><?php echo app('translator')->get('lang.Order_Number'); ?></th>
									<th class="text-center"><?php echo app('translator')->get('lang.Total_Price'); ?></th>
									<th class="text-center"><?php echo app('translator')->get('lang.Status'); ?></th>
									<th><?php echo app('translator')->get('lang.Client'); ?></th>
									<th><?php echo app('translator')->get('lang.delivery_fee'); ?></th>
									<th class="text-center"><?php echo app('translator')->get('lang.Time'); ?></th>
									<th class="text-center"><?php echo app('translator')->get('lang.delivery_time'); ?></th>
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
<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\OneDrive\Desktop\_\codeing\work\mazen\wikala\resources\views/admin/order/index.blade.php ENDPATH**/ ?>