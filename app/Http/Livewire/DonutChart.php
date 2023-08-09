<?php

namespace App\Http\Livewire;

use App\Models\Prospect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DonutChart extends Component
{
    public $data;
 
    public function mount($data)
    {
        $this->data = $data;
    }

    public function render()
    {
        
        return view('livewire.donut-chart');
    }
}
