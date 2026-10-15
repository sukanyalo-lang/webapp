<!-- เมนู Classimax หน้าบ้าน -->
<header>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <nav class="navbar navbar-expand-lg navbar-light navigation">
          <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('asset/frontend/images/logo.png') }}" alt="Pet Finder">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto main-nav">
              <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}"><a class="nav-link" href="{{ route('home') }}">หน้าแรก</a></li>
              <li class="nav-item {{ request()->routeIs('pets') ? 'active' : '' }}"><a class="nav-link" href="{{ route('pets') }}">สัตว์หาย</a></li>
              <li class="nav-item {{ request()->routeIs('report') ? 'active' : '' }}"><a class="nav-link" href="{{ route('report') }}">แจ้งสัตว์หาย</a></li>
              <li class="nav-item {{ request()->routeIs('about') ? 'active' : '' }}"><a class="nav-link" href="{{ route('about') }}">เกี่ยวกับเรา</a></li>
            </ul>
            <ul class="navbar-nav ml-auto mt-10">
              @guest
                <li class="nav-item"><a class="nav-link login-button" href="{{ route('login') }}">เข้าสู่ระบบ</a></li>
                <li class="nav-item"><a class="nav-link text-white add-button" href="{{ route('report') }}"><i class="fa fa-plus-circle"></i> แจ้งสัตว์หาย</a></li>
              @else
                <li class="nav-item"><a class="nav-link login-button" href="{{ route('my-reports') }}">ประกาศของฉัน</a></li>
                <li class="nav-item"><a class="nav-link login-button" href="{{ route('dashboard') }}">หลังบ้าน</a></li>
                <li class="nav-item">
                  <form action="{{ route('logout') }}" method="POST" class="d-inline">@csrf<button type="submit" class="nav-link text-white add-button border-0"><i class="fa fa-sign-out"></i> ออก ({{ Auth::user()->name }})</button></form>
                </li>
              @endguest
            </ul>
          </div>
        </nav>
      </div>
    </div>
  </div>
</header>
