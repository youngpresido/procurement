<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Vendor;

class ShowVendor extends Component
{
    use WithPagination;
    public $headers;
    public $sortColumn ="created_at";
    public $sortDirection ="asc";
    public $searchTerm = '';

    public function headerConfig(){
        return [
        "id"=>"#",
        "organisation_name"=>"Vendor Name",
         "contact_name"=>"Contact Name",

         "contact_phone"=>"Contact Phone",
         "supply"=>"Supplies",
         "created_at"=>[
             "label"=>"Date Created",
             'func'=>function($value){
                 return $value->diffForHumans();
             }
         ],
         "status"=>"Status",
         "action" =>[
            "label"=>"View",
            'func'=>function($value){
                return ;
            }
         ]

        ];
    }
    public function hydrate(){
        $this->headers = $this->headerConfig();
    }

    public function mount(){
        $this->headers=$this->headerConfig();
    }

    protected function resultData()
    {
        return Vendor::where(function ($query){
            if(!empty($this->searchTerm))
            {
                $query->where('organisation_name','like','%'.$this->searchTerm.'%');
                $query->where('contact_name','like','%'.$this->searchTerm.'%');
                $query->where('supply','like','%'.$this->searchTerm.'%');
                $query->where('contact_phone','like','%'.$this->searchTerm.'%');

            }
        })->orderBy($this->sortColumn,$this->sortDirection)->paginate(10);
    }

    public function render()
    {
        return view('livewire.show-vendor',['data'=>$this->resultData()])
        ->extends('layouts.main')
        ->section('content');
    }

    public function sort($column)
    {
        $this->sortColumn= $column;
        $this->sortDirection = $this->sortDirection == 'asc' ? 'desc' : 'asc';
    }
}
