<?php $__env->startSection('content'); ?>
    <div class="container-fluid py-3">
        <div class="mb-4"><span class="small text-muted text-uppercase">Pet Finder / Admin</span>
            <h2 class="font-weight-bold mb-1">ภาพรวมระบบ</h2>
            <p class="text-muted">ยินดีต้อนรับ <?php echo e(auth()->user()->name); ?> — จัดการประกาศและผู้ใช้งานได้จากที่นี่</p>
        </div>
        <div class="row">
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card card-default h-100">
                    <div class="card-body d-flex align-items-center"><i class="mdi mdi-account-group text-primary"
                            style="font-size:2.7rem"></i>
                        <div class="ml-3">
                            <div class="text-muted">สมาชิกทั้งหมด</div>
                            <h3 class="font-weight-bold mb-2"><?php echo e(number_format(\App\Models\User::count())); ?></h3><a
                                href="<?php echo e(route('users')); ?>" class="btn btn-sm btn-primary">จัดการสมาชิก</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card card-default h-100">
                    <div class="card-body d-flex align-items-center"><i class="mdi mdi-paw text-success"
                            style="font-size:2.7rem"></i>
                        <div class="ml-3">
                            <div class="text-muted">ประกาศทั้งหมด</div>
                            <h3 class="font-weight-bold mb-2"><?php echo e(number_format(\App\Models\PetReport::count())); ?></h3><a
                                href="<?php echo e(route('pet-reports')); ?>" class="btn btn-sm btn-success">จัดการประกาศ</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card card-default h-100">
                    <div class="card-body d-flex align-items-center"><i class="mdi mdi-chart-bar text-warning"
                            style="font-size:2.7rem"></i>
                        <div class="ml-3">
                            <div class="text-muted">สถิติโรคสัตว์ (BLV API)</div>
                            <h3 class="font-weight-bold mb-2">FSVO</h3><a href="<?php echo e(route('disease-stats')); ?>"
                                target="_blank" class="btn btn-sm btn-warning">ดูสถิติสด</a> <a href="/api/blv/stats"
                                target="_blank" class="btn btn-sm btn-light border">JSON</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card card-default h-100">
                    <div class="card-body d-flex align-items-center"><i class="mdi mdi-home-outline text-info"
                            style="font-size:2.7rem"></i>
                        <div class="ml-3">
                            <div class="text-muted">หน้าเว็บไซต์</div>
                            <h3 class="font-weight-bold mb-2">Pet Finder</h3><a href="<?php echo e(route('home')); ?>" target="_blank"
                                class="btn btn-sm btn-info">เปิดหน้าบ้าน</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 mb-4">
                <div class="card card-default h-100">
                    <div class="card-body">
                        <h4 class="font-weight-bold">เริ่มต้นใช้งาน</h4>
                        <p class="text-muted">ตรวจสอบประกาศใหม่ แก้ไขข้อมูลที่ไม่ถูกต้อง
                            และช่วยให้เจ้าของสัตว์เลี้ยงติดต่อกันได้สะดวกขึ้น ข้อมูล API ที่ดึงมาแสดงแล้ว: /api/pets,
                            /api/pets/stats, /api/blv/stats</p><a href="<?php echo e(route('pet-reports')); ?>"
                            class="btn btn-primary">ไปยังประกาศสัตว์เลี้ยง</a> <a href="<?php echo e(route('disease-stats')); ?>"
                            class="btn btn-outline-success">สถิติโรคสัตว์ (BLV API)</a> <a href="/api/pets" target="_blank"
                            class="btn btn-outline-secondary">API ประกาศ /api/pets</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\pet\resources\views/dashboard.blade.php ENDPATH**/ ?>