<?php $__env->startSection('content'); ?>
    <style>
        .pets-head {
            background: #edf4ee;
            padding: 42px 0
        }

        .pet-list-card {
            height: 100%;
            border: 1px solid #e4ebe5;
            border-radius: 16px;
            overflow: hidden;
            background: #fff;
            box-shadow: 0 8px 24px rgba(20, 50, 30, .05)
        }

        .pet-list-image {
            height: 185px;
            background: #edf3ee;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #71937b;
            font-size: 3.5rem
        }

        .pet-list-body {
            padding: 18px
        }

        .pet-status {
            font-size: .75rem;
            font-weight: 700;
            border-radius: 30px;
            padding: 5px 10px;
            background: #fff0e8;
            color: #9d4b2a
        }

        .pet-status.found {
            background: #e4f5e9;
            color: #267544
        }
    </style>
    <section class="pets-head">
        <div class="container"><span class="text-uppercase text-muted small">Pet Finder · Community</span>
            <h1 class="font-weight-bold mt-2">ค้นหาประกาศสัตว์เลี้ยง</h1>
            <p class="text-muted mb-0">ค้นหาจากชื่อ ประเภท หรือสถานที่ เพื่อช่วยให้สัตว์เลี้ยงได้กลับบ้าน</p>
        </div>
    </section>
    <section class="section-sm">
        <div class="container">
            <?php if(session('success')): ?>
                <div class="alert alert-success"><?php echo e(session('success')); ?></div>
            <?php endif; ?>
            <form method="GET" action="<?php echo e(route('pets')); ?>" class="p-4 mb-4" style="background:#f7f9f7;border-radius:16px">
                <div class="form-row align-items-end">
                    <div class="form-group col-lg-4"><label>คำค้นหา</label><input class="form-control" name="q"
                            value="<?php echo e(request('q')); ?>" placeholder="ชื่อสัตว์ สี หรือลักษณะ"></div>
                    <div class="form-group col-lg-2"><label>ประเภท</label><select class="form-control" name="type">
                            <option value="">ทุกประเภท</option>
                            <?php $__currentLoopData = ['แมว', 'สุนัข', 'นก', 'กระต่าย', 'อื่นๆ']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($type); ?>" <?php if(request('type') === $type): echo 'selected'; endif; ?>><?php echo e($type); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group col-lg-2"><label>ประเภทประกาศ</label><select class="form-control" name="status">
                            <option value="">ทั้งหมด</option>
                            <option value="lost" <?php if(request('status') === 'lost'): echo 'selected'; endif; ?>>สัตว์หาย</option>
                            <option value="found" <?php if(request('status') === 'found'): echo 'selected'; endif; ?>>พบสัตว์</option>
                        </select></div>
                    <div class="form-group col-lg-3"><label>จังหวัด / สถานที่</label><input class="form-control"
                            name="location" value="<?php echo e(request('location')); ?>" placeholder="เช่น สุรินทร์"></div>
                    <div class="form-group col-lg-1"><button class="btn btn-primary btn-block" type="submit"><i
                                class="fa fa-search"></i></button></div>
                </div><a href="<?php echo e(route('pets')); ?>" class="small text-muted">ล้างตัวกรอง</a>
            </form>
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="font-weight-bold mb-0"><?php echo e(number_format($pets->total())); ?> ประกาศ</h3><a
                    href="<?php echo e(route('report')); ?>" class="btn btn-outline-success">+ ลงประกาศ</a>
            </div>
            <div class="row">
                <?php $__empty_1 = true; $__currentLoopData = $pets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <article class="pet-list-card">
                            <div class="pet-list-image">
                                <?php if($pet->photo_path): ?>
                                    <img src="<?php echo e(asset('storage/' . $pet->photo_path)); ?>" alt="<?php echo e($pet->pet_name); ?>"
                                    style="width:100%;height:185px;object-fit:cover"><?php else: ?><i class="fa fa-paw"></i>
                                <?php endif; ?>
                            </div>
                            <div class="pet-list-body"><span
                                    class="pet-status <?php echo e($pet->status === 'found' ? 'found' : ''); ?>"><?php echo e($pet->status === 'found' ? 'พบสัตว์' : 'สัตว์หาย'); ?></span>
                                <h4 class="font-weight-bold mt-3"><?php echo e($pet->pet_name); ?></h4>
                                <p class="text-muted mb-2"><i class="fa fa-paw mr-2"></i><?php echo e($pet->pet_type); ?> ·
                                    <?php echo e($pet->color ?: 'ไม่ระบุสี'); ?></p>
                                <p class="text-muted mb-2"><i class="fa fa-map-marker mr-2"></i><?php echo e($pet->location); ?></p>
                                <p><?php echo e(\Illuminate\Support\Str::limit($pet->description, 130)); ?></p>
                                <hr>
                                <div class="d-flex justify-content-between"><span class="small text-muted">ติดต่อ
                                        <?php echo e($pet->contact_name); ?></span><strong><?php echo e($pet->contact_phone); ?></strong></div>
                            </div>
                        </article>
                </div><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><div class="col-12">
                        <div class="text-center p-5"><i class="fa fa-search" style="font-size:2.4rem;color:#819888"></i>
                            <h4 class="mt-3">ไม่พบประกาศที่ตรงกับการค้นหา</h4>
                            <p class="text-muted">ลองเปลี่ยนคำค้นหาหรือเป็นคนแรกที่ลงประกาศ</p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="d-flex justify-content-center"><?php echo e($pets->links()); ?></div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\pet\resources\views/pets.blade.php ENDPATH**/ ?>