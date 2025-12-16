<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Event</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-gradient-to-br from-slate-900 via-gray-900 to-black text-gray-100">

<div class="max-w-xl mx-auto mt-10 bg-slate-800/90 backdrop-blur p-6 rounded-xl shadow-lg border border-slate-700">

    <h1 class="text-2xl font-bold mb-6 text-indigo-400">
        ✏️ Edit Event
    </h1>

    @if($errors->any())
        <div class="bg-red-900/40 border border-red-700 text-red-300 p-3 rounded mb-4 text-sm">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('events.update', $event->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <input
            name="nama_event"
            value="{{ $event->nama_event }}"
            class="w-full p-2.5 bg-slate-900 border border-slate-700 rounded-md text-gray-100 focus:ring focus:ring-indigo-500"
            required
        >

        <input
            name="lokasi"
            value="{{ $event->lokasi }}"
            class="w-full p-2.5 bg-slate-900 border border-slate-700 rounded-md text-gray-100 focus:ring focus:ring-indigo-500"
            required
        >

        <input
            name="tanggal"
            type="date"
            value="{{ $event->tanggal }}"
            class="w-full p-2.5 bg-slate-900 border border-slate-700 rounded-md text-gray-100 focus:ring focus:ring-indigo-500"
            required
        >

        <input
            name="harga"
            type="number"
            value="{{ $event->harga }}"
            class="w-full p-2.5 bg-slate-900 border border-slate-700 rounded-md text-gray-100 focus:ring focus:ring-indigo-500"
            required
        >

        <input
            name="stok"
            type="number"
            value="{{ $event->stok }}"
            class="w-full p-2.5 bg-slate-900 border border-slate-700 rounded-md text-gray-100 focus:ring focus:ring-indigo-500"
            required
        >

        <textarea
            name="deskripsi"
            rows="4"
            class="w-full p-2.5 bg-slate-900 border border-slate-700 rounded-md text-gray-100 focus:ring focus:ring-indigo-500"
        >{{ $event->deskripsi }}</textarea>

        <button
            type="submit"
            class="w-full bg-amber-500 text-black py-2 rounded-md hover:bg-amber-400 transition font-semibold">
            Update Event
        </button>
    </form>

    <a href="{{ route('events.index') }}"
       class="inline-block mt-5 text-sm text-gray-400 hover:text-gray-200 transition">
        ⬅ Kembali ke daftar event
    </a>

</div>

</body>
</html>
