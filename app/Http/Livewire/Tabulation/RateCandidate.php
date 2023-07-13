<?php

namespace App\Http\Livewire\Tabulation;

use App\Models\Candidate;
use App\Models\Score;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Traits\Rating;

class RateCandidate extends Component
{
    use Rating;

    public $score, $candidate_id;
    public Candidate $candidate;
    public $casualWear, $summerWear, $filipinana, $topFive, $topThree;

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function mount($candidate){
        $this->candidate = $candidate;
        $this->candidate_id = $candidate->id;
        $this->casualWear = $this->enabledCasualWear();
        $this->summerWear = $this->enabledSummerWear();
        $this->filipinana = $this->enabledFilipiñana();
        $this->topFive = $this->enabledTopFiveQandA();
        $this->topThree = $this->enabledTopThreeQandA();
    }
    protected $rules = [
        'score' => 'required',
    ];

    public function render()
    {
        return view('livewire.tabulation.rate-candidate');
    }

    public function rate(){
        $this->validate();

        try {
            $checkIfRatingExists = Score::where('user_id', Auth::user()->id)
                ->where(function ($query){
                    $query->where('criteria_id', $this->getCriteria())
                        ->where('candidate_id', $this->candidate_id);
                })->exists();

            if($checkIfRatingExists){
                $this->dispatchBrowserEvent('toastr:info', [
                    'type' => 'error',
                    'message' => 'Oops, you have already rated this candidate.',
                ]);
                return null;
            }

            Score::create([
                'score' => $this->score,
                'candidate_id' => $this->candidate_id,
                'user_id' => $this->getAuthUserId(),
                'criteria_id' => $this->getCriteria(),
            ]);

            session()->flash('message', 'Rating successfully submitted.');
            return redirect()->route('candidates.index');

        }catch (\Exception $e){
            dump($e);
        }
    }

    public function getCriteria(){
        if($this->casualWear){
            return 1;
        }
        if($this->summerWear){
            return 2;
        }
        if($this->filipinana){
            return 3;
        }
        if($this->topFive){
            return 4;
        }
        if($this->topThree){
            return 5;
        }
    }
}
