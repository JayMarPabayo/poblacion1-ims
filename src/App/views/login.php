<?php include $this->resolve("partials/_header.php") ?>
<main class="container-fluid flex-grow-1 py-2 login-main">
    <div class="row position-relative h-100 px-5 mx-5">
        <div class="col p-0 w-100 pt-5">
            <h5 class="text-white">Welcome to the Poblacion-1 Information Management System!</h5>
            <p class="text-white opacity-75 mt-3">This platform manages residential records and facilitates the issuance of various documents, including barangay clearances & permits, residence certificates, blotters, and other pertinent data. The system serves as a comprehensive repository for essential information concerning residents and ensures efficient administration of barangay Poblacion-1 related matters.</p>
        </div>
        <div class="col p-0 w-100">
            <div class="container w-75 pt-5 px-4 pb-10 shadow-lg rounded-3 float-end bg-light bg-opacity-50">
                <form id="login-form" class="d-flex flex-column gap-3" method="POST" novalidate>
                    <?php include $this->resolve('partials/_csrf.php'); ?>

                    <i class="bi bi-person-square text-center fs-1"></i>
                    <h5 class="text-center text-dark-emphasis">Members Log-in</h5>
                    <div class="form-floating">
                        <input type="text" name="user-username" id="username" placeholder="Username" class="form-control" value="<?= $oldFormData['user-username'] ?? ''; ?>" required>
                        <label for="username" class="form-label">Username</label>
                    </div>

                    <div class="input-group">
                        <div class="form-floating">
                            <input type="password" name="user-password" id="password" placeholder="Password" class="form-control" value="<?= $oldFormData['user-password'] ?? ''; ?>" required>
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