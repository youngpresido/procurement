<?php

namespace App\Http\Livewire;

use App\Models\Vendor;
use Livewire\Component;
use Alert;
use App\Mail\AcceptVendor;
use App\Mail\RejectVendor;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class ShowVendorDetails extends Component
{
    public $data=[];
    public $status;
    public $ids;
    public $reason=null;
    public $showUpdate="false";
    public $allStatus =[
        "pending"=>"pending",
        "accepted"=>"accepted",
        "rejected"=>"rejected"
    ];
    public function openModal(){
        $this->showUpdate= "true";
    }
    public function removeModal(){
        $this->showUpdate="false";
    }
    public function render()
    {


        return view('livewire.show-vendor-details')->extends('layouts.main')
        ->section('content');
    }

    public function updateStatus()
    {
        $this->data=Vendor::whereId($this->ids)->first();
        $this->data['status']=$this->status;
        $this->data['reason']=$this->reason;
        $this->data['updated_by']= auth()->user()->id;
        $this->data->save();
        if($this->status=="accepted"){
            $result = new User();
            $result->name =$this->data['name'];
            $result->email = $this->data['email'];

            $result->position = "vendor";
            $result->type = "vendor";
            $result->password = \Hash::make('password');


            $result->save();
            Mail::to($this->data['email'])->send(new AcceptVendor($this->data));
        }else{
            Mail::to($this->data['email'])->send(new RejectVendor($this->data));
            // AcceptVendor($this->data));
        }
        // Alert::success("Success", "ok");
        $this->dispatchBrowserEvent('swal:modal',[
            'type' => 'success',
            'title'=> 'Record Successfully',
            'text' => ''
        ]);
    }

    public function changeStatus($e){
        $this->status = $e;
    }
    public function mount($id){
        $this->data=Vendor::whereId($id)->first();
        $this->ids=$id;
        $this->status = $this->data['status'];
    }
}
