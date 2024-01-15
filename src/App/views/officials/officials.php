<?php include $this->resolve("partials/_header.php") ?>

<main class="container-fluid flex-grow-1 py-2 login-main">
    <div class="row mt-2 pb-2 px-5 mx-5 gy-3 shadow-lg rounded-3 bg-light bg-opacity-50 position-relative">
        <div class="row py-4 mt-4">
            <div class="col px-0 position-relative">
                <h5 class="p-0">Barangay Officials</h5>
                <table class="table mt-3" style="font-size: 0.85rem;">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($officials as $official) : ?>
                            <tr>
                                <td><?= e($official['resident_first_name'] . ' ' . $official['resident_middle_name'] . ' ' . $official['resident_last_name']) ?></td>
                                <td><?= e($official['official_position']); ?></td>
                                <td class="justify-content-center gap-2 row">
                                    <a href="/officials/<?= e($official['official_id']);  ?>" class="btn btn-dark btn-sm col-5 px-0">
                                        <div class="d-flex align-items-center justify-content-evenly px-3" style="font-size: 0.8rem;">
                                            <i class=" bi bi-pencil"></i> <span>Edit</span>
                                        </div>
                                    </a>
                                    <form action="/officials/<?= e($official['official_id']); ?>" method="POST" class="col-5 px-0">
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
            <!-- Vertical Line -->
            <div class="d-flex justify-content-center col-1 opacity-50">
                <div class="vr"></div>
            </div>
            <div class="col px-0">
                <h5 class="p-0">Add New Official</h5>
                <!-- Resident -->
                <form method="POST" id="addOfficialForm" novalidate>
                    <?php include $this->resolve('partials/_csrf.php'); ?>
                    <div class="form-group-sm row py-1 mt-3">
                        <label for="resident" class="col-sm-1"><i class="bi bi-person-fill fs-5"></i></label>
                        <div class="col-sm">
                            <input type="hidden" name="resident-id" id="resident-id" required>
                            <input type="text" name="resident-name" id="resident-name" placeholder="--Select personnel below--" class="form-control" required readonly>
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
                <div class="footer float-end">
                    <button id="submitAddOfficialBtn" type="button" class="btn btn-dark btn-lg col gap-3 d-flex align-items-center justify-content-evenly rounded-3" style="font-size: 0.9rem;">
                        <i class="bi bi-floppy2"></i><span>Submit</span>
                    </button>
                </div>

            </div>

        </div>
    </div>

</main>
<script>
    const residentNameInput = document.getElementById('resident-name');
    const submitAddOfficialBtn = document.getElementById('submitAddOfficialBtn');
    const addOfficialForm = document.getElementById("addOfficialForm");

    function setInputs(residentId, residentName) {
        document.getElementById('resident-id').value = residentId;
        document.getElementById('resident-name').value = residentName;
        residentNameInput.classList.remove("is-invalid");
        document.getElementById("position").focus();
    }


    submitAddOfficialBtn.addEventListener("click", () => {
        const formData = new FormData(addOfficialForm);
        formData.forEach((value, key) => {
            console.log(`${key}: ${value}`);
        });


        if (residentNameInput.value === null || residentNameInput.value == "") {
            residentNameInput.classList.add("is-invalid");
            return;
        } else {
            addOfficialForm.submit();
        }
    });
</script>
<?php include $this->resolve("partials/_footer.php"); ?>