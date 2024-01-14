<?php include $this->resolve("partials/_header.php") ?>

<main class="container-fluid flex-grow-1 py-2 login-main">
    <div class="card w-50 center mx-auto shadow-lg">
        <?php include $this->resolve('partials/_csrf.php'); ?>
        <header class="card-header pt-3">
            <h5>Update Official</h5>
        </header>
        <section class="card-body">
            <!-- Resident -->
            <form method="POST" id="updateOfficialForm" novalidate>
                <?php include $this->resolve('partials/_csrf.php'); ?>
                <div class="form-group-sm row py-1 mt-3">
                    <label for="resident" class="col-sm-1"><i class="bi bi-person-fill fs-4"></i></label>
                    <div class="col-sm">
                        <input type="hidden" name="resident-id" id="resident-id" value="<?= e($official['official_resident']) ?? ''; ?>" required>
                        <input type="text" name="resident-name" id="resident-name" placeholder="--Select personnel below--" class="form-control" value="<?= e($official['resident_first_name']) . ' ' . e($official['resident_middle_name']) . ' ' . e($official['resident_last_name']) . ' ' . e($official['resident_suffix']); ?>" required readonly>
                    </div>
                </div>
                <!-- Position -->
                <div class="form-group-sm row py-1">
                    <label for="position" class="col-sm-1 col-form-label"><i class="bi bi-award-fill fs-4"></i></label>
                    <div class="col-sm">
                        <select id="position" name="position" class="form-select">
                            <option value="Barangay Kagawad" <?= e($official['official_position']) == "Barangay Kagawad" ? 'selected' : ''; ?>>Barangay Kagawad</option>
                            <option value="Barangay Treasurer" <?= e($official['official_position']) == "Barangay Treasurer" ? 'selected' : ''; ?>>Barangay Treasurer</option>
                            <option value="Barangay Secretary" <?= e($official['official_position']) == "Barangay Secretary" ? 'selected' : ''; ?>>Barangay Secretary</option>
                            <option value="Sangguniang Kabataan Chairman" <?= e($official['official_position']) == "Sangguniang Kabataan Chairman" ? 'selected' : ''; ?>>SK Chairman</option>
                            <option value="Punong Barangay" <?= e($official['official_position']) == "Punong Barangay" ? 'selected' : ''; ?>>Punong Barangay</option>
                        </select>
                    </div>
                </div>
            </form>
            <hr>
            <!-- Header + Search -->
            <div class="row align-items-center">
                <h6 class="col-4">Select Personnel</h6>
                <form class="form-group-sm py-1 col d-flex" method="GET">
                    <input type="search" name="search" id="search" placeholder="Search" class="form-control form-control-sm rounded-0 ps-3 border-dark-subtle border-bottom border-2 border-top-0 border-start-0 border-end-0 bg-transparent">
                    <label for="search" class="col-sm-1 px-2 pt-1"><i class="bi bi-search fs-6"></i></label>
                </form>

            </div>
            <table class="table table-hover" style="font-size: 0.85rem;">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Purok</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Age</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($residents as $resident) : ?>
                        <tr class="cursor-pointer" onclick="setInputs('<?= e($resident['resident_id']); ?>', '<?= e($resident['resident_first_name'] . ' ' . $resident['resident_middle_name'] . ' ' . $resident['resident_last_name'] . ' ' . $resident['resident_suffix']) ?>')">
                            <td><?= e($resident['resident_first_name'] . ' ' . $resident['resident_middle_name'] . ' ' . $resident['resident_last_name'] . ' ' . $resident['resident_suffix']) ?></td>
                            <td><?= e($resident['purok_name']); ?></td>
                            <td><?= e($resident['resident_gender']); ?></td>
                            <td><?= calculateAge(e($resident['resident_birthdate'])); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
        <footer class="card-footer py-3 text-end">
            <a href="/officials"><input type="button" value="Cancel" class="btn btn-secondary w-25"></a>
            <button id="updateOfficialBtn" class="btn btn-dark w-25 rounded-3">
                <span>Submit</span>
            </button>
        </footer>
    </div>
</main>
<script>
    const residentNameInput = document.getElementById('resident-name');
    const updateOfficialBtn = document.getElementById('updateOfficialBtn');
    const updateOfficialForm = document.getElementById("updateOfficialForm");

    function setInputs(residentId, residentName) {
        document.getElementById('resident-id').value = residentId;
        document.getElementById('resident-name').value = residentName;
        residentNameInput.classList.remove("is-invalid")
        document.getElementById("position").focus();
    }


    updateOfficialBtn.addEventListener("click", () => {

        const formData = new FormData(updateOfficialForm);
        formData.forEach((value, key) => {
            console.log(`${key}: ${value}`);
        });


        if (residentNameInput.value === null || residentNameInput.value == "") {
            residentNameInput.classList.add("is-invalid");
            return;
        } else {
            updateOfficialForm.submit();
        }
    });
</script>
<?php include $this->resolve("partials/_footer.php"); ?>