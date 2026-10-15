

<main>
    <section class="page-heading">
        <div class="eyebrow">PET FINDER / COMMUNITY HELP</div>

        <h1>ทุกเบาะแสมีความหมาย</h1>

        <p>
            การพบเห็นเพียงเล็กน้อยอาจช่วยให้สัตว์เลี้ยง
            ได้กลับไปพบกับครอบครัวอีกครั้ง
            ร่วมแบ่งปันข้อมูลเพื่อช่วยตามหาสัตว์เลี้ยงที่พลัดหลง
        </p>
    </section>

    <section class="content">
        <aside class="side-info">
            <h2>ช่วยเป็นส่วนหนึ่ง<br>ของการตามหา</h2>

            <div class="info-line"></div>

            <p>
                หากคุณพบเห็นสัตว์เลี้ยงที่ไม่มีเจ้าของ
                หรือพบสัตว์ที่มีลักษณะตรงกับประกาศตามหา
                กรุณาแจ้งสถานที่ เวลา และรายละเอียดที่สังเกตได้
            </p>

            <div class="tip">
                <strong>ข้อมูลที่เป็นประโยชน์</strong>
                <p>
                    ระบุสถานที่ให้ชัดเจน อธิบายลักษณะสัตว์
                    และแจ้งช่องทางติดต่อที่สะดวก
                    เพื่อให้เจ้าของสามารถสอบถามข้อมูลเพิ่มเติมได้
                </p>
            </div>

            <a href="{{ url('/') }}" class="back-link">
                ← กลับสู่หน้าหลัก
            </a>
        </aside>

        <div class="form-card">
            <h2 class="form-title">แบบฟอร์มแจ้งเบาะแส</h2>

            <p class="form-subtitle">
                กรุณากรอกข้อมูลที่มีเครื่องหมาย
                <span class="required">*</span> ให้ครบถ้วน
            </p>

            <form id="clueForm">
                <div class="form-group">
                    <label for="reportType">
                        ประเภทการแจ้ง <span class="required">*</span>
                    </label>

                    <select id="reportType" name="reportType" required>
                        <option value="">เลือกประเภทการแจ้ง</option>
                        <option value="found">พบเห็นสัตว์เลี้ยง</option>
                        <option value="clue">พบเบาะแสสัตว์ที่หาย</option>
                    </select>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="animalType">
                            ประเภทสัตว์ <span class="required">*</span>
                        </label>

                        <select id="animalType" name="animalType" required>
                            <option value="">เลือกประเภทสัตว์</option>
                            <option value="แมว">แมว</option>
                            <option value="สุนัข">สุนัข</option>
                            <option value="กระต่าย">กระต่าย</option>
                            <option value="นก">นก</option>
                            <option value="อื่น ๆ">อื่น ๆ</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="animalName">ชื่อสัตว์ (ถ้าทราบ)</label>
                        <input
                            type="text"
                            id="animalName"
                            name="animalName"
                            placeholder="เช่น ไมโล"
                        >
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="date">
                            วันที่พบเห็น <span class="required">*</span>
                        </label>
                        <input type="date" id="date" name="date" required>
                    </div>

                    <div class="form-group">
                        <label for="time">เวลาที่พบเห็น</label>
                        <input type="time" id="time" name="time">
                    </div>
                </div>

                <div class="form-group">
                    <label for="location">
                        สถานที่พบเห็น <span class="required">*</span>
                    </label>
                    <input
                        type="text"
                        id="location"
                        name="location"
                        placeholder="จังหวัด ถนน หรือสถานที่ใกล้เคียง"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="details">
                        รายละเอียดเบาะแส <span class="required">*</span>
                    </label>
                    <textarea
                        id="details"
                        name="details"
                        placeholder="อธิบายสี ขนาด ลักษณะเด่น หรือทิศทางที่พบเห็น"
                        required
                    ></textarea>
                </div>

                <div class="form-group">
                    <label for="photo">ลิงก์รูปภาพ (ถ้ามี)</label>
                    <input
                        type="url"
                        id="photo"
                        name="photo"
                        placeholder="https://example.com/photo.jpg"
                    >
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="reporterName">
                            ชื่อผู้แจ้ง <span class="required">*</span>
                        </label>
                        <input
                            type="text"
                            id="reporterName"
                            name="reporterName"
                            placeholder="ชื่อของคุณ"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="contact">
                            ช่องทางติดต่อ <span class="required">*</span>
                        </label>
                        <input
                            type="text"
                            id="contact"
                            name="contact"
                            placeholder="เบอร์โทรศัพท์หรือ LINE"
                            required
                        >
                    </div>
                </div>

                <button type="submit" class="submit-button">
                    ส่งข้อมูลเบาะแส →
                </button>

                <div class="message" id="successMessage" role="status">
                    รับข้อมูลตัวอย่างแล้ว
                    แต่ข้อมูลยังไม่ได้บันทึกลงฐานข้อมูล
                </div>
            </form>
        </div>
    </section>
</main>

<script>
    document.getElementById('clueForm')
        .addEventListener('submit', function(event) {
            event.preventDefault();

            document.getElementById('successMessage').style.display = 'block';
        });
</script>

</body>
</html>
