<?php include $this->resolve("partials/_header.php") ?>

<main class="container-fluid flex-grow-1 py-2 login-main">
    <div class="row mt-2 pb-2 px-5 mx-5 gy-3 shadow-lg rounded-3 bg-light bg-opacity-50 position-relative">
        <h4 class="p-0">Users</h4>
        <table class="table" style="font-size: 0.85rem;">
            <thead>
                <tr>
                    <th scope="col">Username</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Created</th>
                    <th scope="col">Last Log-on</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><?= e($user['user_username']); ?></td>
                        <td><?= e($user['user_first_name'] . ' ' . $user['user_middle_name'] . ' ' . $user['user_last_name']) ?></td>
                        <td><?= e($user['user_email']); ?></td>
                        <td><?= e($user['user_role']); ?></td>
                        <td><?= e($user['user_created_at']); ?></td>
                        <td><?= e($user['user_last_logon']); ?></td>
                        <td class="justify-content-center gap-2 row">
                            <a href="/users/<?= e($user['user_id']);  ?>" class="btn btn-dark btn-sm col-5 px-0">
                                <div class="d-flex align-items-center justify-content-evenly px-3" style="font-size: 0.8rem;">
                                    <i class=" bi bi-pencil"></i> <span>Edit</span>
                                </div>
                            </a>
                            <form action="/users/<?= e($user['user_id']); ?>" method="POST" class="col-5 px-0">
                                <input type="hidden" name="_METHOD" value="DELETE" />
                                <?php include $this->resolve('partials/_csrf.php'); ?>
                                <button type="submit" class="btn btn-light btn-sm px-3 d-flex align-items-center justify-content-evenly" style="font-size: 0.8rem;">
                                    <i class="bi bi-trash"></i> <span>Remove</span>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php include $this->resolve("partials/_alerts.php") ?>
    </div>
    <button class="btn fixed-btn" data-bs-toggle="modal" data-bs-target="#add-user-modal" title="Add New user"><i class="bi bi-plus-circle-fill fs-1"></i></button>
    <div class="modal fade" id="add-user-modal">
        <div class="modal-dialog">
            <div class="modal-content px-3">
                <form method="POST" novalidate>
                    <?php include $this->resolve('partials/_csrf.php'); ?>
                    <header class="modal-header">
                        <h5>Add User</h5>
                    </header>
                    <section class="modal-body py-4">
                        <!-- First name -->
                        <div class="form-group-sm row py-1">
                            <label for="first-name" class="col-sm-1 col-form-label"><i class="bi bi-person-fill fs-5"></i></label>
                            <div class="col-sm">
                                <input type="text" name="first-name" id="first-name" placeholder="First name" class="form-control" value="<?= $oldFormData['first-name'] ?? ''; ?>" required>
                            </div>
                        </div>
                        <!-- Middle name -->
                        <div class="form-group-sm row py-1">
                            <label for="middle-name" class="col-sm-1 col-form-label"><i class="bi bi-person-fill fs-5"></i></label>
                            <div class="col-sm">
                                <input type="text" name="middle-name" id="middle-name" placeholder="Middle name" class="form-control" value="<?= $oldFormData['middle-name'] ?? ''; ?>">
                            </div>
                        </div>
                        <!-- Last name -->
                        <div class="form-group-sm row py-1">
                            <label for="last-name" class="col-sm-1 col-form-label"><i class="bi bi-person-fill fs-5"></i></label>
                            <div class="col-sm">
                                <input type="text" name="last-name" id="last-name" placeholder="Last name" class="form-control" value="<?= $oldFormData['last-name'] ?? ''; ?>" required>
                            </div>
                        </div>
                        <!-- Email -->
                        <div class="form-group-sm row py-1">
                            <label for="email" class="col-sm-1 col-form-label"><i class="bi bi-envelope-fill fs-5"></i></label>
                            <div class="col-sm">
                                <input type="email" name="email" id="email" placeholder="Email" class="form-control" value="<?= $oldFormData['email'] ?? ''; ?>">
                            </div>
                        </div>
                        <!-- Role -->
                        <div class="form-group-sm row py-1">
                            <label for="last-name" class="col-sm-1 col-form-label"><i class="bi bi-person-lines-fill fs-5"></i></label>
                            <div class="col-sm">
                                <select id="user-role" name="user-role" class="form-select">
                                    <option value="Administrator" <?= isset($oldFormData['user-role']) && $oldFormData['user-role'] === 'Administrator' ? 'selected' : ''; ?>>Administrator</option>
                                    <option value="Employee" <?= isset($oldFormData['user-role']) && $oldFormData['user-role'] === 'Employee' ? 'selected' : ''; ?>>Employee</option>
                                </select>

                            </div>

                        </div>
                        <!-- Username & Password -->
                        <hr class="hr-blurry">
                        <div class="form-group-sm row py-1">
                            <label for="user-username" class="col-sm-1 col-form-label"><i class="bi bi-person-badge-fill fs-5"></i></label>
                            <div class="col-sm">
                                <input type="text" name="user-username" id="user-username" placeholder="Username" class="form-control" value="<?= $oldFormData['user-username'] ?? ''; ?>" required>
                            </div>
                            <label for="user-password" class="col-sm-1 col-form-label"><i class="bi bi-person-fill-lock fs-5"></i></label>
                            <div class="col-sm">
                                <input type="password" name="user-password" id="user-password" placeholder="Password" class="form-control" required>
                            </div>
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