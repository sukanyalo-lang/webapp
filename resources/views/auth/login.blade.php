@extends('template.frontend.master') {{-- ครอบ Classimax --}}
@section('content')
{{-- ฟอร์มล็อกอิน Classimax --}}
<section class="login py-5 border-top-1">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-5 col-md-8 align-item-center">
        <div class="border">
          <h3 class="bg-gray p-4">เข้าสู่ระบบ Pet Finder</h3>
          <form method="POST" action="{{ route('login') }}">
            @csrf {{-- กัน CSRF --}}
            <fieldset class="p-4">
              @if(session('status'))<div class="alert alert-success">{{ session('status') }}</div>@endif
              @if($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif
              <input class="form-control mb-3" type="email" name="email" placeholder="อีเมล*" value="{{ old('email') }}" required autofocus autocomplete="username">
              <input class="form-control mb-3" type="password" name="password" placeholder="รหัสผ่าน*" required autocomplete="current-password">
              <div class="loggedin-forgot">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember" class="pt-3 pb-2">จดจำฉัน</label>
              </div>
              <button type="submit" class="btn btn-primary font-weight-bold mt-3">เข้าสู่ระบบ</button>
              @if(Route::has('password.request'))
              <a class="mt-3 d-block text-primary" href="{{ route('password.request') }}">ลืมรหัสผ่าน?</a>
              @endif
              <a class="mt-3 d-inline-block text-primary" href="{{ route('register') }}">สมัครสมาชิก</a>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

