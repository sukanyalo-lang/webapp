 
<?php $__env->startSection('content'); ?>

<section class="section-sm">
  <div class="container">
    <div class="row"><div class="col-12"><div class="search-result bg-gray"><h2>สถิติโรคสัตว์สวิตเซอร์แลนด์</h2><p>ข้อมูลจริงจาก FSVO ผ่าน BLV API</p></div></div></div>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('disease-stats')->html();
} elseif ($_instance->childHasBeenRendered('seqdBjf')) {
    $componentId = $_instance->getRenderedChildComponentId('seqdBjf');
    $componentTag = $_instance->getRenderedChildComponentTagName('seqdBjf');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('seqdBjf');
} else {
    $response = \Livewire\Livewire::mount('disease-stats');
    $html = $response->html();
    $_instance->logRenderedChild('seqdBjf', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
  </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\nigger\resources\views/disease-stats.blade.php ENDPATH**/ ?>