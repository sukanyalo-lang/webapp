<!DOCTYPE html>
<html lang="th">
<head>
  @include('template.frontend.css') {{-- CSS Classimax --}}
  @livewireStyles {{-- Livewire CSS --}}
</head>
<body class="body-wrapper">
  @include('template.frontend.header') {{-- เมนู Classimax --}}
  @yield('content') {{-- เนื้อหาหน้าบ้าน --}}
  @include('template.frontend.footer') {{-- ท้าย Classimax --}}
  @include('template.frontend.js') {{-- JS Classimax --}}
  @livewireScripts {{-- Livewire JS --}}
</body>
</html>