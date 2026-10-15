
<?php $__env->startSection('content'); ?>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('usertable')->html();
} elseif ($_instance->childHasBeenRendered('6uKQpWP')) {
    $componentId = $_instance->getRenderedChildComponentId('6uKQpWP');
    $componentTag = $_instance->getRenderedChildComponentTagName('6uKQpWP');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('6uKQpWP');
} else {
    $response = \Livewire\Livewire::mount('usertable');
    $html = $response->html();
    $_instance->logRenderedChild('6uKQpWP', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\nigger - Copy\resources\views/users.blade.php ENDPATH**/ ?>