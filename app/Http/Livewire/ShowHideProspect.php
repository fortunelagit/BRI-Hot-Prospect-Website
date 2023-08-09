<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowHideProspect extends Component
{
    public $showDiv = false;
    public $progress;
 
    public function mount($progress)
    {
        $this->progress = $progress;
    }
    public function render()
    {
        return view('livewire.show-hide-prospect');
    }
    public function toggle()
    {
        $this->showDiv = !($this->showDiv);
    }

}
