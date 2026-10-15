
<?php $__env->startSection('content'); ?>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('editusertable', ['id' => $id])->html();
} elseif ($_instance->childHasBeenRendered('Ww50jTe')) {
    $componentId = $_instance->getRenderedChildComponentId('Ww50jTe');
    $componentTag = $_instance->getRenderedChildComponentTagName('Ww50jTe');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('Ww50jTe');
} else {
    $response = \Livewire\Livewire::mount('editusertable', ['id' => $id]);
    $html = $response->html();
    $_instance->logRenderedChild('Ww50jTe', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\nigger - Copy\resources\views/edituser.blade.php ENDPATH**/ ?>