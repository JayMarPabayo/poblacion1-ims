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
                                <td class="justify-content-center row">
                                    <a href="/officials/<?= e($official['official_id']); ?>" class="col text-decoration-none text-white flex">
                                        <button type="button" class="btn btn-dark p-0 h-100 w-100 d-flex align-items-center justify-content-center gap-2 px-2 py-1" style="font-size: 0.8rem;">
                                            <i class="bi bi-pen-fill"></i> <span>Edit</span>
                                        </button>
                                    </a>
                                    <div class="col text-white flex">
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#deleteModal<?= e($official['official_id']); ?>" class="btn btn-light p-0 h-100 w-100 d-flex align-items-center justify-content-center gap-2 px-2 py-1" style="font-size: 0.8rem;">
                                            <i class="bi bi-trash-fill"></i> <span>Remove</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <!-- Delete Confirmation Modal -->
                            <div class="modal fade" id="deleteModal<?= e($official['official_id']); ?>" aria-hidden="true" aria-labelledby="deleteModal">
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
                                            <form action="/officials/<?= e($official['official_id']); ?>" method="POST">
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
        if (residentNameInput.value === null || residentNameInput.value == "") {
            residentNameInput.classList.add("is-invalid");
            return;
        } else {
            addOfficialForm.submit();
        }
    });
</script>
<?php include $this->resolve("partials/_footer.php"); ?>