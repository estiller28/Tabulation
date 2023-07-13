<?php

namespace App\Http\Livewire\Tabulation;

use App\Models\Criteria;
use Livewire\Component;

class Settings extends Component
{
    public $model;
    public $field;
    public $criterias;
    public $status = [];

    protected $rules = [
        'status.*' => 'boolean',
    ];

    public function mount()
    {
        $criterias = Criteria::all();
        $this->criterias = $criterias->keyBy('id');

        foreach ($criterias as $criteria) {
            $this->status[$criteria->id] = $criteria->status === 1;
        }
    }

    public function render()
    {
        return view('livewire.tabulation.settings');
    }

    public function create()
    {

        foreach ($this->criterias  as $criteria) {
            $criteria->status = $this->status[$criteria->id] === false ? 0 : 1;
            $criteria->save();
        }

        $this->dispatchBrowserEvent('toastr:info', [
            'type' => 'info',
            'message' => 'Settings updated successfully',
        ]);
    }
}
