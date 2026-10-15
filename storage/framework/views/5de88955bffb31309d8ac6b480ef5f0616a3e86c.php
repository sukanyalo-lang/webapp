 
<?php $__env->startSection('content'); ?>

<section class="hero-area bg-1 text-center overly">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="content-block">
          <h1>ตามหาสัตว์หายใกล้คุณ</h1>
          <p>Pet Finder — สัตว์หายแจ้งเบาะแส ช่วยเจ้าของตามหาเพื่อนตัวน้อยให้ได้กลับบ้าน</p>
          <div class="short-popular-category-list text-center">
            <h2>หมวดยอดนิยม</h2>
            <ul class="list-inline">
              <li class="list-inline-item"><a href="<?php echo e(route('pets')); ?>"><i class="fa fa-paw"></i> แมว</a></li>
              <li class="list-inline-item"><a href="<?php echo e(route('pets')); ?>"><i class="fa fa-paw"></i> สุนัข</a></li>
              <li class="list-inline-item"><a href="<?php echo e(route('pets')); ?>"><i class="fa fa-paw"></i> นก</a></li>
              <li class="list-inline-item"><a href="<?php echo e(route('pets')); ?>"><i class="fa fa-paw"></i> อื่นๆ</a></li>
            </ul>
          </div>
        </div>
        
        <div class="advance-search nice-select-white">
          <form action="<?php echo e(route('pets')); ?>" method="GET">
            <div class="form-row align-items-center">
              <div class="form-group col-xl-4 col-lg-3 col-md-6">
                <input type="text" name="q" class="form-control my-2 my-lg-0" placeholder="ค้นหาชื่อ / สี / ลักษณะ">
              </div>
              <div class="form-group col-lg-3 col-md-6">
                <select name="type" class="w-100 form-control my-2 my-lg-0">
                  <option value="">ทุกประเภท</option>
                  <option value="แมว">แมว</option>
                  <option value="สุนัข">สุนัข</option>
                  <option value="นก">นก</option>
                  <option value="อื่นๆ">อื่นๆ</option>
                </select>
              </div>
              <div class="form-group col-lg-3 col-md-6">
                <input type="text" name="location" class="form-control my-2 my-lg-0" placeholder="จังหวัด / สถานที่">
              </div>
              <div class="form-group col-xl-2 col-lg-3 col-md-6">
                <button type="submit" class="btn btn-primary active w-100">ค้นหาเลย</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="popular-deals section bg-gray">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-title"><h2>ประกาศสัตว์หายล่าสุด</h2><p>ตัวอย่างประกาศ — ดูทั้งหมดที่หน้ารายการ</p></div>
      </div>
    </div>
    <div class="row">
      
      <?php
        $pets = [
          ['name' => 'ไมโล', 'type' => 'แมว', 'loc' => 'เขตห้วยขวาง กรุงเทพฯ', 'desc' => 'แมวส้มตัวอ้วน ปลอกคอสีแดง เชื่องคนมาก'],
          ['name' => 'ถุงทอง', 'type' => 'สุนัข', 'loc' => 'อ.เมือง เชียงใหม่', 'desc' => 'โกลเด้นขนยาว มีป้ายชื่อที่ปลอกคอ'],
          ['name' => 'โมจิ', 'type' => 'กระต่าย', 'loc' => 'เขตบางนา กรุงเทพฯ', 'desc' => 'กระต่ายขาวตาแดง ตัวเล็ก ขี้ตกใจ'],
          ['name' => 'มะลิ', 'type' => 'แมว', 'loc' => 'อ.หาดใหญ่ สงขลา', 'desc' => 'แมวขาวล้วน ปลายหูพับข้างหนึ่ง'],
          ['name' => 'นำโชค', 'type' => 'สุนัข', 'loc' => 'อ.เมือง ขอนแก่น', 'desc' => 'ชิสุสีน้ำตาล ตัดขนสั้น วิ่งเร็ว'],
          ['name' => 'จิ๋ว', 'type' => 'นก', 'loc' => 'อ.เมือง ภูเก็ต', 'desc' => 'นกหงส์หยกสีฟ้า มีห่วงขาสีเงิน'],
        ];
      ?>
      <?php $__currentLoopData = $pets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="col-lg-4 col-md-6">
        <div class="product-item bg-light">
          <div class="card">
            <div class="thumb-content">
              <a href="<?php echo e(route('pets')); ?>">
                <img class="card-img-top img-fluid" src="<?php echo e(asset('asset/frontend/images/products/products-' . (($i % 4) + 1) . '.jpg')); ?>" alt="<?php echo e($p['name']); ?>" onerror="this.src='<?php echo e(asset('asset/frontend/images/logo.png')); ?>'">
              </a>
            </div>
            <div class="card-body">
              <h4 class="card-title"><a href="<?php echo e(route('pets')); ?>"><?php echo e($p['name']); ?></a></h4>
              <ul class="list-inline product-meta">
                <li class="list-inline-item"><a href="<?php echo e(route('pets')); ?>"><i class="fa fa-folder-open-o"></i><?php echo e($p['type']); ?></a></li>
                <li class="list-inline-item"><a href="<?php echo e(route('pets')); ?>"><i class="fa fa-location-arrow"></i><?php echo e($p['loc']); ?></a></li>
              </ul>
              <p class="card-text"><?php echo e($p['desc']); ?></p>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="row mt-4">
      <div class="col-12 text-center">
        <a href="<?php echo e(route('pets')); ?>" class="btn btn-primary mr-2">ดูประกาศทั้งหมด</a>
        <a href="<?php echo e(route('report')); ?>" class="btn btn-outline-primary ml-2">แจ้งสัตว์หาย</a>
        <a href="<?php echo e(route('clue')); ?>" class="btn btn-outline-primary ml-2">แจ้งเบาะแส</a>
      </div>
    </div>
  </div>
</section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('template.frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\nigger\resources\views/welcome.blade.php ENDPATH**/ ?>