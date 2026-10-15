<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title>Pet Finder | พาน้องกลับบ้าน</title>
<link rel="stylesheet" href="{{ asset('asset/frontend/css/pet-home.css') }}">
<x-theme-styles />
</head>
<body class="pf-ui pf-home"><div class="page">
@include('template.frontend.header')
<main>
<section class="hero hero-back" aria-labelledby="hero-title">
<div class="hero-art" aria-hidden="true"><img src="{{ asset('asset/frontend/images/back.png') }}" alt=""></div><div class="hero-wash"></div>
<i class="fa fa-paw paw one" aria-hidden="true"></i><i class="fa fa-paw paw two" aria-hidden="true"></i>
<div class="hero-content"><h1 id="hero-title"><span>เพราะทุกชีวิตมีค่า</span><br>เราจะพาน้องๆ กลับบ้าน</h1><p>เว็บไซต์สำหรับแจ้งสัตว์เลี้ยงหาย และแจ้งพบสัตว์เลี้ยง<br>ช่วยกันแชร์ ช่วยกันตามหา ให้พวกเขากลับบ้าน</p>
<div class="hero-actions"><a class="button primary" href="{{ route('report', ['status' => 'lost']) }}">แจ้งสัตว์หาย</a><a class="button outline" href="{{ route('report', ['status' => 'found']) }}">แจ้งพบสัตว์</a></div></div>
</section>
<form id="search" class="search-bar" action="{{ route('pets') }}" method="GET" role="search">
<label class="keyword"><i class="fa fa-search" aria-hidden="true"></i><input name="q" aria-label="คำค้นหา" placeholder="ค้นหาประกาศ (ชื่อสัตว์, สี, สายพันธุ์)"></label>
<select name="location" aria-label="จังหวัด"><option value="">จังหวัด</option>@foreach(['กรุงเทพมหานคร','เชียงใหม่','ชลบุรี','นนทบุรี','ปทุมธานี','สมุทรปราการ','นครราชสีมา','ขอนแก่น','ภูเก็ต'] as $province)<option value="{{ $province }}">{{ $province }}</option>@endforeach</select>
<select name="type" aria-label="ประเภทสัตว์"><option value="">ประเภทสัตว์</option>@foreach(['สุนัข','แมว','นก','กระต่าย','อื่นๆ'] as $type)<option value="{{ $type }}">{{ $type }}</option>@endforeach</select>
<select name="status" aria-label="สถานะ"><option value="">สถานะ</option><option value="lost">สัตว์หาย</option><option value="found">พบแล้ว</option></select>
<button class="button primary" type="submit"><i class="fa fa-search" aria-hidden="true"></i> ค้นหา</button>
</form>
<section class="latest" aria-labelledby="latest-title"><div class="section-heading"><h2 id="latest-title">ประกาศล่าสุด</h2><a href="{{ route('pets') }}">ดูทั้งหมด →</a></div>
<div class="pet-grid">
@forelse($pets->take(4) as $pet)
<article class="pet-card"><div class="pet-photo">
@if($pet->photo_path)
<img src="{{ asset('storage/' . $pet->photo_path) }}" alt="{{ $pet->pet_name }}" loading="lazy" onerror="this.hidden=true;this.parentElement.classList.add('image-unavailable')">
@else
<i class="fa fa-paw placeholder-paw" aria-hidden="true"></i>
@endif
<span class="badge {{ $pet->status === 'found' ? 'found' : 'lost' }}">{{ $pet->status === 'found' ? 'พบแล้ว' : 'สัตว์หาย' }}</span>
</div><div class="pet-info"><h3><a href="{{ route('pets', ['q' => $pet->pet_name]) }}">{{ $pet->pet_name }} {{ $pet->description }}</a></h3><p><i class="fa fa-map-marker" aria-hidden="true"></i><span>{{ $pet->location }}</span></p><p><i class="fa fa-calendar-o" aria-hidden="true"></i>{{ $pet->created_at->day }} {{ ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.'][$pet->created_at->month - 1] }} {{ $pet->created_at->year + 543 }}</p></div></article>
@empty
<div class="empty"><i class="fa fa-paw" aria-hidden="true"></i><h3>ยังไม่มีประกาศในขณะนี้</h3><p>ร่วมเป็นส่วนหนึ่งในการพาน้องกลับบ้าน</p><a class="button primary" href="{{ route('report') }}">แจ้งประกาศแรก</a></div>
@endforelse
</div></section></main></div></body></html>


