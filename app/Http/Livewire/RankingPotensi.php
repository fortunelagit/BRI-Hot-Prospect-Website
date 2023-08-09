<?php

namespace App\Http\Livewire;

use App\Models\Prospect;
use App\Models\Unit;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class RankingPotensi extends Component
{
    public $target;

    public function mount($target){
        $this->target = $target;

    }


    public function render()
    {
        
        if($this->target == 'bo-konsolidasi'){
            $results = Unit::select('units.unit', 
                                    DB::raw('COUNT(prospects.nama_CPP) as jumlah_prospek'), 
                                    DB::raw('SUM(prospects.potensial_kredit) as total_potensi'))
                            ->leftjoin('prospects', 'prospects.kode_unit', '=', 'units.kode_unit')
                            ->groupBy('unit')
                            ->orderBy('total_potensi', 'DESC')
                            ->get();
            $table = 'bo-konsolidasi';//dd($results[0]);
            $header = 'Unit BO Konsolidasi';
        }
        if($this->target == 'bo-only'){
            $pivot = DB::select(DB::raw('SELECT unit FROM units WHERE unit = branch'));
            foreach($pivot as $index =>$pi){$lists[$index] = $pi->unit;}
            $results = Unit::select('units.unit',
                                    DB::raw('COUNT(prospects.nama_CPP) as jumlah_prospek'), 
                                    DB::raw('SUM(prospects.potensial_kredit) as total_potensi'))
                            ->leftjoin('prospects', 'prospects.kode_unit', '=', 'units.kode_unit')
                            ->whereIn('units.unit', $lists)
                            ->groupBy('units.unit')
                            ->orderBy('total_potensi', 'DESC')
                            ->get();
            
            //dd($results);
            $table = 'bo-only';                
            $header = 'Unit BO only';
        }
        if($this->target == 'sbo-only'){
            $pivot = DB::select(DB::raw('SELECT unit FROM units WHERE unit != branch'));
            foreach($pivot as $index =>$pi){$lists[$index] = $pi->unit;}
            $results = Unit::select('units.unit', 
                                    DB::raw('COUNT(prospects.nama_CPP) as jumlah_prospek'), 
                                    DB::raw('SUM(prospects.potensial_kredit) as total_potensi'))
                            ->leftjoin('prospects', 'prospects.kode_unit', '=', 'units.kode_unit')
                            ->whereIn('units.unit', $lists)
                            ->groupBy('unit')
                            ->orderBy('total_potensi', 'DESC')
                            ->get();
            $table = 'sbo-only';                
            $header = 'Unit SBO only';
        }

        return view('livewire.ranking-potensi', compact('results', 'table', 'header'));
    }
}
