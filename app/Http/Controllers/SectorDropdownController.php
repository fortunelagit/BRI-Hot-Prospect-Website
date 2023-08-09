<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Sectors, SubSectors, Definition, Lpg};


class SectorDropdownController extends Controller
{
    public function index()
    {
        $data['sectors'] = Sectors::orderBy('industrial_sector')
                                    ->get(['industrial_sector', 'id']);
        return view('section-dropdown', $data);
    }
    public function fetchSubSector(Request $request)
    {
        $data['sub-sectors'] = SubSectors::orderBy('industrial_sub_sector')
                                        ->where('sector_id', $request->sector_id)
                                        ->get(['industrial_sub_sector', 'id']);
        return response()->json($data);
    }
    public function fetchDefinition(Request $request)
    {
        $data['definitions'] = Definition::orderBy('industrial_definition')
                                            ->where('sub_sector_id',$request->sub_sector_id)
                                            ->get(['industrial_definition', 'industrial_code']);
        return response()->json($data);
    }
    public function fetchLPG(Request $request)
    {
        $data['lpgs'] = Lpg::where('code', $request->sektor_industri)
                            ->get(['warna_lpg', 'persen_MS', 'persen_DPK', 'persen_NPL']);
        //dd($data['lpgs'][0]['warna_lpg']);
        if($data['lpgs'][0]['warna_lpg'] == 'BIRU') $data['lpgs'][0]['color'] = 'bg-blue-500';
        else if($data['lpgs'][0]['warna_lpg'] == 'MERAH') $data['lpgs'][0]['color'] = 'bg-red-500';
        else if($data['lpgs'][0]['warna_lpg'] == 'KUNING') $data['lpgs'][0]['color'] = 'bg-yellow-500';
        else if($data['lpgs'][0]['warna_lpg'] == 'HIJAU') $data['lpgs'][0]['color'] = 'bg-green-500';
        //dd($data);
        return response()->json($data);
    }
}
