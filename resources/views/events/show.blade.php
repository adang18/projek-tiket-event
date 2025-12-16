<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Event</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-slate-900 via-gray-900 to-black text-gray-100">

    <div class="max-w-xl mx-auto p-6">
        
        <div class="bg-slate-800/90 backdrop-blur shadow-xl rounded-xl p-6 border border-slate-700">

            <h1 class="text-2xl font-bold mb-4 text-indigo-400 tracking-wide">
                {{ $event->nama_event }}
            </h1>

            <div class="space-y-3 text-gray-300 text-sm">

                <p>
                    <span class="font-semibold text-gray-100">📍 Lokasi:</span> 
                    {{ $event->lokasi }}
                </p>

                <p>
                    <span class="font-semibold text-gray-100">📅 Tanggal:</span> 
                    {{ $event->tanggal }}
                </p>

                <p>
                    <span class="font-semibold text-gray-100">💵 Harga:</span> 
                    Rp {{ number_format($event->harga, 0, ',', '.') }}
                </p>

                <p>
                    <span class="font-semibold text-gray-100">🎟️ Stok:</span> 
                    {{ $event->stok }}
                </p>

                @if($event->deskripsi)
                <p class="pt-2">
                    <span class="font-semibold text-gray-100">📝 Deskripsi:</span><br>
                    <span class="text-gray-400">{{ $event->deskripsi }}</span>
                </p>
                @endif
            </div>

            <div class="flex gap-3 mt-6">
                <a href="{{ route('order.form', $event->id) }}" 
                   class="px-4 py-2 rounded-md bg-emerald-600 text-white text-sm font-medium hover:bg-emerald-700 transition">
                    Pesan Tiket
                </a>

                <a href="{{ route('events.index') }}" 
                   class="px-4 py-2 rounded-md bg-slate-700 text-gray-200 text-sm font-medium hover:bg-slate-600 transition">
                    Kembali
                </a>
            </div>

        </div>
    </div>

</body>
</html>
