<?php

namespace App\Http\Livewire;

use App\Models\Dogs;
use App\Models\UpdateRequest;
use Livewire\Component;
use Spatie\Permission\Models\Permission;

class UpdateDogStatus extends Component
{
    public $owner_name, $id_number, $status, $reason, $request_data;
    public $contentIsVisible = false;
    public $verifyButton = true;
    public $isHealthy = false;
    public $isWithIllness = false;

    protected $rules = [
        'owner_name' => 'required',
        'id_number' => 'required',
        'status' => 'required',
        'reason' => 'required',
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function resetInputFields(){
        $this->owner_name = '';
        $this->id_number = '';
        $this->status = '';
        $this->reason = '';
    }

    public function render(){
        return view('livewire.update-dog-status');
    }

    public function toggleDogStatus(){
        $this->request_data = Dogs::where('id_number', $this->id_number)
            ->where('owner_name', $this->owner_name)->first();
        if($this->request_data){
            if($this->request_data->status !== 'Deceased'){
                $this->contentIsVisible = true;
                $this->verifyButton = false;
                if($this->request_data->status == 'With Illness'){
                    $this->isHealthy = true;
                    $this->isWithIllness = false;
                }else{
                    $this->isHealthy = false;
                    $this->isWithIllness = true;
                }
            }else{
                session()->flash('error', 'Ops! -  Sorry, This dog is deceased.');
            }
        }else{
            session()->flash('error', 'Ops! - Sorry, there is no dog associated with this owner name or id number');
        }
    }
    public function create(){
        $this->validate();
        $request_data = Dogs::where('id_number', $this->id_number)
            ->where('owner_name', $this->owner_name)->first();

        if ($request_data){
            $requests = UpdateRequest::where('dogs_id', $request_data->id)->first();
            if($requests){
                UpdateRequest::where('dogs_id', $request_data->id)->update([
                    'reason' => $this->reason,
                    'status' => $this->status,
                ]);
            }else{
                UpdateRequest::create([
                    'dogs_id' => $request_data->id,
                    'owner_name' => $this->owner_name,
                    'id_number' => $this->id_number,
                    'status' => $this->status,
                    'reason' => $this->reason,
                ]);
            }
            if($this->status == 'Deceased'){
                $this->status = 'Deceased';
            }else if($this->status == 'With Illness'){
                $this->status = 'With Illness';
            }else{
                $this->status = 'Healthy';
            }

            Dogs::find($request_data->id)->update([
                'status' =>  $this->status,
            ]);

            session()->flash('success', 'Request submitted successfully!');
            $this->resetInputFields();

        }else{
            $this->resetInputFields();
            session()->flash('error', 'Ops!, Sorry there is no dog associated
            with this ID number or Owner name');
        }

    }
}
