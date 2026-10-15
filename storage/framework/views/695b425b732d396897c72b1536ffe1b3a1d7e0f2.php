<!DOCTYPE html>
<html lang="th" dir="ltr">
<head>
  <?php echo $__env->make('template.backend.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
  <?php echo \Livewire\Livewire::styles(); ?> 
</head>
<body class="navbar-fixed sidebar-fixed" id="body">
  <div class="wrapper">
    <?php echo $__env->make('template.backend.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
    <div class="page-wrapper">
      <?php echo $__env->make('template.backend.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
      <div class="content-wrapper">
        <div class="content">
          <?php echo $__env->yieldContent('content'); ?> 
        </div>
      </div>
      <?php echo $__env->make('template.backend.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
    </div>
  </div>
  <?php echo $__env->make('template.backend.js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
  <?php echo \Livewire\Livewire::scripts(); ?> 
</body>
</html>

<?php /**PATH C:\laragon\www\pet\resources\views/template/backend/master.blade.php ENDPATH**/ ?>