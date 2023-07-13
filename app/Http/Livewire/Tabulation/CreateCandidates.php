<?php

namespace App\Http\Livewire\Tabulation;

use App\Models\Candidate;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateCandidates extends Component
{
    use WithFileUploads;
    public $name, $candidate_number, $photo;
    protected $rules = [
        'name' => 'required',
        'candidate_number' => 'required|unique:candidates',
        'photo' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function render()
    {
        return view('livewire.tabulation.create-candidates');
    }


    public function create(){
        $this->validate();

        $filename = "";
        if ($this->photo) {
            $filename = $this->photo->store('candidate-images', 'public');
        } else {
            $filename = Null;
        }

        try {
            Candidate::create([
                'name' => $this->name,
                'candidate_number' => $this->candidate_number,
                'photo' => $filename
            ]);

            session()->flash('message', 'Candidate created successfully!');
            return redirect()->route('candidates.index');

        }catch (\Exception $e){
            return $e. ' -' . $e->getMessage();
        }
    }
}
