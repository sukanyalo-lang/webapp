@extends('template.frontend.master') {{-- ครอบ Classimax --}}
@section('content')
    <section class="login py-5 border-top-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8 align-items-center">
                    <div class="border">
                        <h3 class="bg-gray p-4">ตั้งรหัสผ่านใหม่</h3>
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ request()->route('token') }}">
                            <fieldset class="p-4">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $e)
                                                <li>{{ $e }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <input class="form-control mb-3" type="email" name="email" placeholder="อีเมล*"
                                    value="{{ old('email', request()->email) }}" required autofocus autocomplete="username">
                                <input class="form-control mb-3" type="password" name="password"
                                    placeholder="รหัสผ่านใหม่ (8+ ตัว)*" required autocomplete="new-password">
                                <input class="form-control mb-3" type="password" name="password_confirmation"
                                    placeholder="ยืนยันรหัสผ่าน*" required autocomplete="new-password">

                                <button type="submit" class="btn btn-primary font-weight-bold mt-3">บันทึกรหัสผ่านใหม่</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection