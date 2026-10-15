<header class="pf-site-header">
    <div class="pf-header-inner">
        <a class="pf-brand" href="{{ route('home') }}"><i class="fa fa-paw" aria-hidden="true"></i><span>Pet
                Finder</span></a>
        <nav class="pf-nav" aria-label="เมนูหลัก">
            <a class="{{ request()->routeIs('home') ? 'is-active' : '' }}" href="{{ route('home') }}"
                @if (request()->routeIs('home')) aria-current="page" @endif>หน้าแรก</a>
            <a class="{{ request()->routeIs('pets') ? 'is-active' : '' }}" href="{{ route('pets') }}"
                @if (request()->routeIs('pets')) aria-current="page" @endif>ประกาศทั้งหมด</a>
            <a class="{{ request()->routeIs('report') ? 'is-active' : '' }}" href="{{ route('report') }}"
                @if (request()->routeIs('report')) aria-current="page" @endif>แจ้งสัตว์หาย</a>
            <a class="{{ request()->routeIs('about') ? 'is-active' : '' }}" href="{{ route('about') }}"
                @if (request()->routeIs('about')) aria-current="page" @endif>เกี่ยวกับเรา</a>
        </nav>
        <div class="pf-header-actions">
            <a class="pf-header-search" href="{{ request()->routeIs('home') ? '#search' : route('pets') }}"
                aria-label="ค้นหาประกาศ"><i class="fa fa-search" aria-hidden="true"></i></a>
            @guest
                <a class="pf-login" href="{{ route('login') }}">เข้าสู่ระบบ</a>
                <a class="pf-signup" href="{{ route('register') }}">สมัครสมาชิก</a>
            @else
                <a class="pf-login" href="{{ route('my-reports') }}">ประกาศของฉัน</a>
                <a class="pf-signup" href="{{ route('dashboard') }}">บัญชีของฉัน</a>
                <form class="pf-logout" action="{{ route('logout') }}" method="POST">@csrf<button type="submit"
                        aria-label="ออกจากระบบ" title="ออกจากระบบ"><i class="fa fa-sign-out"
                            aria-hidden="true"></i></button></form>
            @endguest
        </div>
    </div>
</header>
