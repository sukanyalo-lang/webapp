<div>

<div class="row">
  <div class="col-12">
    <div class="card card-default">
      <div class="card-header"><h2>Disease Reports (BLV)</h2><p class="text-muted mb-0">CRUD + Import จาก Swiss FSVO · ทั้งหมด <?php echo e($totalAll); ?> รายการ</p></div>
      <div class="card-body">
        <?php if($message): ?><div class="alert alert-success"><?php echo e($message); ?></div><?php endif; ?>
        <div class="row">
          <div class="col-lg-4">
            <div class="card card-default"><div class="card-body">
              <h5><?php echo e($reportId ? 'แก้ไข #' . $reportId : 'เพิ่มรายการใหม่'); ?></h5>
              <form wire:submit.prevent="save">
                <div class="form-row">
                  <div class="form-group col-6"><label>Year *</label><input type="number" wire:model="year" class="form-control"><?php $__errorArgs = ['year'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><small class="text-danger"><?php echo e($message); ?></small><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                  <div class="form-group col-6"><label>Canton *</label><input type="text" wire:model="canton" class="form-control" placeholder="BE / ZH"><?php $__errorArgs = ['canton'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><small class="text-danger"><?php echo e($message); ?></small><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                </div>
                <div class="form-group"><label>Group</label><input type="text" wire:model="diseases_group" class="form-control"></div>
                <div class="form-group"><label>Disease *</label><input type="text" wire:model="diseases" class="form-control"><?php $__errorArgs = ['diseases'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><small class="text-danger"><?php echo e($message); ?></small><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                <div class="form-row">
                  <div class="form-group col-6"><label>Species</label><input type="text" wire:model="species" class="form-control"></div>
                  <div class="form-group col-6"><label>Count *</label><input type="number" wire:model="count" class="form-control"><?php $__errorArgs = ['count'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><small class="text-danger"><?php echo e($message); ?></small><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                </div>
                <div class="form-group"><label>Notes</label><textarea wire:model="notes" class="form-control" rows="2"></textarea></div>
                <button class="btn btn-primary btn-sm" type="submit">บันทึก</button>
                <?php if($reportId): ?><button class="btn btn-secondary btn-sm" type="button" wire:click="cancel">ยกเลิก</button><?php endif; ?>
              </form>
              <hr>
              <p class="small text-muted">ดึง CSV จาก data.blv.admin.ch (ไม่ต้องใช้คีย์) 500 แถวล่าสุด กันซ้ำด้วย api_hash</p>
              <button class="btn btn-success btn-sm w-100" wire:click="importFromApi" wire:loading.attr="disabled">นำเข้าจาก BLV API</button>
            </div></div>
          </div>
          <div class="col-lg-8">
            <input type="text" wire:model.debounce.500ms="search" class="form-control mb-3" placeholder="ค้นหาโรค / species / canton / ปี">
            <div class="table-responsive">
              <table class="table table-hover">
                <thead><tr><th>ID</th><th>Year</th><th>Canton</th><th>Disease</th><th>Species</th><th>Count</th><th>จัดการ</th></tr></thead>
                <tbody>
                  <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $it): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr><td><?php echo e($it->id); ?></td><td><?php echo e($it->year); ?></td><td><?php echo e($it->canton); ?></td><td><?php echo e($it->diseases); ?><br><small class="text-muted"><?php echo e($it->diseases_group); ?></small></td><td><?php echo e($it->species); ?></td><td><?php echo e($it->count); ?></td>
                  <td><button class="btn btn-sm btn-warning" wire:click="edit(<?php echo e($it->id); ?>)">แก้ไข</button> <button class="btn btn-sm btn-danger" wire:click="delete(<?php echo e($it->id); ?>)" onclick="return confirm('ลบรายการนี้?')">ลบ</button></td></tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              </table>
            </div>
            <?php echo e($items->links()); ?>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<?php /**PATH C:\laragon\www\nigger\resources\views/livewire/disease-report-crud.blade.php ENDPATH**/ ?>