<?php

namespace App\Http\Livewire\admin;

use App\Models\Barangay;
use App\Models\Dogs;
use App\Models\UpdateRequest;
use App\Models\User;
use Livewire\Component;
use App\Exports\DogExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Log;
use function PHPUnit\Framework\returnArgument;


class DogManagement extends Component
{

    public $barangay = '';
    public $dogs, $users;
    public $allDogs;
    public $count;
    public $dog;


    protected $listeners = ['delete', 'redirectToCreateUser'];

    protected $rules = [
        'barangay' => 'required',

    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public $readyToLoad = false;

    public function loadDogs()
    {
        $this->readyToLoad = true;
    }

    public function mount(){
        $this->dogs  = Barangay::orderBy('barangay_name', 'asc')->get();
        $this->users = User::where('id', '!=', 1)->count();
    }

    public function render(){

        return view('livewire.admin.dog-management', [
            'count' => $this->count,
            'allDogs' => $this->allDogs,
            'users' => $this->users
        ]);
    }

    public function getDogs(){

        $this->validate();

        if($this->barangay == '0'){
            $this->allDogs = Dogs::with(['barangay' => function($query){
                $query->select('id', 'barangay_name')->get();
            }])->get();
            $this->count = $this->allDogs->count();

            Log::info($this->allDogs);

        }else{
            $this->allDogs = Dogs::with('barangay')->where('barangay_id', $this->barangay)->get();
            $this->count = $this->allDogs->count();
        }

    }

    public function getAllDogs(){

        if($this->barangay == '0'){
            $id = 0;
            return $id;
        }else{
            $id = $this->allDogs->pluck('barangay_id');
            return $id->all();
        }
    }

    public function export(){
        try{
            if($this->allDogs->isNotEmpty()) {
//                return (new DogExport($this->getAllDogs()))->download('invoices.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
                return Excel::download(new DogExport($this->getAllDogs()), 'All-Dogs.xlsx');
            }
        }catch (\Exception $e){
            Log::info($e);
        }
    }


    public function registerInvalid(){
        $this->dispatchBrowserEvent('swal:invalid', [
            'type' => 'warning',
            'title' => 'No users found!',
            'text' => 'Please create a user first before you can register dog record!',

        ]);
    }

    public function redirectToCreateUser(){
        return redirect()->route('user.create');
    }


    public function confirmDelete($id){
        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => 'warning',
            'title' => 'Are you sure?',
            'text' => '',
            'id' => $id,
        ]);
    }

    public function delete($id){
        $dog = Dogs::find($id);

        UpdateRequest::where('dogs_id',$dog->id)->delete();
        $path = "/storage/";
        if($dog->dog_image != null){
            $filename = $dog->dog_image;
            if(\File::exists(public_path($path.$filename))) {
                \File::delete(public_path($path.$filename));
            }
            $dog->delete();
        }

        $dog->delete();

        $this->dispatchBrowserEvent('toastr:info', [
            'type' => 'info',
            'message' => 'Dog deleted successfully',
        ]);

        $this->getDogs();
    }


}
