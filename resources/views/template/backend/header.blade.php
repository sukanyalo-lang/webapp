<!-- Mono header (แถบบนหลังบ้าน) -->
<header class="main-header" id="header">
    <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
        <button id="sidebar-toggler" class="sidebar-toggle" type="button" aria-label="เปิดหรือปิดเมนู"><span
                class="sr-only">สลับเมนู</span></button>
        <span
            class="page-title">{{ request()->routeIs('users', 'addusers', 'edituser') ? 'จัดการสมาชิก' : (request()->routeIs('pet-reports') ? 'จัดการประกาศ' : 'แดชบอร์ด') }}</span>
        <div class="navbar-right">
            <ul class="nav navbar-nav">
                <li><a class="nav-link" href="{{ route('home') }}" target="_blank" title="ดูหน้าเว็บ"><i
                            class="mdi mdi-home-outline icon"></i></a></li>
                <li class="dropdown user-menu">
                    <button class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <img src="{{ asset('asset/backend/images/user/user-xs-01.jpg') }}"
                            class="user-image rounded-circle" alt="ผู้ใช้"
                            onerror="this.src='{{ asset('asset/backend/images/logo.png') }}'" />
                        <span class="d-none d-lg-inline-block">{{ Auth::user()->name ?? 'แอดมิน' }}</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li class="dropdown-header">{{ Auth::user()->email ?? '' }}</li>
                        <li><a href="{{ route('profile.show') }}"><i class="mdi mdi-account-outline"></i>
                                โปรไฟล์ของฉัน</a></li>
                        <li><a href="{{ route('dashboard') }}"><i class="mdi mdi-view-dashboard-outline"></i>
                                แดชบอร์ด</a></li>
                        <li class="dropdown-footer">
                            <form action="{{ route('logout') }}" method="POST">@csrf<button type="submit"
                                    class="btn btn-danger btn-sm w-100">ออกจากระบบ</button></form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
