<?php include $this->resolve("partials/_header.php") ?>
<main class="container-fluid flex-grow-1 py-2 login-main">
    <div class="row mt-2 pb-2 px-5 mx-5 gy-3 shadow-lg rounded-3 bg-light bg-opacity-50 position-relative">
        <?php include $this->resolve('partials/_alerts.php'); ?>
        <h6 class="display-6 text-center" style="font-size: 2rem;">Certificate of Residency</h6>
        <div class="row mt-5 pb-3 px-0">
            <!-- Viewing Column -->
            <div class="col-7">
                <h5>Records</h5>
                <div class="form-group-sm py-1 col-6 row align-items-center">
                    <label for="search" class="col-sm-1"><i class="bi bi-search fs-6"></i></label>
                    <form method="GET" class="col-sm">
                        <input type="search" name="search" id="search" placeholder="Search" class="form-control form-control-sm ps-3 bg-transparent rounded-0 border-dark-subtle border-bottom border-2 border-top-0 border-start-0 border-end-0" style="font-size: 0.85rem;" value="<?= e($search) ?? ''; ?>">
                    </form>
                </div>
                <table class="table" style="font-size: 0.80rem;">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Date</th>
                            <th scope="col">Time</th>
                            <th scope="col">Created by</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($records as $record) : ?>
                            <tr class="cursor-pointer">
                                <td><?= e($record['resident_first_name'] . ' ' . $record['resident_middle_name'] . ' ' . $record['resident_last_name'] . ' ' . $record['resident_suffix']); ?></td>
                                <td><?= convertToDateFormat(e($record['cor_date_time'])); ?></td>
                                <td><?= convertToTimeFormat(e($record['cor_date_time'])); ?></td>
                                <td><?= e($record['user_first_name'] . ' ' . $record['user_middle_name'] . ' ' . $record['user_last_name']); ?></td>
                                <td class="justify-content-center gap-2 d-flex justify-content-center align-items-center">
                                    <a href="certificate-of-residency/<?= e($record['cor_id']); ?>" class="col text-decoration-none text-white flex">
                                        <button type="button" class="btn btn-danger p-0 h-100 w-100 d-flex align-items-center justify-content-center gap-2 px-2 py-1" style="font-size: 0.8rem;">
                                            <i class="bi bi-file-earmark-pdf-fill"></i> <span>Export</span>
                                        </button>
                                    </a>
                                    <div class="col text-white flex">
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#deleteModal<?= e($record['cor_id']); ?>" class="btn btn-light p-0 h-100 w-100 d-flex align-items-center justify-content-center gap-2 px-2 py-1" style="font-size: 0.8rem;">
                                            <i class="bi bi-trash-fill"></i> <span>Remove</span>
                                        </button>
                                    </div>

                                </td>
                            </tr>
                            <!-- Delete Confirmation Modal -->
                            <div class="modal fade" id="deleteModal<?= e($record['cor_id']); ?>" aria-hidden="true" aria-labelledby="deleteModal">
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
                                            <form action="certificate-of-residency/<?= e($record['cor_id']); ?>" method="POST">
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
            </div>
            <!-- Vertical Line -->
            <div class="d-flex justify-content-center col-1 opacity-50" style="width: fit-content;">
                <div class="vr"></div>
            </div>
            <!-- Adding Column -->
            <div class="col">
                <h5>Issuance</h5>
                <label for="search-key" class="form-label ps-1 mb-1" style="font-size: 0.9rem;">Choose applicant:</label>
                <div class="input-group ps-1">
                    <input type="search" class="form-control" id="search-key" name="search-key" placeholder="Search" aria-label="Search" aria-describedby="basic-addon2" style="font-size: 0.85rem;">
                    <span class="input-group-text" id="basic-addon2"><i class="bi bi-search"></i></span>
                </div>
                <div class="row position-relative">
                    <div class="list-group position-absolute ps-3 pe-5 rounded-top-0" id="results-list" style="font-size: 0.85rem;">
                    </div>
                </div>
                <form method="POST" id="CORapplicantForm" novalidate>
                    <?php include $this->resolve('partials/_csrf.php'); ?>
                    <input type="hidden" name="resident-id" id="resident-id">
                    <div class="mt-5 row">
                        <label for="applicant-name" class="col-4 col-form-label">Full Name</label>
                        <div class="col">
                            <input type="text" class="form-control" id="applicant-name" name="applicant-name" readonly>
                        </div>
                    </div>
                    <div class="mt-2 row">
                        <label for="applicant-age" class="col-4 col-form-label">Age</label>
                        <div class="col">
                            <input type="number" class="form-control" id="applicant-age" name="applicant-age" readonly>
                        </div>
                    </div>
                    <div class="mt-2 row">
                        <label for="punong-barangay" class="col-4 col-form-label fs-6">Punong Barangay</label>
                        <div class="col">
                            <input type="text" class="form-control" id="punong-barangay" name="punong-barangay" readonly>
                        </div>
                    </div>
                    <div class="mt-4 row">
                        <button type="button" id="COR_submit" class="btn btn-dark d-flex gap-3 justify-content-center align-items-center py-2">
                            <i class="bi bi-file-earmark-arrow-up-fill fs-5"></i>
                            <span>Submit</span>
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    </div>
</main>
<script>
    const searchInput = document.getElementById("search-key");
    const ResultsList = document.getElementById("results-list");
    const hiddenInput = document.getElementById("resident-id");
    const applicantName = document.getElementById("applicant-name");
    const applicantAge = document.getElementById("applicant-age");
    const punongBarangay = document.getElementById("punong-barangay");
    const applicantForm = document.getElementById("CORapplicantForm");
    const corSubmit = document.getElementById("COR_submit");

    searchInput.addEventListener("input", () => {
        if (searchInput.value == "") {
            ResultsList.innerHTML = "";
            hiddenInput.value = "";
            punongBarangay.value = "";
            applicantName.value = "";
            applicantAge.value = "";
            return;
        }
        let xhr = new XMLHttpRequest();
        xhr.open("GET", `/fetchresidents?search=${searchInput.value}`, true);
        xhr.setRequestHeader("Content-Type", "application/json");

        xhr.onload = function() {
            ResultsList.innerHTML = "";
            if (xhr.status >= 200 && xhr.status < 300) {
                try {
                    var data = JSON.parse(xhr.responseText);
                    data.residents?.forEach(resident => {
                        let button = document.createElement("button");
                        button.type = "button";
                        button.classList.add("list-group-item", "list-group-item-action", "border-0", "cursor-pointer");
                        button.innerText = `${resident.resident_first_name} ${resident.resident_middle_name} ${resident.resident_last_name} ${resident.resident_suffix}`;
                        button.addEventListener("click", () => {
                            hiddenInput.value = resident.resident_id;
                            applicantName.value = `${resident.resident_first_name} ${resident.resident_middle_name} ${resident.resident_last_name} ${resident.resident_suffix}`;
                            applicantAge.value = calculateAge(resident.resident_birthdate);
                            searchInput.value = `${resident.resident_first_name} ${resident.resident_middle_name} ${resident.resident_last_name} ${resident.resident_suffix}`;
                            punongBarangay.value = data.punongBarangay.fullname;
                            applicantName.classList.remove("is-invalid");
                            applicantAge.classList.remove("is-invalid");
                            punongBarangay.classList.remove("is-invalid");
                            ResultsList.innerHTML = "";
                        })
                        ResultsList.appendChild(button);
                    });
                } catch (error) {
                    console.error("Error parsing JSON: " + error);
                }
            } else {
                console.error("Error fetching residents. Status: " + xhr.status);
            }
        };

        xhr.onerror = function() {
            console.error("Network error while fetching residents.");
        };

        xhr.send();
    });


    // --Submitting the form
    corSubmit.addEventListener("click", () => {
        if (applicantName.value === null || applicantName.value == "") {
            applicantName.classList.add("is-invalid");
            applicantAge.classList.add("is-invalid");
            punongBarangay.classList.add("is-invalid");
            return;
        } else {
            applicantForm.submit();
        }
    });

    function calculateAge(birthDate) {
        var currentDate = new Date();
        var birthDate = new Date(birthDate);
        var age = currentDate.getFullYear() - birthDate.getFullYear();

        if (
            currentDate.getMonth() < birthDate.getMonth() ||
            (currentDate.getMonth() === birthDate.getMonth() &&
                currentDate.getDate() < birthDate.getDate())
        ) {
            age--;
        }

        return age;
    }
</script>
<?php include $this->resolve("partials/_footer.php"); ?>