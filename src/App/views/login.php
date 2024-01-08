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
    <nav class="navbar navbar-expand navbar-light bg-light border-bottom">
        <div class="container">
            <a href="#" class="navbar-brand h10">
                <img src="/assets/img/favicon.png" alt="favicon" width="28" height="28" class="d-inline-block align-text-top">
                Brgy Poblacion-1 IMS
            </a>

        </div>
    </nav>
    <main class="container-fluid flex-grow-1 py-2 login-main">
        <div class="row position-relative h-100 px-5 mx-5">
            <div class="col p-0 w-100 pt-5">
                <h5 class="text-white">Welcome to the Poblacion-1 Information Management System!</h5>
                <p class="text-white opacity-75 mt-3">This platform manages residential records and facilitates the issuance of various documents, including barangay clearances & permits, residence certificates, blotters, and other pertinent data. The system serves as a comprehensive repository for essential information concerning residents and ensures efficient administration of barangay Poblacion-1 related matters.</p>
            </div>
            <div class="col p-0 w-100">
                <div class="container w-75 pt-5 px-4 pb-10 shadow-lg rounded-3 float-end bg-light bg-opacity-50">
                    <form id="login-form" class="d-flex flex-column gap-3" enctype="multipart/form-data">
                        <i class="bi bi-person-square text-center fs-1"></i>
                        <h5 class="text-center text-dark-emphasis">Members Log-in</h5>
                        <div class="form-floating">
                            <input type="text" name="username" id="username" placeholder="Username" class="form-control" required>
                            <label for="username" class="form-label">Username</label>
                        </div>

                        <div class="input-group">
                            <div class="form-floating">
                                <input type="password" name="password" id="password" placeholder="Password" class="form-control" required>
                                <label for="password" class="form-label">Password</label>
                            </div>

                            <div class="input-group-append">
                                <span class="input-group-text h-100 rounded-0 rounded-end-1 cursor-pointer">
                                    <i class="bi bi-eye" id="togglePassword"></i>
                                </span>
                            </div>
                        </div>

                        <input type="submit" name="submit" value="Log in" class="btn btn-primary w-100 py-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="form-check cursor-pointer">
                                <input type="checkbox" name="remember-me" id="remember-me" class="form-check-input">
                                <label for="remember-me" class="form-check-label">Remember me</label>
                            </div>

                            <a href="#" class="btn-link">Forgot password?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <?php include $this->resolve("partials/_footer.php"); ?>