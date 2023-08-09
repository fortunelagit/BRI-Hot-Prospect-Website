<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowProspects extends Component
{
    public $prospects;
 
    public function mount($prospects)
    {
        $this->prospects = $prospects;
    }

    
    public function render()
    {
        return view('livewire.show-prospects');
    }
}
