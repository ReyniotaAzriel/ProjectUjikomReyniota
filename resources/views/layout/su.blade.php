<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Inventory</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}" sizes="180x180">
    <!-- Add Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Add Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Add Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
    /* Header sidebar default kecil */
    .sidebar-header {
        white-space: nowrap; /* Hindari teks terpotong */
        overflow: hidden; /* Sembunyikan teks melebihi area */
        text-overflow: ellipsis; /* Tambahkan tiga titik jika teks terlalu panjang */
        opacity: 0; /* Sembunyikan teks saat sidebar tertutup */
        visibility: hidden; /* Buat teks tidak terlihat */
        transition: opacity 0.3s ease, visibility 0.3s ease;
    }

    /* Header sidebar saat hover */
    .sidebar:hover .sidebar-header {
        opacity: 1; /* Tampilkan teks */
        visibility: visible; /* Buat teks terlihat */
    }

    /* Sidebar default kecil */
    .sidebar {
        width: 64px; /* Lebar default kecil */
        transition: width 0.3s ease;
    }

    /* Sidebar besar saat hover */
    .sidebar:hover {
        width: 256px; /* Lebar penuh */
    }

    /* Transisi teks di sidebar */
    .sidebar ul li span {
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.3s ease, visibility 0.3s ease;
    }

    .sidebar:hover ul li span {
        opacity: 1;
        visibility: visible;
    }

    /* Ikon tetap di tempat */
    .sidebar ul li svg {
        transition: transform 0.3s ease;
    }

    /* Submenu transisi */
    .sidebar ul li ul {
        opacity: 0;
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.5s ease, opacity 0.5s ease;
    }

    .sidebar ul li:hover ul {
        opacity: 1;
        max-height: 500px; /* Sesuaikan tinggi konten */
    }
</style>

</head>

