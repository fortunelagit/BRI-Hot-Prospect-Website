<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Prospect;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use App\Models\LogChanges;
use Illuminate\Support\Facades\Auth;
use App\Models\Progress;
use App\Models\Realisasi;
use App\Models\Notifications;
use Carbon\Carbon;


class ProspectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        /* Checking if the user is authorized to see the menu. */
        $this->authorize('show-menu', 'prospects');
        /* Selecting all the columns from the prospects table and the nama column from the users table. */
        $prospects = Prospect::select('prospects.*', 'users.nama AS nama')
                    ->join('users', 'users.PN', '=', 'prospects.PN')
                    ->get();
        
        
        foreach($prospects as $prospect){
        
            if ($prospect->potensial_kredit>=1000) $potensi_kredit = ($prospect->potensial_kredit/1000).' M';
            else $potensi_kredit = ($prospect->potensial_kredit).' Juta'; //dd($potensi_kredit);
            $prospect['potensi_kredit'] = $potensi_kredit;
        }
        return view('prospect.index', compact('prospects'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('prospect.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        //abort_if(Gate::denies('prospect_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $request->validate([
            'nama_CPP' => 'required|max:255',
            'jenis_usaha' => 'required|max:255',
            'sektor_industri' => 'required',
            'alamat_usaha' => 'required|max:255',
            'sumber_pipeline' => 'required|max:255',
            'fasilitas' => 'required|max:255',
            'segmen_kredit' => 'required|max:255',
            'jenis_kredit' => 'required|max:255',
            'potensial_kredit' => 'required|integer',
            'omzet_bulanan' => 'required|integer',
            'laba_bulanan' => 'required|integer',
            'mutasi_rekening_bri' => 'required|integer',
            'mutasi_rekening_bank_lainnya' => 'required|integer',
            'saldo_simpanan_bri' => 'required|integer',
            'saldo_simpanan_bank_lainnya' => 'required|integer',
            'segmen' => 'required|max:255',
            'status_prospek' => 'required',
            'estimasi_realisasi' => 'required',
            'rekening_debitur' => 'required_if:status_prospek,==,"Sudah Realisasi"||max:15',
            'cif_debitur' => 'required_if:status_prospek,==,"Sudah Realisasi"',
            'pemilik_rekening' => 'required_if:status_prospek,==,"Sudah Realisasi"'
        ]);
        //return $request->input();
        //dd(Auth::user()->kode_uker);
        //dd(Auth::user()->PN);
        $values = ([
            'PN' => Auth::user()->PN,
            'nama_CPP' => $request['nama_CPP'],
            'jenis_usaha' => $request['jenis_usaha'],
            'sektor_industri' => $request['sektor_industri'],
            'alamat_usaha' => $request['alamat_usaha'],
            'sumber_pipeline' => $request['sumber_pipeline'],
            'fasilitas' => $request['fasilitas'],
            'segmen_kredit' => $request['segmen_kredit'],
            'jenis_kredit' => $request['jenis_kredit'],
            'potensial_kredit' => $request['potensial_kredit'],
            'omzet_bulanan' => $request['omzet_bulanan'],
            'laba_bulanan' => $request['laba_bulanan'],
            'mutasi_rekening_bri' => $request['mutasi_rekening_bri'],
            'mutasi_rekening_bank_lainnya' => $request['mutasi_rekening_bank_lainnya'],
            'saldo_simpanan_bri' => $request['saldo_simpanan_bri'],
            'saldo_simpanan_bank_lainnya' => $request['saldo_simpanan_bank_lainnya'],
            'segmen' => $request['segmen'],
            'unit' => Auth::user()->unit,
            'kode_unit' => Auth::user()->kode_unit,
            'branch' => Auth::user()->branch,
            'status_prospek' => $request['status_prospek'],
            'estimasi_realisasi' => Carbon::createFromFormat('m/d/Y', $request['estimasi_realisasi'])->format('Y-m-d'),
            'status_approval' => 'Belum Disetujui',
            'PN_approval' => NULL,
        ]); //dd($values);
        /* Creating a new prospect and then adding a log to the database. */
        $new_id = Prospect::create($values)->id;
        $log = $this->add_log('menambahkan', 'prospect', $new_id);
        
        $branch = Auth::user()->branch;
        $userlv4 = User::where('role_id', 4)->where('branch', $branch)->first();
        $unit = Auth::user()->unit;//dd($uker);
        $userlv3 = User::where('role_id', 3)->where('unit', $unit)->first();
        //dd($userlv4);
        
        if($userlv4) $this->send_notif($userlv4->PN, $log->id);
        
        if($userlv3) $this->send_notif($userlv3->PN, $log->id);
        


        if($request['status_prospek'] == "Sudah Realisasi"){
            $real_id = Realisasi::create([
                'prospect_id' => $new_id,
                'rekening_debitur' => $request['rekening_debitur'],
                'cif_debitur' => $request['cif_debitur'],
                'pemilik_rekening' => $request['pemilik_rekening'],
                'tanggal_realisasi' => Carbon::createFromFormat('m/d/Y', $request['tanggal_realisasi'])->format('Y-m-d'),
                'keterangan' => $request['keterangan']

            ])->id;
            $log = $this->add_log('menambahkan', 'realisasi', $real_id);

            $branch = Auth::user()->branch;
            $userlv4 = User::where('role_id', 4)->where('branch', $branch)->get();
            $unit = Auth::user()->unit;//dd($uker);
            $userlv3 = User::where('role_id', 3)->where('unit', $unit)->get();
            
            if($userlv4) $this->send_notif($userlv4->PN, $log->id);
            if($userlv3) $this->send_notif($userlv3->PN, $log->id);

            return redirect()->back()->banner('Prospek dan Realisasi Berhasil Ditambahkan');
        }
        //$request->session()->flash('flash.banner', 'Yay it works!');
        else return redirect()->back()->banner('Prospek Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prospect = Prospect::where('id', $id)->select('prospects.*', 'users.nama AS nama')
                    ->join('users', 'users.PN', '=', 'prospects.PN')
                    ->first();
        
        $this->authorize('show-prospect', $prospect);
        return view('prospect.show', compact('prospect'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //abort_if(Gate::denies('prospect_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $prospect = Prospect::where('prospects.id', $id)
                            ->join('realisasis', 'realisasis.prospect_id', '=', 'prospects.id')
                            ->first();
        if(!$prospect) $prospect = Prospect::where('prospects.id', $id)->first();
        
        //dd($prospect);
        $this->authorize('show-prospect', $prospect);
        return view('prospect.edit', compact('prospect'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  object  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //abort_if(Gate::denies('prospect_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $request->validate([
            
            'nama_CPP' => 'required|max:255',
            'jenis_usaha' => 'required|max:255',
            'sektor_industri' => 'required|max:255',
            'alamat_usaha' => 'required|max:255',
            'sumber_pipeline' => 'required|max:255',
            'fasilitas' => 'required|max:255',
            'segmen_kredit' => 'required|max:255',
            'jenis_kredit' => 'required|max:255',
            'potensial_kredit' => 'required|integer',
            'omzet_bulanan' => 'required|integer',
            'laba_bulanan' => 'required|integer',
            'mutasi_rekening_bri' => 'required|integer',
            'mutasi_rekening_bank_lainnya' => 'required|integer',
            'saldo_simpanan_bri' => 'required|integer',
            'saldo_simpanan_bank_lainnya' => 'required|integer',
            'segmen' => 'required|max:255',
            'status_prospek' => 'required',
            'rekening_debitur' => 'required_if:status_prospek,==,"Sudah Realisasi"||max:15',
            'cif_debitur' => 'required_if:status_prospek,==,"Sudah Realisasi"',
            'pemilik_rekening' => 'required_if:status_prospek,==,"Sudah Realisasi"'
        ]);
        //return $request->input();
        //$values = Prospect::where('id', $id)->first();
        

        if($request['status_approval']) {
            $pn = Auth::user()->PN;
        }
        else $pn = NULL;
        if(!$request->has('status_approval')) {
            $approve = Prospect::where('id', $id)->select('status_approval', 'PN_approval')->first();
            $request['status_approval'] = $approve->status_approval;
            $request['PN_approval'] = $approve->PN_approval;
        }
        $values = ([
            'nama_CPP' => $request['nama_CPP'],
            'jenis_usaha' => $request['jenis_usaha'],
            'sektor_industri' => $request['sektor_industri'],
            'alamat_usaha' => $request['alamat_usaha'],
            'sumber_pipeline' => $request['sumber_pipeline'],
            'fasilitas' => $request['fasilitas'],
            'segmen_kredit' => $request['segmen_kredit'],
            'jenis_kredit' => $request['jenis_kredit'],
            'potensial_kredit' => $request['potensial_kredit'],
            'omzet_bulanan' => $request['omzet_bulanan'],
            'laba_bulanan' => $request['laba_bulanan'],
            'mutasi_rekening_bri' => $request['mutasi_rekening_bri'],
            'mutasi_rekening_bank_lainnya' => $request['mutasi_rekening_bank_lainnya'],
            'saldo_simpanan_bri' => $request['saldo_simpanan_bri'],
            'saldo_simpanan_bank_lainnya' => $request['saldo_simpanan_bank_lainnya'],
            'segmen' => $request['segmen'],
            'status_prospek' => $request['status_prospek'],
            'status_approval' => $request['status_approval'],
            'PN_approval' => $pn,
        ]); 
        Prospect::where('id', $id)->update($values);
        
        //pembaruan prospek simpel tidak perlu mengirim notif
        $this->add_log('memperbarui', 'prospect', $id);


        if($request['status_approval'] == 'Disetujui' && !Progress::where('prospect_id', $id)->first()) {
            $prog_id = Progress::create([
                'prospect_id' => $id,
                'status_agunan' => 0,
                'status_dokumen' => 0,
                'ots' => 0
            ])->id;
            
            $log = $this->add_log('menyetujui', 'progress', $prog_id);
            $inputter = Prospect::where('id', $id)->first();
            $userlv2 = User::where('PN', $inputter->PN)->first();
            
            if($userlv2) $this->send_notif($userlv2->PN, $log->id);
            
        }

        if($request['status_approval'] == 'Ditolak'){
            $log = $this->add_log('menolak', 'prospect', $id);
            $inputter = Prospect::where('id', $id)->first();
            $userlv2 = User::where('PN', $inputter->PN)->first();
            //dd($userlv2);
            if($userlv2) $this->send_notif($userlv2->PN, $log->id);
        }
            
        if($request['status_prospek'] == "Sudah Realisasi" ){
            $real_id = Realisasi::where('prospect_id', $id)->select('id')->first();
            
            if($real_id){
                Realisasi::where('id', $real_id->id)->update([
                    'rekening_debitur' => $request['rekening_debitur'],
                    'cif_debitur' => $request['cif_debitur'],
                    'pemilik_rekening' => $request['pemilik_rekening'],
                    'tanggal_realisasi' => Carbon::createFromFormat('m/d/Y', $request['tanggal_realisasi'])->format('Y-m-d'),
                    'keterangan' => $request['keterangan']
                ]);
                //pembaruan realisasi tidak perlu notif
                $this->add_log('memperbarui', 'realisasi', $real_id->id);
            }
            else {
                $new_id = Realisasi::create([
                'prospect_id' => $id,
                'rekening_debitur' => $request['rekening_debitur'],
                'cif_debitur' => $request['cif_debitur'],
                'pemilik_rekening' => $request['pemilik_rekening'],
                'tanggal_realisasi' => Carbon::createFromFormat('m/d/Y', $request['tanggal_realisasi'])->format('Y-m-d'),
                'keterangan' => $request['keterangan']])->id;

                
                $log = $this->add_log('menambahkan', 'realisasi', $new_id);

                $branch = Auth::user()->branch;
                $userlv4 = User::where('role_id', 4)->where('branch', $branch)->get();
                $unit = Auth::user()->unit;//dd($uker);
                $userlv3 = User::where('role_id', 3)->where('unit', $unit)->get();
                //dd($userlv4);
                if($userlv4 == NULL) $this->send_notif($userlv4->PN, $log->id);
                if($userlv3 == NULL) $this->send_notif($userlv3->PN, $log->id);

            }
        }
        return redirect()->back()->banner('Prospek Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prospect $prospect)
    {
        $this->add_log('menghapus', 'prospect', $prospect->id);
        $prospect->delete();
        
        return redirect()->back()->banner('Prospek Telah Dihapus dari Sistem');
    }

    
    public function gate()
    {
        $prospect = Prospect::find(1);
        dd($prospect);
        if (Gate::allows('show-prospect', $prospect)) {
        echo 'Allowed';
        } else {
        echo 'Forbidden Access';
        }
        
        exit;
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
