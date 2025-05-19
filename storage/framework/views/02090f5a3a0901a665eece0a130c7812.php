
<?php $__env->startSection('title', __('lang.change_status')); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3><?php echo app('translator')->get('lang.change_status'); ?></h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item"><?php echo app('translator')->get('lang.ads'); ?></li>
<li class="breadcrumb-item active"><?php echo app('translator')->get('lang.change_status'); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
					
                    <form id="statusForm" action="<?php echo e(route('ads.changeStatus', $ad->id)); ?>" method="POST" onsubmit="return confirmStatusChange()">
                        <?php echo csrf_field(); ?>

                        
                        <div class="mb-3">
                            <label class="form-label"><?php echo app('translator')->get('lang.Ad_Number'); ?></label>
                            <input type="text" class="form-control" value="<?php echo e($ad->ad_number); ?>" readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><?php echo app('translator')->get('lang.Title'); ?></label>
                            <input type="text" class="form-control" value="<?php echo e($ad->title); ?>" readonly>
                        </div>

                        
                        <div class="mb-3">
                            <label for="status" class="form-label"><?php echo app('translator')->get('lang.Status'); ?></label>
                            <select name="status" id="status" class="form-select" onchange="toggleRejectedReason()">
                                <option value="under_review" <?php echo e($ad->status == 'under_review' ? 'selected' : ''); ?>><?php echo app('translator')->get('lang.under_review'); ?></option>
                                <option value="accepted" <?php echo e($ad->status == 'accepted' ? 'selected' : ''); ?>><?php echo app('translator')->get('lang.accepted'); ?></option>
                                <option value="rejected" <?php echo e($ad->status == 'rejected' ? 'selected' : ''); ?>><?php echo app('translator')->get('lang.rejected'); ?></option>
                            </select>
                        </div>

                        
                        <div class="mb-3" id="rejectedReasonBlock" style="display: <?php echo e($ad->status == 'rejected' ? 'block' : 'none'); ?>;">
                            <label for="rejected_id" class="form-label"><?php echo app('translator')->get('lang.Rejected_Reason'); ?></label>
                            <select name="rejected_id" id="rejected_id" class="form-select">
                                <option value=""><?php echo app('translator')->get('lang.select'); ?></option>
                                <?php $__currentLoopData = $rejectedReasons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reason): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($reason->id); ?>" <?php echo e($ad->rejected_id == $reason->id ? 'selected' : ''); ?>>
                                        <?php echo e($reason->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <button type="submit" id="submitBtn" class="btn btn-success"><?php echo app('translator')->get('lang.update_status'); ?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        toggleRejectedReason(); // initialize on load
    });

    function toggleRejectedReason() {
        const status = document.getElementById('status').value;
        const reasonBlock = document.getElementById('rejectedReasonBlock');
        const submitBtn = document.getElementById('submitBtn');

        // Show/hide rejected reason dropdown
        reasonBlock.style.display = (status === 'rejected') ? 'block' : 'none';

        // Enable or disable submit button
        submitBtn.disabled = (status === 'under_review');
    }

    function confirmStatusChange() {
        const oldStatus = "<?php echo e($ad->status); ?>";
        const newStatus = document.getElementById('status').value;

        if (oldStatus === newStatus) {
            return confirm("<?php echo app('translator')->get('lang.Are_you_sure_you_want_to_submit_without_changes?'); ?>");
        }

        return true;
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\OneDrive\Desktop\_\codeing\work\mazen\wikala\resources\views/admin/ads/editStatus.blade.php ENDPATH**/ ?>