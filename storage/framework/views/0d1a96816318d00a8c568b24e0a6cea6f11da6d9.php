 
<?php $__env->startSection('content'); ?>
    <section class="login py-5 border-top-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8 align-items-center">
                    <div class="border">
                        <h3 class="bg-gray p-4">ลืมรหัสผ่าน</h3>
                        <form method="POST" action="<?php echo e(route('password.email')); ?>">
                            <?php echo csrf_field(); ?>
                            <fieldset class="p-4">
                                <p class="mb-3 text-muted">
                                    ลืมรหัสผ่านใช่ไหม? กรอกอีเมลที่สมัครไว้ ระบบจะส่งลิงก์สำหรับตั้งรหัสผ่านใหม่ให้ทางอีเมล
                                </p>

                                
                                <?php if(session('status')): ?>
                                    <div class="alert alert-success"><?php echo e(session('status')); ?></div>
                                <?php endif; ?>

                                
                                <?php if($errors->any()): ?>
                                    <div class="alert alert-danger">
                                        <ul class="mb-0">
                                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><?php echo e($e); ?></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>

                                <label for="email" class="font-weight-bold">อีเมล</label>
                                <input id="email" class="form-control mb-3" type="email" name="email"
                                    placeholder="อีเมล*" value="<?php echo e(old('email')); ?>" required autofocus>

                                <button type="submit" class="btn btn-primary font-weight-bold mt-3">
                                    ส่งลิงก์รีเซ็ตรหัสผ่าน
                                </button>
                                <a class="mt-3 d-block text-primary" href="<?php echo e(route('login')); ?>">← กลับไปเข้าสู่ระบบ</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\pet\resources\views/auth/forgot-password.blade.php ENDPATH**/ ?>