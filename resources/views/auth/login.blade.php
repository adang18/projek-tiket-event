<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-6">
<div class="bg-white p-6 rounded shadow-md w-full max-w-md">
    <h1 class="text-2xl font-bold mb-4 text-gray-800">Login</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('login') }}" method="POST" class="space-y-4">
        @csrf
        <input type="email" name="email" placeholder="Email" class="w-full p-2 border rounded" value="{{ old('email') }}" required>
        <input type="password" name="password" placeholder="Password" class="w-full p-2 border rounded" required>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">Login</button>
    </form>

    <p class="mt-4 text-gray-600">Belum punya akun? <a href="{{ route('register.form') }}" class="text-blue-600 hover:underline">Daftar di sini</a></p>
</div>
</body>
</html>
