<?php

namespace App\Http\Controllers;

use App\Models\PetReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PetReportController extends Controller
{
    public function index(Request $request)
    {
        $query = PetReport::query()->whereIn('status', ['lost', 'found']);
        if ($request->filled('q')) {
            $term = '%' . $request->q . '%';
            $query->where(function ($q) use ($term) {
                $q->where('pet_name', 'like', $term)
                  ->orWhere('description', 'like', $term)
                  ->orWhere('color', 'like', $term)
                  ->orWhere('breed', 'like', $term);
            });
        }
        if ($request->filled('type')) $query->where('pet_type', $request->type);
        if ($request->filled('status')) $query->where('status', $request->status);
        if ($request->filled('location')) $query->where('location', 'like', '%' . $request->location . '%');

        return view('pets', ['pets' => $query->latest()->paginate(9)->withQueryString()]);
    }

    public function create()
    {
        return view('report');
    }

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

        $data['user_id'] = $request->user()->id;
        if ($request->hasFile('photo')) {
            $data['photo_path'] = $request->file('photo')->store('pet-reports', 'public');
        }
        unset($data['photo']);
        PetReport::create($data);

        return redirect()->route('pets')->with('success', 'บันทึกประกาศเรียบร้อยแล้ว');
    }

    public function myReports(Request $request)
    {
        return view('my-reports', [
            'pets' => PetReport::where('user_id', $request->user()->id)->latest()->paginate(10),
        ]);
    }

    public function updateStatus(Request $request, PetReport $petReport)
    {
        abort_unless($request->user()->id === $petReport->user_id, 403);
        $data = $request->validate(['status' => 'required|in:lost,found,closed']);
        $petReport->update($data);
        return back()->with('success', 'อัปเดตสถานะแล้ว');
    }

    public function destroy(Request $request, PetReport $petReport)
    {
        abort_unless($request->user()->id === $petReport->user_id, 403);
        if ($petReport->photo_path) Storage::disk('public')->delete($petReport->photo_path);
        $petReport->delete();
        return back()->with('success', 'ลบประกาศแล้ว');
    }
}
