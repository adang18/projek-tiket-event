<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-gradient-to-br from-slate-900 via-gray-900 to-black text-gray-100">

    <!-- NAVBAR -->
    <nav class="bg-slate-800/90 backdrop-blur shadow px-6 py-4 flex justify-between items-center border-b border-slate-700">
        <h1 class="text-2xl font-bold text-indigo-400">Dashboard Admin</h1>
        <a href="{{ route('home') }}"
           class="text-gray-400 hover:text-gray-200 transition text-sm">
            ⬅ Kembali ke Beranda
        </a>
    </nav>

    <div class="max-w-6xl mx-auto p-6">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-100">Kelola Event</h2>

            <div class="flex gap-3">
                <a href="{{ route('admin.events.create') }}" 
                   class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition shadow">
                    + Tambah Tiket Event
                </a>

                <a href="{{ route('admin.orders.index') }}" 
                   class="bg-emerald-600 text-white px-4 py-2 rounded-lg hover:bg-emerald-700 transition shadow">
                    Kelola Pesanan
                </a>
            </div>
        </div>

        <!-- LIST EVENT -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($events as $e)
                <div class="bg-slate-800/90 backdrop-blur p-5 rounded-xl shadow-lg border border-slate-700">

                    <h3 class="text-xl font-bold text-indigo-300 mb-1">
                        {{ $e->nama_event }}
                    </h3>

                    <p class="text-gray-400 text-sm">{{ $e->lokasi }}</p>
                    <p class="text-gray-400 text-sm">{{ $e->tanggal }}</p>

                    <div class="mt-4 flex gap-2">
                        <a href="{{ route('admin.events.edit', $e->id) }}" 
                           class="bg-amber-500 text-black px-3 py-1.5 rounded-md text-sm hover:bg-amber-400 transition">
                            Edit
                        </a>

                        <form action="{{ route('admin.events.destroy', $e->id) }}" method="POST"
                              onsubmit="return confirm('Yakin mau hapus event ini?')">
                            @csrf
                            @method('DELETE')
                            <button
                                class="bg-red-600 text-white px-3 py-1.5 rounded-md text-sm hover:bg-red-700 transition">
                                Hapus
                            </button>
                        </form>
                    </div>

                </div>
            @endforeach
        </div>

    </div>

</body>
</html>
