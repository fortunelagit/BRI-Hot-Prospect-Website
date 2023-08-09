<?php

namespace App\Http\Controllers;

use App\Models\Prospect;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = (new Prospect)->newInstance();

        //dd($results);
        return view('report', compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request)
    {
        //dd($request);
        $results = Prospect::join('users', 'users.PN', '=', 'prospects.PN')
        ->leftjoin('progress', 'progress.prospect_id', '=', 'prospects.id')
        ->leftjoin('realisasis', 'realisasis.prospect_id', '=', 'prospects.id')
        ->leftjoin('users as approver', 'approver.PN','=', 'prospects.PN_approval')
        ->select('users.nama','prospects.*', 
        'approver.nama as nama_approver',
        'progress.status_dokumen', 'progress.status_agunan', 'progress.ots', 
        'realisasis.rekening_debitur', 'realisasis.cif_debitur', 'realisasis.pemilik_rekening', 'realisasis.tanggal_realisasi', 'realisasis.keterangan', 
        'progress.created_at as progress_approved', 'progress.updated_at as progress_update', 
        'realisasis.updated_at as realisasi_update')
        ->get();
        //dd($results[2]);
        if($request->unit) $results = $results->where('unit', '=', $request->unit);

        if($request->prospect_start && $request->prospect_end){
            $start_date = Carbon::createFromFormat('m/d/Y', $request->prospect_start)->format('Y-m-d');
            $end_date = Carbon::createFromFormat('m/d/Y', $request->prospect_end)->format('Y-m-d');
            
            $results = $results->whereBetween('created_at', [$start_date, $end_date]);
        } 
        if($request->realisasi_start && $request->realisasi_end){
            $start_date = Carbon::createFromFormat('m/d/Y', $request->realisasi_start)->format('Y-m-d');
            $end_date = Carbon::createFromFormat('m/d/Y', $request->realisasi_end)->format('Y-m-d');
            
            $results = $results->whereBetween('tanggal_realisasi', [$start_date, $end_date]);
        } 
        
        //dd($results);
        if($request->status){
            $results = $results->whereIn('status_prospek', $request->status);
        }
        
        $sum = $results->sum('potensial_kredit');//dd($results);
        return view('report', compact('results', 'sum'));
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
