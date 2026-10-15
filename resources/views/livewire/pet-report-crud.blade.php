<div class="container-fluid py-3">
  <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
    <div><span class="text-uppercase small text-muted">PET FINDER / MANAGEMENT</span><h2 class="mb-1">จัดการประกาศสัตว์เลี้ยง</h2><p class="text-muted mb-0">เพิ่ม แก้ไข ค้นหา และลบประกาศจากฐานข้อมูล</p></div>
    <div class="badge badge-primary p-3">ทั้งหมด {{ number_format($totalAll) }} รายการ</div>
  </div>
  @if($message)<div class="alert alert-success">{{ $message }}</div>@endif
  <div class="row">
    <div class="col-xl-4 mb-4"><div class="card card-default"><div class="card-header"><h5 class="mb-0">{{ $reportId ? 'แก้ไขประกาศ #'.$reportId : 'เพิ่มประกาศ' }}</h5></div><div class="card-body">
      <form wire:submit.prevent="save">
        <div class="form-group"><label>ชื่อสัตว์ *</label><input class="form-control" wire:model.defer="pet_name">@error('pet_name')<small class="text-danger">{{ $message }}</small>@enderror</div>
        <div class="form-row"><div class="form-group col-6"><label>ประเภท *</label><select class="form-control" wire:model.defer="pet_type"><option>แมว</option><option>สุนัข</option><option>นก</option><option>กระต่าย</option><option>อื่นๆ</option></select></div><div class="form-group col-6"><label>สถานะ *</label><select class="form-control" wire:model.defer="status"><option value="lost">สัตว์หาย</option><option value="found">พบสัตว์</option><option value="closed">ปิดประกาศ</option></select></div></div>
        <div class="form-row"><div class="form-group col-6"><label>พันธุ์</label><input class="form-control" wire:model.defer="breed"></div><div class="form-group col-6"><label>สี/ลักษณะ</label><input class="form-control" wire:model.defer="color"></div></div>
        <div class="form-group"><label>สถานที่ *</label><input class="form-control" wire:model.defer="location">@error('location')<small class="text-danger">{{ $message }}</small>@enderror</div>
        <div class="form-group"><label>วันที่พบเห็นล่าสุด</label><input type="date" class="form-control" wire:model.defer="last_seen_at"></div>
        <div class="form-group"><label>รายละเอียด *</label><textarea class="form-control" rows="3" wire:model.defer="description"></textarea>@error('description')<small class="text-danger">{{ $message }}</small>@enderror</div>
        <div class="form-group"><label>ชื่อผู้ติดต่อ *</label><input class="form-control" wire:model.defer="contact_name"></div><div class="form-group"><label>เบอร์ติดต่อ *</label><input class="form-control" wire:model.defer="contact_phone"></div>
        <button class="btn btn-primary" type="submit">บันทึกข้อมูล</button> <button class="btn btn-light" type="button" wire:click="resetForm">ล้างฟอร์ม</button>
      </form>
    </div></div></div>
    <div class="col-xl-8"><div class="card card-default"><div class="card-body"><input class="form-control mb-3" placeholder="ค้นหาชื่อสัตว์ ประเภท สถานที่ หรือเบอร์โทร" wire:model.debounce.400ms="search"><div class="table-responsive"><table class="table table-hover"><thead><tr><th>สัตว์เลี้ยง</th><th>สถานที่</th><th>สถานะ</th><th>ผู้แจ้ง</th><th>จัดการ</th></tr></thead><tbody>
      @forelse($items as $item)<tr><td><strong>{{ $item->pet_name }}</strong><br><small class="text-muted">{{ $item->pet_type }} · {{ $item->color ?: 'ไม่ระบุสี' }}</small></td><td>{{ $item->location }}</td><td><span class="badge badge-{{ $item->status === 'lost' ? 'danger' : ($item->status === 'found' ? 'success' : 'secondary') }}">{{ ['lost'=>'สัตว์หาย','found'=>'พบสัตว์','closed'=>'ปิดประกาศ'][$item->status] }}</span></td><td>{{ $item->contact_name }}<br><small>{{ $item->contact_phone }}</small></td><td class="text-nowrap"><button class="btn btn-sm btn-warning" wire:click="edit({{ $item->id }})">แก้ไข</button> <button class="btn btn-sm btn-danger" wire:click="delete({{ $item->id }})" onclick="return confirm('ยืนยันลบประกาศนี้?')">ลบ</button></td></tr>@empty<tr><td colspan="5" class="text-center text-muted py-4">ยังไม่มีประกาศในฐานข้อมูล</td></tr>@endforelse
      </tbody></table></div>{{ $items->links() }}</div></div></div>
  </div>
</div>
