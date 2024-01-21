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
                        <td class="justify-content-center row">
                            <a href="/users/<?= e($user['user_id']); ?>" class="col text-decoration-none text-white flex">
                                <button type="button" class="btn btn-dark p-0 h-100 w-100 d-flex align-items-center justify-content-center gap-2 px-2 py-1" style="font-size: 0.8rem;">
                                    <i class="bi bi-pen-fill"></i> <span>Edit</span>
                                </button>
                            </a>
                            <div class="col text-white flex">
                                <button type="button" data-bs-toggle="modal" data-bs-target="#deleteModal<?= e($user['user_id']); ?>" class="btn btn-light p-0 h-100 w-100 d-flex align-items-center justify-content-center gap-2 px-2 py-1" style="font-size: 0.8rem;">
                                    <i class="bi bi-trash-fill"></i> <span>Remove</span>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <!-- Delete Confirmation Modal -->
                    <div class="modal fade" id="deleteModal<?= e($user['user_id']); ?>" aria-hidden="true" aria-labelledby="deleteModal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Confirmation</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body px-0 pb-0 pt-3 d-flex flex-column justify-content-between gap-3">
                                    <div class="px-3">
                                        Are you sure you want to delete this record?
                                    </div>
                                    <div class="alert alert-warning d-flex align-items-center gap-2 mb-0 w-100 px-1 py-2 rounded-0" role="alert" style="font-size: 0.75rem">
                                        <i class="bi bi-exclamation-circle-fill"></i>
                                        <div>
                                            This action cannot be undone.
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer px-2">
                                    <form action="/users/<?= e($user['user_id']); ?>" method="POST">
                                        <input type="hidden" name="_METHOD" value="DELETE" />
                                        <?php include $this->resolve('partials/_csrf.php'); ?>
                                        <button type="button" class="btn btn-light col" data-bs-target="#deleteModal" data-bs-toggle="modal">
                                            No
                                        </button>
                                        <button type="submit" class="btn btn-dark col">
                                            Yes
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: Delete Confirmation Modal -->
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