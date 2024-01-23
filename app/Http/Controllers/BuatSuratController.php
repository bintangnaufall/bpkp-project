<?php

namespace App\Http\Controllers;

use App\Models\dasaracuansurat;
use PDF;
use Carbon\Carbon;
use App\Models\User;
use App\Models\surat;

use App\Models\jabatan;
use App\Models\tembusansurat;
use App\Models\tujuansurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class BuatSuratController extends Controller
{
    public function index()
    {
        return view('surat.buatSurat',[
            "jabatans" => jabatan::all(),
        ]);
    }

    public function fetchjabatan(Request $request)
    {
        $data['jabatan'] = User::where("jabatan_id", $request->jabatan_id)->get(["name", "nip"]);

        if ($data['jabatan']->isEmpty()) {
            return response()->json(['status' => false, 'message' => 'No data found']);
        }
    
        return response()->json(['status' => true, 'data' => $data['jabatan']]);
    }

    public function fetchnip(Request $request)
    {
        $data['user'] = User::where("NIP", $request->nip)->with('jabatan')->first(['name', 'jabatan_id']);
    
        if (!$data['user']) {
            return response()->json(['status' => false, 'message' => 'No data found']);
        }
    
        // Check if the 'jabatan' relationship is loaded and has any records
        if ($data['user']->jabatan && $data['user']->jabatan->count() > 0) {
            return response()->json(['status' => true, 'data' => $data['user']]);
        } else {
            return response()->json(['status' => false, 'message' => 'No jabatan data found']);
        }
    }

    public function pdfview(Request $request)
    {        
        // dd($request->all());
        $jabatan = jabatan::find($request->jabatan_id);

        if ($jabatan) {
            $nama_jabatan = $jabatan->name;
        } else {
            $nama_jabatan = "<Jabatan>";
        }
        
        $data = [
            "nomor_surat" => $request->nomor_surat ? $request->nomor_surat : "<Nomor_Surat>",
            "lampiran_surat" => $request->lampiran_surat ? $request->lampiran_surat : "<Lampiran_Surat>",
            "perihal_surat" => $request->perihal_surat ? $request->perihal_surat : "<Perihal_Surat>",
            "tanggal_surat" =>  $request->tanggal_surat ? Carbon::parse($request->tanggal_surat)->locale('id')->isoFormat('D MMMM Y') : "<Tanggal_Surat>",

            "tujuan_surat" => $request->tujuan_surat,
            "alamat_tujuan" => $request->alamat_tujuan ?? "<Alamat_Tujuan>",


            "dasar_acuan" => $request->dasar_acuan,
            "rincian_pelaksanaan_penugasan" => $request->rincian_pelaksanaan_penugasan ? $request->rincian_pelaksanaan_penugasan : "<Rincian_pelaksanaan_penugasan>",
            "beban_anggaran" => $request->beban_anggaran ? $request->beban_anggaran : "<Beban_Anggaran>",


            "Jabatan" => $nama_jabatan,
            "nama_pejabat" => $request->nama_pejabat ? $request->nama_pejabat : "<Nama_Pejabat>",
            "nip_pejabat" => $request->nip_pejabat ? $request->nip_pejabat : "<NIP_Pejabat>",

            "tembusan_surat" => $request->tembusan_surat,
        ];
        $pdf = PDF::loadView('pdf.pdf_preview', compact('data'));

        return $pdf->stream('pdf.pdf_preview.pdf');
    }


    public function store( Request $request)
    {
        // dd($request->all());
        $surat = new surat();
        $surat->tanggal_surat = $request->tanggal_surat;
        $surat->keterangan_lampiran	 = $request->lampiran_surat;
        $surat->perihal_surat = $request->perihal_surat;
        
        $surat->{'alamat_instansi/pejabat'} = $request->alamat_tujuan;
        $surat->rincian_pelaksanaan_penugasan = $request->rincian_pelaksanaan_penugasan;
        $surat->beban_anggaran = $request->beban_anggaran;

        $user = User::where("NIP" , $request->nip_pejabat)->first();
        $surat->nama_pejabat = $user->id;

        $surat->pembuat_surat = auth()->user()->id;

        $jabatan = jabatan::find($request->jabatan_id);

        if ($jabatan) {
            $nama_jabatan = $jabatan->name;
        } else {
            $nama_jabatan = "<Jabatan>";
        }
        
        $data = [
            "nomor_surat" => $request->nomor_surat ? $request->nomor_surat : "<Nomor_Surat>",
            "lampiran_surat" => $request->lampiran_surat ? $request->lampiran_surat : "<Lampiran_Surat>",
            "perihal_surat" => $request->perihal_surat ? $request->perihal_surat : "<Perihal_Surat>",
            "tanggal_surat" =>  $request->tanggal_surat ? Carbon::parse($request->tanggal_surat)->locale('id')->isoFormat('D MMMM Y') : "<Tanggal_Surat>",

            "tujuan_surat" => $request->tujuan_surat,
            "alamat_tujuan" => $request->alamat_tujuan ?? "<Alamat_Tujuan>",


            "dasar_acuan" => $request->dasar_acuan,
            "rincian_pelaksanaan_penugasan" => $request->rincian_pelaksanaan_penugasan ? $request->rincian_pelaksanaan_penugasan : "<Rincian_pelaksanaan_penugasan>",
            "beban_anggaran" => $request->beban_anggaran ? $request->beban_anggaran : "<Beban_Anggaran>",


            "Jabatan" => $nama_jabatan,
            "nama_pejabat" => $request->nama_pejabat ? $request->nama_pejabat : "<Nama_Pejabat>",
            "nip_pejabat" => $request->nip_pejabat ? $request->nip_pejabat : "<NIP_Pejabat>",

            "tembusan_surat" => $request->tembusan_surat,
        ];
        $pdf = PDF::loadView('pdf.pdf_preview', compact('data'));

        $pdfPath = 'public/pdf/' . uniqid() . '.pdf';
        Storage::put($pdfPath, $pdf->output());

        $surat->pdf = $pdfPath;
        $surat->save();

        foreach ($request->tujuan_surat as $tujuan) {
            $tujuan_surat = new tujuansurat();
            $tujuan_surat->surat_id = $surat->id;
            $tujuan_surat->tujuan_surat	= $tujuan;
            $tujuan_surat->save();
        }
        foreach ($request->dasar_acuan as $acuan) {
            $dasar_acuan = new dasaracuansurat();
            $dasar_acuan->surat_id = $surat->id;
            $dasar_acuan->dasar_acuan_surat = $acuan;
            $dasar_acuan->save();
        }
        foreach ($request->tembusan_surat as $tembusan) {
            $tembusan_surat = new tembusansurat();
            $tembusan_surat->surat_id = $surat->id;
            $tembusan_surat->tembusan_surat = $tembusan;
            $tembusan_surat->save();
        }
    }

    public function edit(surat $surat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, surat $surat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(surat $surat)
    {
        //
    }
}
