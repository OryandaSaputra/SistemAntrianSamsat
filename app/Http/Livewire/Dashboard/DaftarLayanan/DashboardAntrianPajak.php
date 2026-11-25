<?php

namespace App\Http\Livewire\Dashboard\DaftarLayanan;

use App\Http\Livewire\Concerns\AuthorizesAdmin;
use App\Models\Antrian;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class DashboardAntrianPajak extends Component
{
    use WithPagination, AuthorizesAdmin;

    protected $paginationTheme = 'bootstrap';
    public $antrian_id;

    public function panggilAntrian($id)
    {
        $this->ensureAdmin();
        $this->antrian_id = Antrian::query()
            ->where('layanan', 'pajak')
            ->where('is_call', false)
            ->where('tanggal_antrian', now()->toDateString())
            ->findOrFail($id)->id;
    }

    public function updatePanggilan()
    {
        $this->ensureAdmin();

        DB::transaction(function () {
            $queue = Antrian::query()
                ->where('layanan', 'pajak')
                ->where('is_call', false)
                ->where('tanggal_antrian', now()->toDateString())
                ->lockForUpdate()
                ->findOrFail($this->antrian_id);
            $queue->update(['is_call' => true]);
        });

        $this->reset('antrian_id');
        $this->resetPage();
        session()->flash('success', 'Antrean berhasil dipanggil dan ditandai selesai.');
        $this->dispatchBrowserEvent('closeModal');
    }

    public function render()
    {
        $this->ensureAdmin();

        $queues = Antrian::query()
            ->where('layanan', 'pajak')
            ->where('is_call', false)
            ->where('tanggal_antrian', now()->toDateString())
            ->orderBy('id')
            ->paginate(10);

        return view('livewire.dashboard.daftar-layanan.dashboard-antrian-pajak', [
            'pajak' => $queues,
        ]);
    }
}
