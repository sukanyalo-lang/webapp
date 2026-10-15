<div>
<div style="max-width:1150px;margin:0 auto;padding:0 5%;">
<div style="padding:40px 0 16px;">
<div style="font-size:12px;letter-spacing:2px;color:#89847D;">FSVO / SWITZERLAND</div>
<h1 style="font-weight:300;">สถิติโรคสัตว์สวิตเซอร์แลนด์</h1>
<p style="color:#777168;font-size:14px;">พบ <?php echo e(number_format($total)); ?> รายการ ผลรวม <?php echo e(number_format($grandCount)); ?> ตัว</p>
</div>
<div style="display:flex;gap:8px;flex-wrap:wrap;margin-bottom:14px;">
<input type="text" wire:model.debounce.500ms="search" placeholder="ค้นหา Rabies / Cattle / BE" style="flex:1;min-width:200px;padding:10px;border:1px solid #E1DED9;">
<select wire:model="year" style="padding:10px;border:1px solid #E1DED9;"><option value="">ทุกปี</option><?php $__currentLoopData = $years; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $y): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($y); ?>"><?php echo e($y); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select>
<select wire:model="canton" style="padding:10px;border:1px solid #E1DED9;"><option value="">ทุก Canton</option><?php $__currentLoopData = $cantons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($c); ?>"><?php echo e($c); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select>
<select wire:model="group" style="padding:10px;border:1px solid #E1DED9;max-width:230px;"><option value="">ทุกกลุ่มโรค</option><?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($g); ?>"><?php echo e($g); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select>
<button wire:click="clearFilters" style="padding:0 16px;border:1px solid #45423D;background:#fff;cursor:pointer;">ล้าง</button>
</div>
<?php if($rows->count()): ?>
<div style="overflow-x:auto;border:1px solid #EAE8E4;">
<table style="width:100%;border-collapse:collapse;font-size:13px;">
<thead><tr style="background:#F7F5F1;text-align:left;">
<th style="padding:9px;">Year</th><th style="padding:9px;">Canton</th><th style="padding:9px;">Group</th><th style="padding:9px;">Disease</th><th style="padding:9px;">Species</th><th style="padding:9px;text-align:right;">Count</th>
</tr></thead>
<tbody>
<?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr style="border-top:1px solid #EAE8E4;">
<td style="padding:8px;"><?php echo e($r['year'] ?? ''); ?></td>
<td style="padding:8px;"><?php echo e($r['canton'] ?? ''); ?></td>
<td style="padding:8px;"><?php echo e($r['diseases_group'] ?? ''); ?></td>
<td style="padding:8px;"><?php echo e($r['diseases'] ?? ''); ?></td>
<td style="padding:8px;"><?php echo e($r['species'] ?? ''); ?></td>
<td style="padding:8px;text-align:right;"><?php echo e(number_format($r['count'] ?? 0)); ?></td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>
</table>
</div>
<div style="display:flex;gap:8px;align-items:center;margin:12px 0 30px;font-size:13px;">
<button wire:click="prevPage" <?php if($page<=1): ?> disabled <?php endif; ?> style="padding:8px 16px;border:1px solid #45423D;background:#fff;cursor:pointer;">← ก่อนหน้า</button>
<span>หน้า <?php echo e($page); ?> / <?php echo e($lastPage); ?></span>
<button wire:click="nextPage" <?php if($page>=$lastPage): ?> disabled <?php endif; ?> style="padding:8px 16px;border:1px solid #45423D;background:#fff;cursor:pointer;">ถัดไป →</button>
</div>
<?php else: ?>
<p style="color:#A33B32;">ไม่มีข้อมูล หรือดึงจาก BLV ไม่สำเร็จ</p>
<?php endif; ?>
<p style="font-size:12px;color:#89847D;margin-bottom:40px;">ที่มา: FSVO Switzerland · cache 6 ชม.</p>
</div>
</div>
<?php /**PATH C:\laragon\www\nigger\resources\views/livewire/disease-stats.blade.php ENDPATH**/ ?>