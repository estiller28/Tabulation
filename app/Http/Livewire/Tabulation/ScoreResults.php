<?php

namespace App\Http\Livewire\Tabulation;

use App\Models\Candidate;
use App\Models\Score;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ScoreResults extends Component
{
    public $casualWearResults, $summerWearResults, $filipinanaResults, $topFiveResults, $topThreeResults;
    public $readyToLoad = false;
    public function loadResults()
    {
        $this->readyToLoad = true;
    }
    public function mount(){

        $this->casualWearResults = Candidate::withCount(['scores as average_score' => function ($query) {
            $query->where('criteria_id', 1)
                ->select(DB::raw('avg(score)'));
        }])->orderByDesc('average_score')
            ->get();

        $this->summerWearResults = Candidate::withCount(['scores as average_score' => function ($query) {
            $query->where('criteria_id', 2)
                ->select(DB::raw('avg(score)'));
        }])->orderByDesc('average_score')
            ->get();

        $this->filipinanaResults = Candidate::withCount(['scores as average_score' => function ($query) {
            $query->where('criteria_id', 3)
                ->select(DB::raw('avg(score)'));
        }])->orderByDesc('average_score')
            ->get();

        $this->topFiveResults = Candidate::withCount(['scores as average_score' => function ($query) {
            $query->where('criteria_id', 4)
                ->select(DB::raw('avg(score)'));
        }])->orderByDesc('average_score')
            ->get();

        $this->topThreeResults = Candidate::withCount(['scores as average_score' => function ($query) {
            $query->where('criteria_id', 5)
                ->select(DB::raw('avg(score)'));
        }])->orderByDesc('average_score')
            ->get();
    }
    public function render()
    {
        return view('livewire.tabulation.score-results', [
            'casualWearResults' => $this->readyToLoad   ? $this->casualWearResults : [],
            'summerWearResults' => $this->readyToLoad ? $this->summerWearResults : [],
            'filipinanaResults' => $this->readyToLoad ? $this->filipinanaResults : [],
            'topFiveResults' => $this->readyToLoad ? $this->topFiveResults : [],
            'topThreeResults' => $this->readyToLoad ? $this->topThreeResults : [],
        ]);
    }

}
