<?php

namespace App\Http\Livewire;
use App\Models\Department;
use Livewire\Component;
use App\Models\Item;
use Alert;
use App\Mail\UpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class MakeItemsRequest extends Component
{
    public $dept_name;
    public $items;

    public function render()
    {
        return view('livewire.make-items-request')->extends('layouts.main')
        ->section('content');
    }
    public function submitForm()
    {

        $user =User::whereId(auth()->user()->id)->with('department')->first();
        if(!$user->department()->exists()){
            $this->dispatchBrowserEvent('swal:modal',[
                'type' => 'error',
                'title'=> 'you need to have a department',
                'text' => ''
            ]);
            return;
        }
        $dept=$user->department->id;
        $result = new Item();
        $result->items =$this->items;
        $result->department_id = $dept;
        $result->status_level = $user->line_manager;
        $result->user_id = auth()->user()->id;
        $result->save();
        $line_man = User::find($user->line_manager);
        Mail::to($line_man->email)->send(new UpdateRequest($line_man));
        $this->clearForm();
        $this->dispatchBrowserEvent('swal:modal',[
            'type' => 'success',
            'title'=> 'Item Request Successfully',
            'text' => ''
        ]);

    }

    public function clearForm()
    {
    $this->items='';
    }
    public function mount()
    {

    }
}
