<?php

namespace App\Http\Livewire\Antrian;

use App\Models\Antrian;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ShowAntrian extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $antrian_id;
    public $nama = '';
    public $alamat = '';
    public $no_hp = '';
    public $no_ktp = '';
    public $layanan = '';
    public $filterLayanan = '';

    protected function rules()
    {
        return [
            'nama' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string', 'max:1000'],
            'no_hp' => ['required', 'regex:/^[0-9+(). -]{8,20}$/'],
            'no_ktp' => ['required', 'digits_between:12,20'],
            'layanan' => ['required', 'in:bpkb,pajak,stnk,uji'],
        ];
    }

    public function updated($field)
    {
        if (array_key_exists($field, $this->rules())) {
            $this->validateOnly($field);
        }
    }

    public function updatedFilterLayanan()
    {
        $this->resetPage();
    }

    public function save()
    {
        abort_unless(Auth::check(), 403);
        $validated = $this->validate();
        $today = now()->toDateString();

        $queue = DB::transaction(function () use ($validated, $today) {
            return Antrian::create([
                'no_antrian' => $this->reserveNextQueueNumber($validated['layanan'], $today),
                'nama' => $validated['nama'],
                'alamat' => $validated['alamat'],
                'no_hp' => $validated['no_hp'],
                'no_ktp' => $validated['no_ktp'],
                'layanan' => $validated['layanan'],
                'tanggal_antrian' => $today,
                'user_id' => Auth::id(),
                'is_call' => false,
            ]);
        }, 3);

        session()->flash('success', 'Nomor antrean ' . $queue->no_antrian . ' berhasil dibuat.');
        $this->reset(['nama', 'alamat', 'no_hp', 'no_ktp', 'layanan']);
        $this->resetPage();
        $this->dispatchBrowserEvent('closeModal');
    }

    public function editAntrian($id)
    {
        $antrian = $this->ownedQueue($id);
        $this->antrian_id = $antrian->id;
        $this->nama = $antrian->nama;
        $this->alamat = $antrian->alamat;
        $this->no_hp = $antrian->no_hp;
        $this->no_ktp = $antrian->no_ktp;
        $this->layanan = $antrian->layanan;
    }

    public function updateAntrian()
    {
        $antrian = $this->ownedQueue($this->antrian_id);
        $validated = $this->validate();

        DB::transaction(function () use ($antrian, $validated) {
            $lockedQueue = Antrian::query()
                ->where('user_id', Auth::id())
                ->where('is_call', false)
                ->lockForUpdate()
                ->findOrFail($antrian->id);

            $number = $lockedQueue->no_antrian;
            if ($validated['layanan'] !== $lockedQueue->layanan) {
                $number = $this->reserveNextQueueNumber($validated['layanan'], $lockedQueue->tanggal_antrian->toDateString());
            }

            $lockedQueue->update([
                'no_antrian' => $number,
                'nama' => $validated['nama'],
                'alamat' => $validated['alamat'],
                'no_hp' => $validated['no_hp'],
                'no_ktp' => $validated['no_ktp'],
                'layanan' => $validated['layanan'],
            ]);
        }, 3);

        session()->flash('success', 'Data antrean berhasil diperbarui.');
        $this->resetInput();
        $this->dispatchBrowserEvent('closeModal');
    }

    public function deleteAntrian($id)
    {
        $this->antrian_id = $this->ownedQueue($id)->id;
    }

    public function destroy()
    {
        $this->ownedQueue($this->antrian_id)->delete();
        session()->flash('success', 'Antrean berhasil dibatalkan.');
        $this->resetInput();
        $this->dispatchBrowserEvent('closeModal');
    }

    public function close_modal()
    {
        $this->resetInput();
    }


    protected function reserveNextQueueNumber(string $service, string $date): string
    {
        $prefixes = ['bpkb' => 'A', 'pajak' => 'B', 'stnk' => 'C', 'uji' => 'D'];

        DB::table('antrian_counters')->insertOrIgnore([
            'layanan' => $service,
            'tanggal_antrian' => $date,
            'last_number' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $counter = DB::table('antrian_counters')
            ->where('layanan', $service)
            ->where('tanggal_antrian', $date)
            ->lockForUpdate()
            ->first();

        $legacyNumber = Antrian::query()
            ->where('layanan', $service)
            ->where('tanggal_antrian', $date)
            ->get(['no_antrian'])
            ->max(function ($item) {
                return (int) preg_replace('/\D+/', '', $item->no_antrian);
            }) ?: 0;

        $nextNumber = max((int) $counter->last_number, $legacyNumber) + 1;

        DB::table('antrian_counters')
            ->where('id', $counter->id)
            ->update(['last_number' => $nextNumber, 'updated_at' => now()]);

        return $prefixes[$service] . $nextNumber;
    }

    protected function ownedQueue($id): Antrian
    {
        abort_unless(Auth::check(), 403);

        return Antrian::query()
            ->where('user_id', Auth::id())
            ->where('is_call', false)
            ->findOrFail($id);
    }

    protected function resetInput()
    {
        $this->reset(['antrian_id', 'nama', 'alamat', 'no_hp', 'no_ktp', 'layanan']);
        $this->resetValidation();
    }

    public function render()
    {
        $publicQueue = Antrian::query()
            ->select(['id', 'no_antrian', 'layanan', 'tanggal_antrian', 'is_call'])
            ->where('is_call', false)
            ->where('tanggal_antrian', now()->toDateString())
            ->when(in_array($this->filterLayanan, ['bpkb', 'pajak', 'stnk', 'uji'], true), function ($query) {
                $query->where('layanan', $this->filterLayanan);
            })
            ->orderBy('layanan')
            ->orderBy('id')
            ->paginate(10);

        $myQueues = Auth::check()
            ? Antrian::query()->where('user_id', Auth::id())->latest()->get()
            : collect();

        $canPrintTicket = $myQueues->contains(function ($queue) {
            return $queue->tanggal_antrian && $queue->tanggal_antrian->toDateString() === now()->toDateString();
        });

        return view('livewire.antrian.show-antrian', [
            'antrian' => $publicQueue,
            'detailAntrian' => $myQueues,
            'canPrintTicket' => $canPrintTicket,
        ]);
    }
}
