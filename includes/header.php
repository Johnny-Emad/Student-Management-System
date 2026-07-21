<?php session_start();
if (!isset($_SESSION["students"])) {
    $_SESSION["students"] = [];
}
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="assets/css/style.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script>
        (function() {
            const storageKey = "studentManagementTheme";
            const storedTheme = localStorage.getItem(storageKey);
            const systemTheme = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            const theme = storedTheme || systemTheme;
            document.documentElement.setAttribute("data-bs-theme", theme);
            document.documentElement.style.colorScheme = theme;
        })();
    </script>
</head>

<body class="bg-body text-body theme-light">
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container-fluid px-3 px-lg-4">
            <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="index.php">
                <span class="badge rounded-pill bg-primary-subtle text-primary-emphasis">SM</span>
                Student Management
            </a>
            <div class="d-flex align-items-center gap-2 ms-auto">
                <button id="themeToggle" class="btn btn-outline-secondary btn-sm d-flex align-items-center gap-2" type="button" aria-label="Toggle color theme">
                    <span aria-hidden="true">🌙</span>
                    <span class="d-none d-sm-inline">Dark Mode</span>
                </button>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#studentNavbar" aria-controls="studentNavbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="studentNavbar">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="students.php">Students</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container-fluid py-4 px-3 px-lg-4">