<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Pagination extends Component
{
    use WithPagination;

    public $search = '';
    public $active = true;
    public $sortField;
    public $sortAsc = true;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    public function toggleActive($id)
    {
        $user = User::where('id', $id)->update(['active' => 1]);
    }

    public function render()
    {
        return view('livewire.pagination', [
            'users' => User::where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%');
            })
                ->where('active', $this->active)
                ->when($this->sortField, function ($query) {
                    $query->orderBy((string)$this->sortField,  $this->sortAsc ? 'asc' : 'desc');
                })
                ->paginate(10),
        ]);
    }
}
