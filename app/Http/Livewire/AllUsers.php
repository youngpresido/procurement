<?php

namespace App\Http\Livewire;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\User;
class AllUsers extends Component
{
    use WithPagination;
    public $headers;
    public $sortColumn ="created_at";
    public $sortDirection ="asc";
    public $searchTerm = '';
    public $type;
    public $types = [
        "admin"=>"admin",
        "vendor"=>"vendor",
        "procurement"=>"procurement",
        "staff" => "staff"
    ];

    public function updateType($id)
    {

        $data = User::whereId($id)->first();
        $data->type= "admin";
        $data->save();
        $this->dispatchBrowserEvent('swal:modal',[
            'type' => 'success',
            'title'=> 'Record Successfully',
            'text' => ''
        ]);
    }
    protected function resultData()
    {

        $users= User::where(function ($query){
            if(!empty($this->searchTerm))
            {
                $query->where('name','like','%'.$this->searchTerm.'%');
                $query->where('email','like','%'.$this->searchTerm.'%');
                $query->where('type','like','%'.$this->searchTerm.'%');

            }
        })->orderBy($this->sortColumn,$this->sortDirection)->paginate(10);


        return $users;
    }


    public function render()
    {
        $users =$this->resultData();
        // foreach($users as $user){
        //     array_push($this->type, $user->type);
        // }

        return view('livewire.all-users',['data'=> $users])
        ->extends('layouts.main')
        ->section('content');
    }
}
