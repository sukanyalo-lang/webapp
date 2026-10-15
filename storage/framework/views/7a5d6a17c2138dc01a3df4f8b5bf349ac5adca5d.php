<!DOCTYPE html>
<html lang="th">
<head>
  <?php echo $__env->make('template.frontend.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
  <?php echo \Livewire\Livewire::styles(); ?> 
</head>
<body class="body-wrapper">
  <?php echo $__env->make('template.frontend.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
  <?php echo $__env->yieldContent('content'); ?> 
  <?php echo $__env->make('template.frontend.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
  <?php echo $__env->make('template.frontend.js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
  <?php echo \Livewire\Livewire::scripts(); ?> 
</body>
</html><?php /**PATH C:\laragon\www\nigger - Copy\resources\views/template/frontend/master.blade.php ENDPATH**/ ?>