<?php

namespace App\Http\Livewire;
use App\Models\User;
use Livewire\Component;

class AllUsersDetails extends Component
{
    public $user;
    public $type;
    public $types = [
        "admin"=>"admin",
        "vendor"=>"vendor",
        "procurement"=>"procurement",
        "staff" => "staff"
    ];

    public function mount($id)
    {
        $this->user = User::find($id);
        $this->type = $this->user->type;
    }
    public function render()
    {


        return view('livewire.all-users-details') ->extends('layouts.main')
        ->section('content');
    }

    public function submitForm()
    {


        $this->user->type= $this->type;
        $this->user->save();
        $this->dispatchBrowserEvent('swal:modal',[
            'type' => 'success',
            'title'=> 'Record Successfully',
            'text' => ''
        ]);
    }
}
