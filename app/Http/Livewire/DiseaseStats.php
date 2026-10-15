<?php

namespace App\Http\Livewire;

use App\Services\BlvAnimalHealthService;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class DiseaseStats extends Component
{
    public $search = '';
    public $year = '';
    public $canton = '';
    public $species = '';
    public $group = '';
    public $perPage = 20;
    public $page = 1;

    protected $queryString = ['search', 'year', 'canton', 'species', 'group', 'page'];

    public function updatingSearch() { $this->page = 1; }
    public function updatingYear() { $this->page = 1; }
    public function updatingCanton() { $this->page = 1; }
    public function updatingSpecies() { $this->page = 1; }
    public function updatingGroup() { $this->page = 1; }

    public function gotoPage($p) { $this->page = max(1, (int) $p); }
    public function nextPage() { $this->page++; }
    public function prevPage() { $this->page = max(1, $this->page - 1); }

    public function clearFilters()
    {
        $this->reset(['search', 'year', 'canton', 'species', 'group']);
        $this->page = 1;
    }

    public function getAllRowsProperty()
    {
        return Cache::remember(BlvAnimalHealthService::CACHE_KEY, BlvAnimalHealthService::CACHE_TTL, function () {
            return app(BlvAnimalHealthService::class)->fetchFreshRows();
        });
    }

    public function getFilteredProperty()
    {
        $rows = collect($this->allRows);

        if ($this->search !== '') {
            $s = mb_strtolower($this->search);
            $rows = $rows->filter(fn ($r) => mb_strpos(mb_strtolower(json_encode($r, JSON_UNESCAPED_UNICODE)), $s) !== false);
        }
        if ($this->year !== '') {
            $rows = $rows->where('year', (int) $this->year);
        }
        if ($this->canton !== '') {
            $rows = $rows->where('canton', $this->canton);
        }
        if ($this->species !== '') {
            $rows = $rows->filter(fn ($r) => mb_stripos($r['species'] ?? '', $this->species) !== false);
        }
        if ($this->group !== '') {
            $rows = $rows->where('diseases_group', $this->group);
        }

        return $rows->values();
    }

    public function render()
    {
        $filtered = $this->filtered;
        $total = $filtered->count();
        $lastPage = max(1, (int) ceil($total / $this->perPage));
        $this->page = min(max(1, $this->page), $lastPage);
        $items = $filtered->forPage($this->page, $this->perPage)->values();

        $all = collect($this->allRows);
        $years = $all->pluck('year')->filter()->unique()->sort()->values();
        $cantons = $all->pluck('canton')->filter()->unique()->sort()->values();
        $groups = $all->pluck('diseases_group')->filter()->unique()->sort()->values();

        return view('livewire.disease-stats', [
            'total' => $total,
            'rows' => $items,
            'lastPage' => $lastPage,
            'years' => $years,
            'cantons' => $cantons,
            'groups' => $groups,
            'grandCount' => $filtered->sum('count'),
        ]);
    }
}
