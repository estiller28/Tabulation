<?php

namespace App\Http\Livewire\admin;

use App\Models\Dogs;
use App\Models\User;
use Livewire\Component;
use App\Models\UpdateRequest;
class Dashboard extends Component
{
    public $dogRegistered;
    public $allUsers;
    public $recentlyAdded, $updateRequests;

    public $readyToLoad = false;
    public function loadDogs(){
        $this->readyToLoad = true;
    }

    public function mount(){
        $this->recentlyAdded = Dogs::with('barangay')->latest()->limit(3)->get();
        $this->dogRegistered = Dogs::count();
        $this->allUsers = User::where('id', '!=', 1)->count();
        $this->updateRequests = UpdateRequest::with(['dogs' => ['barangay']])
            ->limit(3)
            ->latest()
            ->get();
    }

    public function render(){
        return view('livewire.admin.dashboard');
    }
}
