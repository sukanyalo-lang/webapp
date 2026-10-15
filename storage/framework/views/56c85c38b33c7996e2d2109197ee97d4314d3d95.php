 
<?php $__env->startSection('content'); ?>

<section class="login py-5 border-top-1">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-5 col-md-8 align-item-center">
        <div class="border">
          <h3 class="bg-gray p-4">เข้าสู่ระบบ Pet Finder</h3>
          <form method="POST" action="<?php echo e(route('login')); ?>">
            <?php echo csrf_field(); ?> 
            <fieldset class="p-4">
              <?php if(session('status')): ?><div class="alert alert-success"><?php echo e(session('status')); ?></div><?php endif; ?>
              <?php if($errors->any()): ?><div class="alert alert-danger"><ul class="mb-0"><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li><?php echo e($e); ?></li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></ul></div><?php endif; ?>
              <input class="form-control mb-3" type="email" name="email" placeholder="อีเมล*" value="<?php echo e(old('email')); ?>" required autofocus autocomplete="username">
              <input class="form-control mb-3" type="password" name="password" placeholder="รหัสผ่าน*" required autocomplete="current-password">
              <div class="loggedin-forgot">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember" class="pt-3 pb-2">จดจำฉัน</label>
              </div>
              <button type="submit" class="btn btn-primary font-weight-bold mt-3">เข้าสู่ระบบ</button>
              <?php if(Route::has('password.request')): ?>
              <a class="mt-3 d-block text-primary" href="<?php echo e(route('password.request')); ?>">ลืมรหัสผ่าน?</a>
              <?php endif; ?>
              <a class="mt-3 d-inline-block text-primary" href="<?php echo e(route('register')); ?>">สมัครสมาชิก</a>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('template.frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\nigger - Copy\resources\views/auth/login.blade.php ENDPATH**/ ?>