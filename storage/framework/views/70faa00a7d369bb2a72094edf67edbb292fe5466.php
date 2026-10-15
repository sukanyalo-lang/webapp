<div>

<div class="row justify-content-center">
  <div class="col-lg-6">
    <div class="card card-default">
      <div class="card-header"><h2>เพิ่มผู้ใช้</h2></div>
      <form wire:submit.prevent="adduser">
        <div class="card-body">
          <div class="form-group"><label>ชื่อ *</label><input type="text" wire:model="name" class="form-control" required></div>
          <div class="form-group"><label>อีเมล *</label><input type="email" wire:model="email" class="form-control" required></div>
          <div class="form-group"><label>รหัสผ่าน *</label><input type="password" wire:model="password" class="form-control" required></div>
        </div>
        <div class="card-footer d-flex gap-2">
          <button class="btn btn-primary" type="submit">บันทึก</button>
          <a href="<?php echo e(route('users')); ?>" class="btn btn-secondary">กลับ</a>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
<?php /**PATH C:\laragon\www\nigger - Copy\resources\views/livewire/addusertable.blade.php ENDPATH**/ ?>