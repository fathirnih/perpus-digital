<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register Siswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center h-screen bg-gray-100">

    <div class="bg-white p-8 rounded shadow-md w-96">
        <h1 class="text-2xl font-bold mb-6 text-center">Register Siswa</h1>

        @if($errors->any())
            <div class="bg-red-100 text-red-700 p-2 mb-4 rounded">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('anggota.register') }}" class="space-y-4">
            @csrf
            <div>
                <label class="block mb-1">NISN</label>
                <input type="text" name="nisn" class="w-full border px-3 py-2 rounded" placeholder="NISN" required>
            </div>
            <div>
                <label class="block mb-1">Nama Lengkap</label>
                <input type="text" name="nama" class="w-full border px-3 py-2 rounded" placeholder="Nama Lengkap" required>
            </div>
            <div>
                <label class="block mb-1">Kelas</label>
                <input type="text" name="kelas" class="w-full border px-3 py-2 rounded" placeholder="Kelas" required>
            </div>
            <div>
                <label class="block mb-1">Alamat</label>
                <textarea name="alamat" class="w-full border px-3 py-2 rounded" placeholder="Alamat Lengkap" required></textarea>
            </div>

            <button type="submit" class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700 transition">Register</button>
        </form>

        <div class="text-center mt-4 space-y-2">
            <p>
                <a href="{{ route('anggota.login') }}" class="hover:underline text-green-600">Sudah punya akun? Login</a>
            </p>
            <p>
                <a href="{{ url('/') }}" class="hover:underline text-gray-500">Kembali</a>
            </p>
        </div>
    </div>

</body>
</html>
