@extends('template.frontend.master')
@section('content')
    <section class="section-sm">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-result bg-gray">
                        <h2>สถิติโรคสัตว์สวิตเซอร์แลนด์</h2>
                        <p>ติดตามสถานการณ์สุขภาพสัตว์จาก FSVO Switzerland ค้นหาและกรองข้อมูลตามปี พื้นที่ และกลุ่มโรค</p>
                    </div>
                </div>
            </div>
            @livewire('disease-stats')
        </div>
    </section>
@endsection
