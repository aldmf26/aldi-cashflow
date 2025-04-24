<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CatatDuit - Kelola Keuangan dengan Mudah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-100 font-inter text-gray-800">
    <!-- Hero Section -->
    <section class="min-h-screen flex items-center justify-center bg-blue-900 relative overflow-hidden">
        <!-- Background Decorative Elements -->
        <div class="absolute inset-0 bg-gradient-to-br from-blue-900/80 via-blue-800/60 to-blue-700/40"></div>
        <!-- Dynamic Lines Pattern -->
        <div class="absolute inset-0 opacity-20">
            <svg class="w-full h-full" viewBox="0 0 1440 600" fill="none" xmlns="http://www.w3.org/2000/svg">
                <!-- Diagonal Lines -->
                <path d="M0 0L1440 600M0 150L1440 750M0 300L1440 900M0 450L1440 1050" stroke="url(#grad1)" stroke-width="1" opacity="0.5"/>
                <!-- Wavy Line -->
                <path d="M0 300C200 450 400 150 600 300C800 450 1000 150 1200 300C1400 450 1440 300 1440 300" stroke="url(#grad2)" stroke-width="2" opacity="0.3"/>
                <!-- Geometric Circles -->
                <circle cx="200" cy="100" r="80" fill="none" stroke="url(#grad3)" stroke-width="1" opacity="0.4"/>
                <circle cx="1200" cy="500" r="120" fill="none" stroke="url(#grad3)" stroke-width="1" opacity="0.4"/>
                <defs>
                    <linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="0%">
                        <stop offset="0%" style="stop-color:#3B82F6;stop-opacity:1" />
                        <stop offset="100%" style="stop-color:#1F2937;stop-opacity:1" />
                    </linearGradient>
                    <linearGradient id="grad2" x1="0%" y1="0%" x2="100%" y2="0%">
                        <stop offset="0%" style="stop-color:#3B82F6;stop-opacity:1" />
                        <stop offset="100%" style="stop-color:#1F2937;stop-opacity:1" />
                    </linearGradient>
                    <linearGradient id="grad3" x1="0%" y1="0%" x2="100%" y2="0%">
                        <stop offset="0%" style="stop-color:#3B82F6;stop-opacity:0.5" />
                        <stop offset="100%" style="stop-color:#1F2937;stop-opacity:0.5" />
                    </linearGradient>
                </defs>
            </svg>
        </div>
        <!-- Animated Blurred Circles -->
        <div class="absolute inset-0 animate-pulse-slow">
            <div class="absolute top-20 left-40 w-64 h-64 bg-blue-500/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-20 right-40 w-96 h-96 bg-blue-600/10 rounded-full blur-3xl"></div>
        </div>

        <div class="container mx-auto px-4 flex flex-col lg:flex-row items-center justify-between relative z-10">
            <!-- Text Content -->
            <div class="lg:w-1/2 text-center lg:text-left mb-12 lg:mb-0 animate-fade-in">
                <h1 class="text-5xl sm:text-6xl lg:text-7xl font-extrabold mb-4 leading-tight text-white">
                    Kelola Keuanganmu dengan <span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-500 to-blue-400">CatatDuit</span>
                </h1>
                <p class="text-lg sm:text-xl lg:text-2xl mb-8 text-gray-200 leading-relaxed max-w-md mx-auto lg:mx-0">
                    Catat pemasukan dan pengeluaran dengan mudah. Mulai sekarang, gratis!
                </p>
                <a href="#pricing" class="inline-block bg-gradient-to-r from-blue-500 to-blue-600 text-white font-semibold py-4 px-8 rounded-full hover:from-blue-600 hover:to-blue-700 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 animate-pulse">
                    Coba Sekarang
                </a>
            </div>
            <!-- Image Content -->
            <div class="lg:w-1/2 flex justify-center relative animate-slide-up">
                <div class="relative parallax">
                    <img src="{{ asset('img/bg-biru.png') }}" alt="CatatDuit App Mockup" class="w-full max-w-lg lg:max-w-2xl rounded-xl shadow-2xl transform -rotate-3">
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section id="pricing" class="py-20 bg-gray-100 relative overflow-hidden">
        <!-- Background Decorative Elements for Pricing -->
        <div class="absolute inset-0 opacity-10">
            <svg class="w-full h-full" viewBox="0 0 1440 600" fill="none" xmlns="http://www.w3.org/2000/svg">
                <!-- Diagonal Lines -->
                <path d="M0 0L1440 600M0 150L1440 750M0 300L1440 900M0 450L1440 1050" stroke="url(#grad4)" stroke-width="1" opacity="0.5"/>
                <!-- Geometric Shapes -->
                <rect x="200" y="100" width="100" height="100" fill="none" stroke="url(#grad4)" stroke-width="1" opacity="0.4" transform="rotate(45 250 150)"/>
                <rect x="1100" y="400" width="120" height="120" fill="none" stroke="url(#grad4)" stroke-width="1" opacity="0.4" transform="rotate(45 1160 460)"/>
                <defs>
                    <linearGradient id="grad4" x1="0%" y1="0%" x2="100%" y2="0%">
                        <stop offset="0%" style="stop-color:#3B82F6;stop-opacity:1" />
                        <stop offset="100%" style="stop-color:#1F2937;stop-opacity:1" />
                    </linearGradient>
                </defs>
            </svg>
        </div>

        <div class="container mx-auto px-4 relative z-10">
            <h2 class="text-4xl lg:text-5xl font-bold text-center mb-12 text-gray-800">Pilih Paket yang Tepat untukmu</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                <!-- Paket Biasa -->
                <div class="bg-white rounded-xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <h3 class="text-2xl font-semibold mb-4 text-gray-800">Paket Biasa</h3>
                    <p class="text-4xl font-bold mb-4 text-gray-800">Rp10.000<span class="text-lg font-normal text-gray-500">/bulan</span></p>
                    <ul class="space-y-3 mb-6 text-gray-600">
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-blue-500 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                            Pencatatan tanpa batas
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-blue-500 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                            Laporan bulanan sederhana
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-blue-500 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                            Kategori pengeluaran dasar
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-blue-500 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                            Notifikasi pengingat
                        </li>
                    </ul>
                    <a href="#subscribe" class="block text-center bg-blue-500 text-white py-3 rounded-full hover:bg-blue-600 transition-colors duration-300">Pilih Paket</a>
                </div>
                <!-- Paket Premium -->
                <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300 relative">
                    <span class="absolute top-4 right-4 bg-white text-blue-600 text-xs font-semibold px-3 py-1 rounded-full">Populer</span>
                    <h3 class="text-2xl font-semibold mb-4 text-white">Paket Premium</h3>
                    <p class="text-4xl font-bold mb-4 text-white">Rp20.000<span class="text-lg font-normal text-gray-200">/bulan</span></p>
                    <ul class="space-y-3 mb-6 text-gray-200">
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-white mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                            Semua fitur Paket Biasa
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-white mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                            Laporan keuangan mendalam
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-white mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                            Kategori kustom
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-white mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                            Ekspor laporan (PDF/Excel)
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-white mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                            Dukungan prioritas
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-white mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                            Tema kustom
                        </li>
                    </ul>
                    <a href="#subscribe" class="block text-center bg-white text-blue-600 py-3 rounded-full hover:bg-gray-100 transition-colors duration-300">Pilih Paket</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Custom Animation Styles -->
    <style>
        .font-inter {
            font-family: 'Inter', sans-serif;
        }
        .animate-fade-in {
            animation: fadeIn 1.2s ease-in-out;
        }
        .animate-slide-up {
            animation: slideUp 1.5s ease-in-out;
        }
        .animate-pulse-slow {
            animation: pulseSlow 8s ease-in-out infinite;
        }
        @keyframes fadeIn {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        @keyframes slideUp {
            0% { opacity: 0; transform: translateY(40px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        @keyframes pulseSlow {
            0% { opacity: 0.6; }
            50% { opacity: 1; }
            100% { opacity: 0.6; }
        }
        .parallax {
            transition: transform 0.5s ease-out;
        }
        @media (min-width: 1024px) {
            .parallax:hover {
                transform: translateY(-20px);
            }
        }
    </style>
</body>
</html>