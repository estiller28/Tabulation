<?php

namespace App\Http\Livewire\admin;
use App\Models\Barangay;
use App\Models\Dogs;
use App\Models\UpdateRequest;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Http\File;
class DogEdit extends Component
{
    use WithFileUploads;
    public $status;
    public $barangays;
    public $barangay;
    public $purok;
    public $dog_name;
    public $new_image;
    public $id_number;
    public $dog_image;
    public $origin;
    public $breed;
    public $color;
    public $age;
    public $month_year;
    public $sex;
    public $sex_description;
    public $vaccines_taken;
    public $owner_name;
    public $contact_number;
    public $dogs;

    public Dogs $dog;
    public $did;

    protected $listeners = ['delete', 'redirectToCreateUser'];

    public $readyToload = false;
    public function loadDogInfo(){
        $this->readyToload = true;
    }


    protected $rules = [
        'dog_name' => 'required',
        'new_image' => 'max:2048',
        'origin' => 'required',
        'breed'  => 'required',
        'color' => 'required',
        'barangay' => 'required',
        'age' => 'required|max:255',
        'month_year' => 'required',
        'sex' => 'required',
        'sex_description' => 'required',
        'vaccines_taken' => 'required',
        'owner_name' => 'required',
        'contact_number' => 'required|min:11|max:11',
        'purok' => 'required',
        'status'=> 'required'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount($dog){
        $this->dog = $dog;
        $this->did  = $dog->id;
        $this->dog_image = $dog->image;
        $this->dog_name = $dog->dog_name;
        $this->origin = $dog->origin;
        $this->breed = $dog->breed;
        $this->color = $dog->color;
        $this->age = $dog->age;
        $this->month_year = $dog->month_year;
        $this->sex = $dog->sex;
        $this->sex_description = $dog->sex_description;
        $this->vaccines_taken = $dog->vaccines_taken;
        $this->owner_name = $dog->owner_name;
        $this->contact_number = $dog->contact_number;
        $this->barangay  = $dog->barangay_id;
        $this->purok = $dog->purok;
        $this->barangays = Barangay::orderBy('barangay_name', 'asc')->get();
        $this->status = $dog->status;
    }
    public function render()
    {
        return view('livewire.admin.dog-edit');
    }

    public function update(){

        $this->validate();
        $path = "/storage/";
        $filename = $this->dog->dog_image;

        if ($this->new_image) {
            if($filename !== ''){
                if(\File::exists(public_path($path.$filename))) {
                    \File::delete(public_path($path.$filename));
                }
            }
            $filename = $this->new_image->store('dog-images', 'public');
        }

        Dogs::find($this->did)->update([
            'dog_image' => $filename,
            'dog_name' => $this->dog_name,
            'origin' => $this->origin,
            'breed' => $this->breed,
            'color' => $this->color,
            'age' => $this->age,
            'month_year' => $this->month_year,
            'sex' => $this->sex,
            'sex_description' => $this->sex_description,
            'vaccines_taken' => $this->vaccines_taken,
            'owner_name' => $this->owner_name,
            'contact_number' => $this->contact_number,
            'barangay_id' => $this->barangay,
            'purok' => $this->purok,
            'status' => $this->status,
        ]);

        $this->dispatchBrowserEvent('toastr:info', [
            'type' => 'info',
            'message' => 'Dog record updated successfully',
        ]);
    }

    public function confirmDelete(){
        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => 'warning',
            'title' => 'Are you sure?',

        ]);
    }

    public function delete(){
        $dog = Dogs::find($this->did);

        UpdateRequest::where('dogs_id',$dog->id)->delete();
        $path = "/storage/";
        if($dog->dog_image != null){
            $filename = $dog->dog_image;
            if(\File::exists(public_path($path.$filename))) {
                \File::delete(public_path($path.$filename));
            }
            $dog->delete();

            session()->flash('message', 'Dog deleted successfully!');
            return redirect()->route('dogs.index');
        }

        $dog->delete();
        session()->flash('message', 'Dog deleted successfully!');
        return redirect()->route('dogs.index');

    }
}
