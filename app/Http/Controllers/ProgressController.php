<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Progress;
use App\Models\LogChanges;
use App\Models\User;
use App\Models\Notifications;

class ProgressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$user = Auth::user()->PN;
        /* $progress = Progress::where('prospects.PN', $user)
                    ->select('progress.*', 'prospects.*')
                    ->join('prospects', 'prospects.id', '=', 'progress.prospect_id')
                    ->get(); */
        $this->authorize('show-menu', 'prospects');
        $progresses = Progress::select('progress.id AS progress_id', 'progress.*', 'prospects.*', 'users.nama')
        ->join('prospects', 'prospects.id', '=', 'progress.prospect_id')
        ->join('users', 'users.PN', '=', 'prospects.PN')
        ->get();//dd($progresses);

        foreach($progresses as $prospect){
        
            if ($prospect->potensial_kredit>=1000) $potensi_kredit = ($prospect->potensial_kredit/1000).' M';
            else $potensi_kredit = ($prospect->potensial_kredit).' Juta'; //dd($potensi_kredit);
            $prospect['potensi_kredit'] = $potensi_kredit;
        }


        return view('progress.index', compact('progresses'));
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
        /* $progress = Progress::where('progress.id', $id)
        ->select('progress.id AS prog_id', 'progress.status_agunan', 'progress.status_dokumen','progress.ots', 'prospects.*', 'users.nama')
        ->join('prospects', 'prospects.id', '=', 'progress.prospect_id')
        ->join('users', 'users.PN', '=', 'prospects.PN')
        ->first();//dd($progress); */
        $progress = Progress::where('progress.id', $id)
        ->select('progress.id AS progress_id', 'progress.*', 'prospects.*', 'inputter.nama AS inputter', 'approver.nama AS approver')
        ->join('prospects', 'prospects.id', '=', 'progress.prospect_id')
        ->join('users AS inputter', 'inputter.PN', '=', 'prospects.PN')
        ->join('users AS approver', 'approver.PN', '=', 'prospects.PN_approval')
        ->first();
        /* $approver = Progress::where('progress.id', $id)
        ->select('users.nama AS approver')
        ->join('prospects', 'prospects.id', '=', 'progress.prospect_id')
        ->join('users', 'users.PN', '=', 'prospects.PN_approval')
        ->first(); */
        //dd($progress);
        return view('progress.show', compact('progress'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $progress = Progress::where('id', $id)->first();
        return view('progress.edit', compact('progress'));
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
            'status_agunan' => $request['status_agunan'],
            'status_dokumen' => $request['status_dokumen'],
            'ots' => $request['ots'],
            
        ]); 
        Progress::where('id', $id)->update($values);
        $log = $this->add_log('memperbarui', 'progress', $id);


        $unit = Auth::user()->unit;
        $userlv3 = User::where('role_id', 3)->where('unit', $unit)->first();
        if($userlv3) $this->send_notif($userlv3->PN, $log->id);

        return redirect()->back()->banner('Progress Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return redirect()->back()->dangerBanner('Illegal: Aksi penghapusan progress dilarang.');
    }
    public function add_log($aksi, $tabel, $id){
        $log = LogChanges::create([
            'nama' => Auth::user()->nama,
            'PN' => Auth::user()->PN,
            'aksi' => $aksi,
            'tabel_target' => $tabel,
            'id_target' => $id
        ]);
        return $log;
    }

    public function send_notif($PN, $log){
        $notif = Notifications::create([
            'PN' => $PN,
            'log_id' => $log
        ]);

        return $notif;
    }
}
