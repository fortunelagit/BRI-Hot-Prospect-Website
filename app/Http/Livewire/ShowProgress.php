<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowProgress extends Component
{
    public $progresses;
 
    public function mount($progresses)
    {
        $this->progresses = $progresses;
    }

    public function render()
    {
        return view('livewire.show-progress');
    }
}
