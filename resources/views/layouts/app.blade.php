<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Laravel Project')</title>

    <!-- ✅ Bootstrap via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .main {
            flex: 1;
            display: flex;
        }

        .sidebar {
            width: 250px;
            background-color: #343a40;
            color: white;
        }

        .sidebar a {
            color: white;
            display: block;
            padding: 10px 20px;
            text-decoration: none;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background-color: #495057;
        }

        .content {
            flex: 1;
            padding: 20px;
        }

        footer {
            background-color: #f8f9fa;
            text-align: center;
            padding: 1rem;
        }
    </style>

    @stack('styles')
</head>

<body>
    <!-- ✅ HEADER -->
    <header class="bg-primary text-white p-3">
        <div class="container">
            <h1 class="h4 mb-0">Mijn Admin Paneel</h1>
        </div>
    </header>

    <!-- ✅ STRUCTUUR: SIDEBAR + CONTENT -->
    <div class="main">
        {{-- ✅ Sidebar --}}
        @include('layouts.sidebar')

        {{-- ✅ Content --}}
        <div class="content">

            {{-- ✅ Flash messages --}}
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            @yield('content')
        </div>
    </div>

    <!-- ✅ Footer -->
    <footer>
        &copy; {{ date('Y') }} Mijn Admin Systeem
    </footer>

    <!-- ✅ Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Flash messages automatisch laten verdwijnen
        setTimeout(function () {
            let alerts = document.querySelectorAll('.alert');
            alerts.forEach(function (alert) {
                alert.classList.add('fade');
                alert.classList.add('show');
                alert.style.transition = 'opacity 0.5s ease';
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500);
            });
        }, 3000);
    </script>

    @stack('scripts')
</body>

</html>
