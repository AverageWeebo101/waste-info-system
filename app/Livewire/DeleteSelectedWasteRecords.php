<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Waste;

class DeleteSelectedWasteRecords extends Component
{
    use WithPagination;

    public $selected = [];
    public $selectAll = false;
    public $sortBy = 'WasteID';
    public $sortDirection = 'asc';
    public $wasteName = '';

    protected $queryString = [
        'sortBy' => ['except' => 'WasteID'],
        'sortDirection' => ['except' => 'asc'],
    ];

    public function render()
    {
        $waste = Waste::orderBy($this->sortBy, $this->sortDirection)
            ->when($this->wasteName, function ($query) {
                $query->where('WasteName', 'like', '%' . $this->wasteName . '%');
            })
            ->paginate(10);

        return view('livewire.delete-selected-waste-records', compact('waste'));
    }

    public function updatedSelectAll($value)
    {
        if ($value) {
            $this->selected = Waste::pluck('id')->map(function ($id) {
                return (string) $id;
            })->toArray();
        } else {
            $this->selected = [];
        }
    }

    public function deleteSelected()
    {
        try {
            \Log::info('Deleting selected records...', ['selected' => $this->selected]);
            Waste::destroy($this->selected);
            \Log::info('Selected records deleted successfully!');
            $this->resetSelect();
            session()->flash('success', 'Selected records deleted successfully!');
        } catch (\Exception $e) {
            \Log::error('Error deleting selected records: ' . $e->getMessage());
            session()->flash('error', 'Error deleting selected records.');
        }
    }

    public function deleteRecord($wasteId)
    {
        Waste::findOrFail($wasteId)->delete();
        session()->flash('success', 'Record deleted successfully!');
    }

    public function sortBy($field)
    {
        if ($this->sortBy === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortBy = $field;
    }

    private function resetSelect()
    {
        $this->selectAll = false;
        $this->selected = [];
    }
}

