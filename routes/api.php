<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// ประกาศสัตว์เลี้ยง (ข้อมูลจริงจาก DB) — เอามาแสดงผ่าน API ได้เลย
Route::get('/pets', function (Request $request) {
    $query = \App\Models\PetReport::query()->whereIn('status', ['lost', 'found']);
    if ($request->filled('q')) {
        $term = '%' . $request->q . '%';
        $query->where(fn ($q) => $q->where('pet_name', 'like', $term)->orWhere('description', 'like', $term)->orWhere('color', 'like', $term)->orWhere('breed', 'like', $term));
    }
    if ($request->filled('type')) $query->where('pet_type', $request->type);
    if ($request->filled('status')) $query->where('status', $request->status);
    if ($request->filled('location')) $query->where('location', 'like', '%' . $request->location . '%');
    return $query->latest()->paginate($request->integer('per_page', 9))->through(fn ($pet) => [
        'id' => $pet->id, 'pet_name' => $pet->pet_name, 'pet_type' => $pet->pet_type,
        'breed' => $pet->breed, 'color' => $pet->color, 'status' => $pet->status,
        'description' => $pet->description, 'location' => $pet->location,
        'last_seen_at' => optional($pet->last_seen_at)->toDateString(),
        'contact_name' => $pet->contact_name, 'contact_phone' => $pet->contact_phone,
        'photo_url' => $pet->photo_path ? asset('storage/' . $pet->photo_path) : null,
        'created_at' => $pet->created_at,
    ]);
});

Route::get('/pets/stats', fn () => [
    'lost' => \App\Models\PetReport::where('status', 'lost')->count(),
    'found' => \App\Models\PetReport::where('status', 'found')->count(),
    'closed' => \App\Models\PetReport::where('status', 'closed')->count(),
    'total' => \App\Models\PetReport::count(),
]);

// สถิติโรคสัตว์ BLV สวิตเซอร์แลนด์ (API ภายนอกที่เคยหายไป เอากลับมาแสดงผ่าน API เราเอง)
Route::get('/blv/stats', function (Request $request) {
    $svc = app(\App\Services\BlvAnimalHealthService::class);
    $rows = collect($svc->fetchRows());
    if ($request->filled('year')) $rows = $rows->where('year', (int) $request->year);
    if ($request->filled('canton')) $rows = $rows->where('canton', $request->canton);
    if ($request->filled('search')) {
        $s = mb_strtolower($request->search);
        $rows = $rows->filter(fn ($r) => mb_strpos(mb_strtolower(json_encode($r, JSON_UNESCAPED_UNICODE)), $s) !== false);
    }
    $rows = $rows->values();
    return [
        'source' => 'FSVO Switzerland via ' . \App\Services\BlvAnimalHealthService::DESCRIPTOR_URL,
        'total' => $rows->count(),
        'grand_count' => $rows->sum('count'),
        'sample' => $rows->take(50)->values(),
    ];
});
