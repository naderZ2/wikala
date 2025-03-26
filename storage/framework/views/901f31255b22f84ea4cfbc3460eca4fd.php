<?php $__env->startSection('title', 'Basic DataTables'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/select2.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3><?php echo app('translator')->get('lang.regions'); ?></h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item"><?php echo app('translator')->get('lang.Dashboard'); ?></li>
<li class="breadcrumb-item active"><?php echo app('translator')->get('lang.regions'); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
    <div class="alert alert-danger dark alert-dismissible fade show" role="alert"><strong><?php echo e($message); ?></strong>
        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

    <div class="row">
        <div class="d-flex justify-content-end col-sm-12">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add role')): ?>
            <a href="<?php echo e(route('city.create')); ?>" class="btn btn-primary"><?php echo app('translator')->get('lang.add_slider'); ?></a>
            <?php endif; ?>
        </div>

        <div class="d-flex justify-content-start col-sm-12 mt-3">
            <select class="js-example-placeholder-multiple col-sm-12" id="validationCustom03" name="parent_id">
                <option value=""></option>
                <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $City): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($City->parent == null): ?>
                <option value="<?php echo e($City->id); ?>"><?php echo e(app()->getLocale() == "en" ? $City->name_en : $City->name_ar); ?></option>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div class="col-sm-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display" id="advance-1">
                            <thead>
                                <tr>
                                    <th><?php echo app('translator')->get('lang.governorate'); ?></th>
                                    
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="areasTable">
                                <?php $__empty_1 = true; $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e(app()->getLocale() == "en" ? $city->name_en : $city->name_ar); ?></td>
                                    
                                    <td>
                                        <button class="btn btn-primary" type="button"
                                            data-bs-toggle="modal"
                                            data-bs-target="#exampleModal"
                                            onclick="getRecord(<?php echo e(json_encode($city)); ?>)">
                                            <?php echo app('translator')->get('lang.edit'); ?>
                                        </button>
                                        <form action="<?php echo e(route('dashboard.city.destroy')); ?>" method="POST">
                                            <?php echo method_field('delete'); ?>
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="id" value="<?php echo e($city->id); ?>">
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete notification')): ?>
                                            <button class="btn btn-danger" type="submit"><?php echo app('translator')->get('lang.remove'); ?></button>
                                            <?php endif; ?>
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="3"><?php echo app('translator')->get('lang.no_data'); ?></td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
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
                <form class="needs-validation" novalidate="" method="POST" enctype="multipart/form-data"
                    action="<?php echo e(route('dashboard.city.update')); ?>">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" id="section_id" name="id">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="section_name"><?php echo app('translator')->get('lang.name_ar'); ?></label>
                            <input class="form-control" id="section_name_ar" type="text" name="name_ar" value=""
                                placeholder="name" required="">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="section_name"><?php echo app('translator')->get('lang.name_en'); ?></label>
                            <input class="form-control" id="section_name_en" type="text" name="name_en" value=""
                                placeholder="name" required="">
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

<script>
    // Fetch areas dynamically and populate the table
$('#validationCustom03').on('change', function () {
    var regionId = $(this).val();
    $('#areasTable').html('');
    $.ajax({
        url: "<?php echo e(route('get_city')); ?>?region_id=" + regionId,
        type: 'get',
        dataType: 'json',
        success: function (res) {
    if (res.length > 0) {
        res.forEach(function (item) {
            $('#areasTable').append(`
                <tr>
                    <td>${document.documentElement.dir == 'rtl' ? item.name_ar : item.name_en}</td>
                    <td>
                        <!-- Updated Edit Button -->
                        <button class="btn btn-primary edit-btn" 
                                type="button"
                                data-record='${JSON.stringify(item)}' 
                                data-bs-toggle="modal" 
                                data-bs-target="#exampleModal">
                            <?php echo app('translator')->get('lang.edit'); ?>
                        </button>

                        <!-- Delete Form -->
                        <form action="<?php echo e(route('dashboard.city.destroy')); ?>" method="POST" style="display:inline-block;">
                            <?php echo method_field('delete'); ?>
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="id" value="${item.id}">
                            <button class="btn btn-danger" type="submit"><?php echo app('translator')->get('lang.remove'); ?></button>
                        </form>
                    </td>
                </tr>
            `);
        });
    } else {
        $('#areasTable').html('<tr><td colspan="3"><?php echo app('translator')->get('lang.no_data'); ?></td></tr>');
    }
}

    });
});

// Use event delegation to handle clicks on dynamically added Edit buttons
$(document).on('click', '.edit-btn', function () {
    var record = $(this).data('record');
    getRecord(record);
});

// Populate modal with old data for editing
function getRecord(data) {
    $('#section_name_ar').val(data.name_ar || '');
    $('#section_name_en').val(data.name_en || '');
    $('#section_id').val(data.id || '');
    // $('#parent_id').val(data.parent_id || ''); // Set parent_id value in the dropdown
}


</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\OneDrive\Desktop\_\codeing\work\mazen\wikala\resources\views/admin/city/index.blade.php ENDPATH**/ ?>