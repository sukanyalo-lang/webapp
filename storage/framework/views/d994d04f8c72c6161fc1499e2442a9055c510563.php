<div class="container-fluid py-3">
  <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
    <div><span class="text-uppercase small text-muted">PET FINDER / MANAGEMENT</span><h2 class="mb-1">จัดการประกาศสัตว์เลี้ยง</h2><p class="text-muted mb-0">เพิ่ม แก้ไข ค้นหา และลบประกาศจากฐานข้อมูล</p></div>
    <div class="badge badge-primary p-3">ทั้งหมด <?php echo e(number_format($totalAll)); ?> รายการ</div>
  </div>
  <?php if($message): ?><div class="alert alert-success"><?php echo e($message); ?></div><?php endif; ?>
  <div class="row">
    <div class="col-xl-4 mb-4"><div class="card card-default"><div class="card-header"><h5 class="mb-0"><?php echo e($reportId ? 'แก้ไขประกาศ #'.$reportId : 'เพิ่มประกาศ'); ?></h5></div><div class="card-body">
      <form wire:submit.prevent="save">
        <div class="form-group"><label>ชื่อสัตว์ *</label><input class="form-control" wire:model.defer="pet_name"><?php $__errorArgs = ['pet_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><small class="text-danger"><?php echo e($message); ?></small><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
        <div class="form-row"><div class="form-group col-6"><label>ประเภท *</label><select class="form-control" wire:model.defer="pet_type"><option>แมว</option><option>สุนัข</option><option>นก</option><option>กระต่าย</option><option>อื่นๆ</option></select></div><div class="form-group col-6"><label>สถานะ *</label><select class="form-control" wire:model.defer="status"><option value="lost">สัตว์หาย</option><option value="found">พบสัตว์</option><option value="closed">ปิดประกาศ</option></select></div></div>
        <div class="form-row"><div class="form-group col-6"><label>พันธุ์</label><input class="form-control" wire:model.defer="breed"></div><div class="form-group col-6"><label>สี/ลักษณะ</label><input class="form-control" wire:model.defer="color"></div></div>
        <div class="form-group"><label>สถานที่ *</label><input class="form-control" wire:model.defer="location"><?php $__errorArgs = ['location'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><small class="text-danger"><?php echo e($message); ?></small><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
        <div class="form-group"><label>วันที่พบเห็นล่าสุด</label><input type="date" class="form-control" wire:model.defer="last_seen_at"></div>
        <div class="form-group"><label>รายละเอียด *</label><textarea class="form-control" rows="3" wire:model.defer="description"></textarea><?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><small class="text-danger"><?php echo e($message); ?></small><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
        <div class="form-group"><label>รูปสัตว์ (JPG, PNG, WEBP ไม่เกิน 5 MB)</label><?php if($existingPhoto): ?><div class="mb-2"><img src="<?php echo e(asset('storage/'.$existingPhoto)); ?>" style="width:80px;height:80px;object-fit:cover;border-radius:10px"></div><?php endif; ?><input type="file" class="form-control-file" wire:model="photo" accept="image/jpeg,image/png,image/webp"><div wire:loading wire:target="photo" class="small text-muted">กำลังอัปโหลด...</div><?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><small class="text-danger"><?php echo e($message); ?></small><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
        <div class="form-group"><label>ชื่อผู้ติดต่อ *</label><input class="form-control" wire:model.defer="contact_name"></div><div class="form-group"><label>เบอร์ติดต่อ *</label><input class="form-control" wire:model.defer="contact_phone"></div>
        <button class="btn btn-primary" type="submit">บันทึกข้อมูล</button> <button class="btn btn-light" type="button" wire:click="resetForm">ล้างฟอร์ม</button>
      </form>
    </div></div></div>
    <div class="col-xl-8"><div class="card card-default"><div class="card-body"><input class="form-control mb-3" placeholder="ค้นหาชื่อสัตว์ ประเภท สถานที่ หรือเบอร์โทร" wire:model.debounce.400ms="search"><div class="table-responsive"><table class="table table-hover"><thead><tr><th>รูป</th><th>สัตว์เลี้ยง</th><th>สถานที่</th><th>สถานะ</th><th>ผู้แจ้ง</th><th>จัดการ</th></tr></thead><tbody>
      <?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><tr><td><?php if($item->photo_path): ?><img src="<?php echo e(asset('storage/'.$item->photo_path)); ?>" alt="<?php echo e($item->pet_name); ?>" style="width:56px;height:56px;object-fit:cover;border-radius:10px"><?php else: ?><span class="text-muted"><i class="mdi mdi-paw"></i></span><?php endif; ?></td><td><strong><?php echo e($item->pet_name); ?></strong><br><small class="text-muted"><?php echo e($item->pet_type); ?> · <?php echo e($item->color ?: 'ไม่ระบุสี'); ?></small><?php if($item->breed): ?><br><small class="text-muted"><?php echo e($item->breed); ?></small><?php endif; ?></td><td><?php echo e($item->location); ?></td><td><span class="badge badge-<?php echo e($item->status === 'lost' ? 'danger' : ($item->status === 'found' ? 'success' : 'secondary')); ?>"><?php echo e(['lost'=>'สัตว์หาย','found'=>'พบสัตว์','closed'=>'ปิดประกาศ'][$item->status]); ?></span></td><td><?php echo e($item->contact_name); ?><br><small><?php echo e($item->contact_phone); ?></small></td><td class="text-nowrap"><button class="btn btn-sm btn-warning" wire:click="edit(<?php echo e($item->id); ?>)">แก้ไข</button> <button class="btn btn-sm btn-danger" wire:click="delete(<?php echo e($item->id); ?>)" onclick="return confirm('ยืนยันลบประกาศนี้?')">ลบ</button></td></tr><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><tr><td colspan="6" class="text-center text-muted py-4">ยังไม่มีประกาศในฐานข้อมูล</td></tr><?php endif; ?>
      </tbody></table></div><?php echo e($items->links()); ?></div></div></div>
  </div>
</div>
<?php /**PATH C:\laragon\www\pet\resources\views/livewire/pet-report-crud.blade.php ENDPATH**/ ?>