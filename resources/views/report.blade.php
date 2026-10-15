@extends('template.frontend.master')
@section('content')
    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="border-0 p-4 p-md-5" style="border-radius:20px;box-shadow:0 12px 40px rgba(20,50,30,.09)">
                        <span class="text-uppercase text-muted small">Create a report</span>
                        <h2 class="font-weight-bold mt-2">ลงประกาศสัตว์หาย / พบสัตว์</h2>
                        <p class="text-muted">กรอกข้อมูลให้ครบเพื่อช่วยให้ชุมชนสังเกตและติดต่อกลับได้ง่ายขึ้น</p>
                        @if (!auth()->check())
                            <div class="alert alert-info">กรุณา <a href="{{ route('login') }}">เข้าสู่ระบบ</a> หรือ <a
                                    href="{{ route('register') }}">สมัครสมาชิก</a> ก่อนลงประกาศ</div>
                        @else
                            @if ($errors->any())
                                <div class="alert alert-danger"><strong>กรุณาตรวจสอบข้อมูล</strong>
                                    <ul class="mb-0 mt-2">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ route('report.store') }}" method="POST" enctype="multipart/form-data">@csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6"><label>ประเภทประกาศ *</label><select name="status"
                                            class="form-control" required>
                                            <option value="lost" @selected(old('status') === 'lost')>สัตว์เลี้ยงหาย</option>
                                            <option value="found" @selected(old('status') === 'found')>พบสัตว์ / ตามหาเจ้าของ
                                            </option>
                                        </select></div>
                                    <div class="form-group col-md-6"><label>ประเภทสัตว์ *</label><select name="pet_type"
                                            class="form-control" required>
                                            @foreach (['แมว', 'สุนัข', 'นก', 'กระต่าย', 'อื่นๆ'] as $type)
                                                <option value="{{ $type }}" @selected(old('pet_type') === $type)>
                                                    {{ $type }}</option>
                                            @endforeach
                                        </select></div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6"><label>ชื่อสัตว์ *</label><input name="pet_name"
                                            value="{{ old('pet_name') }}" class="form-control" required maxlength="100"
                                            placeholder="เช่น ไมโล"></div>
                                    <div class="form-group col-md-6"><label>พันธุ์</label><input name="breed"
                                            value="{{ old('breed') }}" class="form-control" placeholder="ถ้าทราบ"></div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6"><label>สี / ลักษณะเด่น</label><input name="color"
                                            value="{{ old('color') }}" class="form-control"
                                            placeholder="เช่น สีส้ม ปลอกคอสีแดง"></div>
                                    <div class="form-group col-md-6"><label>วันที่พบเห็นล่าสุด</label><input type="date"
                                            name="last_seen_at" value="{{ old('last_seen_at') }}"
                                            max="{{ now()->toDateString() }}" class="form-control"></div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4"><label>จังหวัด (ดึงจาก API)</label><select
                                            id="province" class="form-control">
                                            <option value="">กำลังโหลดจังหวัดจาก API...</option>
                                        </select></div>
                                    <div class="form-group col-md-4"><label>อำเภอ (ดึงจาก API)</label><select id="amphure"
                                            class="form-control">
                                            <option value="">เลือกจังหวัดก่อน</option>
                                        </select></div>
                                    <div class="form-group col-md-4"><label>ตำบล</label><select id="tambon"
                                            class="form-control">
                                            <option value="">เลือกอำเภอก่อน</option>
                                        </select></div>
                                </div>
                                <div class="form-group"><label>รายละเอียดที่อยู่เพิ่มเติม</label><input id="addr_detail"
                                        class="form-control" placeholder="บ้านเลขที่ ถนน ซอย (ถ้ามี)"></div>
                                <div class="form-group"><label>สถานที่หาย / พบสัตว์ *</label><input name="location"
                                        id="location" value="{{ old('location') }}" class="form-control" required
                                        placeholder="เลือกจังหวัด/อำเภอ/ตำบล ด้านบน หรือพิมพ์เอง"><small
                                        class="form-text text-muted">ดึงจังหวัด/อำเภอ/ตำบลสดจาก Thai-Province API (kongvut)
                                        — ถ้าโหลดไม่สำเร็จให้พิมพ์เองได้</small></div>
                                <script>
                                    // โหลดจังหวัด/อำเภอ/ตำบลจาก JSON ฟรี (API ภายนอกที่เคยหายไป เอากลับมาแสดง)
                                    (function() {
                                        var P = 'https://raw.githubusercontent.com/kongvut/thai-province-data/master/api/province.json';
                                        var D = 'https://raw.githubusercontent.com/kongvut/thai-province-data/master/api/amphure.json';
                                        var S = 'https://raw.githubusercontent.com/kongvut/thai-province-data/master/api/tambon.json';
                                        var P2 =
                                            'https://raw.githubusercontent.com/kongvut/thai-province-data/refs/heads/master/api/latest/province.json';
                                        var D2 =
                                            'https://raw.githubusercontent.com/kongvut/thai-province-data/refs/heads/master/api/latest/district.json';
                                        var S2 =
                                            'https://raw.githubusercontent.com/kongvut/thai-province-data/refs/heads/master/api/latest/sub_district.json';
                                        var selP = document.getElementById('province'),
                                            selD = document.getElementById('amphure'),
                                            selT = document.getElementById('tambon'),
                                            loc = document.getElementById('location'),
                                            detail = document.getElementById('addr_detail');
                                        if (!selP) return;
                                        var districts = [],
                                            subs = [];

                                        function syncLoc() {
                                            var parts = [];
                                            if (detail && detail.value) parts.push(detail.value.trim());
                                            if (selT && selT.value) parts.push(selT.value);
                                            if (selD && selD.value) parts.push(selD.value);
                                            if (selP && selP.value) parts.push(selP.value);
                                            if (parts.length) loc.value = parts.join(' ');
                                        }

                                        function fillProv(list) {
                                            selP.innerHTML = '<option value="">เลือกจังหวัด</option>';
                                            list.forEach(function(p) {
                                                var th = (p.name && p.name.th) || p.name_th || p.name || '';
                                                if (!th) return;
                                                var o = document.createElement('option');
                                                o.value = th;
                                                o.textContent = th;
                                                o.dataset.id = p.id;
                                                selP.appendChild(o);
                                            });
                                        }
                                        fetch(P2).then(function(r) {
                                            return r.json();
                                        }).then(fillProv).catch(function() {
                                            fetch(P).then(function(r) {
                                                return r.json();
                                            }).then(fillProv).catch(function() {
                                                selP.innerHTML = '<option value="">โหลดไม่สำเร็จ ให้พิมพ์เองด้านล่าง</option>';
                                            });
                                        });
                                        fetch(D2).then(function(r) {
                                            return r.json();
                                        }).then(function(d) {
                                            districts = d;
                                        }).catch(function() {
                                            fetch(D).then(function(r) {
                                                return r.json();
                                            }).then(function(d) {
                                                districts = d;
                                            });
                                        });
                                        fetch(S2).then(function(r) {
                                            return r.json();
                                        }).then(function(s) {
                                            subs = s;
                                        }).catch(function() {
                                            fetch(S).then(function(r) {
                                                return r.json();
                                            }).then(function(s) {
                                                subs = s;
                                            });
                                        });
                                        selP.addEventListener('change', function() {
                                            var id = this.options[this.selectedIndex] ? this.options[this.selectedIndex].dataset.id : '';
                                            selD.innerHTML = '<option value="">เลือกอำเภอ</option>';
                                            selT.innerHTML = '<option value="">เลือกอำเภอก่อน</option>';
                                            districts.filter(function(d) {
                                                return String(d.province_id || d.provinceId || d.province_id) === String(id);
                                            }).forEach(function(d) {
                                                var th = ((d.prefix && (d.prefix.th || d.prefix)) || '') + (d.name && (d.name.th ||
                                                    d.name) || d.name_th || '');
                                                var o = document.createElement('option');
                                                o.value = th;
                                                o.textContent = th;
                                                o.dataset.id = d.id;
                                                selD.appendChild(o);
                                            });
                                            syncLoc();
                                        });
                                        selD.addEventListener('change', function() {
                                            var id = this.options[this.selectedIndex] ? this.options[this.selectedIndex].dataset.id : '';
                                            selT.innerHTML = '<option value="">เลือกตำบล</option>';
                                            subs.filter(function(s) {
                                                return String(s.district_id || s.amphure_id || s.districtId) === String(id);
                                            }).forEach(function(s) {
                                                var th = ((s.prefix && (s.prefix.th || s.prefix)) || '') + (s.name && (s.name.th ||
                                                    s.name) || s.name_th || '');
                                                var o = document.createElement('option');
                                                o.value = th;
                                                o.textContent = th;
                                                selT.appendChild(o);
                                            });
                                            syncLoc();
                                        });
                                        if (selT) selT.addEventListener('change', syncLoc);
                                        if (detail) detail.addEventListener('input', syncLoc);
                                    })();
                                </script>
                                <div class="form-group"><label>รายละเอียดเพิ่มเติม *</label>
                                    <textarea name="description" rows="4" class="form-control" required maxlength="3000"
                                        placeholder="ลักษณะนิสัย จุดสังเกต และเหตุการณ์ที่เกิดขึ้น">{{ old('description') }}</textarea>
                                </div>
                                <div class="form-group"><label>รูปสัตว์ (JPG, PNG, WEBP ไม่เกิน 5 MB)</label><input
                                        type="file" name="photo" class="form-control-file"
                                        accept="image/jpeg,image/png,image/webp"></div>
                                <hr>
                                <h5 class="font-weight-bold mb-3">ข้อมูลติดต่อ</h5>
                                <div class="form-row">
                                    <div class="form-group col-md-6"><label>ชื่อผู้ติดต่อ *</label><input
                                            name="contact_name" value="{{ old('contact_name', auth()->user()->name) }}"
                                            class="form-control" required></div>
                                    <div class="form-group col-md-6"><label>เบอร์โทรศัพท์ *</label><input
                                            name="contact_phone" value="{{ old('contact_phone') }}" class="form-control"
                                            required maxlength="30" placeholder="เบอร์ที่ติดต่อได้"></div>
                                </div><button class="btn btn-primary btn-lg" type="submit">บันทึกประกาศ</button> <a
                                    href="{{ route('pets') }}" class="btn btn-outline-secondary btn-lg">ยกเลิก</a>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
