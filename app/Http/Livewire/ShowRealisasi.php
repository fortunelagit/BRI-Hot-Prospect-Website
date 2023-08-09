<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowRealisasi extends Component
{
    public $realisasis;
 
    public function mount($realisasis)
    {
        $this->realisasis = $realisasis;
    }

    public function render()
    {
        return view('livewire.show-realisasi');
    }
}
