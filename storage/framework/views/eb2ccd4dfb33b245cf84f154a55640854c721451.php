<!-- เมนู Classimax หน้าบ้าน -->
<header>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <nav class="navbar navbar-expand-lg navbar-light navigation">
          <a class="navbar-brand" href="<?php echo e(route('home')); ?>">
            <img src="<?php echo e(asset('asset/frontend/images/logo.png')); ?>" alt="Pet Finder">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto main-nav">
              <li class="nav-item <?php echo e(request()->routeIs('home') ? 'active' : ''); ?>"><a class="nav-link" href="<?php echo e(route('home')); ?>">หน้าแรก</a></li>
              <li class="nav-item <?php echo e(request()->routeIs('pets') ? 'active' : ''); ?>"><a class="nav-link" href="<?php echo e(route('pets')); ?>">สัตว์หาย</a></li>
              <li class="nav-item <?php echo e(request()->routeIs('report') ? 'active' : ''); ?>"><a class="nav-link" href="<?php echo e(route('report')); ?>">แจ้งสัตว์หาย</a></li>
              <li class="nav-item <?php echo e(request()->routeIs('disease-stats') ? 'active' : ''); ?>"><a class="nav-link" href="<?php echo e(route('disease-stats')); ?>">สถิติโรคสัตว์</a></li>
              <li class="nav-item <?php echo e(request()->routeIs('about') ? 'active' : ''); ?>"><a class="nav-link" href="<?php echo e(route('about')); ?>">เกี่ยวกับเรา</a></li>
            </ul>
            <ul class="navbar-nav ml-auto mt-10">
              <?php if(auth()->guard()->guest()): ?>
                <li class="nav-item"><a class="nav-link login-button" href="<?php echo e(route('login')); ?>">เข้าสู่ระบบ</a></li>
                <li class="nav-item"><a class="nav-link text-white add-button" href="<?php echo e(route('report')); ?>"><i class="fa fa-plus-circle"></i> แจ้งสัตว์หาย</a></li>
              <?php else: ?>
                <li class="nav-item"><a class="nav-link login-button" href="<?php echo e(route('my-reports')); ?>">ประกาศของฉัน</a></li>
                <li class="nav-item"><a class="nav-link login-button" href="<?php echo e(route('dashboard')); ?>">หลังบ้าน</a></li>
                <li class="nav-item">
                  <form action="<?php echo e(route('logout')); ?>" method="POST" class="d-inline"><?php echo csrf_field(); ?><button type="submit" class="nav-link text-white add-button border-0"><i class="fa fa-sign-out"></i> ออก (<?php echo e(Auth::user()->name); ?>)</button></form>
                </li>
              <?php endif; ?>
            </ul>
          </div>
        </nav>
      </div>
    </div>
  </div>
</header>
<?php /**PATH C:\laragon\www\pet\resources\views/template/frontend/header.blade.php ENDPATH**/ ?>