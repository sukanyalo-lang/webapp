<div>
{{-- ตารางผู้ใช้ Mono --}}
<div class="row">
  <div class="col-12">
    <div class="card card-default">
      <div class="card-header d-flex justify-content-between align-items-center">
        <div>
          <h2>ผู้ใช้งาน</h2>
          <p class="text-muted mb-0">ทั้งหมด {{ $users->count() }} คน</p>
        </div>
        <a href="{{ route('addusers') }}" class="btn btn-primary btn-sm">+ เพิ่มผู้ใช้</a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-hover">
            <thead><tr><th>ID</th><th>ชื่อ</th><th>อีเมล</th><th>จัดการ</th></tr></thead>
            <tbody>
              @foreach($users as $u)
              <tr>
                <td>{{ $u->id }}</td>
                <td>{{ $u->name }}</td>
                <td>{{ $u->email }}</td>
                <td>
                  <a href="{{ route('edituser', $u->id) }}" class="btn btn-sm btn-warning">แก้ไข</a>
                  <button class="btn btn-sm btn-danger" wire:click="delete({{ $u->id }})" onclick="return confirm('ลบผู้ใช้นี้?')">ลบ</button>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
