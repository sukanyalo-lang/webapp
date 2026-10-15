@extends('template.frontend.master')
@section('content')
<section class="login py-5"><div class="container"><div class="row justify-content-center"><div class="col-lg-5 col-md-8"><div class="border">
<h3>ยินดีต้อนรับกลับมา 🐾</h3>
<form method="POST" action="{{ route('login') }}">@csrf
<fieldset class="p-4"><p class="pf-auth-intro">เข้าสู่ระบบ Pet Finder เพื่อจัดการประกาศและช่วยกันพาน้องกลับบ้าน</p>
@if(session('status'))<div class="alert alert-success" role="status">{{ session('status') }}</div>@endif
@if($errors->any())<div class="alert alert-danger" role="alert"><ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
<label for="login-email">อีเมล</label><input id="login-email" class="form-control mb-3" type="email" name="email" placeholder="example@email.com" value="{{ old('email') }}" required autofocus autocomplete="username">
<label for="login-password">รหัสผ่าน</label><input id="login-password" class="form-control mb-3" type="password" name="password" placeholder="กรอกรหัสผ่านของคุณ" required autocomplete="current-password">
<div class="d-flex justify-content-between align-items-center"><label class="mb-0" for="remember"><input type="checkbox" id="remember" name="remember" @checked(old('remember'))> จดจำฉัน</label>@if(Route::has('password.request'))<a class="small" href="{{ route('password.request') }}">ลืมรหัสผ่าน?</a>@endif</div>
<button type="submit" class="btn btn-primary mt-4">เข้าสู่ระบบ</button><p class="small text-center mt-4 mb-0">ยังไม่มีบัญชี? <a href="{{ route('register') }}">สมัครสมาชิก</a></p>
</fieldset></form></div></div></div></div></section>
@endsection
