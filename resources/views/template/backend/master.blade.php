<!DOCTYPE html>
<html lang="th" dir="ltr">
<head>
  @include('template.backend.css') {{-- CSS Mono หลังบ้าน --}}
  @livewireStyles {{-- Livewire v2 CSS --}}
  <x-theme-styles />
</head>
<body class="navbar-fixed sidebar-fixed pf-ui pf-admin" id="body">
  <div class="wrapper">
    @include('template.backend.sidebar') {{-- เมนูซ้าย Mono --}}
    <div class="page-wrapper">
      @include('template.backend.header') {{-- แถบบน Mono --}}
      <div class="content-wrapper">
        <div class="content">
          @yield('content') {{-- เนื้อหาหน้าหลังบ้าน --}}
        </div>
      </div>
      @include('template.backend.footer') {{-- ท้าย Mono --}}
    </div>
  </div>
  @include('template.backend.js') {{-- JS Mono --}}
  @livewireScripts {{-- Livewire v2 JS --}}
</body>
</html>

