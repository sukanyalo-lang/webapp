@extends('template.frontend.master') {{-- หน้าบ้าน Classimax --}}
@section('content')
{{-- ติดต่อเรา --}}
<section class="section">
  <div class="container">
    <div class="row"><div class="col-12"><div class="section-title"><h2>ติดต่อเรา</h2><p>ส่งข้อความหา Pet Finder (ตัวอย่างโครงงาน)</p></div></div></div>
    <div class="row">
      <div class="col-md-8"><div class="border p-4">
        <form onsubmit="event.preventDefault();document.getElementById('ok').style.display='block';">
          <div class="form-group"><label>ชื่อ *</label><input class="form-control" required></div>
          <div class="form-group"><label>อีเมล *</label><input type="email" class="form-control" required></div>
          <div class="form-group"><label>ข้อความ *</label><textarea class="form-control" rows="5" required></textarea></div>
          <button class="btn btn-primary" type="submit">ส่งข้อความ</button>
          <div class="alert alert-success mt-3" id="ok" style="display:none;">รับข้อความแล้ว (ตัวอย่าง)</div>
        </form>
      </div></div>
      <div class="col-md-4"><div class="widget category-list"><h4 class="widget-header">เมนูลัด</h4><ul class="category-list"><li><a href="{{ route('about') }}">เกี่ยวกับเรา</a></li><li><a href="{{ route('pets') }}">สัตว์หาย</a></li><li><a href="{{ route('login') }}">เข้าสู่ระบบ</a></li></ul></div></div>
    </div>
  </div>
</section>
@endsection
