<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($title); ?></title>
    <link href=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/assets/main.scss">
    <link rel="shortcut icon" href="/assets/img/favicon.png" type="image/x-icon">

</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-light bg-light border-bottom">
        <div class="container">
            <a href="#" class="navbar-brand h10">
                <img src="/assets/img/favicon.png" alt="favicon" width="28" height="28" class="d-inline-block align-text-top">
                Brgy Poblacion-1 IMS
            </a>
            <button type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler">
                <span class="navbar-toggler-icon"></span>
            </button>
            <?php if (isset($_SESSION['user'])) : ?>
                <div class="collapse navbar-collapse" id="navbarMenu">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="/" class="nav-link <?= $path === '/' ? 'active' : ''; ?>" aria-current="page">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a href="/residents" class="nav-link <?= $path === '/residents' ? 'active' : ''; ?>">Residents</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Services
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Barangay Certificate of Residency</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="/users" class="nav-link <?= $path === '/users' ? 'active' : ''; ?>">Users</a>
                        </li>
                        <li class="nav-item">
                            <a href="/officials" class="nav-link <?= $path === '/officials' ? 'active' : ''; ?>">Officials</a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0);" onclick="confirmLogout()" class="nav-link">Log off</a>
                        </li>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
    </nav>