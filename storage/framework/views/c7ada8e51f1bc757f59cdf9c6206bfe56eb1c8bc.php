<?php $__env->startSection('content'); ?>
    <style>
        .pf-hero {
            background: linear-gradient(120deg, rgba(22, 43, 37, .93), rgba(43, 83, 69, .78)), url('<?php echo e(asset('asset/frontend/images/slider/slider-bg.jpg')); ?>') center/cover;
            color: #fff;
            padding: 86px 0 72px
        }

        .pf-hero h1 {
            font-size: clamp(2.3rem, 5vw, 4.3rem);
            font-weight: 800;
            line-height: 1.12;
            max-width: 760px;
            margin: 0 auto 18px
        }

        .pf-hero p {
            font-size: 1.1rem;
            max-width: 650px;
            margin: 0 auto 28px;
            color: #e7f0eb
        }

        .pf-pill {
            display: inline-block;
            background: #e7f2e9;
            color: #24513f;
            border-radius: 999px;
            padding: 7px 14px;
            font-size: .82rem;
            font-weight: 700;
            margin-bottom: 18px
        }

        .pf-stat {
            border: 1px solid #e7ece8;
            border-radius: 18px;
            padding: 22px;
            background: #fff;
            box-shadow: 0 12px 35px rgba(25, 55, 40, .06)
        }

        .pf-card {
            height: 100%;
            border: 1px solid #e7ece8;
            border-radius: 18px;
            overflow: hidden;
            background: #fff;
            transition: .2s;
            box-shadow: 0 8px 24px rgba(25, 55, 40, .05)
        }

        .pf-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 16px 34px rgba(25, 55, 40, .11)
        }

        .pf-card-img {
            height: 190px;
            background: #edf3ee;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4rem;
            color: #6c927b
        }

        .pf-card-body {
            padding: 20px
        }

        .pf-chip {
            font-size: .75rem;
            font-weight: 700;
            padding: 5px 10px;
            border-radius: 999px;
            background: #fff0e7;
            color: #9b4b25
        }

        .pf-chip.found {
            background: #e6f6eb;
            color: #277446
        }

        .pf-muted {
            color: #78857d;
            font-size: .9rem
        }

        .pf-section-title {
            font-weight: 800;
            color: #20392e
        }
    </style>
    <section class="pf-hero text-center">
        <div class="container"><span class="pf-pill">ชุมชนช่วยกัน · พาเพื่อนตัวน้อยกลับบ้าน</span>
            <h1>ทุกการพบเจอ<br>อาจเปลี่ยนชีวิตหนึ่งชีวิต</h1>
            <p>พื้นที่กลางสำหรับแจ้งสัตว์เลี้ยงหาย แจ้งพบสัตว์ และช่วยส่งต่อข้อมูลให้ถึงเจ้าของอย่างรวดเร็ว</p>
            <div class="d-flex flex-wrap justify-content-center" style="gap:12px"><a href="<?php echo e(route('pets')); ?>"
                    class="btn btn-light btn-lg">ค้นหาประกาศ <i class="fa fa-search ml-1"></i></a><a
                    href="<?php echo e(route('report')); ?>" class="btn btn-primary btn-lg">+ ลงประกาศฟรี</a></div>
        </div>
    </section>
    <section class="section-sm">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-4 mb-3">
                    <div class="pf-stat">
                        <div class="pf-muted">ประกาศสัตว์หาย</div>
                        <div class="display-4 font-weight-bold" style="color:#bd5b45"><?php echo e(number_format($lostCount)); ?></div>
                        <div class="pf-muted">กำลังรอความช่วยเหลือ</div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="pf-stat">
                        <div class="pf-muted">ประกาศพบสัตว์</div>
                        <div class="display-4 font-weight-bold" style="color:#37835a"><?php echo e(number_format($foundCount)); ?></div>
                        <div class="pf-muted">รอตามหาเจ้าของ</div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="pf-stat">
                        <div class="pf-muted">ร่วมเป็นส่วนหนึ่ง</div>
                        <div class="h3 font-weight-bold mt-2">ช่วยแชร์ · ช่วยแจ้ง</div>
                        <div class="pf-muted">ทุกเบาะแสมีความหมาย</div>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-wrap align-items-end justify-content-between mb-4">
                <div><span class="pf-muted text-uppercase">Community board</span>
                    <h2 class="pf-section-title mb-1">ประกาศล่าสุด</h2>
                    <p class="pf-muted mb-0">ข้อมูลจากฐานข้อมูลจริงของระบบ</p>
                </div><a href="<?php echo e(route('pets')); ?>" class="btn btn-outline-success mt-3">ดูประกาศทั้งหมด <i
                        class="fa fa-arrow-right ml-1"></i></a>
            </div>
            <div class="row">
                <?php $__empty_1 = true; $__currentLoopData = $pets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-lg-4 col-md-6 mb-4">

                        <article class="pf-card">

                            <div class="pf-card-img">
                                <?php if($pet->photo_path): ?>
                                    <img src="<?php echo e(asset('storage/' . $pet->photo_path)); ?>" alt="<?php echo e($pet->pet_name); ?>"
                                        style="width:100%; height:190px; object-fit:cover;"
                                        onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                                    <div style="display:none; text-align:center; padding:30px;">
                                        <i class="fa fa-paw" style="font-size:30px;"></i>
                                        <p>โหลดรูปไม่สำเร็จ</p>
                                    </div>
                                <?php else: ?>
                                    <div style="text-align:center; padding:30px;">
                                        <i class="fa fa-paw" style="font-size:30px;"></i>
                                        <p>ไม่มีข้อมูลรูปภาพ</p>
                                    </div>
                                <?php endif; ?>
                            </div>


                            <div class="pf-card-body">
                                <span class="pf-chip <?php echo e($pet->status === 'found' ? 'found' : ''); ?>">
                                    <?php echo e($pet->status === 'found' ? 'พบสัตว์' : 'สัตว์หาย'); ?>

                                </span>

                                <h4 class="mt-3 mb-2 font-weight-bold">
                                    <?php echo e($pet->pet_name); ?>

                                </h4>

                                <p class="pf-muted mb-2">
                                    <i class="fa fa-paw mr-2"></i>
                                    <?php echo e($pet->pet_type); ?>

                                    <?php echo e($pet->color ? '· ' . $pet->color : ''); ?>

                                </p>

                                <p class="pf-muted mb-3">
                                    <i class="fa fa-map-marker mr-2"></i>
                                    <?php echo e($pet->location); ?>

                                </p>

                                <p class="mb-0">
                                    <?php echo e(\Illuminate\Support\Str::limit($pet->description, 100)); ?>

                                </p>
                            </div>
                        </article>

                </div><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><div class="col-12">
                        <div class="text-center p-5" style="background:#f5f8f5;border-radius:18px"><i class="fa fa-heart-o"
                                style="font-size:2.5rem;color:#6c927b"></i>
                            <h4 class="mt-3">ยังไม่มีประกาศในระบบ</h4>
                            <p class="pf-muted">เป็นคนแรกที่ลงประกาศเพื่อเริ่มช่วยเหลือสัตว์เลี้ยง</p><a
                                href="<?php echo e(route('report')); ?>" class="btn btn-primary">ลงประกาศแรก</a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\pet\resources\views/welcome.blade.php ENDPATH**/ ?>