<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pilih Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center h-screen bg-gray-100">

    <div class="bg-white p-8 rounded shadow-md text-center w-96">
        <h1 class="text-2xl font-bold mb-6">Selamat Datang di Perpustakaan</h1>

        <p class="mb-6">Silakan pilih login:</p>

        <div class="flex flex-col gap-4">
            <a href="{{ route('admin.login') }}" class="bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">Login Admin</a>
            <a href="{{ route('anggota.login') }}" class="bg-green-600 text-white py-2 rounded hover:bg-green-700 transition">Login Siswa</a>
        </div>
    </div>

</body>
</html>
