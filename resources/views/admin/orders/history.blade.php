<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pesanan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-gradient-to-br from-slate-900 via-gray-900 to-black text-gray-100">

    <div class="max-w-5xl mx-auto p-6">

        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-indigo-400">Riwayat Pesanan</h2>
            <a href="{{ route('home') }}"
               class="text-gray-400 hover:text-gray-200 hover:underline text-sm">
                ⬅ Kembali ke Halaman Utama
            </a>
        </div>

        @if($orders->count() > 0)
            <div class="space-y-4">
                @foreach($orders as $o)
                    <div class="bg-slate-800/90 backdrop-blur p-5 rounded-xl shadow-lg border border-slate-700">

                        <h3 class="text-xl font-bold text-indigo-300 mb-2">
                            {{ $o->event->nama_event }}
                        </h3>

                        <div class="space-y-1 text-sm text-gray-300">
                            <p>
                                <strong class="text-gray-200">Jumlah Tiket:</strong>
                                {{ $o->jumlah_tiket }}
                            </p>

                            <p>
                                <strong class="text-gray-200">Total Harga:</strong>
                                Rp{{ number_format($o->total_harga,0,',','.') }}
                            </p>

                            <p>
                                <strong class="text-gray-200">Status Pembayaran:</strong>
                                <span class="font-semibold
                                    {{ $o->payment_status == 'paid'
                                        ? 'text-emerald-400'
                                        : 'text-amber-400' }}">
                                    {{ ucfirst($o->payment_status) }}
                                </span>
                            </p>

                            <p>
                                <strong class="text-gray-200">Metode Bayar:</strong>
                                <span class="uppercase tracking-wide text-gray-100">
                                    {{ $o->payment_method }}
                                </span>
                            </p>
                        </div>

                        <p class="text-gray-500 text-xs mt-3">
                            Dipesan pada: {{ $o->created_at->format('d M Y H:i') }}
                        </p>
                    </div>
                @endforeach
            </div>

        @else
            <p class="text-gray-500 text-center mt-16">
                Belum ada pesanan.
            </p>
        @endif

    </div>

</body>
</html>
