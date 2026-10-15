 
<?php $__env->startSection('content'); ?>

<section class="page-search">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="advance-search nice-select-white">
          <form action="<?php echo e(route('pets')); ?>" method="GET">
            <div class="form-row align-items-center">
              <div class="form-group col-xl-4 col-lg-3 col-md-6">
                <input type="text" name="q" value="<?php echo e(request('q')); ?>" class="form-control my-2 my-lg-0" placeholder="ค้นหาชื่อ / สี / ลักษณะ">
              </div>
              <div class="form-group col-lg-3 col-md-6">
                <select name="type" class="w-100 form-control my-2 my-lg-0">
                  <option value="">ทุกประเภท</option>
                  <option value="แมว" <?php echo e(request('type')=='แมว'?'selected':''); ?>>แมว</option>
                  <option value="สุนัข" <?php echo e(request('type')=='สุนัข'?'selected':''); ?>>สุนัข</option>
                  <option value="กระต่าย" <?php echo e(request('type')=='กระต่าย'?'selected':''); ?>>กระต่าย</option>
                  <option value="นก" <?php echo e(request('type')=='นก'?'selected':''); ?>>นก</option>
                  <option value="อื่นๆ" <?php echo e(request('type')=='อื่นๆ'?'selected':''); ?>>อื่นๆ</option>
                </select>
              </div>
              <div class="form-group col-lg-3 col-md-6">
                <input type="text" name="location" value="<?php echo e(request('location')); ?>" class="form-control my-2 my-lg-0" placeholder="จังหวัด / สถานที่">
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

<section class="section-sm">
  <div class="container">
    <div class="row">
      <div class="col-md-12"><div class="search-result bg-gray"><h2>สัตว์หายทั้งหมด</h2><p>ตัวอย่างประกาศโครงงาน (ยังไม่ต่อ DB)</p></div></div>
    </div>
    <div class="row">
      <div class="col-lg-3 col-md-4">
        <div class="category-sidebar">
          <div class="widget category-list"><h4 class="widget-header">ประเภทสัตว์</h4>
            <ul class="category-list">
              <li><a href="<?php echo e(route('pets')); ?>">แมว <span>3</span></a></li>
              <li><a href="<?php echo e(route('pets')); ?>">สุนัข <span>2</span></a></li>
              <li><a href="<?php echo e(route('pets')); ?>">อื่นๆ <span>1</span></a></li>
            </ul>
          </div>
          <div class="widget category-list"><h4 class="widget-header">เมนูลัด</h4>
            <ul class="category-list">
              <li><a href="<?php echo e(route('report')); ?>">แจ้งสัตว์หาย</a></li>
              <li><a href="<?php echo e(route('clue')); ?>">แจ้งเบาะแส</a></li>
              <li><a href="<?php echo e(route('home')); ?>">หน้าแรก</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-9 col-md-8">
        <div class="product-grid-list"><div class="row mt-30">
          <?php
            $pets = [
              ['name'=>'ไมโล','type'=>'แมว','loc'=>'เขตห้วยขวาง กรุงเทพฯ','desc'=>'แมวส้มตัวอ้วน ปลอกคอสีแดง เชื่องคนมาก'],
              ['name'=>'ถุงทอง','type'=>'สุนัข','loc'=>'อ.เมือง เชียงใหม่','desc'=>'โกลเด้นขนยาว มีป้ายชื่อที่ปลอกคอ'],
              ['name'=>'โมจิ','type'=>'กระต่าย','loc'=>'เขตบางนา กรุงเทพฯ','desc'=>'กระต่ายขาวตาแดง ตัวเล็ก ขี้ตกใจ'],
              ['name'=>'มะลิ','type'=>'แมว','loc'=>'อ.หาดใหญ่ สงขลา','desc'=>'แมวขาวล้วน ปลายหูพับข้างหนึ่ง'],
              ['name'=>'นำโชค','type'=>'สุนัข','loc'=>'อ.เมือง ขอนแก่น','desc'=>'ชิสุสีน้ำตาล ตัดขนสั้น วิ่งเร็ว'],
              ['name'=>'จิ๋ว','type'=>'นก','loc'=>'อ.เมือง ภูเก็ต','desc'=>'นกหงส์หยกสีฟ้า มีห่วงขาสีเงิน'],
            ];
          ?>
          <?php $__currentLoopData = $pets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="col-lg-4 col-md-6">
            <div class="product-item bg-light"><div class="card">
              <div class="thumb-content">
                <a href="<?php echo e(route('report')); ?>"><img class="card-img-top img-fluid" src="<?php echo e(asset('asset/frontend/images/products/products-'.(($i%4)+1).'.jpg')); ?>" alt="<?php echo e($p['name']); ?>" onerror="this.src='<?php echo e(asset('asset/frontend/images/logo.png')); ?>'"></a>
              </div>
              <div class="card-body">
                <h4 class="card-title"><a href="<?php echo e(route('report')); ?>"><?php echo e($p['name']); ?></a></h4>
                <ul class="list-inline product-meta">
                  <li class="list-inline-item"><a href="<?php echo e(route('pets')); ?>"><i class="fa fa-folder-open-o"></i><?php echo e($p['type']); ?></a></li>
                  <li class="list-inline-item"><a href="<?php echo e(route('pets')); ?>"><i class="fa fa-location-arrow"></i><?php echo e($p['loc']); ?></a></li>
                </ul>
                <p class="card-text"><?php echo e($p['desc']); ?></p>
              </div>
            </div></div>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div></div>
      </div>
    </div>
  </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\nigger\resources\views/pets.blade.php ENDPATH**/ ?>