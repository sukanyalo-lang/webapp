<?php

namespace App\Http\Livewire;

use App\Models\PetReport;
use Livewire\Component;
use Livewire\WithPagination;

class PetReportCrud extends Component
{
    use WithPagination;

    public $reportId, $pet_name, $pet_type = 'แมว', $breed, $color, $status = 'lost';
    public $description, $location, $last_seen_at, $contact_name, $contact_phone;
    public $search = '', $message = '';

    protected $rules = [
        'pet_name' => 'required|string|max:100',
        'pet_type' => 'required|in:แมว,สุนัข,นก,กระต่าย,อื่นๆ',
        'breed' => 'nullable|string|max:100',
        'color' => 'nullable|string|max:100',
        'status' => 'required|in:lost,found,closed',
        'description' => 'required|string|max:3000',
        'location' => 'required|string|max:255',
        'last_seen_at' => 'nullable|date|before_or_equal:today',
        'contact_name' => 'required|string|max:100',
        'contact_phone' => 'required|string|max:30',
    ];

    public function save()
    {
        $data = $this->validate();
        if ($this->reportId) {
            PetReport::findOrFail($this->reportId)->update($data);
        } else {
            $data['user_id'] = auth()->id();
            PetReport::create($data);
        }
        $this->resetForm();
        $this->message = 'บันทึกข้อมูลประกาศเรียบร้อยแล้ว';
    }

    public function edit($id)
    {
        $p = PetReport::findOrFail($id);
        $this->reportId = $p->id;
        foreach (['pet_name','pet_type','breed','color','status','description','location','contact_name','contact_phone'] as $field) $this->$field = $p->$field;
        $this->last_seen_at = optional($p->last_seen_at)->format('Y-m-d');
        $this->message = '';
    }

    public function delete($id)
    {
        $p = PetReport::findOrFail($id);
        if ($p->photo_path) \Illuminate\Support\Facades\Storage::disk('public')->delete($p->photo_path);
        $p->delete();
        $this->message = 'ลบประกาศเรียบร้อยแล้ว';
    }

    public function resetForm()
    {
        $this->reset(['reportId','pet_name','breed','color','description','location','last_seen_at','contact_name','contact_phone']);
        $this->pet_type = 'แมว'; $this->status = 'lost';
    }

    public function updatingSearch() { $this->resetPage(); }

    public function render()
    {
        $query = PetReport::with('user')->latest();
        if ($this->search !== '') {
            $term = '%' . $this->search . '%';
            $query->where(fn($q) => $q->where('pet_name','like',$term)->orWhere('location','like',$term)->orWhere('contact_phone','like',$term)->orWhere('pet_type','like',$term));
        }
        return view('livewire.pet-report-crud', ['items' => $query->paginate(10), 'totalAll' => PetReport::count()]);
    }
}
