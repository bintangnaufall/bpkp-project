<?php

namespace App\Http\Controllers;

use App\Models\surat;
use App\Models\bidang;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bidang = bidang::with('surat')->get();
        // $jan = Surat::whereMonth('created_at', 1)
        // ->whereYear('created_at', 2024)
        // ->count();


        // return dd($jan);

        return view('dashboard', compact('bidang'));
    }

    public function jumlahSurat($month, $year) {
        $data = Surat::whereMonth('created_at', $month)
        ->whereYear('created_at', $year)
        ->count();

        return $data;
    }
}
