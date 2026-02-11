<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Tambahan: Font Awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="flex items-center justify-center min-h-screen bg-gradient-to-br from-blue-50 via-purple-50 to-pink-50">

    <div class="bg-white/80 backdrop-blur-sm p-10 rounded-2xl shadow-2xl text-center max-w-md w-full ring-2 ring-blue-200 ring-opacity-50 animate-fade-in">
        <!-- Header -->
        <div class="mb-8">
            <i class="fas fa-book-open text-5xl text-blue-600 mb-4 animate-bounce"></i>
            <h1 class="text-3xl font-extrabold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent mb-2">Selamat Datang di Perpustakaan</h1>
            <p class="text-gray-600 flex items-center justify-center">
                <i class="fas fa-info-circle mr-2 text-blue-500"></i> Silakan pilih login:
            </p>
        </div>

        <!-- Buttons -->
        <div class="flex flex-col gap-6">
            <a href="{{ route('admin.login') }}" class="bg-gradient-to-r from-blue-500 to-blue-600 text-white py-4 px-6 rounded-xl hover:from-blue-600 hover:to-blue-700 hover:shadow-2xl hover:scale-105 transition duration-300 flex items-center justify-center group">
                <i class="fas fa-user-shield mr-3 group-hover:rotate-12 transition duration-300"></i> Login Admin
            </a>
            <a href="{{ route('anggota.login') }}" class="bg-gradient-to-r from-green-500 to-green-600 text-white py-4 px-6 rounded-xl hover:from-green-600 hover:to-green-700 hover:shadow-2xl hover:scale-105 transition duration-300 flex items-center justify-center group">
                <i class="fas fa-user-graduate mr-3 group-hover:rotate-12 transition duration-300"></i> Login Siswa
            </a>
        </div>
    </div>

</body>
</html>