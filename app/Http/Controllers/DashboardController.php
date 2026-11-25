<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::today();
        $now = Carbon::now();

        return view('dashboard.index', [
            'hariIniAntri' => Antrian::whereDate('tanggal_antrian', $today)->count(),
            'mingguIniAntri' => Antrian::whereBetween('tanggal_antrian', [$now->copy()->startOfWeek(), $now->copy()->endOfWeek()])->count(),
            'bulanIniAntri' => Antrian::whereYear('tanggal_antrian', $now->year)->whereMonth('tanggal_antrian', $now->month)->count(),
            'semuaAntri' => Antrian::count(),
            'bpkb' => Antrian::where('layanan', 'bpkb')->where('tanggal_antrian', $today->toDateString())->where('is_call', false)->count(),
            'stnk' => Antrian::where('layanan', 'stnk')->where('tanggal_antrian', $today->toDateString())->where('is_call', false)->count(),
            'pajak' => Antrian::where('layanan', 'pajak')->where('tanggal_antrian', $today->toDateString())->where('is_call', false)->count(),
            'uji' => Antrian::where('layanan', 'uji')->where('tanggal_antrian', $today->toDateString())->where('is_call', false)->count(),
        ]);
    }
}
