
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'StudentHub')</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>

    <!-- Sidebar -->
    <aside class="sidebar">

        <div class="brand">
            STUDENT<span>HUB.</span>
        </div>

        <div class="menu-label">MAIN MENU</div>

        <nav class="nav flex-column">

            <a href="{{ route('students.index') }}"
               class="nav-link {{ request()->routeIs('students.*') ? 'active' : '' }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('students.index') }}" class="nav-link">
                <i class="bi bi-people"></i>
                <span>Students</span>
            </a>

            <a href="#" class="nav-link">
                <i class="bi bi-book"></i>
                <span>Courses</span>
            </a>

            <a href="#" class="nav-link">
                <i class="bi bi-graph-up"></i>
                <span>Reports</span>
            </a>

        </nav>

        <div class="menu-label mt-5">SETTINGS</div>

        <nav class="nav flex-column">

            <a href="#" class="nav-link">
                <i class="bi bi-gear"></i>
                <span>Settings</span>
            </a>

        </nav>

        <div class="sidebar-footer">
            <div class="footer-icon">
                <i class="bi bi-mortarboard"></i>
            </div>
            <div>
                <h6>StudentHub</h6>
                <small>Management System</small>
            </div>
        </div>

    </aside>


    <!-- Main Content -->
    <main class="main-content">

        <!-- Topbar -->
        <header class="topbar">

            <div class="topbar-left">

                <h1 class="page-heading">
                    @yield('page-heading', 'Dashboard')
                </h1>

                <p class="page-subtitle">
                    Welcome back! Here's what's happening today.
                </p>

            </div>

            <div class="profile">

                <div class="notification-icon">
                    <i class="bi bi-bell"></i>
                </div>

                <div class="profile-avatar">
                    A
                </div>

                <div class="profile-details">
                    <div class="profile-name">Admin User</div>
                    <div class="profile-role">Administrator</div>
                </div>

            </div>

        </header>


        <!-- Page Content -->
        <section class="page-content">

            @yield('content')

        </section>

        <!-- Footer -->
        <footer class="text-center text-secondary small mt-5 pb-3">
            © {{ date('Y') }} StudentHub. All rights reserved.
        </footer>

    </main>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
