<?php $__env->startSection('content'); ?>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('pet-report-crud')->html();
} elseif ($_instance->childHasBeenRendered('OrY50d7')) {
    $componentId = $_instance->getRenderedChildComponentId('OrY50d7');
    $componentTag = $_instance->getRenderedChildComponentTagName('OrY50d7');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('OrY50d7');
} else {
    $response = \Livewire\Livewire::mount('pet-report-crud');
    $html = $response->html();
    $_instance->logRenderedChild('OrY50d7', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\pet\resources\views/pet-reports.blade.php ENDPATH**/ ?>