<!-- Mono sidebar (หลังบ้าน) -->
<aside class="left-sidebar sidebar-dark" id="left-sidebar">
  <div id="sidebar" class="sidebar sidebar-with-footer">
    <div class="app-brand">
      <a href="<?php echo e(route('dashboard')); ?>">
        <img src="<?php echo e(asset('asset/backend/images/logo.png')); ?>" alt="Pet Finder">
        <span class="brand-name">PET FINDER</span>
      </a>
    </div>
    <div class="sidebar-left" data-simplebar style="height: 100%;">
      <ul class="nav sidebar-inner" id="sidebar-menu">
        <li class="<?php echo e(request()->routeIs('dashboard') ? 'active' : ''); ?>">
          <a class="sidenav-item-link" href="<?php echo e(route('dashboard')); ?>">
            <i class="mdi mdi-view-dashboard-outline"></i>
            <span class="nav-text">Dashboard</span>
          </a>
        </li>
        <li class="section-title">จัดการข้อมูล</li>
        <li class="<?php echo e(request()->routeIs('users','addusers','edituser') ? 'active' : ''); ?>">
          <a class="sidenav-item-link" href="<?php echo e(route('users')); ?>">
            <i class="mdi mdi-account-group"></i>
            <span class="nav-text">ผู้ใช้งาน</span>
          </a>
        </li>
        <li class="<?php echo e(request()->routeIs('disease-reports') ? 'active' : ''); ?>">
          <a class="sidenav-item-link" href="<?php echo e(route('disease-reports')); ?>">
            <i class="mdi mdi-clipboard-list-outline"></i>
            <span class="nav-text">Disease Reports</span>
          </a>
        </li>
        <li>
          <a class="sidenav-item-link" href="<?php echo e(route('disease-stats')); ?>" target="_blank">
            <i class="mdi mdi-chart-bar"></i>
            <span class="nav-text">สถิติโรคสัตว์</span>
          </a>
        </li>
        <li>
          <a class="sidenav-item-link" href="<?php echo e(route('test-blv')); ?>" target="_blank">
            <i class="mdi mdi-api"></i>
            <span class="nav-text">ทดสอบ BLV API</span>
          </a>
        </li>
        <li class="section-title">หน้าบ้าน</li>
        <li>
          <a class="sidenav-item-link" href="<?php echo e(route('home')); ?>" target="_blank">
            <i class="mdi mdi-home-outline"></i>
            <span class="nav-text">ดูหน้าเว็บ</span>
          </a>
        </li>
      </ul>
    </div>
  </div>
</aside>
<?php /**PATH C:\laragon\www\nigger\resources\views/template/backend/sidebar.blade.php ENDPATH**/ ?>