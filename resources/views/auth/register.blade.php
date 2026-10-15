@extends('template.frontend.master')
@section('content')
<section class="login py-5"><div class="container"><div class="row justify-content-center"><div class="col-lg-5 col-md-8"><div class="border">
<h3>มาเป็นส่วนหนึ่งของ Pet Finder</h3>
<form method="POST" action="{{ route('register') }}" id="registerForm">@csrf
<fieldset class="p-4"><p class="pf-auth-intro">ทุกการช่วยเหลือมีความหมาย เริ่มต้นช่วยน้องๆ กลับบ้านไปด้วยกัน</p>
@if($errors->any())<div class="alert alert-danger" role="alert"><ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
<label for="register-name">ชื่อผู้ใช้งาน</label><input id="register-name" class="form-control mb-3" type="text" name="name" placeholder="ชื่อที่ต้องการให้แสดง" value="{{ old('name') }}" required autofocus autocomplete="name">
<label for="register-email">อีเมล</label><input id="register-email" class="form-control mb-3" type="email" name="email" placeholder="example@email.com" value="{{ old('email') }}" required autocomplete="email">
<label for="password">รหัสผ่าน</label><input class="form-control mb-3" type="password" id="password" name="password" placeholder="อย่างน้อย 8 ตัวอักษร" minlength="8" required autocomplete="new-password">
<label for="password_confirmation">ยืนยันรหัสผ่าน</label><input class="form-control mb-3" type="password" id="password_confirmation" name="password_confirmation" placeholder="กรอกรหัสผ่านอีกครั้ง" minlength="8" required autocomplete="new-password">
<button type="submit" class="btn btn-primary mt-2">สมัครสมาชิก</button><p class="small text-center mt-4 mb-0">มีบัญชีแล้ว? <a href="{{ route('login') }}">เข้าสู่ระบบ</a></p>
</fieldset></form></div></div></div></div></section>
<script>
(function(){var form=document.getElementById('registerForm'),password=document.getElementById('password'),confirmation=document.getElementById('password_confirmation');function validate(){confirmation.setCustomValidity(password.value===confirmation.value?'':'รหัสผ่านทั้งสองช่องไม่ตรงกัน');}password.addEventListener('input',validate);confirmation.addEventListener('input',validate);form.addEventListener('submit',validate);})();
</script>
@endsection