<body class="bg-gray-100 font-sans">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <nav class="sidebar bg-cyan-500 text-white flex flex-col h-screen">

            <div class="p-4 text-center text-xl font-bold border-b border-cyan-200 sidebar-header flex items-center justify-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box w-10 h-10">
                    <path d="M21 16v2a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-2M3 8V6a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v2M3 8l9 5 9-5M3 12l9 5 9-5"></path>
                </svg>
                <span>GudangMU</span>
            </div>


            <ul class="flex-1 mt-4 overflow-y-auto">
                <li class="py-2 px-4 hover:bg-gradient-to-r hover:from-indigo-700 hover:to-cyan-700 transition-all duration-300">
                    <a href="/super-user/dashboard" class="flex items-center space-x-2 group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white transition-colors duration-300" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7A1 1 0 003 10h1v7a1 1 0 001 1h4a1 1 0 001-1v-4h2v4a1 1 0 001 1h4a1 1 0 001-1v-7h1a1 1 0 00.707-1.707l-7-7z" />
                        </svg>
                        <span class="group-hover:text-white transition-colors duration-300">Home</span>
                    </a>
                </li>

                <li class="py-2 px-4 hover:bg-gradient-to-r hover:from-indigo-700 hover:to-cyan-700 transition-all duration-300 transform hover:scale-105">
                    <button onclick="toggleSubmenu('submenu-inventaris')"
                        class="flex items-center space-x-2 w-full focus:outline-none group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white group-hover:text-white transition-colors duration-300" viewBox="0 0 24 24" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10.586 3a2 2 0 011.414.586l2 2H20a2 2 0 012 2v10a2 2 0 01-2 2H4a2 2 0 01-2-2V7a2 2 0 012-2h4.586l2-2A2 2 0 0110.586 3zM10 5H4v12h16V7h-7.586l-2-2z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="text-white group-hover:text-white transition-colors duration-300">Barang Inventaris</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-auto text-white group-hover:text-white transition-colors duration-300" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>

                    <ul id="submenu-inventaris" class="ml-6 mt-2">
                        <li class="py-2 px-4 hover:bg-gradient-to-r hover:from-indigo-700 hover:to-blue-700 transition-all duration-300 transform hover:scale-105">
                            <a href="/super-user/daftar-barang" class="text-white hover:text-white">Daftar Barang</a>
                        </li>
                        <li class="py-2 px-4 hover:bg-gradient-to-r hover:from-indigo-700 hover:to-blue-700 transition-all duration-300 transform hover:scale-105">
                            <a href="/super-user/penerimaan-barang" class="text-white hover:text-white">Penerimaan Barang</a>
                        </li>
                    </ul>
                </li>


                <li class="py-2 px-4 hover:bg-gradient-to-r hover:from-indigo-700 hover:to-cyan-700 transition-all duration-300 transform hover:scale-105">
                    <button onclick="toggleSubmenu('submenu-peminjaman')"
                        class="flex items-center space-x-2 w-full focus:outline-none group">
                        <!-- Icon Kotak atau Barang -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white group-hover:text-white transition-colors duration-300" viewBox="0 0 20 20" fill="currentColor">
                            <path
                                d="M2.893 6.31a1 1 0 01.447-.894l7-4a1 1 0 01.92 0l7 4a1 1 0 01.447.894v7.38a1 1 0 01-.447.894l-7 4a1 1 0 01-.92 0l-7-4a1 1 0 01-.447-.894V6.31zm1.618-.447L10 3.118l5.49 2.745L10 8.608 4.51 5.863z" />
                        </svg>
                        <span class="text-white group-hover:text-white transition-colors duration-300">Peminjaman Barang</span>
                        <!-- Icon Panah -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-auto text-white group-hover:text-white transition-colors duration-300" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>

                    <ul id="submenu-peminjaman" class="ml-6 mt-2">
                        <li class="py-2 px-4 hover:bg-gradient-to-r hover:from-indigo-700 hover:to-blue-700 transition-all duration-300 transform hover:scale-105">
                            <a href="/super-user/peminjaman-barang" class="text-white hover:text-white">Daftar Peminjaman</a>
                        </li>
                        <li class="py-2 px-4 hover:bg-gradient-to-r hover:from-indigo-700 hover:to-blue-700 transition-all duration-300 transform hover:scale-105">
                            <a href="/super-user/pengembalian-barang" class="text-white hover:text-white">Pengembalian Barang</a>
                        </li>
                        <li class="py-2 px-4 hover:bg-gradient-to-r hover:from-indigo-700 hover:to-blue-700 transition-all duration-300 transform hover:scale-105">
                            <a href="/super-user/laporan-peminjaman" class="text-white hover:text-white">Barang Belum Kembali</a>
                        </li>
                    </ul>
                </li>


                <li class="py-2 px-4 hover:bg-gradient-to-r hover:from-indigo-700 hover:to-cyan-700 transition-all duration-300 transform hover:scale-105">
                    <button onclick="toggleSubmenu('submenu-laporan')"
                        class="flex items-center space-x-2 w-full focus:outline-none group">
                        <!-- Ikon Dokumen atau Laporan -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white group-hover:text-white transition-colors duration-300" viewBox="0 0 20 20" fill="currentColor">
                            <path
                                d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414a2 2 0 00-.586-1.414l-4-4A2 2 0 0010.586 2H6zm4 1.5L14.5 8H11a1 1 0 01-1-1V3.5zM6 11h8v2H6v-2zm0 4h5v2H6v-2z" />
                        </svg>
                        <span class="text-white group-hover:text-white transition-colors duration-300">Laporan</span>
                        <!-- Ikon Panah -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-auto text-white group-hover:text-white transition-colors duration-300" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>

                    <ul id="submenu-laporan" class="ml-6 mt-2">
                        <li class="py-2 px-4 hover:bg-gradient-to-r hover:from-indigo-700 hover:to-blue-700 transition-all duration-300 transform hover:scale-105">
                            <a href="/super-user/laporan-barang" class="text-white hover:text-white">Laporan Barang</a>
                        </li>
                        <li class="py-2 px-4 hover:bg-gradient-to-r hover:from-indigo-700 hover:to-blue-700 transition-all duration-300 transform hover:scale-105">
                            <a href="/super-user/laporan-peminjaman" class="text-white hover:text-white">Laporan Peminjaman</a>
                        </li>
                    </ul>
                </li>

                <li class="py-2 px-4 hover:bg-gradient-to-r hover:from-indigo-700 hover:to-cyan-700 transition-all duration-300 transform hover:scale-105">
                    <button onclick="toggleSubmenu('submenu-referensi')"
                        class="flex items-center space-x-2 w-full focus:outline-none group">
                        <!-- Ikon Buku atau Referensi -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white group-hover:text-white transition-colors duration-300" viewBox="0 0 20 20" fill="currentColor">
                            <path
                                d="M4 2a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V4a2 2 0 00-2-2H4zm12 14H4v-1h12v1zm0-3H4v-1h12v1zm0-3H4v-1h12v1z" />
                        </svg>
                        <span class="text-white group-hover:text-white transition-colors duration-300">Referensi</span>
                        <!-- Ikon Panah -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-auto text-white group-hover:text-white transition-colors duration-300" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>

                    <ul id="submenu-referensi" class="ml-6 mt-2">
                        <li class="py-2 px-4 hover:bg-gradient-to-r hover:from-indigo-700 hover:to-blue-700 transition-all duration-300 transform hover:scale-105">
                            <a href="/super-user/jenis-barang" class="text-white hover:text-white">Jenis Barang</a>
                        </li>
                        <li class="py-2 px-4 hover:bg-gradient-to-r hover:from-indigo-700 hover:to-blue-700 transition-all duration-300 transform hover:scale-105">
                            <a href="/super-user/daftar-pengguna" class="text-white hover:text-white">Daftar Pengguna</a>
                        </li>
                    </ul>
                </li>


            </ul>
        </nav>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col h-screen overflow-auto">
            <header class="bg-cyan-500 shadow p-4 flex items-center justify-end">
                <div class="flex items-center space-x-4">
                    <form method="GET" action="{{ route('logout') }}" class="inline-block">
                        @csrf
                        <button type="submit" class="px-4 py-2 bg-gradient-to-r from-red-500 to-red-700 text-white font-bold rounded-lg shadow-md hover:shadow-lg transform hover:scale-105 transition-all duration-300 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6-4v8" />
                            </svg>
                            Logout
                        </button>
                    </form>

                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 rounded-full border-2 border-gray-300 shadow-md hover:shadow-lg transform hover:scale-105 transition duration-300" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                    </svg>
                </div>
            </header>
            @yield('content')
        </div>



    </div>

    <!-- Add Custom JS -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        function toggleSubmenu(submenuId) {
            const allSubmenus = document.querySelectorAll("ul[id^='submenu']");

            // Tutup semua submenu lainnya
            allSubmenus.forEach((submenu) => {
                if (submenu.id !== submenuId) {
                    submenu.classList.remove('open');
                }
            });

            // Toggle submenu yang sesuai tombolnya
            const submenu = document.getElementById(submenuId);
            submenu.classList.toggle('open');
        }
    </script>


    @stack('scripts')

</body>

</html>
