@extends('template.backend.master')
@section('content')



    <main class="container page">

        <div class="eyebrow">PET FINDER / REPORT</div>

        <h1>แจ้งสัตว์เลี้ยงหาย</h1>

        <p class="intro">
            กรอกรายละเอียดของสัตว์เลี้ยงที่หายไป
            เพื่อให้ผู้คนช่วยกันตามหาและเพิ่มโอกาสให้เพื่อนตัวน้อยได้กลับบ้าน
        </p>

        <div class="form-card">
            <form id="reportForm">

                <div class="form-grid">

                    <div class="field">
                        <label for="animalType">ประเภทสัตว์เลี้ยง *</label>
                        <select id="animalType" required>
                            <option value="">เลือกประเภทสัตว์</option>
                            <option>แมว</option>
                            <option>สุนัข</option>
                            <option>กระต่าย</option>
                            <option>แฮมสเตอร์</option>
                            <option>หนูแกสบี้</option>
                            <option>นกเลี้ยง</option>
                            <option>ปลา</option>
                            <option>อื่น ๆ</option>
                        </select>
                    </div>

                    <div class="field">
                        <label for="animalName">ชื่อสัตว์เลี้ยง *</label>
                        <input id="animalName" type="text"
                               placeholder="เช่น ไมโล" required>
                    </div>

                    <div class="field">
                        <label for="reporterName">ชื่อผู้แจ้ง *</label>
                        <input id="reporterName" type="text"
                               placeholder="ชื่อของคุณ" required>
                    </div>

                    <div class="field">
                        <label for="contact">ช่องทางติดต่อ *</label>
                        <input id="contact" type="text"
                               placeholder="เบอร์โทรหรือ LINE" required>
                    </div>

                    <div class="field">
                        <label for="date">วันที่พบเห็นครั้งสุดท้าย *</label>
                        <input id="date" type="date" required>
                    </div>

                    <div class="field">
                        <label for="location">สถานที่ที่หาย *</label>
                        <input id="location" type="text"
                               placeholder="เขต/อำเภอ จังหวัด" required>
                    </div>

                    <div class="field full">
                        <label for="details">รายละเอียดเพิ่มเติม *</label>
                        <textarea id="details"
                            placeholder="สี ลักษณะ จุดสังเกต ปลอกคอ หรือข้อมูลที่ช่วยในการตามหา"
                            required></textarea>
                    </div>

                    <div class="field full">
                        <label for="photo">รูปภาพสัตว์เลี้ยง</label>
                        <input id="photo" type="file" accept="image/*">
                        <span class="hint">
                            เลือกไฟล์รูปภาพได้ แต่ตัวอย่างนี้ยังไม่ได้อัปโหลดรูปไปยังเซิร์ฟเวอร์
                        </span>
                    </div>

                </div>

                <div class="actions">
                    <button type="submit" class="main-button">
                        ส่งข้อมูลแจ้งสัตว์หาย →
                    </button>

                    <a class="secondary-button" href="{{ url('/') }}">
                        กลับหน้าหลัก
                    </a>
                </div>

                <div class="success" id="successMessage">
                    รับข้อมูลตัวอย่างเรียบร้อยแล้ว
                    แต่ยังไม่ได้บันทึกลงฐานข้อมูลจริง
                </div>

            </form>
        </div>
    </main>

@endsection


