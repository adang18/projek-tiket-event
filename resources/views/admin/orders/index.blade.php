<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Data Pesanan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-gradient-to-br from-slate-900 via-gray-900 to-black text-gray-100">

    <!-- NAVBAR -->
    <nav class="bg-slate-900/80 backdrop-blur shadow border-b border-slate-700">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-indigo-400">EventKu Admin</h1>

            <a href="{{ route('home') }}" class="text-gray-300 hover:text-white transition">
                ⬅ Kembali ke Halaman Utama
            </a>
        </div>
    </nav>

    <div class="max-w-6xl mx-auto p-6">

        @if(session('success'))
            <div class="bg-green-900/40 border border-green-700 text-green-300 px-4 py-3 rounded mb-5">
                {{ session('success') }}
            </div>
        @endif

        <h2 class="text-3xl font-bold text-indigo-400 mb-6">
            Daftar Pesanan Tiket
        </h2>

        @if($orders->count() > 0)

            <div class="overflow-x-auto bg-slate-800/80 backdrop-blur rounded-xl shadow-lg border border-slate-700">
                <table class="w-full text-left text-sm">
                    <thead class="bg-slate-700 text-gray-200">
                        <tr>
                            <th class="py-3 px-4">Pemesan</th>
                            <th class="py-3 px-4">Event</th>
                            <th class="py-3 px-4">Jumlah</th>
                            <th class="py-3 px-4">Total (Rp)</th>
                            <th class="py-3 px-4">Metode</th>
                            <th class="py-3 px-4">Status</th>
                            <th class="py-3 px-4 text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($orders as $o)
                            <tr class="border-b border-slate-700 hover:bg-slate-700/50 transition">
                                <td class="py-3 px-4">{{ $o->nama_pemesan }}</td>
                                <td class="py-3 px-4">{{ $o->event->nama_event }}</td>
                                <td class="py-3 px-4">{{ $o->jumlah_tiket }}</td>
                                <td class="py-3 px-4">{{ number_format($o->total_harga,0,',','.') }}</td>
                                <td class="py-3 px-4">{{ strtoupper($o->payment_method) }}</td>

                                <td class="py-3 px-4">
                                    @if($o->payment_status == 'pending')
                                        <span class="bg-yellow-500/20 text-yellow-400 px-2 py-1 rounded text-xs">
                                            Pending
                                        </span>
                                    @else
                                        <span class="bg-green-500/20 text-green-400 px-2 py-1 rounded text-xs">
                                            Paid
                                        </span>
                                    @endif
                                </td>

                                <td class="py-3 px-4 text-center">
                                    @if($o->payment_status == 'pending')
                                        <form action="{{ route('admin.orders.confirm', $o->id) }}" method="POST">
                                            @csrf
                                            <button
                                                class="bg-green-600 hover:bg-green-500 text-black px-3 py-1 rounded text-xs font-semibold transition">
                                                Konfirmasi
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-gray-400 text-xs">—</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

        @else
            <p class="text-gray-400 text-center mt-10">Belum ada pesanan.</p>
        @endif

    </div>
</body>
</html>
