<div>
{{-- ฟอร์มแก้ไขผู้ใช้ Mono --}}
<div class="row justify-content-center">
  <div class="col-lg-6">
    <div class="card card-default">
      <div class="card-header"><h2>แก้ไขผู้ใช้ #{{ $idd }}</h2></div>
      <form wire:submit.prevent="updateuser">
        <div class="card-body">
          <div class="form-group"><label>ชื่อ *</label><input type="text" wire:model="name" class="form-control" required></div>
          <div class="form-group"><label>อีเมล *</label><input type="email" wire:model="email" class="form-control" required></div>
          <div class="form-group"><label>รหัสผ่านใหม่ (เว้นว่าง = ไม่เปลี่ยน)</label><input type="password" wire:model="password" class="form-control" placeholder="เว้นว่างถ้าไม่เปลี่ยน"></div>
        </div>
        <div class="card-footer d-flex gap-2">
          <button class="btn btn-primary" type="submit">บันทึก</button>
          <a href="{{ route('users') }}" class="btn btn-secondary">กลับ</a>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
