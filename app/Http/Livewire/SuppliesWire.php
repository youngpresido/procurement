<?php

namespace App\Http\Livewire;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Item;
use App\Models\User;
class SuppliesWire extends Component
{
    use WithPagination;
    public $headers;
    public $sortColumn ="created_at";
    public $sortDirection ="asc";
    public $searchTerm = '';

    public function headerConfig(){
        return [
        "id"=>"#",
        "items"=>"Items",
         "status"=>'Status',
         "supply"=>"Supplies",
         'expected_date'=>"Expected Date of Supply",
         'delivery_date'=>"Delivery Date of Supply",

         "vendor_id"=>[
             "label"=>"Vendor",
             "func"=>function($value){
                 if($value==null){
                     return "no vendor assigned yet";
                 }else{
                    $nam=User::where("id",$value)->first();
                    return "assigned to vendor  $nam->name";
                 }
             }
            ],
         "updated_at"=>[
             "label"=>"Date Requested",
             'func'=>function($value){
                 return $value->diffForHumans();
             }
         ],

         "action" =>[
            "label"=>"Action",
            'func'=>function($value){
                return "";
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
        if(auth()->user()->position != "procurement"){
         return   Item::orderBy($this->sortColumn,$this->sortDirection)
         ->where('vendor_id',auth()->user()->id)
         ->paginate(10);
        }
        return   Item::orderBy($this->sortColumn,$this->sortDirection)
                    ->where('status',"accepted")
                    ->paginate(10);

    }

    public function render()
    {
        return view('livewire.supplies-wire',['data'=>$this->resultData()])
        ->extends('layouts.main')
        ->section('content');
    }

    public function sort($column)
    {
        $this->sortColumn= $column;
        $this->sortDirection = $this->sortDirection == 'asc' ? 'desc' : 'asc';
    }
}
