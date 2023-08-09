<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Sectors;
class SectionDropdown extends Component
{
    
    public function render()
    {
        $data['sectors'] = Sectors::orderBy('industrial_sector')->get(['industrial_sector', 'id']);
        return view('livewire.section-dropdown', $data);
    }
}
