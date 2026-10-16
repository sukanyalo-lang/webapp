
<?php

namespace App\Http\Controllers;

use App\Models\PetReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PetReportController extends Controller
{
    /**
     * แสดงรายการสัตว์เลี้ยง
     * รองรับการค้นหาและการกรองข้อมูล
     */
    public function index(Request $request)
    {
        $query = PetReport::query()
            ->whereIn('status', ['lost', 'found']);

        // ค้นหาจากชื่อ รายละเอียด สี และสายพันธุ์
        if ($request->filled('q')) {
            $term = '%' . $request->q . '%';

            $query->where(function ($q) use ($term) {
                $q->where('pet_name', 'like', $term)
                    ->orWhere('description', 'like', $term)
                    ->orWhere('color', 'like', $term)
                    ->orWhere('breed', 'like', $term);
            });
        }

        // กรองประเภทสัตว์
        if ($request->filled('type')) {
            $query->where('pet_type', $request->type);
        }

        // กรองสถานะ
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // กรองสถานที่
        if ($request->filled('location')) {
            $query->where(
                'location',
                'like',
                '%' . $request->location . '%'
            );
        }

        $pets = $query->latest()->paginate(9)->withQueryString();

        return view('pets', compact('pets'));
    }

    /**
     * แสดงหน้าแบบฟอร์มแจ้งสัตว์หายหรือพบสัตว์
     */
    public function create()
    {
        return view('report');
    }

    /**
     * บันทึกประกาศใหม่
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'pet_name' => 'required|string|max:100',
            'pet_type' => 'required|in:แมว,สุนัข,นก,กระต่าย,อื่นๆ',
            'breed' => 'nullable|string|max:100',
            'color' => 'nullable|string|max:100',
            'status' => 'required|in:lost,found',
            'description' => 'required|string|max:3000',
            'location' => 'required|string|max:255',
            'last_seen_at' => 'nullable|date|before_or_equal:today',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'contact_name' => 'required|string|max:100',
            'contact_phone' => 'required|string|max:30',
        ]);

        // บันทึก ID ของผู้ใช้ที่เข้าสู่ระบบ
        $data['user_id'] = $request->user()->id;

        // อัปโหลดรูปภาพลง storage/app/public/pet-reports
        if ($request->hasFile('photo')) {
            $data['photo_path'] = $request->file('photo')
                ->store('pet-reports', 'public');
        }

        // ไม่ส่งฟิลด์ photo ซึ่งเป็นไฟล์เข้าไปบันทึกในฐานข้อมูล
        unset($data['photo']);

        // สร้างประกาศ
        PetReport::create($data);

        return redirect()
            ->route('pets')
            ->with('success', 'บันทึกประกาศเรียบร้อยแล้ว');
    }

    /**
     * แสดงประกาศของผู้ใช้ที่เข้าสู่ระบบ
     */
    public function myReports(Request $request)
    {
        $pets = PetReport::where('user_id', $request->user()->id)
            ->latest()
            ->paginate(10);

        return view('my-reports', compact('pets'));
    }

    /**
     * เปลี่ยนสถานะประกาศ
     */
    public function updateStatus(
        Request $request,
        PetReport $petReport
    ) {
        // อนุญาตเฉพาะเจ้าของประกาศ
        abort_unless(
            $request->user()->id === $petReport->user_id,
            403
        );

        $data = $request->validate([
            'status' => 'required|in:lost,found,closed',
        ]);

        $petReport->update($data);

        return back()->with('success', 'อัปเดตสถานะแล้ว');
    }

    /**
     * ลบประกาศและรูปภาพ
     */
    public function destroy(
        Request $request,
        PetReport $petReport
    ) {
        // อนุญาตเฉพาะเจ้าของประกาศ
        abort_unless(
            $request->user()->id === $petReport->user_id,
            403
        );

        // ลบไฟล์จาก storage/app/public
        if ($petReport->photo_path) {
            Storage::disk('public')->delete(
                $petReport->photo_path
            );
        }

        // ลบข้อมูลประกาศ
        $petReport->delete();

        return back()->with('success', 'ลบประกาศแล้ว');
    }
}