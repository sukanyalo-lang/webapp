<!-- Mono header (แถบบนหลังบ้าน) -->
<header class="main-header" id="header">
  <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
    <button id="sidebar-toggler" class="sidebar-toggle"><span class="sr-only">สลับเมนู</span></button>
    <span class="page-title">Pet Finder หลังบ้าน</span>
    <div class="navbar-right">
      <ul class="nav navbar-nav">
        <li><a class="nav-link" href="<?php echo e(route('home')); ?>" target="_blank" title="ดูหน้าเว็บ"><i class="mdi mdi-home-outline icon"></i></a></li>
        <li class="dropdown user-menu">
          <button class="dropdown-toggle nav-link" data-toggle="dropdown">
            <img src="<?php echo e(asset('asset/backend/images/user/user-xs-01.jpg')); ?>" class="user-image rounded-circle" alt="ผู้ใช้" onerror="this.src='<?php echo e(asset('asset/backend/images/logo.png')); ?>'" />
            <span class="d-none d-lg-inline-block"><?php echo e(Auth::user()->name ?? 'แอดมิน'); ?></span>
          </button>
          <ul class="dropdown-menu dropdown-menu-right">
            <li class="dropdown-header"><?php echo e(Auth::user()->email ?? ''); ?></li>
            <li><a href="<?php echo e(route('dashboard')); ?>"><i class="mdi mdi-view-dashboard-outline"></i> Dashboard</a></li>
            <li class="dropdown-footer">
              <form action="<?php echo e(route('logout')); ?>" method="POST"><?php echo csrf_field(); ?><button type="submit" class="btn btn-danger btn-sm w-100">ออกจากระบบ</button></form>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
<?php /**PATH C:\laragon\www\nigger\resources\views/template/backend/header.blade.php ENDPATH**/ ?>