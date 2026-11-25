<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class FrontAntrianController extends Controller
{
    public function index()
    {
        return view('antrian.index');
    }

    public function cetakAntrian()
    {
        $detailAntrian = Antrian::query()
            ->where('user_id', Auth::id())
            ->where('tanggal_antrian', now()->toDateString())
            ->latest()
            ->get();

        abort_if($detailAntrian->isEmpty(), 404, 'Belum ada antrean aktif untuk dicetak.');

        return Pdf::loadView('livewire.antrian.cetakAntrian', [
            'detailAntrian' => $detailAntrian,
        ])->stream('antrian-' . now()->format('Ymd') . '.pdf');
    }
}
