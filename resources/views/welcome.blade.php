<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CatatDuit - Kelola Keuangan dengan Mudah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/gsap.min.js"></script>
</head>
<body class="bg-gray-900 font-sans text-white">
    <!-- Hero Section -->
    <section class="min-h-screen flex items-center justify-center bg-gray-900">
        <div class="container mx-auto px-4 flex flex-col lg:flex-row items-center justify-between">
            <!-- Text Content -->
            <div class="lg:w-1/2 text-center lg:text-left mb-12 lg:mb-0 animate-fade-in">
                <h1 class="text-5xl sm:text-6xl lg:text-7xl font-bold mb-4 tracking-tight">
                    Kelola Uangmu dengan <span class="text-yellow-400">CatatDuit</span>
                </h1>
                <p class="text-xl sm:text-2xl lg:text-3xl mb-8 opacity-80">
                    Catat pemasukan dan pengeluaran dengan mudah. Mulai sekarang, gratis!
                </p>
                <a href="{{route('login')}}" class="inline-block bg-yellow-400 text-gray-900 font-semibold py-4 px-8 rounded-lg hover:bg-yellow-500 hover:scale-105 transition duration-300 transform">
                    Coba Sekarang
                </a>
            </div>
            <!-- Image Content -->
            <div class="lg:w-1/2 flex justify-center relative animate-slide-up">
                <img src="https://via.placeholder.com/800x600?text=CatatDuit+Mockup" alt="CatatDuit App Mockup" class="w-full max-w-lg lg:max-w-2xl rounded-lg shadow-2xl transform -rotate-6">
                <img src="https://via.placeholder.com/300x600?text=CatatDuit+Phone" alt="CatatDuit Phone Mockup" class="absolute bottom-0 right-0 w-1/3 max-w-xs rounded-lg shadow-2xl transform rotate-12">
            </div>
        </div>
    </section>

    <!-- Custom Animation Styles -->
    <style>
        .animate-fade-in {
            animation: fadeIn 1.5s ease-in-out;
        }
        .animate-slide-up {
            animation: slideUp 1.5s ease-in-out;
        }
        @keyframes fadeIn {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        @keyframes slideUp {
            0% { opacity: 0; transform: translateY(50px); }
            100% { opacity: 1; transform: translateY(0); }
        }
    </style>
</body>
</html>