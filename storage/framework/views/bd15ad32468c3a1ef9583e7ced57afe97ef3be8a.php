
<?php $__env->startSection('content'); ?>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('disease-report-crud')->html();
} elseif ($_instance->childHasBeenRendered('1wWEI4P')) {
    $componentId = $_instance->getRenderedChildComponentId('1wWEI4P');
    $componentTag = $_instance->getRenderedChildComponentTagName('1wWEI4P');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('1wWEI4P');
} else {
    $response = \Livewire\Livewire::mount('disease-report-crud');
    $html = $response->html();
    $_instance->logRenderedChild('1wWEI4P', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\nigger - Copy\resources\views/disease-reports.blade.php ENDPATH**/ ?>