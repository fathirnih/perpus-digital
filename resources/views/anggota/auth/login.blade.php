<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Siswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Tambahan: Font Awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="flex items-center justify-center min-h-screen bg-gradient-to-br from-green-50 via-blue-50 to-teal-50">

    <div class="bg-white/80 backdrop-blur-sm p-10 rounded-2xl shadow-2xl w-full max-w-md ring-2 ring-green-200 ring-opacity-50 animate-fade-in">
        <!-- Header -->
        <div class="text-center mb-8">
            <i class="fas fa-user-graduate text-4xl text-green-600 mb-4 animate-bounce"></i>
            <h1 class="text-3xl font-extrabold bg-gradient-to-r from-green-600 to-blue-600 bg-clip-text text-transparent">Login Siswa</h1>
        </div>

        <!-- Error Message -->
        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6 flex items-center">
                <i class="fas fa-exclamation-triangle mr-3"></i> {{ $errors->first() }}
            </div>
        @endif

        <!-- Form -->
        <form method="POST" action="{{ route('anggota.login') }}" class="space-y-6">
            @csrf

            <!-- NISN Input -->
            <div class="relative">
                <label for="nisn" class="block text-sm font-medium text-gray-700 mb-2">NISN</label>
                <div class="relative">
                    <i class="fas fa-id-card absolute left-3 top-3 text-gray-400"></i>
                    <input type="text" id="nisn" name="nisn" placeholder="Masukkan NISN" class="w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-4 focus:ring-green-200 focus:border-green-500 transition duration-200" required>
                </div>
            </div>

            <!-- Nama Input -->
            <div class="relative">
                <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">Nama</label>
                <div class="relative">
                    <i class="fas fa-user absolute left-3 top-3 text-gray-400"></i>
                    <input type="text" id="nama" name="nama" placeholder="Masukkan Nama Lengkap" class="w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-4 focus:ring-green-200 focus:border-green-500 transition duration-200" required>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full bg-gradient-to-r from-green-500 to-green-600 text-white py-3 px-6 rounded-lg hover:from-green-600 hover:to-green-700 hover:shadow-xl hover:scale-105 transition duration-300 flex items-center justify-center group">
                <i class="fas fa-sign-in-alt mr-2 group-hover:rotate-12 transition duration-300"></i> Login
            </button>
        </form>

        <!-- Links -->
        <div class="text-center mt-6 space-y-2">
            <!-- Link Kembali -->
            <p>
                <a href="{{ url('/') }}" class="hover:underline text-green-600 flex items-center justify-center">
                    <i class="fas fa-arrow-left mr-2"></i> Kembali
                </a>
            </p>
            <!-- Link Register -->
            <p>
                <a href="{{ route('anggota.register') }}" class="hover:underline text-green-600 flex items-center justify-center">
                    <i class="fas fa-user-plus mr-2"></i> Belum punya akun? Daftar
                </a>
            </p>
        </div>
    </div>

</body>
</html>