<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Event</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-gradient-to-br from-gray-900 via-gray-800 to-black text-gray-200">

<!-- NAVBAR -->
<nav class="bg-gray-900/80 backdrop-blur border-b border-gray-700">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        <h1 class="text-2xl font-bold text-indigo-400">EventKu</h1>

        <div class="flex items-center gap-4">
            <a href="{{ route('admin.dashboard') }}"
               class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-600 transition">
                Admin
            </a>
        </div>
    </div>
</nav>

<!-- CONTENT -->
<div class="max-w-6xl mx-auto p-6">

    <!-- HEADER -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-bold text-white">Daftar Event</h2>

        <a href="{{ route('orders.history') }}"
           class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition">
            Riwayat Pesanan
        </a>
    </div>

    <!-- LIST EVENT -->
    @if($events->count() > 0)
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($events as $e)
                <div class="bg-gray-800/80 backdrop-blur p-5 rounded-xl shadow-lg hover:shadow-indigo-500/30 transition">

                    <h3 class="text-xl font-bold text-indigo-400 mb-2">
                        {{ $e->nama_event }}
                    </h3>

                    <div class="text-gray-300 space-y-1 mb-4 text-sm">
                        <p><strong>Lokasi:</strong> {{ $e->lokasi }}</p>
                        <p><strong>Tanggal:</strong> {{ $e->tanggal }}</p>
                        <p>
                            <strong>Harga:</strong>
                            Rp{{ number_format($e->harga, 0, ',', '.') }}
                            | <strong>Stok:</strong> {{ $e->stok }}
                        </p>
                    </div>

                    <div class="flex flex-wrap gap-2">
                        <a href="{{ route('events.show', $e->id) }}"
                           class="bg-gray-700 px-3 py-1 rounded hover:bg-gray-600 transition text-sm">
                            Detail
                        </a>

                        <a href="{{ route('order.form', $e->id) }}"
                           class="bg-green-600 px-3 py-1 rounded hover:bg-green-700 transition text-sm text-white">
                            Pesan Tiket
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-gray-400 mt-6 text-center">
            Belum ada event tersedia.
        </p>
    @endif

</div>

</body>
</html>
