<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\LogChanges;
use App\Models\Notifications;
use Illuminate\Support\Facades\Auth;
use App\Models\Prospect;
use App\Models\Progress;
Use App\Models\Realisasi;

class BellNotification extends Component
{
    public function render()
    {
        $logs = Notifications::where('notifications.PN', Auth::user()->PN)
        ->select('lc.nama', 'lc.PN', 'lc.aksi', 'lc.tabel_target', 'lc.id_target', 'lc.created_at', 'notifications.read', 'notifications.id')
        ->join('log_changes AS lc', 'lc.id', '=', 'log_id')
        ->limit(5)
        ->orderBy('id', 'DESC')
        ->get();
        
        foreach($logs as $log){
            if($log->tabel_target == 'prospect'){
                $cpp = Prospect::select('nama_CPP', 'potensial_kredit')
                ->where('id', $log->id_target)
                ->first();
            }
            else if($log->tabel_target=='progress'){
                $cpp = Progress::where('progress.id', $log->id_target)
                ->join('prospects', 'prospects.id', '=', 'prospect_id')
                ->select('prospects.nama_CPP', 'prospects.potensial_kredit')
                ->first();
            }
            else if($log->tabel_target=='realisasi'){
                $cpp = Realisasi::where('realisasis.id', $log->id_target)
                ->join('prospects', 'prospects.id', '=', 'prospect_id')
                ->select('prospects.nama_CPP', 'prospects.potensial_kredit')
                ->first();
            }
            $log['nama_CPP'] = $cpp->nama_CPP;

            if ($cpp->potensial_kredit>=1000) $potensi_kredit = ($cpp->potensial_kredit/1000).' M';
            else $potensi_kredit = ($cpp->potensial_kredit).' Juta';
            $log['potensial_kredit'] = $potensi_kredit;
        }
        
        return view('livewire.bell-notification', compact('logs'));
    }
}
