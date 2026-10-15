<div class="pf-disease">
    <div class="pf-disease-summary"><span class="badge badge-primary">FSVO · Switzerland</span><h3 class="mt-3">ข้อมูลสุขภาพสัตว์</h3><p>พบ {{ number_format($total) }} รายการ · จำนวนสัตว์รวม {{ number_format($grandCount) }} ตัว</p></div>
    <div class="pf-disease-filters">
        <label>ค้นหา<input class="form-control" type="text" wire:model.debounce.500ms="search" placeholder="ชื่อโรค ชนิดสัตว์ หรือพื้นที่"></label>
        <label>ปี<select class="form-control ignore" wire:model="year"><option value="">ทุกปี</option>@foreach($years as $y)<option value="{{ $y }}">{{ $y }}</option>@endforeach</select></label>
        <label>พื้นที่<select class="form-control ignore" wire:model="canton"><option value="">ทุก Canton</option>@foreach($cantons as $c)<option value="{{ $c }}">{{ $c }}</option>@endforeach</select></label>
        <label>กลุ่มโรค<select class="form-control ignore" wire:model="group"><option value="">ทุกกลุ่มโรค</option>@foreach($groups as $g)<option value="{{ $g }}">{{ $g }}</option>@endforeach</select></label>
        <button class="btn btn-light" type="button" wire:click="clearFilters">ล้างตัวกรอง</button>
    </div>
    <div wire:loading class="small text-primary mb-3" role="status">กำลังโหลดข้อมูล...</div>
    <div class="table-responsive"><table class="table table-hover"><thead><tr><th>ปี</th><th>พื้นที่</th><th>กลุ่มโรค</th><th>โรค</th><th>ชนิดสัตว์</th><th class="text-right">จำนวน</th></tr></thead><tbody>
    @forelse($rows as $r)
    <tr><td>{{ $r['year'] ?? '' }}</td><td>{{ $r['canton'] ?? '' }}</td><td>{{ $r['diseases_group'] ?? '' }}</td><td>{{ $r['diseases'] ?? '' }}</td><td>{{ $r['species'] ?? '' }}</td><td class="text-right">{{ number_format($r['count'] ?? 0) }}</td></tr>
    @empty
    <tr><td colspan="6" class="text-center py-5 text-muted">ไม่พบข้อมูล ลองเปลี่ยนตัวกรองหรือกลับมาดูอีกครั้ง</td></tr>
    @endforelse
    </tbody></table></div>
    <div class="d-flex flex-wrap justify-content-between align-items-center mt-3" style="gap:12px"><p class="small mb-0">ที่มา: FSVO Switzerland · อัปเดตข้อมูลทุก 6 ชั่วโมง</p><div class="d-flex align-items-center" style="gap:12px"><button class="btn btn-sm btn-light" type="button" wire:click="prevPage" @disabled($page <= 1)>← ก่อนหน้า</button><span class="small">หน้า {{ $page }} / {{ $lastPage }}</span><button class="btn btn-sm btn-light" type="button" wire:click="nextPage" @disabled($page >= $lastPage)>ถัดไป →</button></div></div>
</div>
