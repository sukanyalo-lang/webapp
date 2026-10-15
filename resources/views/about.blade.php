@extends('template.frontend.master') {{-- หน้าบ้าน Classimax --}}
@section('content')
    {{-- เกี่ยวกับเรา --}}
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>เกี่ยวกับ Pet Finder</h2>
                        <p>ทุกการรอคอยมีความหวังที่จะได้พบกัน</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="border p-4 mb-3">
                        <h4>01 / ช่วยกระจายข้อมูล</h4>
                        <p class="text-muted">รวบรวมสัตว์หายให้ค้นหาง่าย ส่งต่อถึงชุมชนได้เร็ว</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="border p-4 mb-3">
                        <h4>02 / ร่วมมือกันตามหา</h4>
                        <p class="text-muted">เปิดพื้นที่แจ้งเบาะแส ระบุสถานที่ เวลา ลักษณะ</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="border p-4 mb-3">
                        <h4>03 / เรียนรู้จากข้อมูลจริง</h4>
                        <p class="text-muted">สถิติโรคสัตว์ BLV/FSVO ตามปี Canton และ species ดึงสดจาก API สวิตเซอร์แลนด์
                        </p><a href="{{ route('disease-stats') }}"
                            class="btn btn-sm btn-outline-success mt-2">ดูสถิติโรคสัตว์ (BLV API)</a>
                    </div>
                </div>
            </div>
            <div class="text-center mt-3"><a href="{{ route('report') }}" class="btn btn-primary mr-2">แจ้งสัตว์หาย</a><a
                    href="{{ route('disease-stats') }}" class="btn btn-outline-success">สถิติโรคสัตว์</a></div>
        </div>
    </section>
@endsection
