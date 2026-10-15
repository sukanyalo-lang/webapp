<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ลืมรหัสผ่าน | Pet Finder</title>
<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:'IBM Plex Sans Thai',sans-serif}
body{background:#F8F7F5;color:#45423D;min-height:100vh}
nav{background:#fff;padding:18px 7%;display:flex;justify-content:space-between;align-items:center;border-bottom:1px solid #EAE8E4}
.logo{font-size:24px;font-weight:700;color:#45423D;text-decoration:none}
.nav-links{display:flex;gap:24px;align-items:center}
.nav-links a{text-decoration:none;color:#68635B;font-size:14px}
.container{min-height:calc(100vh - 75px);display:flex;justify-content:center;align-items:center;padding:40px 20px}
.card{background:#fff;width:100%;max-width:440px;padding:36px;border:1px solid #EAE8E4;border-radius:16px;box-shadow:0 8px 30px rgba(69,66,61,.06)}
.icon{width:60px;height:60px;background:#F0EDE7;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:29px;margin:0 auto 18px}
h1{text-align:center;font-size:24px;margin-bottom:8px}
.subtitle{text-align:center;color:#89847D;font-size:14px;margin-bottom:24px;line-height:1.9}
label{display:block;font-size:14px;font-weight:500;margin-bottom:7px}
input{width:100%;padding:12px 14px;border:1px solid #DCD8D1;border-radius:8px;outline:none;font-size:14px}
input:focus{border-color:#A18B70;box-shadow:0 0 0 3px rgba(161,139,112,.12)}
.err{background:#FCEDEC;color:#A33B32;padding:12px;border-radius:8px;margin-bottom:18px;font-size:13px}
.err ul{margin:0;padding-left:18px}
.status{background:#EDF4E8;color:#49613D;padding:12px;border-radius:8px;margin-bottom:18px;font-size:13px}
.btn{width:100%;padding:13px;background:#45423D;color:#fff;border:none;border-radius:8px;font-size:15px;font-weight:600;cursor:pointer;margin-top:14px}
.btn:hover{background:#625B50}
.back{text-align:center;margin-top:20px;font-size:14px}
.back a{color:#45423D;font-weight:600;text-decoration:none}
</style>
</head>
<body>
<nav>
<a href="{{ url('/') }}" class="logo">🐾 Pet Finder</a>
<div class="nav-links">
<a href="{{ url('/') }}">หน้าหลัก</a>
<a href="{{ route('login') }}">เข้าสู่ระบบ</a>
<a href="{{ route('register') }}">สมัครสมาชิก</a>
</div>
</nav>
<div class="container">
<div class="card">
<div class="icon">🔑</div>
<h1>ลืมรหัสผ่าน?</h1>
<p class="subtitle">กรอกอีเมลที่สมัครไว้ ระบบจะส่งลิงก์ตั้งรหัสผ่านใหม่ให้ (Fortify + Jetstream)</p>
@if(session('status'))
<div class="status">{{ session('status') }}</div>
@endif
@if($errors->any())
<div class="err"><ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
@endif
<form method="POST" action="{{ route('password.email') }}">
@csrf
<label for="email">อีเมล</label>
<input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="example@email.com" required autofocus>

<button type="submit" class="btn">ส่งลิงก์รีเซ็ตรหัสผ่าน</button>
</form>
<p class="back"><a href="{{ route('login') }}">← กลับไปเข้าสู่ระบบ</a></p>
</div>
</div>
</body>
</html>

