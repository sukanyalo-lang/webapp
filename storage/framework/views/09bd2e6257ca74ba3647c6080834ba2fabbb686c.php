<!-- ท้าย Classimax หน้าบ้าน -->
<footer class="footer section section-sm">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-7">
        <div class="block about">
          <img src="<?php echo e(asset('asset/frontend/images/logo-footer.png')); ?>" alt="Pet Finder" onerror="this.src='<?php echo e(asset('asset/frontend/images/logo.png')); ?>'">
          <p class="alt-color">Pet Finder — สัตว์หายแจ้งเบาะแส ช่วยเจ้าของตามหาเพื่อนตัวน้อยให้ได้กลับบ้าน</p>
        </div>
      </div>
      <div class="col-lg-2 col-md-3 offset-md-1 offset-lg-0 col-6 mb-4 mb-md-0">
        <div class="block">
          <h4>เมนู</h4>
          <ul>
            <li><a href="<?php echo e(route('home')); ?>">หน้าแรก</a></li>
            <li><a href="<?php echo e(route('pets')); ?>">สัตว์หาย</a></li>
            <li><a href="<?php echo e(route('report')); ?>">แจ้งสัตว์หาย</a></li>
            <li><a href="<?php echo e(route('clue')); ?>">แจ้งเบาะแส</a></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-2 col-md-3 offset-md-1 offset-lg-0 col-6 mb-4 mb-md-0">
        <div class="block">
          <h4>อื่นๆ</h4>
          <ul>
            <li><a href="<?php echo e(route('disease-stats')); ?>">สถิติโรคสัตว์</a></li>
            <li><a href="<?php echo e(route('about')); ?>">เกี่ยวกับเรา</a></li>
            <li><a href="<?php echo e(route('contact')); ?>">ติดต่อ</a></li>
            <li><a href="<?php echo e(route('login')); ?>">เข้าสู่ระบบ</a></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-4 col-md-7">
        <div class="block-2 app-promotion">
          <p class="mb-0">พบสัตว์หาย? แจ้งได้เลยไม่ต้องรอ</p>
          <div class="download-btn d-flex my-3">
            <a href="<?php echo e(route('report')); ?>" class="btn btn-primary mr-2">แจ้งสัตว์หาย</a>
            <a href="<?php echo e(route('clue')); ?>" class="btn btn-outline-primary ml-3">แจ้งเบาะแส</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<footer class="footer-bottom">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 text-center text-lg-left mb-3 mb-lg-0">
        <div class="copyright"><p>Pet Finder &copy; <?php echo e(date('Y')); ?> สัตว์หายแจ้งเบาะแส</p></div>
      </div>
      <div class="col-lg-6">
        <ul class="social-media-icons text-center text-lg-right">
          <li><a class="fa fa-facebook" href="#"></a></li>
          <li><a class="fa fa-twitter" href="#"></a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="scroll-top-to"><i class="fa fa-angle-up"></i></div>
</footer>
<?php /**PATH C:\laragon\www\nigger - Copy\resources\views/template/frontend/footer.blade.php ENDPATH**/ ?>