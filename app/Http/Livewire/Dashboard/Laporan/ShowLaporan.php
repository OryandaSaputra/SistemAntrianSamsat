<?php

namespace App\Http\Livewire\Dashboard\Laporan;

use App\Http\Livewire\Concerns\AuthorizesAdmin;
use App\Models\Antrian;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class ShowLaporan extends Component
{
    use WithPagination, AuthorizesAdmin;

    protected $paginationTheme = 'bootstrap';
    protected $queryString = ['search'];

    public $tanggal_antrian = '';
    public $layanan = '';
    public $search = '';
    public $deleteId;

    public function updatingSearch() { $this->resetPage(); }
    public function updatingTanggalAntrian() { $this->resetPage(); }
    public function updatingLayanan() { $this->resetPage(); }

    public function prepareDelete($id)
    {
        $this->ensureAdmin();
        $this->deleteId = Antrian::query()->where('is_call', true)->findOrFail($id)->id;
    }

    public function hapusAntrian()
    {
        $this->ensureAdmin();
        Antrian::query()->where('is_call', true)->findOrFail($this->deleteId)->delete();
        $this->reset('deleteId');
        $this->resetPage();
        session()->flash('success', 'Data antrean berhasil dihapus.');
        $this->dispatchBrowserEvent('closeReportDelete');
    }

    public function render()
    {
        $this->ensureAdmin();

        $query = Antrian::query()->where('is_call', true);

        if ($this->tanggal_antrian === 'today') {
            $query->where('tanggal_antrian', Carbon::today()->toDateString());
        } elseif ($this->tanggal_antrian === 'week') {
            $query->whereBetween('tanggal_antrian', [Carbon::now()->startOfWeek()->toDateString(), Carbon::now()->endOfWeek()->toDateString()]);
        } elseif ($this->tanggal_antrian === 'month') {
            $query->whereYear('tanggal_antrian', Carbon::now()->year)
                ->whereMonth('tanggal_antrian', Carbon::now()->month);
        }

        if (in_array($this->layanan, ['bpkb', 'pajak', 'stnk', 'uji'], true)) {
            $query->where('layanan', $this->layanan);
        }

        if (trim($this->search) !== '') {
            $term = trim($this->search);
            $query->where(function ($builder) use ($term) {
                $builder->where('nama', 'like', "%{$term}%")
                    ->orWhere('no_antrian', 'like', "%{$term}%");
            });
        }

        return view('livewire.dashboard.laporan.show-laporan', [
            'laporan' => $query->latest('tanggal_antrian')->latest('id')->paginate(10),
        ]);
    }
}
