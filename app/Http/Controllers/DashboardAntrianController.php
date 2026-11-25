<?php

namespace App\Http\Controllers;

class DashboardAntrianController extends Controller
{
    public function indexLayananBpkb() { return view('dashboard.antrian.bpkb'); }
    public function indexLayananStnk() { return view('dashboard.antrian.stnk'); }
    public function indexLayananPajakKendaraan() { return view('dashboard.antrian.pajak'); }
    public function indexLayananUjiKendaraan() { return view('dashboard.antrian.uji'); }
}
