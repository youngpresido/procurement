<?php

namespace App\Http\Livewire;

use Livewire\Component;

class StatusSelect extends Component
{
    public function render()
    {
        return view('livewire.status-select');
    }
    public function options($searchTerm = null)
    {
        return collect([
            [
                'value' => 'pending',
                'description' => 'pending',
            ],
            [
                'value' => 'accepted',
                'description' => 'accepted',
            ],
            [
                'value' => 'rejected',
                'description' => 'rejected',
            ],
        ]);
    }
}
