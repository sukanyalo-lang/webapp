 
<?php $__env->startSection('content'); ?>

<section class="login py-5 border-top-1">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-5 col-md-8 align-item-center">
        <div class="border border">
          <h3 class="bg-gray p-4">สมัครสมาชิก Pet Finder</h3>
          <form method="POST" action="<?php echo e(route('register')); ?>" id="registerForm">
            <?php echo csrf_field(); ?> 
            <fieldset class="p-4">
              <?php if($errors->any()): ?><div class="alert alert-danger"><ul class="mb-0"><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li><?php echo e($e); ?></li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></ul></div><?php endif; ?>
              <input class="form-control mb-3" type="text" name="name" placeholder="ชื่อผู้ใช้งาน*" value="<?php echo e(old('name')); ?>" required autofocus autocomplete="name">
              <input class="form-control mb-3" type="email" name="email" placeholder="อีเมล*" value="<?php echo e(old('email')); ?>" required autocomplete="email">
              <input class="form-control mb-3" type="password" id="password" name="password" placeholder="รหัสผ่าน (อย่างน้อย 8 ตัว)*" required autocomplete="new-password">
              <input class="form-control mb-3" type="password" id="password_confirmation" name="password_confirmation" placeholder="ยืนยันรหัสผ่าน*" required autocomplete="new-password">
              <button type="submit" class="btn btn-primary font-weight-bold mt-3">สมัครสมาชิก</button>
              <a class="mt-3 d-inline-block text-primary" href="<?php echo e(route('login')); ?>">มีบัญชีแล้ว? เข้าสู่ระบบ</a>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
// เช็ครหัสตรงกันก่อนส่ง
document.getElementById('registerForm').addEventListener('submit', function(e){
  var p=document.getElementById('password').value, c=document.getElementById('password_confirmation').value;
  if(p!==c){ e.preventDefault(); alert('รหัสผ่านทั้งสองช่องไม่ตรงกัน'); }
});
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('template.frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\pet\resources\views/auth/register.blade.php ENDPATH**/ ?>