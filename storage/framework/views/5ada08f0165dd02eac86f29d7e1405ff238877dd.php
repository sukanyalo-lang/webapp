
<?php $__env->startSection('content'); ?>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('usertable')->html();
} elseif ($_instance->childHasBeenRendered('eiYNdOT')) {
    $componentId = $_instance->getRenderedChildComponentId('eiYNdOT');
    $componentTag = $_instance->getRenderedChildComponentTagName('eiYNdOT');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('eiYNdOT');
} else {
    $response = \Livewire\Livewire::mount('usertable');
    $html = $response->html();
    $_instance->logRenderedChild('eiYNdOT', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\pet\resources\views/users.blade.php ENDPATH**/ ?>