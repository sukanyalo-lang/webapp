@extends('template.backend.master')
@section('content')
    @php
        $memberTotal = \App\Models\User::count();
        $reportTotal = \App\Models\PetReport::count();
        $lostTotal = \App\Models\PetReport::where('status', 'lost')->count();
        $recentReports = \App\Models\PetReport::latest()->take(5)->get();
        $dailyReports = \App\Models\PetReport::where('created_at', '>=', now()->subDays(6)->startOfDay())
            ->selectRaw('DATE(created_at) as day, COUNT(*) as total')
            ->groupBy('day')
            ->pluck('total', 'day');
        $chartMax = max(1, $dailyReports->max() ?? 0);
    @endphp
    <div class="mb-4">
        <span class="small text-muted">Pet Finder / ภาพรวม</span>
        <h2 class="mb-1">แดชบอร์ด</h2>
        <p class="text-muted mb-0">ยินดีต้อนรับ {{ auth()->user()->name }} ดูแลชุมชนและช่วยกันพาน้องกลับบ้าน</p>
    </div>
    <div class="row">
        <div class="col-md-4"><a class="card pf-metric" href="{{ route('users') }}">
                <div class="card-body d-flex align-items-center"><span class="pf-metric-icon"><i class="mdi mdi-account-group"
                            aria-hidden="true"></i></span>
                    <div>
                        <p class="mb-1">สมาชิกทั้งหมด</p>
                        <h3 class="mb-0">{{ number_format($memberTotal) }} <small>คน</small></h3>
                    </div>
                </div>
            </a></div>
        <div class="col-md-4"><a class="card pf-metric" href="{{ route('pet-reports') }}">
                <div class="card-body d-flex align-items-center"><span class="pf-metric-icon green"><i
                            class="mdi mdi-clipboard-text-outline" aria-hidden="true"></i></span>
                    <div>
                        <p class="mb-1">ประกาศทั้งหมด</p>
                        <h3 class="mb-0">{{ number_format($reportTotal) }} <small>รายการ</small></h3>
                    </div>
                </div>
            </a></div>
        <div class="col-md-4"><a class="card pf-metric" href="{{ route('pets', ['status' => 'lost']) }}">
                <div class="card-body d-flex align-items-center"><span class="pf-metric-icon red"><i
                            class="mdi mdi-bell-outline" aria-hidden="true"></i></span>
                    <div>
                        <p class="mb-1">ประกาศที่รอความช่วยเหลือ</p>
                        <h3 class="mb-0">{{ number_format($lostTotal) }} <small>รายการ</small></h3>
                    </div>
                </div>
            </a></div>
    </div>
    <div class="row">
        <div class="col-xl-7">
            <section class="card">
                <div class="card-header">
                    <h5 class="mb-1">สถิติการลงประกาศ</h5>
                    <p class="small mb-0">จำนวนประกาศใหม่ในช่วง 7 วันที่ผ่านมา</p>
                </div>
                <div class="card-body">
                    <div class="pf-chart" role="img"
                        aria-label="จำนวนประกาศใหม่ 7 วัน: @for ($i = 6; $i >= 0; $i--) {{ now()->subDays($i)->format('d/m') }} {{ $dailyReports->get(now()->subDays($i)->toDateString(), 0) }} รายการ; @endfor">
                        @for ($i = 6; $i >= 0; $i--)
                            @php($date = now()->subDays($i))
                            @php($count = $dailyReports->get($date->toDateString(), 0))
                            <div class="pf-chart-column"><span>{{ $count }}</span>
                                <div class="pf-chart-track">
                                    <div class="pf-chart-bar" style="height:{{ ($count / $chartMax) * 100 }}%"></div>
                                </div><small>{{ $date->format('d/m') }}</small>
                            </div>
                        @endfor
                    </div>
                </div>
            </section>
        </div>
        <div class="col-xl-5">
            <section class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">ประกาศล่าสุด</h5><a class="small" href="{{ route('pet-reports') }}">ดูทั้งหมด →</a>
                </div>
                <div class="card-body pf-recent-list">
                    @forelse($recentReports as $report)
                        <a class="pf-recent-report" href="{{ route('pets', ['q' => $report->pet_name]) }}">
                            <div class="pf-recent-photo">
                                @if ($report->photo_path)
                                    <img src="{{ asset('storage/' . $report->photo_path) }}"
                                    alt="{{ $report->pet_name }}">@else<i class="mdi mdi-paw" aria-hidden="true"></i>
                                @endif
                            </div>
                            <div class="pf-recent-copy">
                                <strong>{{ $report->pet_name }}</strong><small>{{ $report->created_at->format('d/m/') }}{{ $report->created_at->year + 543 }}</small>
                            </div><span
                                class="badge badge-{{ $report->status === 'lost' ? 'danger' : ($report->status === 'found' ? 'success' : 'secondary') }}">{{ ['lost' => 'สัตว์หาย', 'found' => 'พบแล้ว', 'closed' => 'ปิดประกาศ'][$report->status] ?? $report->status }}</span>
                        </a>
                    @empty
                        <p class="text-center py-4 mb-0">ยังไม่มีประกาศในระบบ</p>
                    @endforelse
                </div>
            </section>
        </div>
    </div>
@endsection
