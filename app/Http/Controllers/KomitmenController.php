<?php

namespace App\Http\Controllers;

use App\Models\Prospect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KomitmenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        /* A middleware that checks if the user has the permission to access the page. */
        $this->authorize('show-menu', 'prospects-saya');


        /* Getting the PN of the user. */
        $pn = Auth::user()->PN;
        /* A query to get the sum of the potensial_kredit of the prospect table where the PN is equal
        to the PN of the user and the status_approval is equal to Disetujui. */
        $prospect = Prospect::select(DB::raw('SUM(prospects.potensial_kredit) as total_potensi'))
                ->where('prospects.PN', $pn)
                ->where('prospects.status_approval', 'Disetujui')
                ->groupBy('prospects.PN')
                ->first();//dd($prospek);
        if($prospect) $prospek['prospek'] = $prospect->total_potensi;//dd($data);
        else $prospek['prospek'] = 0;
        $prospek['total'] = 3600;
        $prospek['title'] = 'Komitmen Hot Prospek';
        $prospek['var'] = 'prospekChart';

        /* A query to get the sum of the potensial_kredit of the prospect table where the PN is equal
                to the PN of the user and the status_prospek is equal to Sudah Realisasi. */
        $realisasi = Prospect::select(DB::raw('SUM(prospects.potensial_kredit) as total_potensi'))
                ->where('prospects.PN', $pn )
                ->where('prospects.status_prospek', 'Sudah Realisasi')
                ->groupBy('prospects.PN')
                ->first();//dd($real);
        if($realisasi) $real['prospek'] = $realisasi->total_potensi;//dd($real['prospek']);
        else $real['prospek'] = 0;
        $real['total'] = 1800;
        $real['title'] = 'Komitmen Realisasi';
        $real['var'] = 'realChart';


        return view('komitmen', compact('prospek', 'real'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
