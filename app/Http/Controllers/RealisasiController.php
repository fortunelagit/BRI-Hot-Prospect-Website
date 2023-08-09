<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Realisasi;
use App\Models\User;
use App\Models\LogChanges;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class RealisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $this->authorize('show-menu', 'prospects');
        $realisasis = Realisasi::select('realisasis.id as realisasi_id', 'realisasis.*', 'prospects.*', 'users.nama')
        ->join('prospects', 'prospects.id' , '=', 'realisasis.prospect_id')
        ->join('users', 'users.PN', '=', 'prospects.PN')
        ->get();
        
        foreach($realisasis as $prospect){
        
            if ($prospect->potensial_kredit>=1000) $potensi_kredit = ($prospect->potensial_kredit/1000).' M';
            else $potensi_kredit = ($prospect->potensial_kredit).' Juta'; //dd($potensi_kredit);
            $prospect['potensi_kredit'] = $potensi_kredit;
        }

        //dd($realisasis);
        return view('realisasi.index', compact('realisasis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('realisasi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Realisasi::where('realisasis.id', $id)
        ->select('realisasis.id as realisasi_id', 'realisasis.*', 'prospects.*', 'users.nama')
        ->join('prospects', 'prospects.id' , '=', 'realisasis.prospect_id')
        ->join('users', 'users.PN', '=', 'prospects.PN')
        ->first();
        //dd($item);
        if($item->status_approval) 
            $approver = User::where('PN', $item->PN_approval)
                            ->select('users.nama as approver')
                            ->first();
            
        
        //dd($approver);
        else $approver = NULL;
        return view('realisasi.show', compact('item', 'approver'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $realisasi = Realisasi::where('id', $id)->first();

        return view('realisasi.edit', compact('realisasi'));
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
        $values = ([
            'rekening_debitur' => $request['rekening_debitur'],
            'cif_debitur' => $request['cif_debitur'],
            'pemilik_rekening' => $request['pemilik_rekening'],
            'tanggal_realisasi' => Carbon::createFromFormat('m/d/Y', $request['tanggal_realisasi'])->format('Y-m-d'),
            'keterangan' => $request['keterangan']
            
        ]); 
        Realisasi::where('id', $id)->update($values);
        LogChanges::create([
            'nama' => Auth::user()->nama,
            'PN' => Auth::user()->PN,
            'aksi' => 'memperbarui',
            'tabel_target' => 'realisasi',
            'id_target' => $id
        ]);
        return redirect()->back()->banner('Realisasi Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return redirect()->back()->dangerBanner('Illegal: Aksi penghapusan realisasi dilarang.');
    }
}
