<?php

namespace App\Http\Livewire;

use App\Models\Definition;
use App\Models\Lpg;
use App\Models\Sectors;
use App\Models\SubSectors;
use Livewire\Component;

class SectionDropdownEdit extends Component
{
    public $item;

    public function mount($item)
    {
        $this->item = $item;
    }

    public function render()
    {
        $definition = Definition::where('industrial_code', '6226')->first();//dd($definition);
        $sub_sector = SubSectors::where('id', $definition->sub_sector_id)->first();
        $sector = Sectors::where('id', $sub_sector->sector_id)->first();
        $lpg = Lpg::where('code', $definition->industrial_code)->first();
        $data['sectors'] = Sectors::orderBy('industrial_sector')->get(['industrial_sector', 'id']);

        
        if($lpg->warna_lpg == 'BIRU') $lpg->color = 'bg-blue-500';
        else if($lpg->warna_lpg == 'MERAH') $lpg->color = 'bg-red-500';
        else if($lpg->warna_lpg == 'KUNING') $lpg->color = 'bg-yellow-500';
        else if($lpg->warna_lpg == 'HIJAU') $lpg->color = 'bg-green-500';
        //dd($lpg->color);
        return view('livewire.section-dropdown-edit', $data, compact('definition', 'sub_sector', 'sector', 'lpg'));
    }
}
