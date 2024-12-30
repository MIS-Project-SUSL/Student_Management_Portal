<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="apple-touch-icon" href="public\assests\Logo.png" sizes="180x180">
    <link rel="icon" href="public\assests\Logo.png" sizes="32x32" type="image/png">
    <link rel="icon" href="public\assests\Logo.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="public\assests\Logo.png">
    <link rel="mask-icon" href="" color="#712cf9">
    <link rel="icon" href="public\assests\Logo.png">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
            padding: 0;
            transform: translateX(-100%);
            transition: transform 0.3s ease-in-out;
            width: 280px;
        }

        .sidebar.show {
            transform: translateX(0);
        }

        .sidebar-content {
            padding-top: 1.5rem;
            height: 100%;
            background-color: #fff;
            border-right: 1px solid rgba(0, 0, 0, 0.1);
            width: 100%;
        }

        .nav-link {
            padding: 1rem 1.25rem;
            color: #0d6efd;
            transition: all 0.3s ease;
            margin: 0.25rem 0;
            white-space: nowrap;
            font-weight: 500;
        }

        .nav-item .nav-link.active {
            background-color: #0d6efd;
            color: white;
        }

        .menu-toggle {
            position: fixed;
            top: 1rem;
            left: 1rem;
            z-index: 101;
            display: block;
            padding: 0.5rem;
            color: black;
            background-color: transparent;
            border: 0;
        }

        
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 99;
        }

        .main-content {
            padding-top: 4rem;
        }

        @media (min-width: 768px) {
            .menu-toggle {
                display: none;
            }

            .sidebar {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 280px;
                padding-top: 1.5rem;
            }

            .overlay {
                display: none !important;
            }
        }

        /* settings */
        .settings-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 30px;
        }
        .profile-header {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #f1f3f5;
            padding-bottom: 15px;
        }

        profile-header-info{
            margin-left: 10px;
        }
        .profile-header img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-right: 20px;
            object-fit: cover;
        }
        .profile-header-info h2 {
            margin-bottom: 5px;
            font-weight: 600;
        }
        .profile-header-info p {
            color: #6c757d;
            margin-bottom: 0;
        }
        .form-label {
            font-weight: 600;
            color: #495057;
        }
        .card-stats {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <?php 
        $currentUrl = current_url();
        $isUsersActive = strpos($currentUrl, base_url('users')) === 0;
        $isCoursesActive = strpos($currentUrl, base_url('courses')) === 0;
        $isAdminsActive = strpos($currentUrl, base_url('admins')) === 0;
        $isAnalyticsActive = strpos($currentUrl, base_url('enrollment')) === 0 || 
                         strpos($currentUrl, base_url('attendance')) === 0 || 
                         strpos($currentUrl, base_url('result')) === 0;
    ?>

    <button class="menu-toggle  ">
        <i class="bi bi-list " ></i>
    </button>
    <div class="overlay"></div>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-content pt-5">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 <?= current_url() === base_url('dashboard') ? 'active' : '' ?>" 
                       href="<?= base_url('dashboard') ?>">
                        <i class="bi bi-people"></i> Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 <?= $isUsersActive ? 'active' : '' ?>" 
                    href="<?= base_url('users') ?>">
                        <i class="bi bi-people"></i> Students Management
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 <?= $isCoursesActive ? 'active' : '' ?>"
                    href="<?= base_url('courses') ?>">
                        <i class="bi bi-person-circle"></i> Courses Management
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 <?= $isAdminsActive ? 'active' : '' ?>"
                    href="<?= base_url('admins') ?>">
                        <i class="bi bi-file-text"></i> Administrators Management
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 <?= $isAnalyticsActive ? 'active' : '' ?>"
                    href="<?= base_url('enrollment') ?>">
                        <i class="bi bi-graph-up"></i> Reports and Analytics
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 <?= current_url() === base_url('settings') ? 'active' : '' ?>"
                       href="<?= base_url('settings') ?>">
                        <i class="bi bi-gear"></i> Settings
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="<?= base_url('dashboard/logout') ?>">
                        <i class="bi bi-door-closed"></i> Sign out
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <script>
        const toggleButton = document.querySelector('.menu-toggle');
        const sidebar = document.querySelector('.sidebar');
        const overlay = document.querySelector('.overlay');

        toggleButton.addEventListener('click', () => {
            sidebar.classList.toggle('show');
            overlay.style.display = sidebar.classList.contains('show') ? 'block' : 'none';
        });

        overlay.addEventListener('click', () => {
            sidebar.classList.remove('show');
            overlay.style.display = 'none';
        });
    </script>