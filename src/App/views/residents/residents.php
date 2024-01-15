<?php include $this->resolve("partials/_header.php") ?>

<main class="container-fluid flex-grow-1 py-2 login-main">
    <div class="row mt-2 pb-2 px-5 mx-5 gy-3 shadow-lg rounded-3 bg-light bg-opacity-50 position-relative">
        <h4 class="p-0">Residents</h4>
        <!-- Search -->
        <form id="search-form" class="form-group-sm py-1 col-4 row align-items-center" method="GET">
            <label for="search" class="col-sm-1"><i class="bi bi-search fs-6"></i></label>
            <div class="col-sm">
                <input type="search" name="search" id="search" placeholder="Search" class="form-control form-control-sm ps-3 bg-transparent rounded-0 border-dark-subtle border-bottom border-2 border-top-0 border-start-0 border-end-0" value="<?= $_GET['search'] ?? ''; ?>">
            </div>
        </form>
        <table class="table" style="font-size: 0.85rem;">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Purok</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Age</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Email</th>
                    <th scope="col">Religion</th>
                    <th scope="col">Voter</th>
                    <th scope="col">Civil Status</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($residents as $resident) : ?>
                    <tr>
                        <td><?= e($resident['resident_first_name'] . ' ' . $resident['resident_middle_name'] . ' ' . $resident['resident_last_name'] . ' ' . $resident['resident_suffix']) ?></td>
                        <td><?= e($resident['purok_name']); ?></td>
                        <td><?= e($resident['resident_gender']); ?></td>
                        <td><?= calculateAge(e($resident['resident_birthdate'])); ?></td>
                        <td><?= e($resident['resident_contact']); ?></td>
                        <td><?= e($resident['resident_email']); ?></td>
                        <td><?= e($resident['resident_religion']); ?></td>
                        <td><?= convertToYesNo(e($resident['resident_voter_status'])); ?></td>
                        <td><?= e($resident['resident_civil_status']); ?></td>
                        <td class="justify-content-center gap-2 row">
                            <a href="/residents/<?= e($resident['resident_id']);  ?>" class="btn btn-dark btn-sm col-5 px-0">
                                <div class="d-flex align-items-center justify-content-evenly px-3" style="font-size: 0.8rem;">
                                    <i class=" bi bi-pencil"></i> <span>Edit</span>
                                </div>
                            </a>
                            <form action="/residents/<?= e($resident['resident_id']); ?>" method="POST" class="col-5 px-0">
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
    <button class="btn fixed-btn" data-bs-toggle="modal" data-bs-target="#addResident" title="Add New Resident"><i class="bi bi-plus-circle-fill fs-1"></i></button>

    <!-- ADD RESIDENT MODAL -->
    <div class="modal modal-lg fade" id="addResident">
        <div class="modal-dialog">
            <div class="modal-content px-3">
                <form method="POST" novalidate>
                    <?php include $this->resolve('partials/_csrf.php'); ?>
                    <header class="modal-header">
                        <h5>Add Resident</h5>
                    </header>
                    <section class="modal-body py-4">
                        <div class="row">
                            <!-- FIRST COLUMN -->
                            <div class="col">
                                <!-- Poruk -->
                                <div class="form-group-sm row py-1">
                                    <label for="purok" class="col-sm-1 col-form-label"><i class="bi bi-geo-alt-fill fs-5"></i></label>
                                    <div class="col-sm">
                                        <select id="purok" name="purok" class="form-select">
                                            <option value="1">Purok Alubijid</option>
                                            <option value="2">Tuburan 1-A</option>
                                            <option value="3">Tuburan 1-B</option>
                                            <option value="4">Silao 1-A</option>
                                            <option value="5">Silao 1-B</option>
                                            <option value="6">Silao 2</option>
                                            <option value="7">Seaside</option>
                                        </select>

                                    </div>
                                </div>
                                <!-- First name -->
                                <div class="form-group-sm row py-1">
                                    <label for="first-name" class="col-sm-1 col-form-label"><i class="bi bi-person-fill fs-5"></i></label>
                                    <div class="col-sm">
                                        <input type="text" name="first-name" id="first-name" placeholder="First name" class="form-control" required>
                                    </div>
                                </div>
                                <!-- Middle name -->
                                <div class="form-group-sm row py-1">
                                    <label for="middle-name" class="col-sm-1 col-form-label"><i class="bi bi-person-fill fs-5"></i></label>
                                    <div class="col-sm">
                                        <input type="text" name="middle-name" id="middle-name" placeholder="Middle name" class="form-control" required>
                                    </div>
                                </div>
                                <!-- Last name -->
                                <div class="form-group-sm row py-1">
                                    <label for="last-name" class="col-sm-1 col-form-label"><i class="bi bi-person-fill fs-5"></i></label>
                                    <div class="col-sm">
                                        <input type="text" name="last-name" id="last-name" placeholder="Last name" class="form-control" required>
                                    </div>
                                </div>
                                <!-- Suffixx -->
                                <div class="form-group-sm row py-1">
                                    <label for="suffix" class="col-sm-1 col-form-label"><i class="bi bi-person-fill-up fs-5"></i></label>
                                    <div class="col-sm">
                                        <select id="suffix" name="suffix" class="form-select">
                                            <option value="">None</option>
                                            <option value="Jr.">Jr.</option>
                                            <option value="Sr.">Sr.</option>
                                            <option value="II">II</option>
                                            <option value="III">III</option>
                                            <option value="IV">IV</option>
                                            <option value="V">V2</option>
                                            <option value="VI">VI</option>
                                        </select>

                                    </div>
                                </div>
                                <!-- Birthdate -->
                                <div class="form-group-sm row py-1">
                                    <label for="birthdate" class="col-sm-1 col-form-label"><i class="bi bi-cake-fill fs-5"></i></label>
                                    <div class="col-sm">
                                        <input type="date" name="birthdate" placeholder="Birthdate" class="form-control" required>
                                    </div>
                                </div>
                                <!-- Gender -->
                                <div class="form-group-sm row py-1">
                                    <label for="gender" class="col-sm-1 col-form-label"><i class="bi bi-gender-ambiguous fs-5"></i></label>
                                    <div class="col-sm">
                                        <select id="gender" name="gender" class="form-select">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <!-- SECOND COLUMN -->
                            <div class="col">
                                <!-- Email -->
                                <div class="form-group-sm row py-1">
                                    <label for="email" class="col-sm-1 col-form-label"><i class="bi bi-envelope-at-fill fs-5"></i></label>
                                    <div class="col-sm">
                                        <input type="email" name="email" id="email" placeholder="Email" class="form-control">
                                    </div>
                                </div>
                                <!-- Contact -->
                                <div class="form-group-sm row py-1">
                                    <label for="contact-number" class="col-sm-1 col-form-label"><i class="bi bi-phone-fill fs-5"></i></label>
                                    <div class="col-sm">
                                        <input type="tel" name="contact-number" id="contact-number" placeholder="Contact number" class="form-control">
                                    </div>
                                </div>
                                <!-- Civil Status -->
                                <div class="form-group-sm row py-1">
                                    <label for="civil-status" class="col-sm-1 col-form-label"><i class="bi bi-person-bounding-box fs-5"></i></label>
                                    <div class="col-sm">
                                        <select id="civil-status" name="civil-status" class="form-select">
                                            <option value="Single">Single</option>
                                            <option value="Married">Married</option>
                                            <option value="Widowed">Widowed</option>
                                            <option value="Legally Separated">Legally Separated</option>
                                        </select>

                                    </div>
                                </div>
                                <!-- Voter Status -->
                                <div class="form-group-sm row py-1">
                                    <label for="voter-status" class="col-sm-1 col-form-label"><i class="bi bi-check-circle-fill fs-5"></i></label>
                                    <div class="col-sm">
                                        <select id="voter-status" name="voter-status" class="form-select">
                                            <option value="1">Voter</option>
                                            <option value="0">None Voter</option>
                                        </select>

                                    </div>
                                </div>
                                <!-- Religion -->
                                <div class="form-group-sm row py-1">
                                    <label for="religion" class="col-sm-1 col-form-label"><i class="bi bi-people-fill fs-5"></i></label>
                                    <div class="col-sm">
                                        <select id="religion" name="religion" class="form-select">
                                            <option value="Roman Catholic">Roman Catholic</option>
                                            <option value="Islam">Islam</option>
                                            <option value="Iglesia ni Cristo">Iglesia ni Cristo</option>
                                            <option value="Philippine Independent Church">Philippine Independent Church</option>
                                            <option value="Seventh-day Adventist">Seventh-day Adventist</option>
                                            <option value="Bible Baptist Church">Bible Baptist Church</option>
                                            <option value="United Church of Christ in the Philippines">United Church of Christ in the Philippines</option>
                                            <option value="Jehovah's Witnesses">Jehovah's Witnesses</option>
                                        </select>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <footer class="modal-footer">
                        <input type="button" value="Cancel" data-bs-dismiss="modal" class="btn btn-secondary w-25">
                        <input type="submit" value="Save" class="btn btn-dark w-25">
                    </footer>
                </form>
            </div>
        </div>
    </div>

</main>
<?php include $this->resolve("partials/_footer.php"); ?>