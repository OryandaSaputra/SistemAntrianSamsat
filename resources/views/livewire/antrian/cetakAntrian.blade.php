<!doctype html>
<html lang="id">
<head><meta charset="utf-8"><title>Tiket Antrean SANRAS</title><style>body{font-family:DejaVu Sans,sans-serif;background:#f3f6fc;color:#111827;padding:26px}.ticket{max-width:440px;margin:0 auto;padding:28px;border:1px dashed #94a3b8;border-radius:16px;background:#fff;text-align:center}.brand{font-size:12px;color:#64748b;letter-spacing:2px;font-weight:bold}.number{font-size:54px;font-weight:bold;color:#2563eb;margin:18px 0}.meta{font-size:12px;color:#475569;line-height:1.8}.line{border-top:1px dashed #cbd5e1;margin:20px 0}.thanks{font-size:12px;color:#64748b}</style></head>
<body>
    @foreach ($detailAntrian as $item)
        <div class="ticket" style="margin-bottom:20px"><div class="brand">SAMSAT RIAU · SANRAS</div><h2>Tiket Antrean</h2><div class="number">{{ $item->no_antrian }}</div><div class="meta"><strong>{{ $item->nama }}</strong><br>{{ strtoupper($item->layanan) }}<br>{{ optional($item->tanggal_antrian)->format('d F Y') }}</div><div class="line"></div><div class="thanks">Harap simpan tiket ini dan ikuti informasi pemanggilan di kantor layanan.</div></div>
    @endforeach
</body></html>
