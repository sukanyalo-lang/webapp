<?php

namespace App\Http\Livewire;

use App\Models\DiseaseReport;
use App\Services\BlvAnimalHealthService;
use Livewire\Component;
use Livewire\WithPagination;

class DiseaseReportCrud extends Component
{
    use WithPagination;

    public $reportId;
    public $year;
    public $canton;
    public $diseases_group;
    public $diseases;
    public $species;
    public $count;
    public $notes;
    public $message = '';
    public $search = '';

    protected $rules = [
        'year'           => 'required|integer|min:1990|max:2030',
        'canton'         => 'required|string|max:10',
        'diseases_group' => 'nullable|string|max:255',
        'diseases'       => 'required|string|max:255',
        'species'        => 'nullable|string|max:255',
        'count'          => 'required|integer|min:0',
        'notes'          => 'nullable|string',
    ];

    protected $messages = [
        'year.required' => 'กรุณากรอกปี',
        'canton.required' => 'กรุณากรอก canton',
        'diseases.required' => 'กรุณากรอกชื่อโรค',
        'count.required' => 'กรุณากรอกจำนวน',
    ];

    // ดัดแปลงจาก AnnouncementCrud::importFromApi (Dog API -> BLV CSV)
    // เดิม: Http::withHeaders(['x-api-key' => ...])->get('https://api.thedogapi.com/v1/breeds')
    // ใหม่: ไม่ต้องใช้ API key, ดึง descriptor.json -> csv path -> parse CSV
    public function importFromApi()
    {
        $service = app(BlvAnimalHealthService::class);
        $rows = $service->fetchRows(false);

        if (empty($rows)) {
            // fallback: ลองดึงสดอีกรอบแบบไม่ใช้ cache
            $rows = $service->fetchFreshRows();
        }

        if (empty($rows)) {
            $this->message = 'ดึงข้อมูลจาก BLV ไม่สำเร็จ ตรวจสอบอินเทอร์เน็ตแล้วลองใหม่';
            return;
        }

        $count = 0;
        // นำเข้าแค่ 500 แถวล่าสุดกัน DB บวม (โครงงานพรีเซนต์พอ)
        $rows = array_slice(array_reverse($rows), 0, 500);

        foreach ($rows as $r) {
            if (empty($r['diseases'])) {
                continue;
            }
            $hash = BlvAnimalHealthService::apiHash($r);

            // มี api_hash นี้แล้ว = ไม่ทับข้อมูลที่เราแก้ไว้ (เหมือน api_id เดิม)
            $model = DiseaseReport::firstOrCreate(
                ['api_hash' => $hash],
                [
                    'year'           => $r['year'],
                    'canton'         => $r['canton'],
                    'diseases_group' => $r['diseases_group'],
                    'diseases'       => $r['diseases'],
                    'species'        => $r['species'],
                    'count'          => $r['count'],
                ]
            );
            if ($model->wasRecentlyCreated) {
                $count++;
            }
        }

        // refresh cache สถิติด้วย
        $service->clearCache();

        $this->message = "นำเข้าจาก BLV ใหม่ {$count} รายการ";
    }

    public function save()
    {
        $this->validate();

        DiseaseReport::updateOrCreate(['id' => $this->reportId], [
            'year'           => $this->year,
            'canton'         => strtoupper($this->canton),
            'diseases_group' => $this->diseases_group,
            'diseases'       => $this->diseases,
            'species'        => $this->species,
            'count'          => $this->count,
            'notes'          => $this->notes,
        ]);

        $this->reset(['reportId', 'year', 'canton', 'diseases_group', 'diseases', 'species', 'count', 'notes']);
        $this->message = 'บันทึกแล้ว';
    }

    public function edit($id)
    {
        $a = DiseaseReport::findOrFail($id);
        $this->reportId      = $a->id;
        $this->year          = $a->year;
        $this->canton        = $a->canton;
        $this->diseases_group = $a->diseases_group;
        $this->diseases      = $a->diseases;
        $this->species       = $a->species;
        $this->count         = $a->count;
        $this->notes         = $a->notes;
        $this->message = '';
    }

    public function cancel()
    {
        $this->reset(['reportId', 'year', 'canton', 'diseases_group', 'diseases', 'species', 'count', 'notes']);
        $this->message = '';
    }

    public function delete($id)
    {
        DiseaseReport::destroy($id);
        $this->message = 'ลบแล้ว';
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = DiseaseReport::query();
        if ($this->search !== '') {
            $s = '%' . $this->search . '%';
            $query->where(function ($q) use ($s) {
                $q->where('diseases', 'like', $s)
                  ->orWhere('species', 'like', $s)
                  ->orWhere('canton', 'like', $s)
                  ->orWhere('diseases_group', 'like', $s)
                  ->orWhere('year', 'like', $s);
            });
        }

        return view('livewire.disease-report-crud', [
            'items' => $query->latest()->paginate(10),
            'totalAll' => DiseaseReport::count(),
        ]);
    }
}
