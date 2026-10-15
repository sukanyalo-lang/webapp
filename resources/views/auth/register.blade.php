<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>สมัครสมาชิก | Pet Finder</title>
<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:'IBM Plex Sans Thai',sans-serif}
body{background:#F8F7F5;color:#45423D;min-height:100vh}
nav{background:#fff;padding:18px 7%;display:flex;justify-content:space-between;align-items:center;border-bottom:1px solid #EAE8E4}
.logo{font-size:24px;font-weight:700;color:#45423D;text-decoration:none}
.nav-links{display:flex;gap:24px;align-items:center}
.nav-links a{text-decoration:none;color:#68635B;font-size:14px}
.login-link{border:1px solid #D8D3CB;padding:8px 18px;border-radius:8px}
.container{min-height:calc(100vh - 75px);display:flex;justify-content:center;align-items:center;padding:40px 20px}
.register-card{background:#fff;width:100%;max-width:460px;padding:36px;border:1px solid #EAE8E4;border-radius:16px;box-shadow:0 8px 30px rgba(69,66,61,.06)}
.icon{width:60px;height:60px;background:#F0EDE7;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:29px;margin:0 auto 18px}
h1{text-align:center;font-size:27px;margin-bottom:8px}
.subtitle{text-align:center;color:#89847D;font-size:14px;margin-bottom:28px}
.form-group{margin-bottom:17px}
label{display:block;font-size:14px;font-weight:500;margin-bottom:7px}
input{width:100%;padding:12px 14px;border:1px solid #DCD8D1;border-radius:8px;outline:none;font-size:14px;background:#fff}
input:focus{border-color:#A18B70;box-shadow:0 0 0 3px rgba(161,139,112,.12)}
.hint{color:#89847D;font-size:12px;margin-top:5px}
.err{background:#FCEDEC;color:#A33B32;padding:12px;border-radius:8px;margin-bottom:18px;font-size:13px}
.err ul{margin:0;padding-left:18px}
.register-btn{width:100%;padding:13px;background:#45423D;color:#fff;border:none;border-radius:8px;font-size:15px;font-weight:600;cursor:pointer}
.register-btn:hover{background:#625B50}
.login-text{text-align:center;margin-top:22px;font-size:14px;color:#89847D}
.login-text a{color:#45423D;font-weight:600;text-decoration:none}
</style>
</head>
<body>
<nav>
<a href="{{ url('/') }}" class="logo">🐾 Pet Finder</a>
<div class="nav-links">
<a href="{{ url('/') }}">หน้าหลัก</a>
<a href="{{ url('/pets') }}">สัตว์เลี้ยง</a>
<a href="{{ url('/disease-stats') }}">สถิติโรคสัตว์</a>
<a href="{{ route('login') }}" class="login-link">เข้าสู่ระบบ</a>
</div>
</nav>
<div class="container">
<div class="register-card">
<div class="icon">🐾</div>
<h1>สร้างบัญชีใหม่</h1>
<p class="subtitle">สมัครสมาชิก Pet Finder เพื่อช่วยเหลือสัตว์เลี้ยง</p>
@if($errors->any())
<div class="err"><ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
@endif
<form method="POST" action="{{ route('register') }}" id="registerForm">
@csrf
<div class="form-group">
<label for="name">ชื่อผู้ใช้งาน</label>
<input type="text" id="name" name="name" placeholder="กรอกชื่อของคุณ" autocomplete="name" value="{{ old('name') }}" required autofocus>
</div>
<div class="form-group">
<label for="email">อีเมล</label>
<input type="email" id="email" name="email" placeholder="example@email.com" autocomplete="email" value="{{ old('email') }}" required>
</div>
<div class="form-group">
<label for="password">รหัสผ่าน</label>
<input type="password" id="password" name="password" placeholder="อย่างน้อย 8 ตัวอักษร" autocomplete="new-password" required>
<p class="hint">ควรใช้รหัสผ่านที่คาดเดาได้ยาก</p>
</div>
<div class="form-group">
<label for="password_confirmation">ยืนยันรหัสผ่าน</label>
<input type="password" id="password_confirmation" name="password_confirmation" placeholder="กรอกรหัสผ่านอีกครั้ง" autocomplete="new-password" required>
</div>
<button type="submit" class="register-btn">สมัครสมาชิก</button>
</form>
<p class="login-text">มีบัญชีอยู่แล้ว? <a href="{{ route('login') }}">เข้าสู่ระบบ</a></p>
</div>
</div>
<script>
document.getElementById('registerForm').addEventListener('submit', function(e){
var p=document.getElementById('password').value;
var c=document.getElementById('password_confirmation').value;
if(p!==c){ e.preventDefault(); alert('รหัสผ่านทั้งสองช่องไม่ตรงกัน กรุณาตรวจสอบอีกครั้ง'); }
});
</script>
</body>
</html>
