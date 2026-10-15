@extends('template.frontend.master') {{-- ครอบ Classimax --}}
@section('content')
    <section class="login py-5 border-top-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8 align-items-center">
                    <div class="border">
                        <h3 class="bg-gray p-4">ลืมรหัสผ่าน</h3>
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <fieldset class="p-4">
                                <p class="mb-3 text-muted">
                                    ลืมรหัสผ่านใช่ไหม? กรอกอีเมลที่สมัครไว้ ระบบจะส่งลิงก์สำหรับตั้งรหัสผ่านใหม่ให้ทางอีเมล
                                </p>

                                {{-- ข้อความสถานะ (ส่งลิงก์สำเร็จ) --}}
                                @if (session('status'))
                                    <div class="alert alert-success">{{ session('status') }}</div>
                                @endif

                                {{-- ข้อผิดพลาด --}}
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $e)
                                                <li>{{ $e }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <label for="email" class="font-weight-bold">อีเมล</label>
                                <input id="email" class="form-control mb-3" type="email" name="email"
                                    placeholder="อีเมล*" value="{{ old('email') }}" required autofocus>

                                <button type="submit" class="btn btn-primary font-weight-bold mt-3">
                                    ส่งลิงก์รีเซ็ตรหัสผ่าน
                                </button>
                                <a class="mt-3 d-block text-primary" href="{{ route('login') }}">← กลับไปเข้าสู่ระบบ</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection