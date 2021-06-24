<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Department as Dept;
use Alert;
class Department extends Component
{
    public $name;

    public $hod;
    public $users;
    public $rules =[
        "name"=>"required",
        "hod"=>"required",
    ];
    public function render()
    {
        return view('livewire.department')->extends('layouts.main')
        ->section('content');
    }
    public function submitForm()
    {
        $this->validate($this->rules);
        $result = new Dept();
        $result->name =$this->name;
        $result->hod = $this->hod;
        $result->save();
        $this->clearForm();
        $this->dispatchBrowserEvent('swal:modal',[
            'type' => 'success',
            'title'=> 'Department added Successfully',
            'text' => ''
        ]);


    }

    public function clearForm()
    {
    $this->name='';
    $this->hod='';
    }
    public function mount()
    {
        $this->users = User::all();
    }
}
