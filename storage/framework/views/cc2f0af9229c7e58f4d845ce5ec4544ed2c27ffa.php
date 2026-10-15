
<?php $__env->startSection('content'); ?>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('addusertable')->html();
} elseif ($_instance->childHasBeenRendered('nagsXTa')) {
    $componentId = $_instance->getRenderedChildComponentId('nagsXTa');
    $componentTag = $_instance->getRenderedChildComponentTagName('nagsXTa');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('nagsXTa');
} else {
    $response = \Livewire\Livewire::mount('addusertable');
    $html = $response->html();
    $_instance->logRenderedChild('nagsXTa', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\nigger - Copy\resources\views/adduser.blade.php ENDPATH**/ ?>