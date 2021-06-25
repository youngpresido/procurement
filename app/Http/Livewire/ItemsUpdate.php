<?php

namespace App\Http\Livewire;

use App\Mail\UpdateRequest;
use App\Models\Item;
use Livewire\Component;
use App\Models\User;
use App\Models\Department;
use Illuminate\Support\Facades\Mail;

class ItemsUpdate extends Component
{
    public $data=[];
    public $status;
    public $vendor_id;
    public $ids;
    public $reason=null;
    public $showUpdate="false";
    public $line_manager ="";
    public $expected_date;
    public $users;
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
        return view('livewire.items-update')->extends('layouts.main')
        ->section('content');
    }
    public function mount($id){
        $this->data=Item::whereId($id)->first();
        $this->ids=$id;
        $this->line_manager =$this->data['line_manager'];
        $this->status = $this->data['status'];
        $this->expected_date= $this->data['expected_date'];
        $this->users = User::all();

    }
   public function updateForm(){
        $this->data=Item::whereId($this->ids)->first();

        $this->data['status']=$this->status;
        $this->data['reason']=$this->reason;

        $this->data['updated_by']= auth()->user()->id;
        $this->data['expected_date']=$this->expected_date;

        $user = User::find($this->data['user_id']);
        $line_man =User::find($user->line_manager);
        $dept =Department::find($this->data['department_id']);
        $proc = User::where('position', 'procurement')->first();
        $hod =User::find($dept->hod);
        if($this->status == 'accepted'){
            $this->data['status']="pending";
        if($line_man->id == auth()->user()->id){
            $this->data['status_level']=$hod->id;
            Mail::to($hod->email)->send(new UpdateRequest($hod));
        }else if($hod->id == auth()->user()->id){
            $this->data['status_level']=$proc->id;
            $this->data['status']="accepted";
            Mail::to($proc->email)->send(new UpdateRequest($proc));
        }

        if($line_man->id == $hod->id ){
            $this->data['status_level']=$proc->id;
            $this->data['status']="accepted";
            Mail::to($proc->email)->send(new UpdateRequest($proc));
        }
        if(auth()->user()->type== 'procurement'){
            // dd($this->vendor_id);
            $this->data['vendor_id']= $this->vendor_id;
        }
    }else{
        Mail::to($user->email)->send(new UpdateRequest($proc));
        $this->data['status']=$this->status;
    }

        $this->data->save();
        $this->successMsg = 'successfully updated.';
        $this->dispatchBrowserEvent('swal:modal',[
            'type' => 'success',
            'title'=> 'Item added Successfully',
            'text' => ''
        ]);

    }
}
