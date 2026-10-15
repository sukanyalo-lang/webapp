
<?php $__env->startSection('content'); ?>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('disease-report-crud')->html();
} elseif ($_instance->childHasBeenRendered('efVWz69')) {
    $componentId = $_instance->getRenderedChildComponentId('efVWz69');
    $componentTag = $_instance->getRenderedChildComponentTagName('efVWz69');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('efVWz69');
} else {
    $response = \Livewire\Livewire::mount('disease-report-crud');
    $html = $response->html();
    $_instance->logRenderedChild('efVWz69', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\nigger\resources\views/disease-reports.blade.php ENDPATH**/ ?>