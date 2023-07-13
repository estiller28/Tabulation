<?php

namespace App\Http\Livewire\Tabulation;

use App\Models\Candidate;
use App\Models\Criteria;
use App\Models\User;
use App\Traits\Rating;
use Livewire\Component;

class Candidates extends Component
{
    use Rating;
    public $candidates;
    public $casualWear, $summerWear, $filipinana, $topFive, $topThree;
    public $user;
    public $criteria;
    public $readyToLoad = false;

    public function loadCandidates()
    {
        $this->readyToLoad = true;
    }

    public function mount(){
        $this->candidates = Candidate::where('is_removed', false)->orderBy('candidate_number', 'asc')->get();
        $this->casualWear = $this->enabledCasualWear();
        $this->summerWear = $this->enabledSummerWear();
        $this->filipinana = $this->enabledFilipiñana();
        $this->topFive = $this->enabledTopFiveQandA();
        $this->topThree = $this->enabledTopThreeQandA();
        $this->user = User::where('id', 1)->first();
    }

    public function render()
    {
        return view('livewire.tabulation.candidates', [
            'criterias' => $this->readyToLoad   ? $this->criteria : [],
            'allCandidates' => $this->readyToLoad ? $this->candidates : [],
        ]);
    }

    public function remove($id){
        try {
            $candidate = Candidate::findOrfail($id);

            $candidate->update([
                'is_removed' => true,
            ]);

            $this->dispatchBrowserEvent('toastr:info', [
                'type' => 'success',
                'message' => 'Candidate removed successfully',
            ]);
            $this->mount();

        }catch (\Exception $e){
            dump($e);
        }
    }
}
