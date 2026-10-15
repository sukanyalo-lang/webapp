 
<?php $__env->startSection('content'); ?>

<section class="ad-listing section">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="border p-4">
          <h3 class="bg-gray p-3 mb-3">แจ้งเบาะแสสัตว์หาย</h3>
          <p class="text-muted">พบเห็นสัตว์ตรงกับประกาศ? แจ้งได้เลย (ตัวอย่างโครงงาน)</p>
          <form id="clueForm">
            <div class="form-group"><label>ประเภทการแจ้ง *</label><select class="form-control w-100" required><option value="">เลือกประเภท</option><option>พบเห็นสัตว์เลี้ยง</option><option>พบเบาะแสสัตว์ที่หาย</option></select></div>
            <div class="form-row">
              <div class="form-group col-md-6"><label>ประเภทสัตว์ *</label><select class="form-control w-100" required><option value="">เลือกประเภท</option><option>แมว</option><option>สุนัข</option><option>กระต่าย</option><option>นก</option><option>อื่นๆ</option></select></div>
              <div class="form-group col-md-6"><label>ชื่อสัตว์ (ถ้าทราบ)</label><input class="form-control" placeholder="เช่น ไมโล"></div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6"><label>วันที่พบ *</label><input type="date" class="form-control" required></div>
              <div class="form-group col-md-6"><label>เวลา</label><input type="time" class="form-control"></div>
            </div>
            <div class="form-group"><label>สถานที่พบ *</label><input class="form-control" placeholder="จังหวัด ถนน สถานที่ใกล้เคียง" required></div>
            <div class="form-group"><label>รายละเอียด *</label><textarea class="form-control" rows="3" placeholder="สี ขนาด ลักษณะเด่น ทิศทางที่พบ" required></textarea></div>
            <div class="form-row">
              <div class="form-group col-md-6"><label>ชื่อผู้แจ้ง *</label><input class="form-control" placeholder="ชื่อของคุณ" required></div>
              <div class="form-group col-md-6"><label>ติดต่อ *</label><input class="form-control" placeholder="เบอร์โทร / LINE" required></div>
            </div>
            <button type="submit" class="btn btn-primary">ส่งข้อมูลเบาะแส</button>
            <a href="<?php echo e(route('home')); ?>" class="btn btn-outline-primary ml-2">กลับหน้าหลัก</a>
            <div class="alert alert-success mt-3" id="successMessage" style="display:none;">รับข้อมูลตัวอย่างแล้ว (ยังไม่ลง DB)</div>
          </form>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="widget category-list"><h4 class="widget-header">เคล็ดลับ</h4>
          <ul class="category-list"><li><a href="<?php echo e(route('pets')); ?>">ดูสัตว์หายก่อนแจ้ง</a></li><li><a href="<?php echo e(route('report')); ?>">แจ้งสัตว์หาย</a></li></ul>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
document.getElementById('clueForm').addEventListener('submit', function(e){ e.preventDefault(); document.getElementById('successMessage').style.display='block'; });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\nigger\resources\views/clue.blade.php ENDPATH**/ ?>