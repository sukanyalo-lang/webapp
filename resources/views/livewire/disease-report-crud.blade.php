<div>
<main class="app-main">
<div class="app-content-header"><div class="container-fluid"><div class="row">
<div class="col-sm-6"><h1 class="mb-0 fs-3">Disease Reports (BLV)</h1><p class="text-muted">CRUD + Import จาก Swiss FSVO · ทั้งหมด {{ $totalAll }} รายการ</p></div>
<div class="col-sm-6"><ol class="breadcrumb float-sm-end"><li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li><li class="breadcrumb-item active">Disease Reports</li></ol></div>
</div></div></div>
<div class="app-content"><div class="container-fluid">
@if($message)<div class="alert alert-info">{{ $message }}</div>@endif
<div class="row g-4">
<div class="col-lg-4"><div class="card card-primary card-outline mb-4">
<div class="card-header"><div class="card-title">{{ $reportId ? 'แก้ไข #' . $reportId : 'เพิ่มรายการใหม่' }}</div></div>
<form wire:submit.prevent="save"><div class="card-body">
<div class="row g-2">
<div class="col-6"><label class="form-label">Year *</label><input type="number" wire:model="year" class="form-control">@error('year')<small class="text-danger">{{ $message }}</small>@enderror</div>
<div class="col-6"><label class="form-label">Canton *</label><input type="text" wire:model="canton" class="form-control" placeholder="BE / ZH">@error('canton')<small class="text-danger">{{ $message }}</small>@enderror</div>
<div class="col-12"><label class="form-label">Group</label><input type="text" wire:model="diseases_group" class="form-control"></div>
<div class="col-12"><label class="form-label">Disease *</label><input type="text" wire:model="diseases" class="form-control">@error('diseases')<small class="text-danger">{{ $message }}</small>@enderror</div>
<div class="col-6"><label class="form-label">Species</label><input type="text" wire:model="species" class="form-control"></div>
<div class="col-6"><label class="form-label">Count *</label><input type="number" wire:model="count" class="form-control">@error('count')<small class="text-danger">{{ $message }}</small>@enderror</div>
<div class="col-12"><label class="form-label">Notes</label><textarea wire:model="notes" class="form-control" rows="2"></textarea></div>
</div>
</div><div class="card-footer d-flex gap-2">
<button class="btn btn-primary" type="submit">บันทึก</button>
@if($reportId)<button class="btn btn-secondary" type="button" wire:click="cancel">ยกเลิก</button>@endif
</div></form>
</div>
<div class="card card-success card-outline"><div class="card-header"><div class="card-title">Import จาก API</div></div>
<div class="card-body"><p class="small text-muted">ดึง CSV จาก data.blv.admin.ch (ไม่ต้องใช้ API key) นำเข้า 500 แถวล่าสุด กันซ้ำด้วย api_hash</p>
<button class="btn btn-success w-100" wire:click="importFromApi" wire:loading.attr="disabled">นำเข้าจาก BLV API</button>
</div></div>
</div>
<div class="col-lg-8"><div class="card mb-4"><div class="card-header d-flex gap-2">
<input type="text" wire:model.debounce.500ms="search" class="form-control" placeholder="ค้นหาโรค / species / canton / ปี">
</div><div class="card-body p-0">
<table class="table table-bordered table-striped mb-0">
<thead><tr><th>ID</th><th>Year</th><th>Canton</th><th>Disease</th><th>Species</th><th>Count</th><th>Manage</th></tr></thead>
<tbody>
@foreach($items as $it)
<tr><td>{{ $it->id }}</td><td>{{ $it->year }}</td><td>{{ $it->canton }}</td><td>{{ $it->diseases }}<br><small class="text-muted">{{ $it->diseases_group }}</small></td><td>{{ $it->species }}</td><td>{{ $it->count }}</td>
<td><div class="d-flex gap-1"><button class="btn btn-sm btn-primary" wire:click="edit({{ $it->id }})">Edit</button><button class="btn btn-sm btn-danger" wire:click="delete({{ $it->id }})" onclick="return confirm('ลบรายการนี้?')">Del</button></div></td></tr>
@endforeach
</tbody>
</table>
</div><div class="card-footer">{{ $items->links() }}</div></div></div>
</div>
</div></div>
</main>
</div>
