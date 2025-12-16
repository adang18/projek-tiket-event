<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tambah Event</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-gradient-to-br from-gray-900 via-gray-800 to-black text-gray-200">

<div class="max-w-xl mx-auto mt-12 bg-gray-900/80 backdrop-blur p-6 rounded-xl shadow-lg border border-gray-700">

    <h1 class="text-2xl font-bold mb-6 text-indigo-400">Tambah Event Konser</h1>

    @if($errors->any())
        <div class="bg-red-900/40 border border-red-700 text-red-300 p-3 rounded mb-4 text-sm">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('events.store') }}" method="POST" class="space-y-4">
        @csrf

        <input name="nama_event" placeholder="Nama Event"
            class="w-full p-2.5 bg-gray-800 border border-gray-600 rounded-md
                   focus:outline-none focus:ring-2 focus:ring-indigo-500 text-white" required>

        <input name="lokasi" placeholder="Lokasi"
            class="w-full p-2.5 bg-gray-800 border border-gray-600 rounded-md
                   focus:outline-none focus:ring-2 focus:ring-indigo-500 text-white" required>

        <input name="tanggal" type="date"
            class="w-full p-2.5 bg-gray-800 border border-gray-600 rounded-md
                   focus:outline-none focus:ring-2 focus:ring-indigo-500 text-white" required>

        <input name="harga" type="number" placeholder="Harga"
            class="w-full p-2.5 bg-gray-800 border border-gray-600 rounded-md
                   focus:outline-none focus:ring-2 focus:ring-indigo-500 text-white" required>

        <input name="stok" type="number" placeholder="Stok"
            class="w-full p-2.5 bg-gray-800 border border-gray-600 rounded-md
                   focus:outline-none focus:ring-2 focus:ring-indigo-500 text-white" required>

        <textarea name="deskripsi" placeholder="Deskripsi (opsional)" rows="4"
            class="w-full p-2.5 bg-gray-800 border border-gray-600 rounded-md
                   focus:outline-none focus:ring-2 focus:ring-indigo-500 text-white"></textarea>

        <button type="submit"
            class="w-full bg-indigo-600 text-white py-2 rounded-md
                   hover:bg-indigo-700 transition font-semibold">
            Simpan Event
        </button>
    </form>

    <a href="{{ route('admin.dashboard') }}"
       class="inline-block mt-5 text-gray-400 hover:text-indigo-400 text-sm transition">
        ← Kembali ke Dashboard
    </a>
</div>

</body>
</html>
