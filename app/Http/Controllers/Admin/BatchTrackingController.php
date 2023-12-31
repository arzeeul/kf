<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Models\BatchTracking;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class BatchTrackingController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'status' => 'required',
            'bukti' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $keterangan = $request->keterangan ?? '-';
        $status = [];
        switch ($request->status) {
            case ('penimbangan'):
                $status = 'Penimbangan';
                break;
            case ('pengolahan'):
                $status = 'Pengolahan';
                break;
            case ('rekonsiliasi'):
                $status = 'Rekonsiliasi';
                break;
            case ('container'):
                $status = 'Container';
                break;
            case ('pengisian'):
                $status = 'Pengisian';
                break;
            case ('pengemasan'):
                $status = 'Pengemasan';
                break;
            case ('selesai'):
                $status = 'Selesai';
                break;
            }

        $fileSave = '';

        if ($request->hasFile('bukti')) {
        $file = $request->file('bukti');
        $filename = $file->getClientOriginalName();
        $fileExt = $file->getClientOriginalExtension();
        $path='Foto-bukti';
        $fileSave = Auth::user()->id . '-' . time() . '-' . $filename;
        $file->move('Foto-bukti', $fileSave);


        }


        BatchTracking::create(

            [
                'batch_id' => $request->batch_id,
                'user_id'  => Auth::user()->id,
                'keterangan' => $keterangan,
                'status'   => $status,
                'bukti' => $fileSave,

            ]
        );
        return redirect()
            ->back()
            ->with('success', 'Sukses! 1 Data Berhasil Disimpan');


    }

    public function show(BatchTracking $batchTracking)
    {
        //
    }


    public function edit(BatchTracking $batchTracking)
    {
        //
    }

    public function update(Request $request, BatchTracking $batchTracking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BatchTracking  $batchTracking
     * @return \Illuminate\Http\Response
     */
    public function destroy(BatchTracking $batchTracking)
    {
        //
    }
}
