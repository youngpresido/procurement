<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Vendor;

class Vendors extends Component
{
    use WithFileUploads;
    public $organisation_name="hey";
    public $organisation_address;
    public $organisation_email;
    public $website;
    public $contact_name;
    public $contact_email;
    public $contact_phone;
    public $supply;
    public $quotation;
    public $logo;
    public $invoice;
    public $signature;
    public $successMsg="";


    public $rules = [
         "organisation_name"=>"required",
         "organisation_address"=>"required",
         "organisation_email"=>"required",
         "website"=>"required",
         "contact_name"=>"required",
         "contact_email"=>"required",
         "contact_phone"=>"required",
         "supply"=>"required",
         "quotation"=>"required",
         "logo"=>"required",
         "invoice"=>"required",
         "signature"=>"required"
    ];






    public function render()
    {
        return view('livewire.vendors')->layout('layouts.guest');
    }
public function uploadFile($file){
    $name = md5($file . microtime()).'.'.$file->extension();

    $file->storeAs('photos', $name);
    return $name;

}



    public function submitForm()
    {
        $this->validate($this->rules);
        Vendor::create([
        "organisation_name"=>$this->organisation_name,
         "organisation_address"=>$this->organisation_address,
         "organisation_email"=>$this->organisation_email,
         "website"=>$this->website,
         "contact_name"=>$this->contact_name,
         "contact_email"=>$this->contact_email,
         "contact_phone"=>$this->contact_phone,
         "supply"=>$this->supply,
         "quotation"=>$this->uploadFile($this->quotation),
         "logo"=>$this->uploadFile($this->logo),
         "invoice"=>$this->uploadFile($this->invoice),
         "signature"=>$this->uploadFile($this->signature)
        ]);

        $this->successMsg = 'Team successfully created.';

        $this->clearForm();

        $this->currentStep = 1;
    }



    /**
     * Write code on Method
     */
    public function clearForm()
    {
        $this->organisation_name="";
         $this->organisation_address="";
         $this->organisation_email="";
         $this->website="";
         $this->contact_name="";
         $this->contact_email="";
         $this->contact_phone="";
         $this->supply="";
         $this->quotation="";
         $this->logo="";
         $this->invoice="";
         $this->signature="";
    }

}
