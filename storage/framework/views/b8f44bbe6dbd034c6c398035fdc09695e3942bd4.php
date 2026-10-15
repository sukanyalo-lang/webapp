
<?php $__env->startSection('content'); ?>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('usertable')->html();
} elseif ($_instance->childHasBeenRendered('qbu0S1f')) {
    $componentId = $_instance->getRenderedChildComponentId('qbu0S1f');
    $componentTag = $_instance->getRenderedChildComponentTagName('qbu0S1f');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('qbu0S1f');
} else {
    $response = \Livewire\Livewire::mount('usertable');
    $html = $response->html();
    $_instance->logRenderedChild('qbu0S1f', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\nigger\resources\views/users.blade.php ENDPATH**/ ?>