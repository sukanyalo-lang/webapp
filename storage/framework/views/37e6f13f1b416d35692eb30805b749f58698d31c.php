 
<?php $__env->startSection('content'); ?>

<div class="row">
  <div class="col-12">
    <div class="card card-default">
      <div class="card-header">
        <h2>Dashboard</h2>
        <p class="text-muted mb-0">ภาพรวมระบบ Pet Finder — สัตว์หายแจ้งเบาะแส</p>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-4">
            <div class="card card-mini">
              <div class="card-body d-flex align-items-center">
                <i class="mdi mdi-account-group text-primary" style="font-size:2rem;"></i>
                <div class="ml-3">
                  <div class="text-muted small">ผู้ใช้งานทั้งหมด</div>
                  <h4 class="mb-0"><?php echo e(\App\Models\User::count()); ?> คน</h4>
                  <a href="<?php echo e(route('users')); ?>" class="btn btn-sm btn-primary mt-2">จัดการผู้ใช้</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card card-mini">
              <div class="card-body d-flex align-items-center">
                <i class="mdi mdi-clipboard-list-outline text-success" style="font-size:2rem;"></i>
                <div class="ml-3">
                  <div class="text-muted small">รายงานโรคสัตว์</div>
                  <h4 class="mb-0"><?php echo e(\App\Models\DiseaseReport::count()); ?> รายการ</h4>
                  <a href="<?php echo e(route('disease-reports')); ?>" class="btn btn-sm btn-success mt-2">จัดการรายงาน</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card card-mini">
              <div class="card-body d-flex align-items-center">
                <i class="mdi mdi-home-outline text-info" style="font-size:2rem;"></i>
                <div class="ml-3">
                  <div class="text-muted small">หน้าบ้าน</div>
                  <h4 class="mb-0">Pet Finder</h4>
                  <a href="<?php echo e(route('home')); ?>" target="_blank" class="btn btn-sm btn-info mt-2">ดูหน้าเว็บ</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\nigger - Copy\resources\views/dashboard.blade.php ENDPATH**/ ?>