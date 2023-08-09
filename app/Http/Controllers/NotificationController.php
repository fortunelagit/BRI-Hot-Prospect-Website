<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Notifications;


class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logs = Notifications::where('notifications.PN', Auth::user()->PN)
        ->select('lc.nama', 'lc.PN', 'lc.aksi', 'lc.tabel_target', 'lc.id_target', 'lc.created_at', 'notifications.read', 'notifications.id')
        ->join('log_changes AS lc', 'lc.id', '=', 'log_id')
        ->orderBy('id', 'DESC')
        ->get();
        return view('notifications', compact('logs'));
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
        Notifications::where('id', $id)->update(['read' => 1]);
        $log = Notifications::where('notifications.id', $id)
                            ->select('lc.tabel_target', 'lc.id_target')
                            ->join('log_changes AS lc', 'lc.id', '=', 'log_id')
                            ->first();
        $url = "/{$log->tabel_target}/{$log->id_target}";

        return redirect($url);
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
