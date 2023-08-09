<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Progress;

class ProgressBranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('show-menu', 'prospects-branch');
        $kode = Auth::user()->branch;
        $progresses = Progress::where('prospects.branch', $kode)
        ->select('progress.id AS progress_id', 'progress.*', 'prospects.*', 'users.nama')
        ->join('prospects', 'prospects.id', '=', 'progress.prospect_id')
        ->join('users', 'users.PN', '=', 'prospects.PN')
        ->get();
        

        foreach($progresses as $prospect){
        
            if ($prospect->potensial_kredit>=1000) $potensi_kredit = ($prospect->potensial_kredit/1000).' M';
            else $potensi_kredit = ($prospect->potensial_kredit).' Juta'; //dd($potensi_kredit);
            $prospect['potensi_kredit'] = $potensi_kredit;
        }


        return view('progress-branch.index', compact('progresses'));
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
