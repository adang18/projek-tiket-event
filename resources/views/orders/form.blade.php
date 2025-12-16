<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pesan: {{ $event->nama_event }}</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-gradient-to-br from-slate-900 via-gray-900 to-black text-gray-100">

<div class="max-w-md mx-auto p-6">
    <div class="bg-slate-800/90 backdrop-blur p-6 rounded-xl shadow-xl border border-slate-700">

        <h1 class="text-2xl font-bold mb-1 text-indigo-400">Pesan Tiket</h1>
        <p class="text-gray-400 mb-4 text-sm">
            Event: <strong class="text-gray-200">{{ $event->nama_event }}</strong>
        </p>

        @if($errors->any())
            <div class="bg-red-900/40 border border-red-700 text-red-200 p-3 rounded mb-4 text-sm">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('order.store', $event->id) }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block mb-1 text-sm font-medium text-gray-300">Nama</label>
                <input type="text" name="nama_pemesan"
                    value="{{ old('nama_pemesan') }}"
                    class="w-full p-2.5 bg-slate-900 border border-slate-700 rounded-md text-gray-100 focus:ring focus:ring-indigo-500"
                    required>
            </div>

            <div>
                <label class="block mb-1 text-sm font-medium text-gray-300">Email</label>
                <input type="email" name="email"
                    value="{{ old('email') }}"
                    class="w-full p-2.5 bg-slate-900 border border-slate-700 rounded-md text-gray-100 focus:ring focus:ring-indigo-500"
                    required>
            </div>

            <div>
                <label class="block mb-1 text-sm font-medium text-gray-300">Jumlah Tiket</label>
                <input type="number" min="1" name="jumlah_tiket" value="1"
                    class="w-full p-2.5 bg-slate-900 border border-slate-700 rounded-md text-gray-100 focus:ring focus:ring-indigo-500"
                    required>
            </div>

            <div>
                <label class="block mb-1 text-sm font-medium text-gray-300">Metode Pembayaran</label>
                <select name="payment_method"
                    class="w-full p-2.5 bg-slate-900 border border-slate-700 rounded-md text-gray-100 focus:ring focus:ring-indigo-500"
                    required>
                    <option value="transfer">Transfer Bank</option>
                    <option value="ewallet">E-Wallet</option>
                </select>
            </div>

            <button type="submit"
                class="w-full bg-emerald-600 text-white py-2.5 rounded-md hover:bg-emerald-700 transition font-medium">
                Pesan Sekarang
            </button>
        </form>

        <a href="{{ route('events.show', $event->id) }}"
           class="inline-block mt-4 text-gray-400 hover:text-gray-200 hover:underline text-sm">
            ← Kembali ke detail event
        </a>

    </div>
</div>

</body>
</html>
