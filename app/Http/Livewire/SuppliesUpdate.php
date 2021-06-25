<?php

namespace App\Http\Livewire;

use App\Mail\UpdateRequest;
use App\Models\Item;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Carbon\Carbon;
use App\Models\Department;
use Illuminate\Support\Facades\Mail;

class SuppliesUpdate extends Component
{
    use WithFileUploads;
    public $data=[];
    public $status;
    public $ids;
    public $file;
    public $vendor_id;
    public $quote_status;
    public $quote;
    public $successMsg="";
    public $myStatus= [
        "accepted"=> "accepted",
        "rejected" => "rejected",
    ];

    public function render()
    {
        return view('livewire.supplies-update')->extends('layouts.main')
        ->section('content');
    }
    public function mount($id){
        $this->data=Item::whereId($id)->first();
        $this->ids=$id;
        $this->status = $this->data['status'];
        $this->quote = $this->data['quote'];
        $this->vendor_id =$this->data['vendor_id'];
        $this->quote_status = $this->data['quote_status'];
    }
    public function uploadFile($file){
        $name = md5($file . microtime()).'.'.$file->extension();

        $file->storeAs('photos', $name);
        return $name;

    }

    public function submitForm()
    {
        // $this->validate($this->rules);
        $result =Item::whereId($this->ids)->first();
        $requester = User::find($this->data['user_id']);
        $line_man =User::find($requester->line_manager);
        $dept =Department::find($this->data['department_id']);

        $hod =User::find($dept->hod);
        if(auth()->user()->type=='vendor'){
            if($this->data['quote_status']== 'accepted'){
                $result->delivery_date = Carbon::now();
            }else{
                $result->quote =$this->uploadFile($this->quote);

            }

        }else{
            $result->delivery_date = Carbon::now();
            $result->quote_status = $this->quote_status;
        }



        $result->updated_by = auth()->user()->id;

        if(auth()->user()->position == "procurement" && $this->status != "accepted"){
            Mail::to($hod->email)->send(new UpdateRequest($hod));
        }else{
            $result->vendor_id = $this->vendor_id;
            $user = User::find($this->vendor_id);
            if($this->quote_status!= "accepted" && auth()->user()->position == "procurement"){
                Mail::to($user->email)->send(new UpdateRequest($user));
            }else{

                if(auth()->user()->position == "procurement"){

                    Mail::to($user->email)->send(new UpdateRequest($user));
                    Mail::to($requester->email)->send(new UpdateRequest($requester));
                    Mail::to($line_man->email)->send(new UpdateRequest($line_man));
                    Mail::to($hod->email)->send(new UpdateRequest($hod));

                }else{
                    $user= User::where('position', 'procurement')->first();
                    Mail::to($user->email)->send(new UpdateRequest($user));
                }
            }
        }



        $this->successMsg = 'Quotation uploaded successfully created.';
        $result->save();



        $this->dispatchBrowserEvent('swal:modal',[
            'type' => 'success',
            'title'=> 'Status updated Successfully',
            'text' => ''
        ]);

    }

}
