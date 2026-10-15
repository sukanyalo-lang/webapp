@extends('template.frontend.master')
@section('content')
    <section class="section">
        <div class="container">
            <h2 class="font-weight-bold mb-2">ประกาศของฉัน</h2>
            <p class="text-muted">จัดการสถานะหรือลบประกาศที่คุณสร้างไว้</p>
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>รูป</th>
                            <th>สัตว์เลี้ยง</th>
                            <th>สถานที่</th>
                            <th>สถานะ</th>
                            <th>จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pets as $pet)
                            <tr>
                                <td style="width:70px">
                                    @if ($pet->photo_path)
                                        <img src="{{ asset('storage/' . $pet->photo_path) }}" alt="{{ $pet->pet_name }}"
                                        style="width:60px;height:60px;object-fit:cover;border-radius:10px">@else<span
                                            class="text-muted"><i class="fa fa-paw"></i></span>
                                    @endif
                                </td>
                                <td><strong>{{ $pet->pet_name }}</strong><br><small class="text-muted">{{ $pet->pet_type }}
                                        @if ($pet->breed)
                                            · {{ $pet->breed }}
                                        @endif{{ $pet->color ? ' · ' . $pet->color : '' }}
                                    </small>
                                    @if ($pet->last_seen_at)
                                        <br><small class="text-muted">พบเห็น:
                                            {{ $pet->last_seen_at->format('d/m/Y') }}</small>
                                    @endif
                                </td>
                                <td>{{ $pet->location }}</td>
                                <td>
                                    <form method="POST" action="{{ route('my-reports.status', $pet) }}">@csrf
                                        @method('PATCH')<select name="status" class="form-control"
                                            onchange="this.form.submit()">
                                            <option value="lost" @selected($pet->status === 'lost')>สัตว์หาย</option>
                                            <option value="found" @selected($pet->status === 'found')>พบสัตว์</option>
                                            <option value="closed" @selected($pet->status === 'closed')>ปิดประกาศ</option>
                                        </select></form>
                                </td>
                                <td>
                                    <form method="POST" action="{{ route('my-reports.destroy', $pet) }}"
                                        onsubmit="return confirm('ยืนยันลบประกาศนี้?')">@csrf @method('DELETE')<button
                                            class="btn btn-sm btn-danger">ลบ</button></form>
                                </td>
                        </tr>@empty<tr>
                                <td colspan="5" class="text-center text-muted p-4">คุณยังไม่มีประกาศ <a
                                        href="{{ route('report') }}">ลงประกาศแรก</a></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>{{ $pets->links() }}
        </div>
    </section>
@endsection
