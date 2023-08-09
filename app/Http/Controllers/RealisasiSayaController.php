<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Realisasi;
use Illuminate\Support\Facades\Auth;


class RealisasiSayaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('show-menu', 'prospects-saya');
        $id = Auth::user()->PN;
       
        $realisasis = Realisasi::where('prospects.PN', $id)
        ->select('realisasis.id as realisasi_id', 'realisasis.*', 'prospects.*', 'users.nama')
        ->join('prospects', 'prospects.id' , '=', 'realisasis.prospect_id')
        ->join('users', 'users.PN', '=', 'prospects.PN')
        ->get();
        
        
        foreach($realisasis as $prospect){
        
            if ($prospect->potensial_kredit>=1000) $potensi_kredit = ($prospect->potensial_kredit/1000).' M';
            else $potensi_kredit = ($prospect->potensial_kredit).' Juta'; //dd($potensi_kredit);
            $prospect['potensi_kredit'] = $potensi_kredit;
        }

        
        //dd($realisasis);
        return view('realisasi-saya.index', compact('realisasis'));
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
