<!-- JS Classimax หน้าบ้าน -->
<script src="<?php echo e(asset('asset/frontend/plugins/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('asset/frontend/plugins/bootstrap/popper.min.js')); ?>"></script>
<script src="<?php echo e(asset('asset/frontend/plugins/bootstrap/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('asset/frontend/plugins/bootstrap/bootstrap-slider.js')); ?>"></script>
<script src="<?php echo e(asset('asset/frontend/plugins/tether/js/tether.min.js')); ?>"></script>
<script src="<?php echo e(asset('asset/frontend/plugins/raty/jquery.raty-fa.js')); ?>"></script>
<script src="<?php echo e(asset('asset/frontend/plugins/slick/slick.min.js')); ?>"></script>
<script src="<?php echo e(asset('asset/frontend/plugins/jquery-nice-select/js/jquery.nice-select.min.js')); ?>"></script>

<?php if(config('services.google.maps_key')): ?>
<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo e(config('services.google.maps_key')); ?>" defer></script>
<script src="<?php echo e(asset('asset/frontend/plugins/google-map/map.js')); ?>" defer></script>
<?php endif; ?>
<script src="<?php echo e(asset('asset/frontend/js/script.js')); ?>"></script>
<?php /**PATH C:\laragon\www\pet\resources\views/template/frontend/js.blade.php ENDPATH**/ ?>