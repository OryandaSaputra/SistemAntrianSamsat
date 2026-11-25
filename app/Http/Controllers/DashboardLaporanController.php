<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardLaporanController extends Controller
{
    public function index()
    {
        return view('dashboard.laporan.index');
    }

    public function cetakLaporan(Request $request)
    {
        $period = $request->query('period');
        $service = $request->query('layanan');
        $query = Antrian::query()->where('is_call', true);

        if ($period === 'today') {
            $query->where('tanggal_antrian', Carbon::today()->toDateString());
        } elseif ($period === 'week') {
            $query->whereBetween('tanggal_antrian', [Carbon::now()->startOfWeek()->toDateString(), Carbon::now()->endOfWeek()->toDateString()]);
        } elseif ($period === 'month') {
            $query->whereYear('tanggal_antrian', Carbon::now()->year)->whereMonth('tanggal_antrian', Carbon::now()->month);
        }

        if (in_array($service, ['bpkb', 'pajak', 'stnk', 'uji'], true)) {
            $query->where('layanan', $service);
        }

        $search = trim((string) $request->query('search', ''));
        if ($search !== '') {
            $query->where(function ($builder) use ($search) {
                $builder->where('nama', 'like', "%{$search}%")
                    ->orWhere('no_antrian', 'like', "%{$search}%");
            });
        }

        $laporan = $query->orderByDesc('tanggal_antrian')->orderBy('no_antrian')->get();

        return Pdf::loadView('livewire.dashboard.laporan.cetakLaporan', compact('laporan'))
            ->stream('laporan-antrian-' . now()->format('Ymd') . '.pdf');
    }
}
