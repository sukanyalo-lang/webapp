@extends('template.frontend.master')

@section('content')
    <main class="container">
        <section class="hero">
            <div class="eyebrow">ABOUT PET FINDER</div>
            <h1>ทุกการรอคอย<br>มีความหวัง <em>ที่จะได้พบกัน</em></h1>
            <p>Pet Finder เป็นเว็บไซต์สำหรับช่วยเผยแพร่ข้อมูลสัตว์เลี้ยงที่สูญหาย ให้เจ้าของและชุมชนช่วยกันค้นหา
                ดูข้อมูล ประเภท และสถานที่ เพื่อเพิ่มโอกาสให้เพื่อนตัวน้อยได้กลับบ้านอย่างปลอดภัย
                เสริมด้วยข้อมูลสถิติโรคสัตว์จาก FSVO สวิตเซอร์แลนด์เพื่อการเรียนรู้</p>
        </section>
        <section class="cards">
            <article class="card">
                <div class="number">01 / OUR PURPOSE</div>
                <h2>ช่วยกระจายข้อมูล</h2>
                <p>รวบรวมข้อมูลสัตว์เลี้ยงที่หายให้ค้นหาได้สะดวก และช่วยให้ข้อมูลไปถึงผู้คนได้มากขึ้น</p>
            </article>
            <article class="card">
                <div class="number">02 / OUR COMMUNITY</div>
                <h2>ร่วมมือกันตามหา</h2>
                <p>เปิดพื้นที่ให้ผู้พบเห็นแจ้งเบาะแส เพื่อช่วยเจ้าของติดตามสัตว์เลี้ยงของตน</p>
            </article>
            <article class="card">
                <div class="number">03 / OUR DATA</div>
                <h2>เรียนรู้จากข้อมูลจริง</h2>
                <p>เชื่อมสถิติโรคสัตว์ BLV/FSVO แสดงแนวโน้มโรคตามปี Canton และ species</p>
            </article>
        </section>
        <section class="note">
            <h2>ร่วมเป็นส่วนหนึ่งของการช่วยเหลือ</h2>
            <p>หากพบสัตว์เลี้ยงที่ตรงกับข้อมูล โปรดแจ้งเบาะแสพร้อมระบุสถานที่และเวลา
                และติดต่อเจ้าของผ่านช่องทางที่ให้ไว้</p>
        </section>
    </main>
@endsection
