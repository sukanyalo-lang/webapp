<div>
<div style="max-width:1150px;margin:0 auto;padding:0 5%;">
<div style="padding:40px 0 16px;">
<div style="font-size:12px;letter-spacing:2px;color:#89847D;">FSVO / SWITZERLAND</div>
<h1 style="font-weight:300;">สถิติโรคสัตว์สวิตเซอร์แลนด์</h1>
<p style="color:#777168;font-size:14px;">พบ {{ number_format($total) }} รายการ ผลรวม {{ number_format($grandCount) }} ตัว</p>
</div>
<div style="display:flex;gap:8px;flex-wrap:wrap;margin-bottom:14px;">
<input type="text" wire:model.debounce.500ms="search" placeholder="ค้นหา Rabies / Cattle / BE" style="flex:1;min-width:200px;padding:10px;border:1px solid #E1DED9;">
<select wire:model="year" style="padding:10px;border:1px solid #E1DED9;"><option value="">ทุกปี</option>@foreach($years as $y)<option value="{{ $y }}">{{ $y }}</option>@endforeach</select>
<select wire:model="canton" style="padding:10px;border:1px solid #E1DED9;"><option value="">ทุก Canton</option>@foreach($cantons as $c)<option value="{{ $c }}">{{ $c }}</option>@endforeach</select>
<select wire:model="group" style="padding:10px;border:1px solid #E1DED9;max-width:230px;"><option value="">ทุกกลุ่มโรค</option>@foreach($groups as $g)<option value="{{ $g }}">{{ $g }}</option>@endforeach</select>
<button wire:click="clearFilters" style="padding:0 16px;border:1px solid #45423D;background:#fff;cursor:pointer;">ล้าง</button>
</div>
@if($rows->count())
<div style="overflow-x:auto;border:1px solid #EAE8E4;">
<table style="width:100%;border-collapse:collapse;font-size:13px;">
<thead><tr style="background:#F7F5F1;text-align:left;">
<th style="padding:9px;">Year</th><th style="padding:9px;">Canton</th><th style="padding:9px;">Group</th><th style="padding:9px;">Disease</th><th style="padding:9px;">Species</th><th style="padding:9px;text-align:right;">Count</th>
</tr></thead>
<tbody>
@foreach($rows as $r)
<tr style="border-top:1px solid #EAE8E4;">
<td style="padding:8px;">{{ $r['year'] ?? '' }}</td>
<td style="padding:8px;">{{ $r['canton'] ?? '' }}</td>
<td style="padding:8px;">{{ $r['diseases_group'] ?? '' }}</td>
<td style="padding:8px;">{{ $r['diseases'] ?? '' }}</td>
<td style="padding:8px;">{{ $r['species'] ?? '' }}</td>
<td style="padding:8px;text-align:right;">{{ number_format($r['count'] ?? 0) }}</td>
</tr>
@endforeach
</tbody>
</table>
</div>
<div style="display:flex;gap:8px;align-items:center;margin:12px 0 30px;font-size:13px;">
<button wire:click="prevPage" @if($page<=1) disabled @endif style="padding:8px 16px;border:1px solid #45423D;background:#fff;cursor:pointer;">← ก่อนหน้า</button>
<span>หน้า {{ $page }} / {{ $lastPage }}</span>
<button wire:click="nextPage" @if($page>=$lastPage) disabled @endif style="padding:8px 16px;border:1px solid #45423D;background:#fff;cursor:pointer;">ถัดไป →</button>
</div>
@else
<p style="color:#A33B32;">ไม่มีข้อมูล หรือดึงจาก BLV ไม่สำเร็จ</p>
@endif
<p style="font-size:12px;color:#89847D;margin-bottom:40px;">ที่มา: FSVO Switzerland · cache 6 ชม.</p>
</div>
</div>
