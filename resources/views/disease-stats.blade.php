@extends('template.frontend.master')
@section('content')
<section class="section-sm">
  <div class="container">
    <div class="row"><div class="col-12"><div class="search-result bg-gray"><h2>สถิติโรคสัตว์สวิตเซอร์แลนด์</h2><p>ข้อมูลจริงจาก FSVO ผ่าน BLV API (descriptor.json → CSV, cache 6 ชม.)</p></div></div></div>
    @livewire('disease-stats')
  </div>
</section>
@endsection
