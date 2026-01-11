<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - HealingWay Hospital</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.png') }}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet">


    <link rel="stylesheet" href="assets/css/main.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])


</head>

<body class="bg-gray-50" x-data="adminDashboard()">

    @yield('content')



<x-alerts/>


    <script>
        // Admin dashboard Alpine.js component
        function adminDashboard() {
            return {
                sidebarOpen: false,
                activeSection: 'dashboard',
                init() {
                    // Initialize charts when dashboard loads
                    this.$nextTick(() => {
                        this.initCharts();
                    });
                },
                initCharts() {
                    // Appointments Chart
                    const appointmentsCtx = document.getElementById('appointmentsChart');
                    if (appointmentsCtx) {
                        new Chart(appointmentsCtx, {
                            type: 'line',
                            data: {
                                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                                datasets: [{
                                    label: 'Appointments',
                                    data: [23, 19, 32, 27, 28, 15, 12],
                                    borderColor: '#b6e42f',
                                    backgroundColor: 'rgba(182, 228, 47, 0.1)',
                                    tension: 0.1
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false
                            }
                        });
                    }

                    // Treatment Chart
                    const treatmentCtx = document.getElementById('treatmentChart');
                    if (treatmentCtx) {
                        new Chart(treatmentCtx, {
                            type: 'doughnut',
                            data: {
                                labels: ['IVF', 'IUI', 'Consultation', 'Tests'],
                                datasets: [{
                                    data: [45, 25, 20, 10],
                                    backgroundColor: ['#032c64', '#b6e42f', '#60a5fa', '#f59e0b']
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false
                            }
                        });
                    }
                }
            }
        }

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.querySelector('[x-data]').__x.$data;
            if (window.innerWidth < 1024 && sidebar.sidebarOpen && !event.target.closest('.fixed')) {
                sidebar.sidebarOpen = false;
            }
        });
    </script>
</body>

</html>
