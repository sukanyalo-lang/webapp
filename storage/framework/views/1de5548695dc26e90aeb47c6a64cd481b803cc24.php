<div>

<div class="row">
  <div class="col-12">
    <div class="card card-default">
      <div class="card-header d-flex justify-content-between align-items-center">
        <div>
          <h2>ผู้ใช้งาน</h2>
          <p class="text-muted mb-0">ทั้งหมด <?php echo e($users->count()); ?> คน</p>
        </div>
        <a href="<?php echo e(route('addusers')); ?>" class="btn btn-primary btn-sm">+ เพิ่มผู้ใช้</a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-hover">
            <thead><tr><th>ID</th><th>ชื่อ</th><th>อีเมล</th><th>จัดการ</th></tr></thead>
            <tbody>
              <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($u->id); ?></td>
                <td><?php echo e($u->name); ?></td>
                <td><?php echo e($u->email); ?></td>
                <td>
                  <a href="<?php echo e(route('edituser', $u->id)); ?>" class="btn btn-sm btn-warning">แก้ไข</a>
                  <button class="btn btn-sm btn-danger" wire:click="delete(<?php echo e($u->id); ?>)" onclick="return confirm('ลบผู้ใช้นี้?')">ลบ</button>
                </td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<?php /**PATH C:\laragon\www\nigger - Copy\resources\views/livewire/usertable.blade.php ENDPATH**/ ?>