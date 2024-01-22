<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\surat;
use App\Models\jabatan;
use Illuminate\Http\Request;

use PDF;
use Carbon\Carbon;


class BuatSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
        // dd($request->tujuan_surat[0]);
        $jabatan = jabatan::find($request->jabatan_id);

        if ($jabatan) {
            $nama_jabatan = $jabatan->name;
        } else {
            // Handle ketika tidak ditemukan jabatan dengan ID yang diberikan
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(surat $surat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
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
