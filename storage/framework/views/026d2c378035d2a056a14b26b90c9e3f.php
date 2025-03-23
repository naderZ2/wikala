<?php $__env->startSection('title', 'Login'); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
   <div class="row">
      <!--<div class="col-xl-7 order-1"><img class="bg-img-cover bg-center" src="<?php echo e(asset('logo.png')); ?>" alt="looginpage"></div>-->
      <div class="col-xl-12 p-0">
         <div class="login-card">
            <div>
               <!--<div><a class="logo text-start" href="<?php echo e(route('index')); ?>"><img class="img-fluid for-light" src="<?php echo e(asset('logo.png')); ?>" height="50" width="50"  alt="looginpage"><img class="img-fluid for-dark" src="<?php echo e(asset('logo.png')); ?>" alt="looginpage"></a></div>-->
               <div class="login-main">
                  <form class="theme-form needs-validation" novalidate="" method="POST" action="<?php echo e(route('admin.login')); ?>">
                     <?php echo csrf_field(); ?>
                     <h4>Sign in to account</h4>
                     <p>Enter your email & password to login</p>
                     <div class="form-group">
                        <label class="col-form-label">Email Address</label>
                        <input class="form-control" type="email" name="email" required="" value="<?php echo e(old('email')); ?>" placeholder="Test@gmail.com">
                        <div class="invalid-feedback">Please enter proper email.</div>
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                           <div class="alert alert-danger"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                     </div>
                     <div class="form-group">
                        <label class="col-form-label">Password</label>
                        <input class="form-control" type="password" name="login[password]" required="" placeholder="*********">
                        <div class="invalid-feedback">Please enter password.</div>
                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="alert alert-danger"><?php echo e($message); ?></div>
                     <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <div class="show-hide"><span class="show"> </span></div>
                     </div>
                     <div class="form-group mb-0">
                        
                        <button class="btn btn-primary btn-block" type="submit">Sign in</button>
                     </div>
                
                  
                     <script>
                        (function() {
                        'use strict';
                        window.addEventListener('load', function() {
                        // Fetch all the forms we want to apply custom Bootstrap validation styles to
                        var forms = document.getElementsByClassName('needs-validation');
                        // Loop over them and prevent submission
                        var validation = Array.prototype.filter.call(forms, function(form) {
                        form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                        }, false);
                        });
                        }, false);
                        })();
                        
                     </script>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.authentication.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\OneDrive\Desktop\_\codeing\work\mazen\ezhalhaUpTo10\ezhalha\resources\views/authentication/login-bs-validation.blade.php ENDPATH**/ ?>