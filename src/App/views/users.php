<?php include $this->resolve("partials/_header.php") ?>

<main class="container-fluid flex-grow-1 py-2 login-main">
    <div class="row mt-2 pb-2 px-5 mx-5 gy-3 shadow-lg rounded-3 bg-light bg-opacity-50">
        <h4 class="p-0">Users</h4>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Username</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Created</th>
                    <th scope="col">Last Log-on</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>mariasantos</td>
                    <td>Maria Santos</td>
                    <td>mariasantos@gmail.com</td>
                    <td>Administrator</td>
                    <td>January 9, 2023 | 10:24 AM</td>
                    <td>January 9, 2023 | 10:24 AM</td>
                </tr>
                <tr>

                    <td>juandelacruz</td>
                    <td>Juan Dela Cruz</td>
                    <td>juandelacruz@gmail.com</td>
                    <td>Administrator</td>
                    <td>January 10, 2023 | 10:24 AM</td>
                    <td>January 10, 2023 | 10:24 AM</td>
                </tr>
            </tbody>
        </table>
    </div>
    <button class="btn fixed-btn" data-bs-toggle="modal" data-bs-target="#add-user-modal" title="Add New user"><i class="bi bi-plus-circle-fill fs-1"></i></button>
    <div class="modal fade" id="add-user-modal">
        <div class="modal-dialog">
            <div class="modal-content px-4">
                <form method="POST">
                    <header class="modal-header">
                        <h5>Add User</h5>
                    </header>
                    <section class="modal-body py-4">
                        <!-- First name -->
                        <div class="form-group-sm row p-1">
                            <label for="first-name" class="col-sm-1 col-form-label"><i class="bi bi-person-fill fs-5"></i></label>
                            <div class="col-sm">
                                <input type="text" name="first-name" id="first-name" placeholder="First name" class="form-control" value="<?= $oldFormData['first-name'] ?? ''; ?>">
                            </div>
                            <!-- Error Display -->
                            <?php if (array_key_exists('first-name', $errors)) : ?>
                                <div class="text-danger ps-5" style="font-size: 0.8rem;">
                                    <i class="bi bi-exclamation-circle-fill"></i>
                                    <span class="ms-1">
                                        <?php echo e($errors['first-name'][0]); ?>
                                    </span>
                                </div>
                            <?php endif; ?>
                        </div>
                        <!-- Middle name -->
                        <div class="form-group-sm row py-1">
                            <label for="middle-name" class="col-sm-1 col-form-label"><i class="bi bi-person-fill fs-5"></i></label>
                            <div class="col-sm">
                                <input type="text" name="middle-name" id="middle-name" placeholder="Middle name" class="form-control" value="<?= $oldFormData['middle-name'] ?? ''; ?>">
                            </div>
                            <!-- Error Display -->
                            <?php if (array_key_exists('middle-name', $errors)) : ?>
                                <div class="text-danger ps-5" style="font-size: 0.8rem;">
                                    <i class="bi bi-exclamation-circle-fill"></i>
                                    <span class="ms-1">
                                        <?php echo e($errors['middle-name'][0]); ?>
                                    </span>
                                </div>
                            <?php endif; ?>
                        </div>
                        <!-- Last name -->
                        <div class="form-group-sm row py-1">
                            <label for="last-name" class="col-sm-1 col-form-label"><i class="bi bi-person-fill fs-5"></i></label>
                            <div class="col-sm">
                                <input type="text" name="last-name" id="last-name" placeholder="Last name" class="form-control" value="<?= $oldFormData['last-name'] ?? ''; ?>">
                            </div>
                            <!-- Error Display -->
                            <?php if (array_key_exists('last-name', $errors)) : ?>
                                <div class="text-danger ps-5" style="font-size: 0.8rem;">
                                    <i class="bi bi-exclamation-circle-fill"></i>
                                    <span class="ms-1">
                                        <?php echo e($errors['last-name'][0]); ?>
                                    </span>
                                </div>
                            <?php endif; ?>
                        </div>
                        <!-- Email -->
                        <div class="form-group-sm row py-1">
                            <label for="email" class="col-sm-1 col-form-label"><i class="bi bi-envelope-fill fs-5"></i></label>
                            <div class="col-sm">
                                <input type="email" name="email" id="email" placeholder="Email" class="form-control" value="<?= $oldFormData['email'] ?? ''; ?>">
                            </div>
                            <!-- Error Display -->
                            <?php if (array_key_exists('email', $errors)) : ?>
                                <div class="text-danger ps-5" style="font-size: 0.8rem;">
                                    <i class="bi bi-exclamation-circle-fill"></i>
                                    <span class="ms-1">
                                        <?php echo e($errors['email'][0]); ?>
                                    </span>
                                </div>
                            <?php endif; ?>
                        </div>
                        <!-- Role -->
                        <div class="form-group-sm row py-1">
                            <label for="last-name" class="col-sm-1 col-form-label"><i class="bi bi-person-lines-fill fs-5"></i></label>
                            <div class="col-sm">
                                <select id="user-role" name="user-role" id="user-role" class="form-select">
                                    <option value="Administrator" <?= isset($oldFormData['user-role']) && $oldFormData['user-role'] === 'Administrator' ? 'selected' : ''; ?>>Administrator</option>
                                    <option value="Employee" <?= isset($oldFormData['user-role']) && $oldFormData['user-role'] === 'Employee' ? 'selected' : ''; ?>>Employee</option>
                                </select>

                            </div>
                            <!-- Error Display -->
                            <?php if (array_key_exists('user-role', $errors)) : ?>
                                <div class="text-danger ps-5" style=" font-size: 0.8rem;">
                                    <i class="bi bi-exclamation-circle-fill"></i>
                                    <span class="ms-1">
                                        <?php echo e($errors['user-role'][0]); ?>
                                    </span>
                                </div>
                            <?php endif; ?>
                        </div>
                        <!-- Username & Password -->
                        <hr class="hr-blurry">
                        <div class="form-group-sm row py-1">
                            <label for="user-username" class="col-sm-1 col-form-label"><i class="bi bi-person-badge-fill fs-5"></i></label>
                            <div class="col-sm">
                                <input type="text" name="user-username" id="user-username" placeholder="Username" class="form-control" value="<?= $oldFormData['user-username'] ?? ''; ?>">
                            </div>
                            <label for="user-password" class="col-sm-1 col-form-label"><i class="bi bi-person-fill-lock fs-5"></i></label>
                            <div class="col-sm">
                                <input type="password" name="user-password" id="user-password" placeholder="Password" class="form-control">
                            </div>
                            <!-- Error Display -->
                            <?php if (array_key_exists('user-username', $errors) || array_key_exists('user-password', $errors)) : ?>
                                <div class="text-danger ps-5" style="font-size: 0.8rem;">
                                    <i class="bi bi-exclamation-circle-fill"></i>
                                    <span class="ms-1">
                                        <?php echo e($errors['user-username'][0]) ? e($errors['user-username'][0]) : e($errors['user-password'][0]); ?>
                                    </span>
                                </div>
                            <?php endif; ?>
                        </div>
                    </section>
                    <footer class="modal-footer">
                        <input type="button" value="Cancel" data-bs-dismiss="modal" data-bs-target="#addResident" class="btn btn-secondary w-25">
                        <input type="submit" value="Save" class="btn btn-dark w-25">
                    </footer>
                </form>
            </div>
        </div>
    </div>
</main>
<?php include $this->resolve("partials/_footer.php"); ?>