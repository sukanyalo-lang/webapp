<!DOCTYPE html>
<html lang="th">
<head>
  @include('template.frontend.css') {{-- CSS Classimax --}}
  @livewireStyles {{-- Livewire CSS --}}
  <x-theme-styles />
</head>
<body class="body-wrapper pf-ui pf-public">
  <div class="pf-public-shell">
  @include('template.frontend.header') {{-- เมนู Classimax --}}
  <main class="pf-public-main">@yield('content')</main>
  @include('template.frontend.footer') {{-- ท้าย Classimax --}}
  </div>
  @include('template.frontend.js') {{-- JS Classimax --}}
  @livewireScripts {{-- Livewire JS --}}
</body>
</html>
