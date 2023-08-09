<?php

namespace App\Http\Livewire;

use App\Models\Unit;
use Livewire\Component;

class UnitDropdown extends Component
{
    public function render()
    {
        

        //dd($units);
        return view('livewire.unit-dropdown', ['units' => Unit::select('kode_unit', 'unit')->get()]);
    }
}
