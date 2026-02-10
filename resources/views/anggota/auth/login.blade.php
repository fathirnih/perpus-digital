<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Siswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center h-screen bg-gray-100">

    <div class="bg-white p-8 rounded shadow-md w-96">
        <h1 class="text-2xl font-bold mb-6 text-center">Login Siswa</h1>

        @if($errors->any())
            <div class="bg-red-100 text-red-700 p-2 mb-4 rounded">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('anggota.login') }}" class="space-y-4">
            @csrf
            <div>
                <label class="block mb-1">NISN</label>
                <input type="text" name="nisn" class="w-full border px-3 py-2 rounded" placeholder="NISN" required>
            </div>
            <div>
                <label class="block mb-1">Nama</label>
                <input type="text" name="nama" class="w-full border px-3 py-2 rounded" placeholder="Nama Lengkap" required>
            </div>
            <button type="submit" class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700 transition">Login</button>
        </form>

         <div class="text-center mt-4 space-y-2">
            <!-- Link Kembali -->
            <p>
                <a href="{{ url('/') }}" class="hover:underline text-green-600">Kembali</a>
            </p>
            <!-- Link Register -->
            <p>
                <a href="{{ route('anggota.register') }}" class="hover:underline text-green-600">Belum punya akun? Daftar</a>
            </p>
        </div>
    </div>

</body>
</html>
