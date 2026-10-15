<!-- Mono sidebar (หลังบ้าน) -->
<aside class="left-sidebar sidebar-dark" id="left-sidebar">
  <div id="sidebar" class="sidebar sidebar-with-footer">
    <div class="app-brand">
      <a href="{{ route('dashboard') }}">
        <i class="mdi mdi-paw" aria-hidden="true"></i>
        <span class="brand-name">Pet Finder</span>
      </a>
    </div>
    <div class="sidebar-left" data-simplebar style="height: 100%;">
      <ul class="nav sidebar-inner" id="sidebar-menu">
        <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
          <a class="sidenav-item-link" href="{{ route('dashboard') }}">
            <i class="mdi mdi-view-dashboard-outline"></i>
            <span class="nav-text">แดชบอร์ด</span>
          </a>
        </li>
        <li class="section-title">จัดการข้อมูล</li>
        <li class="{{ request()->routeIs('users','addusers','edituser') ? 'active' : '' }}">
          <a class="sidenav-item-link" href="{{ route('users') }}">
            <i class="mdi mdi-account-group"></i>
            <span class="nav-text">จัดการสมาชิก</span>
          </a>
        </li>
        <li class="{{ request()->routeIs('pet-reports') ? 'active' : '' }}">
          <a class="sidenav-item-link" href="{{ route('pet-reports') }}"><i class="mdi mdi-paw"></i><span class="nav-text">จัดการประกาศสัตว์เลี้ยง</span></a>
        </li>
        <li class="{{ request()->routeIs('disease-stats') ? 'active' : '' }}">
          <a class="sidenav-item-link" href="{{ route('disease-stats') }}" target="_blank"><i class="mdi mdi-chart-bar"></i><span class="nav-text">สถิติโรคสัตว์ (BLV API)</span></a>
        </li>
        <li class="section-title">หน้าบ้าน</li>
        <li>
          <a class="sidenav-item-link" href="{{ route('home') }}" target="_blank">
            <i class="mdi mdi-home-outline"></i>
            <span class="nav-text">ดูหน้าเว็บ</span>
          </a>
        </li>
      </ul>
    </div>
  </div>
</aside>
