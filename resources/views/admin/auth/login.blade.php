<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Tambahan: Font Awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="flex items-center justify-center min-h-screen bg-gradient-to-br from-blue-50 via-purple-50 to-pink-50">

    <div class="bg-white/80 backdrop-blur-sm p-10 rounded-2xl shadow-2xl w-full max-w-md ring-2 ring-blue-200 ring-opacity-50 animate-fade-in">
        <!-- Header -->
        <div class="text-center mb-8">
            <i class="fas fa-user-shield text-4xl text-blue-600 mb-4 animate-bounce"></i>
            <h1 class="text-3xl font-extrabold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">Login Admin</h1>
        </div>

        <!-- Error Message -->
        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6 flex items-center">
                <i class="fas fa-exclamation-triangle mr-3"></i> {{ $errors->first() }}
            </div>
        @endif

        <!-- Form -->
        <form method="POST" action="{{ route('admin.login') }}" class="space-y-6">
            @csrf

            <!-- Email Input -->
            <div class="relative">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                <div class="relative">
                    <i class="fas fa-envelope absolute left-3 top-3 text-gray-400"></i>
                    <input type="email" id="email" name="email" placeholder="Masukkan Email" class="w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition duration-200" required>
                </div>
            </div>

            <!-- Password Input -->
            <div class="relative">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                <div class="relative">
                    <i class="fas fa-lock absolute left-3 top-3 text-gray-400"></i>
                    <input type="password" id="password" name="password" placeholder="Masukkan Password" class="w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition duration-200" required>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full bg-gradient-to-r from-blue-500 to-blue-600 text-white py-3 px-6 rounded-lg hover:from-blue-600 hover:to-blue-700 hover:shadow-xl hover:scale-105 transition duration-300 flex items-center justify-center group">
                <i class="fas fa-sign-in-alt mr-2 group-hover:rotate-12 transition duration-300"></i> Login
            </button>
        </form>

        <!-- Back Link -->
        <p class="text-center mt-6 text-gray-500">
            <a href="{{ url('/') }}" class="hover:underline text-blue-600 flex items-center justify-center">
                <i class="fas fa-arrow-left mr-2"></i> Kembali
            </a>
        </p>
    </div>

</body>
</html>