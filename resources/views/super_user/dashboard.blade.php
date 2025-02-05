@extends('layout.su')

@section('content')
    <main class="p-10 bg-gradient-to-r from-blue-200 via-indigo-200 to-purple-200 min-h-screen">
        <!-- Header with Icon -->
        <div class="flex items-center mb-12">
            <div class="bg-gradient-to-r from-cyan-500 to-indigo-600 text-white p-4 rounded-full shadow-md flex justify-center items-center w-16 h-16">
                <!-- Icon Barang Inventaris -->
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box w-10 h-10">
                    <path d="M21 16v2a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-2M3 8V6a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v2M3 8l9 5 9-5M3 12l9 5 9-5"></path>
                </svg>
            </div>
            <h1 class="text-4xl font-extrabold text-indigo-800 ml-4">GudangMU</h1>
        </div>

        <!-- Dashboard Overview -->
        <div class="flex flex-col xl:flex-row justify-between gap-8 mb-16">
            <!-- Left Side: Stats -->
            <div class="w-full xl:w-2/3 space-y-8">
                <!-- Total Barang -->
                <div class="bg-gradient-to-r from-cyan-500 to-indigo-600 text-white p-8 shadow-xl rounded-lg flex justify-between items-center transform hover:scale-105 transition-all duration-300">
                    <div class="space-y-3">
                        <h3 class="text-3xl font-bold">Jumlah Barang</h3>
                        <p class="text-6xl font-extrabold">{{ $jumlahBarang }}</p>
                    </div>
                    <div class="bg-white p-6 rounded-full shadow-md flex justify-center items-center w-24 h-24">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box w-12 h-12 text-indigo-500">
                            <path d="M21 16v2a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-2M3 8V6a2 2 0 0 1 2-2h14a2 2 0 0 1-2 2v2M3 8l9 5 9-5M3 12l9 5 9-5"></path>
                        </svg>
                    </div>
                </div>

                <!-- Total Peminjaman -->
                <div class="bg-gradient-to-r from-indigo-600 to-cyan-500 text-white p-8 shadow-xl rounded-lg flex justify-between items-center transform hover:scale-105 transition-all duration-300">
                    <div class="space-y-3">
                        <h3 class="text-3xl font-bold">Jumlah Peminjaman</h3>
                        <p class="text-6xl font-extrabold">{{ $jumlahPeminjaman }}</p>
                    </div>
                    <div class="bg-white p-6 rounded-full shadow-md flex justify-center items-center w-24 h-24">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-receipt w-12 h-12 text-indigo-500">
                            <path d="M12 8V4M12 12v4M12 16h4M12 20h4M4 16h4M4 12h4M4 8h4M4 4v16h16V4H4z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Right Side: Grafik Peminjaman -->
            <div class="w-full xl:w-1/3">
                <div class="bg-white p-8 shadow-xl rounded-lg h-full flex flex-col items-center">
                    <h3 class="text-2xl font-bold text-indigo-800 mb-6">Grafik Peminjaman</h3>
                    <!-- Atur tinggi grafik dengan Tailwind dan inline style -->
                    <div class="relative" style="width: 100%; height: 250px;">
                        <canvas id="loanChart" width="600" height="400"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Stats (Optional) -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Additional Data or Cards Here -->
        </div>
    </main>
@endsection

@push('scripts')
    <!-- Chart.js Script -->
    <script>
        const ctx = document.getElementById('loanChart').getContext('2d');
        const dataGrafik = @json($dataGrafik); // Data grafik dari controller

        const gradient = ctx.createLinearGradient(0, 0, 0, 400);
        gradient.addColorStop(0, 'rgba(54, 162, 235, 0.8)');
        gradient.addColorStop(1, 'rgba(54, 162, 235, 0)');

        const loanChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                datasets: [
                    {
                        label: 'Jumlah Peminjaman',
                        data: dataGrafik,
                        borderColor: 'rgba(54, 162, 235, 1)',
                        backgroundColor: gradient,
                        borderWidth: 3,
                        tension: 0.4,
                        pointBackgroundColor: 'rgba(54, 162, 235, 1)',
                        pointRadius: 5,
                        pointHoverRadius: 7,
                        pointBorderWidth: 2,
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                        labels: {
                            color: 'rgba(31, 41, 55, 1)',
                            font: {
                                size: 14,
                                weight: 'bold'
                            }
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(31, 41, 55, 0.9)',
                        titleColor: '#fff',
                        bodyColor: '#fff',
                        cornerRadius: 8
                    }
                },
                scales: {
                    x: {
                        ticks: {
                            color: 'rgba(31, 41, 55, 1)',
                            font: {
                                size: 12
                            }
                        },
                        grid: {
                            color: 'rgba(209, 213, 219, 0.3)'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: 'rgba(31, 41, 55, 1)',
                            font: {
                                size: 12
                            }
                        },
                        grid: {
                            color: 'rgba(209, 213, 219, 0.3)'
                        }
                    }
                },
                animations: {
                    tension: {
                        duration: 1000,
                        easing: 'easeInOutElastic',
                        from: 0.5,
                        to: 0.4,
                        loop: true
                    }
                }
            }
        });
    </script>
@endpush
