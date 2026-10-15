 
<?php $__env->startSection('content'); ?>

<section class="ad-listing section">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="border p-4">
          <h3 class="bg-gray p-3 mb-3">แจ้งสัตว์เลี้ยงหาย</h3>
          <p class="text-muted">กรอกรายละเอียดเพื่อให้ชุมชนช่วยตามหา (ตัวอย่างโครงงาน)</p>
          <form id="reportForm">
            <div class="form-row">
              <div class="form-group col-md-6"><label>ประเภทสัตว์ *</label><select id="animalType" class="form-control w-100" required><option value="">เลือกประเภท</option><option>แมว</option><option>สุนัข</option><option>กระต่าย</option><option>นก</option><option>อื่นๆ</option></select></div>
              <div class="form-group col-md-6"><label>ชื่อสัตว์ *</label><input id="animalName" class="form-control" placeholder="เช่น ไมโล" required></div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6"><label>ชื่อผู้แจ้ง *</label><input id="reporterName" class="form-control" placeholder="ชื่อของคุณ" required></div>
              <div class="form-group col-md-6"><label>ติดต่อ *</label><input id="contact" class="form-control" placeholder="เบอร์โทร / LINE" required></div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6"><label>วันที่หาย *</label><input id="lostDate" type="date" class="form-control" required></div>
              <div class="form-group col-md-6"><label>รูป (ตัวอย่าง)</label><input type="file" class="form-control" accept="image/*"></div>
            </div>
            
            <div class="form-row">
              <div class="form-group col-md-4"><label>จังหวัด *</label><select id="province" class="form-control w-100" required><option value="">กำลังโหลด...</option></select></div>
              <div class="form-group col-md-4"><label>อำเภอ *</label><select id="amphure" class="form-control w-100" required><option value="">เลือกจังหวัดก่อน</option></select></div>
              <div class="form-group col-md-4"><label>ตำบล</label><select id="tambon" class="form-control w-100"><option value="">เลือกอำเภอก่อน</option></select></div>
            </div>
            <div class="form-group"><label>รายละเอียดเพิ่มเติม *</label><textarea id="details" class="form-control" rows="3" placeholder="สี ลักษณะ ปลอกคอ จุดสังเกต" required></textarea></div>
            <button type="submit" class="btn btn-primary">ส่งข้อมูลแจ้งสัตว์หาย</button>
            <a href="<?php echo e(route('home')); ?>" class="btn btn-outline-primary ml-2">กลับหน้าหลัก</a>
            <div class="alert alert-success mt-3" id="successMessage" style="display:none;">รับข้อมูลตัวอย่างแล้ว (ยังไม่ลง DB ตามกติกา DB เหมือนเดิม)</div>
          </form>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="widget category-list"><h4 class="widget-header">เมนูลัด</h4>
          <ul class="category-list"><li><a href="<?php echo e(route('pets')); ?>">ดูสัตว์หาย</a></li><li><a href="<?php echo e(route('clue')); ?>">แจ้งเบาะแส</a></li><li><a href="<?php echo e(route('about')); ?>">เกี่ยวกับเรา</a></li></ul>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
// โหลดจังหวัด/อำเภอ/ตำบลจาก JSON ฟรี
(function(){
  var P='https://raw.githubusercontent.com/kongvut/thai-province-data/refs/heads/master/api/latest/province.json';
  var D='https://raw.githubusercontent.com/kongvut/thai-province-data/refs/heads/master/api/latest/district.json';
  var S='https://raw.githubusercontent.com/kongvut/thai-province-data/refs/heads/master/api/latest/sub_district.json';
  var selP=document.getElementById('province'), selD=document.getElementById('amphure'), selT=document.getElementById('tambon');
  var districts=[], subs=[];
  fetch(P).then(r=>r.json()).then(function(provs){
    selP.innerHTML='<option value="">เลือกจังหวัด</option>';
    provs.forEach(function(p){ var o=document.createElement('option'); o.value=p.name.th; o.textContent=p.name.th; o.dataset.id=p.id; selP.appendChild(o); });
  }).catch(function(){ selP.innerHTML='<option value="">โหลดไม่สำเร็จ ใช้พิมพ์เอง</option>'; });
  fetch(D).then(r=>r.json()).then(function(d){ districts=d; });
  fetch(S).then(r=>r.json()).then(function(s){ subs=s; });
  selP.addEventListener('change', function(){
    var id=this.options[this.selectedIndex].dataset.id;
    selD.innerHTML='<option value="">เลือกอำเภอ</option>'; selT.innerHTML='<option value="">เลือกอำเภอก่อน</option>';
    districts.filter(function(d){ return String(d.province_id)===String(id); }).forEach(function(d){
      var o=document.createElement('option'); o.value=(d.prefix.th||'')+d.name.th; o.textContent=(d.prefix.th||'')+d.name.th; o.dataset.id=d.id; selD.appendChild(o);
    });
  });
  selD.addEventListener('change', function(){
    var id=this.options[this.selectedIndex].dataset.id;
    selT.innerHTML='<option value="">เลือกตำบล</option>';
    subs.filter(function(s){ return String(s.district_id)===String(id); }).forEach(function(s){
      var o=document.createElement('option'); o.value=(s.prefix.th||'')+s.name.th; o.textContent=(s.prefix.th||'')+s.name.th; selT.appendChild(o);
    });
  });
  var f=document.getElementById('reportForm');
  if(f){ f.addEventListener('submit', function(e){ e.preventDefault(); document.getElementById('successMessage').style.display='block'; f.scrollIntoView({behavior:'smooth'}); }); }
})();
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\nigger - Copy\resources\views/report.blade.php ENDPATH**/ ?>