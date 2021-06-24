<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Department;
use App\Models\User;
use Alert;
class AddUser extends Component
{
    public $name;
    public $email;
    public $department_id;
    public $position;
    public $line_manager;
    public $dept;
    public $users;
    public $rules =[
        "name"=>"required",
        "email"=>"required",
        "department_id"=>"required",
        "position"=>"required",
        "line_manager"=>"required"
    ];
    public function render()
    {
        return view('livewire.add-user')->extends('layouts.main')
        ->section('content');
    }
    public function submitForm()
    {
        $this->validate($this->rules);
        $result = new User();
        $result->name =$this->name;
        $result->email = $this->email;
        $result->department_id = $this->department_id;
        $result->position = $this->position;
        $result->password = \Hash::make('password');
        $result->line_manager = $this->line_manager;

        $result->save();
        $this->clearForm();
        $this->dispatchBrowserEvent('swal:modal',[
            'type' => 'success',
            'title'=> 'Staff added Successfully',
            'text' => ''
        ]);


    }

    public function clearForm()
    {
    $this->items='';
    }
    public function mount()
    {
        $this->dept = Department::all();
        $this->users = User::all();
    }
}
