<?php

namespace App\Http\Livewire;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Item;
use App\Models\User;

class UpdateItemsRequest extends Component
{

    use WithPagination;
    public $headers;
    public $sortColumn ="created_at";
    public $sortDirection ="asc";
    public $searchTerm = '';

    public function headerConfig(){
        return [
        "id"=>[
            "label" => "id",
            "func" =>function($value){
                return $value;
            }
        ],
        "items"=>"Items",
         "user_id"=>[
          'label'=> "Requesting Staff",
          'func'=>function($value){
              $nam=User::whereId($value)->first();
              return $nam->name;
          }
         ],

         "status_level"=>[
            "label"=> "Status Level",
            'func' => function($value){
                $nam=User::whereId($value)->first();
                return "pending with $nam->name";
            }

            ],
         "status"=>'Status',
         "supply"=>"Supplies",
         'expected_date'=>"Expected Date of Supply",
         'delivery_date'=>"Delivery Date of Supply",
         "reason"=>'Reason  for reject',

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
         "created_at"=>[
             "label"=>"Date Created",
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
        $item =[];

       $item= Item::orderBy($this->sortColumn,$this->sortDirection)
        ->where('user_id',auth()->user()->id)
        ->orWhere('status_level',auth()->user()->id)
        ->paginate(10);

        return $item;
    }

    public function render()
    {
        return view('livewire.update-items-request',['data'=>$this->resultData()])
        ->extends('layouts.main')
        ->section('content');
    }

    public function sort($column)
    {
        $this->sortColumn= $column;
        $this->sortDirection = $this->sortDirection == 'asc' ? 'desc' : 'asc';
    }

}
