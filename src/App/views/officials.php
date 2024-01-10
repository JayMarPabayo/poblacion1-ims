<?php include $this->resolve("partials/_header.php") ?>

<main class="container-fluid flex-grow-1 py-2 login-main">
    <div class="row mt-2 pb-2 px-5 mx-5 gy-3 shadow-lg rounded-3 bg-light bg-opacity-50">
        <h4 class="p-0">Barangay Officials</h4>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Purok</th>
                    <th>Gender</th>
                    <th>Age</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($officials as $official) : ?>
                    <tr>
                        <td><?= e($official['resident_first_name'] . ' ' . $official['resident_middle_name'] . ' ' . $official['resident_last_name']) ?></td>
                        <td><?= e($official['official_position']); ?></td>
                        <td><?= e($official['resident_purok']); ?></td>
                        <td><?= e($official['resident_gender']); ?></td>
                        <td><?= calculateAge(e($official['resident_birthdate'])); ?></td>
                        <td class="justify-content-center gap-2 row">
                            <button type="button" class="btn btn-dark btn-sm col-4">
                                <i class="bi bi-pencil fs-6"></i> Edit
                            </button>

                            <button type="button" class="btn btn-light btn-sm col-4">
                                <i class="bi bi-trash fs-6"></i> Remove
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <button class="btn fixed-btn" data-bs-toggle="modal" data-bs-target="#add-official-modal" title="Add New user"><i class="bi bi-plus-circle-fill fs-1"></i></button>
    <div class="modal modal-xl fade" id="add-official-modal">
        <div class="modal-dialog">
            <div class="modal-content px-3">
                <form method="POST" novalidate>
                    <?php include $this->resolve('partials/_csrf.php'); ?>
                    <header class="modal-header">
                        <h5>Add Official</h5>
                    </header>
                    <section class="modal-body py-4 row">
                        <div class="col-4">
                            <!-- Resident -->
                            <div class="form-group-sm row py-1">
                                <label for="resident" class="col-sm-1 col-form-label"><i class="bi bi-person-fill fs-5"></i></label>
                                <div class="col-sm">
                                    <input type="hidden" name="resident-id" id="resident-id" readonly>
                                    <input type="text" name="resident" id="resident" placeholder="Resident" class="form-control" readonly required>
                                </div>
                            </div>
                            <!-- Position -->
                            <div class="form-group-sm row py-1">
                                <label for="position" class="col-sm-1 col-form-label"><i class="bi bi-award-fill fs-5"></i></label>
                                <div class="col-sm">
                                    <select id="position" name="position" class="form-select">
                                        <option value="Barangay Kagawad">Barangay Kagawad</option>
                                        <option value="Barangay Treasurer">Barangay Treasurer</option>
                                        <option value="Barangay Secretary">Barangay Secretary</option>
                                        <option value="Sangguniang Kabataan Chairman">SK Chairman</option>
                                        <option value="Punong Barangay">Punong Barangay</option>
                                    </select>

                                </div>

                            </div>
                        </div>
                        <div class="col">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="d-none">id</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Purok</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">Age</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($residents as $resident) : ?>
                                        <tr class="cursor-pointer" onclick="setInputs(<?php echo $resident['resident_id']; ?>, '<?php echo $resident['resident_first_name'] . ' ' . $resident['resident_middle_name'] . ' ' . $resident['resident_last_name']; ?>')">
                                            <td class="d-none"><?= e($resident['resident_id']); ?></td>
                                            <td><?= e($resident['resident_first_name'] . ' ' . $resident['resident_middle_name'] . ' ' . $resident['resident_last_name']) ?></td>
                                            <td><?= e($resident['purok_name']); ?></td>
                                            <td><?= e($resident['resident_gender']); ?></td>
                                            <td><?= calculateAge(e($resident['resident_birthdate'])); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </section>
                    <footer class="modal-footer">
                        <input type="button" value="Cancel" data-bs-dismiss="modal" data-bs-target="#addResident" class="btn btn-secondary w-25">
                        <input type="submit" value="Assign" class="btn btn-dark w-25">
                    </footer>
                </form>
            </div>
        </div>
    </div>

</main>
<script>
    function setInputs(residentId, residentName) {
        document.getElementById('resident-id').value = residentId;
        document.getElementById('resident').value = residentName;
    }
</script>
<?php include $this->resolve("partials/_footer.php"); ?>