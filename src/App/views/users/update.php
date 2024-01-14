<?php include $this->resolve("partials/_header.php") ?>

<main class="container-fluid flex-grow-1 py-2 login-main">
    <div class="card center mx-auto shadow-lg" style="width: 35%;">
        <form method="POST" novalidate>
            <?php include $this->resolve('partials/_csrf.php'); ?>
            <header class="card-header pt-3">
                <h5>Update User</h5>
            </header>
            <section class="card-body">
                <!-- First name -->
                <div class="form-group-sm row py-1">
                    <label for="first-name" class="col-sm-1 col-form-label"><i class="bi bi-person-fill fs-5"></i></label>
                    <div class="col-sm">
                        <input type="text" name="first-name" id="first-name" placeholder="First name" class="form-control" value="<?= $user['user_first_name'] ?? ''; ?>" required>
                    </div>
                </div>
                <!-- Middle name -->
                <div class="form-group-sm row py-1">
                    <label for="middle-name" class="col-sm-1 col-form-label"><i class="bi bi-person-fill fs-5"></i></label>
                    <div class="col-sm">
                        <input type="text" name="middle-name" id="middle-name" placeholder="Middle name" class="form-control" value="<?= $user['user_middle_name'] ?? ''; ?>">
                    </div>
                </div>
                <!-- Last name -->
                <div class="form-group-sm row py-1">
                    <label for="last-name" class="col-sm-1 col-form-label"><i class="bi bi-person-fill fs-5"></i></label>
                    <div class="col-sm">
                        <input type="text" name="last-name" id="last-name" placeholder="Last name" class="form-control" value="<?= $user['user_last_name'] ?? ''; ?>" required>
                    </div>
                </div>
                <!-- Email -->
                <div class="form-group-sm row py-1">
                    <label for="email" class="col-sm-1 col-form-label"><i class="bi bi-envelope-fill fs-5"></i></label>
                    <div class="col-sm">
                        <input type="email" name="email" id="email" placeholder="Email" class="form-control" value="<?= $user['user_email'] ?? ''; ?>">
                    </div>
                </div>
                <!-- Role -->
                <div class="form-group-sm row py-1">
                    <label for="last-name" class="col-sm-1 col-form-label"><i class="bi bi-person-lines-fill fs-5"></i></label>
                    <div class="col-sm">
                        <select id="user-role" name="user-role" class="form-select">
                            <option value="Administrator" <?= $user['user_role'] === 'Administrator' ? 'selected' : ''; ?>>Administrator</option>
                            <option value="Employee" <?= $user['user_role'] === 'Employee' ? 'selected' : ''; ?>>Employee</option>
                        </select>

                    </div>

                </div>
                <!-- Username & Password -->
                <hr class="hr-blurry">
                <div class="form-group-sm row py-1">
                    <label for="user-username" class="col-sm-1 col-form-label"><i class="bi bi-person-badge-fill fs-5"></i></label>
                    <div class="col-sm">
                        <input type="text" name="user-username" id="user-username" placeholder="Username" class="form-control" value="<?= $user['user_username'] ?? ''; ?>" required>
                    </div>
                    <label for="user-password" class="col-sm-1 col-form-label"><i class="bi bi-person-fill-lock fs-5"></i></label>
                    <div class="col-sm">
                        <input type="password" name="user-password" id="user-password" placeholder="Password" class="form-control" required>
                    </div>
                </div>
            </section>
            <footer class="card-footer py-3 text-end">
                <a href="<?= $_SERVER['HTTP_REFERER']; ?>"><input type="button" value="Cancel" class="btn btn-secondary w-25"></a>
                <input type="submit" value="Update" class="btn btn-dark w-25">
            </footer>
        </form>
    </div>
</main>
<script>
    document.getElementById("first-name").focus();
</script>
<?php include $this->resolve("partials/_footer.php"); ?>