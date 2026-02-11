<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Siswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Tambahan: Font Awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="flex items-center justify-center min-h-screen bg-gradient-to-br from-teal-50 via-green-50 to-blue-50">

    <div class="bg-white/80 backdrop-blur-sm p-10 rounded-2xl shadow-2xl w-full max-w-md ring-2 ring-teal-200 ring-opacity-50 animate-fade-in">
        <!-- Header -->
        <div class="text-center mb-8">
            <i class="fas fa-user-plus text-4xl text-teal-600 mb-4 animate-bounce"></i>
            <h1 class="text-3xl font-extrabold bg-gradient-to-r from-teal-600 to-green-600 bg-clip-text text-transparent">Register Siswa</h1>
        </div>

        <!-- Error Message -->
        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6">
                <div class="flex items-start">
                    <i class="fas fa-exclamation-triangle mr-3 mt-1"></i>
                    <ul class="list-disc list-inside space-y-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <!-- Form -->
        <form method="POST" action="{{ route('anggota.register') }}" class="space-y-6">
            @csrf

            <!-- NISN Input -->
            <div class="relative">
                <label for="nisn" class="block text-sm font-medium text-gray-700 mb-2">NISN</label>
                <div class="relative">
                    <i class="fas fa-id-card absolute left-3 top-3 text-gray-400"></i>
                    <input type="text" id="nisn" name="nisn" placeholder="Masukkan NISN" class="w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-4 focus:ring-teal-200 focus:border-teal-500 transition duration-200" required>
                </div>
            </div>

            <!-- Nama Input -->
            <div class="relative">
                <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                <div class="relative">
                    <i class="fas fa-user absolute left-3 top-3 text-gray-400"></i>
                    <input type="text" id="nama" name="nama" placeholder="Masukkan Nama Lengkap" class="w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-4 focus:ring-teal-200 focus:border-teal-500 transition duration-200" required>
                </div>
            </div>

            <!-- Kelas Input -->
            <div class="relative">
                <label for="kelas" class="block text-sm font-medium text-gray-700 mb-2">Kelas</label>
                <div class="relative">
                    <i class="fas fa-school absolute left-3 top-3 text-gray-400"></i>
                    <input type="text" id="kelas" name="kelas" placeholder="Masukkan Kelas" class="w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-4 focus:ring-teal-200 focus:border-teal-500 transition duration-200" required>
                </div>
            </div>

            <!-- Alamat Textarea -->
            <div class="relative">
                <label for="alamat" class="block text-sm font-medium text-gray-700 mb-2">Alamat</label>
                <div class="relative">
                    <i class="fas fa-map-marker-alt absolute left-3 top-3 text-gray-400"></i>
                    <textarea id="alamat" name="alamat" placeholder="Masukkan Alamat Lengkap" rows="4" class="w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-4 focus:ring-teal-200 focus:border-teal-500 transition duration-200" required></textarea>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full bg-gradient-to-r from-teal-500 to-teal-600 text-white py-3 px-6 rounded-lg hover:from-teal-600 hover:to-teal-700 hover:shadow-xl hover:scale-105 transition duration-300 flex items-center justify-center group">
                <i class="fas fa-user-plus mr-2 group-hover:rotate-12 transition duration-300"></i> Register
            </button>
        </form>

        <!-- Links -->
        <div class="text-center mt-6 space-y-2">
            <!-- Link Login -->
            <p>
                <a href="{{ route('anggota.login') }}" class="hover:underline text-teal-600 flex items-center justify-center">
                    <i class="fas fa-sign-in-alt mr-2"></i> Sudah punya akun? Login
                </a>
            </p>
            <!-- Link Kembali -->
            <p>
                <a href="{{ url('/') }}" class="hover:underline text-gray-500 flex items-center justify-center">
                    <i class="fas fa-arrow-left mr-2"></i> Kembali
                </a>
            </p>
        </div>
    </div>

</body>
</html>