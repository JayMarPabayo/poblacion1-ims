<?php include $this->resolve("partials/_header.php") ?>

<main class="container-fluid flex-grow-1 py-2 login-main">
    <div class="card w-50 center mx-auto shadow-lg">
        <form method="POST" novalidate>
            <?php include $this->resolve('partials/_csrf.php'); ?>
            <header class="card-header pt-3">
                <h5>Update Resident</h5>
            </header>
            <section class="card-body">
                <div class="row">
                    <!-- FIRST COLUMN -->
                    <div class="col">
                        <!-- Poruk -->
                        <div class="form-group-sm row py-1">
                            <label for="purok" class="col-sm-1 col-form-label"><i class="bi bi-geo-alt-fill fs-5"></i></label>
                            <div class="col-sm">
                                <select id="purok" name="purok" class="form-select">
                                    <option value="1" <?= e($resident['resident_purok']) == 1 ? 'selected' : ''; ?>>Purok Alubijid</option>
                                    <option value="2" <?= e($resident['resident_purok']) == 2 ? 'selected' : ''; ?>>Tuburan 1-A</option>
                                    <option value="3" <?= e($resident['resident_purok']) == 3 ? 'selected' : ''; ?>>Tuburan 1-B</option>
                                    <option value="4" <?= e($resident['resident_purok']) == 4 ? 'selected' : ''; ?>>Silao 1-A</option>
                                    <option value="5" <?= e($resident['resident_purok']) == 5 ? 'selected' : ''; ?>>Silao 1-B</option>
                                    <option value="6" <?= e($resident['resident_purok']) == 6 ? 'selected' : ''; ?>>Silao 2</option>
                                    <option value="7" <?= e($resident['resident_purok']) == 7 ? 'selected' : ''; ?>>Seaside</option>
                                </select>

                            </div>
                        </div>
                        <!-- First name -->
                        <div class="form-group-sm row py-1">
                            <label for="first-name" class="col-sm-1 col-form-label"><i class="bi bi-person-fill fs-5"></i></label>
                            <div class="col-sm">
                                <input type="text" name="first-name" id="first-name" placeholder="First name" class="form-control" value="<?= e($resident['resident_first_name']) ?? ""; ?>" required>
                            </div>
                        </div>
                        <!-- Middle name -->
                        <div class="form-group-sm row py-1">
                            <label for="middle-name" class="col-sm-1 col-form-label"><i class="bi bi-person-fill fs-5"></i></label>
                            <div class="col-sm">
                                <input type="text" name="middle-name" id="middle-name" placeholder="Middle name" class="form-control" value="<?= e($resident['resident_middle_name']) ?? ""; ?>" required>
                            </div>
                        </div>
                        <!-- Last name -->
                        <div class=" form-group-sm row py-1">
                            <label for="last-name" class="col-sm-1 col-form-label"><i class="bi bi-person-fill fs-5"></i></label>
                            <div class="col-sm">
                                <input type="text" name="last-name" id="last-name" placeholder="Last name" class="form-control" value="<?= e($resident['resident_last_name']) ?? ""; ?>" required>
                            </div>
                        </div>
                        <!-- Suffixx -->
                        <div class=" form-group-sm row py-1">
                            <label for="suffix" class="col-sm-1 col-form-label"><i class="bi bi-person-fill-up fs-5"></i></label>
                            <div class="col-sm">
                                <select id="suffix" name="suffix" class="form-select">
                                    <option value="" <?= e($resident['resident_suffix']) == "" ? 'selected' : ''; ?>>None</option>
                                    <option value="Jr." <?= e($resident['resident_suffix']) == "Jr." ? 'selected' : ''; ?>>Jr.</option>
                                    <option value="Sr." <?= e($resident['resident_suffix']) == "Sr." ? 'selected' : ''; ?>>Sr.</option>
                                    <option value="II" <?= e($resident['resident_suffix']) == "II" ? 'selected' : ''; ?>>II</option>
                                    <option value="III" <?= e($resident['resident_suffix']) == "III" ? 'selected' : ''; ?>>III</option>
                                    <option value="IV" <?= e($resident['resident_suffix']) == "IV" ? 'selected' : ''; ?>>IV</option>
                                    <option value="V" <?= e($resident['resident_suffix']) == "V" ? 'selected' : ''; ?>>V2</option>
                                    <option value="VI" <?= e($resident['resident_suffix']) == "VI" ? 'selected' : ''; ?>>VI</option>
                                </select>

                            </div>
                        </div>
                        <!-- Birthdate -->
                        <div class="form-group-sm row py-1">
                            <label for="birthdate" class="col-sm-1 col-form-label"><i class="bi bi-cake-fill fs-5"></i></label>
                            <div class="col-sm">
                                <input type="date" name="birthdate" placeholder="Birthdate" class="form-control" value="<?= e($resident['formatted_birthdate']) ?? ""; ?>" required>
                            </div>
                        </div>
                        <!-- Gender -->
                        <div class="form-group-sm row py-1">
                            <label for="gender" class="col-sm-1 col-form-label"><i class="bi bi-gender-ambiguous fs-5"></i></label>
                            <div class="col-sm">
                                <select id="gender" name="gender" class="form-select">
                                    <option value="Male" <?= e($resident['resident_gender']) == "Male" ? 'selected' : ''; ?>>Male</option>
                                    <option value="Female" <?= e($resident['resident_gender']) == "Female" ? 'selected' : ''; ?>>Female</option>
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
                                <input type="email" name="email" id="email" placeholder="Email" class="form-control" value="<?= e($resident['resident_email']) ?? ""; ?>">
                            </div>
                        </div>
                        <!-- Contact -->
                        <div class="form-group-sm row py-1">
                            <label for="contact-number" class="col-sm-1 col-form-label"><i class="bi bi-phone-fill fs-5"></i></label>
                            <div class="col-sm">
                                <input type="tel" name="contact-number" id="contact-number" placeholder="Contact number" class="form-control" value="<?= e($resident['resident_contact']) ?? ""; ?>">
                            </div>
                        </div>
                        <!-- Civil Status -->
                        <div class="form-group-sm row py-1">
                            <label for="civil-status" class="col-sm-1 col-form-label"><i class="bi bi-person-bounding-box fs-5"></i></label>
                            <div class="col-sm">
                                <select id="civil-status" name="civil-status" class="form-select">
                                    <option value="Single" <?= e($resident['resident_civil_status']) == "Single" ? 'selected' : ''; ?>>Single</option>
                                    <option value="Married" <?= e($resident['resident_civil_status']) == "Married" ? 'selected' : ''; ?>>Married</option>
                                    <option value="Widowed" <?= e($resident['resident_civil_status']) == "Widowed" ? 'selected' : ''; ?>>Widowed</option>
                                    <option value="Legally Separated" <?= e($resident['resident_civil_status']) == "Legally Separated" ? 'selected' : ''; ?>>Legally Separated</option>
                                </select>

                            </div>
                        </div>
                        <!-- Voter Status -->
                        <div class="form-group-sm row py-1">
                            <label for="voter-status" class="col-sm-1 col-form-label"><i class="bi bi-check-circle-fill fs-5"></i></label>
                            <div class="col-sm">
                                <select id="voter-status" name="voter-status" class="form-select">
                                    <option value="1" <?= e($resident['resident_voter_status']) == 1 ? 'selected' : ''; ?>>Voter</option>
                                    <option value="0" <?= e($resident['resident_voter_status']) == 0 ? 'selected' : ''; ?>>None Voter</option>
                                </select>

                            </div>
                        </div>
                        <!-- Religion -->
                        <div class="form-group-sm row py-1">
                            <label for="religion" class="col-sm-1 col-form-label"><i class="bi bi-people-fill fs-5"></i></label>
                            <div class="col-sm">
                                <select id="religion" name="religion" class="form-select">
                                    <option value="Roman Catholic" <?= e($resident['resident_religion']) == 'Roman Catholic' ? 'selected' : ''; ?>>Roman Catholic</option>
                                    <option value="Islam" <?= e($resident['resident_religion']) == 'Islam' ? 'selected' : ''; ?>>Islam</option>
                                    <option value="Iglesia ni Cristo" <?= e($resident['resident_religion']) == 'Iglesia ni Cristo' ? 'selected' : ''; ?>>Iglesia ni Cristo</option>
                                    <option value="Philippine Independent Church" <?= e($resident['resident_religion']) == 'Philippine Independent Church' ? 'selected' : ''; ?>>Philippine Independent Church</option>
                                    <option value="Seventh-day Adventist" <?= e($resident['resident_religion']) == 'Seventh-day Adventist' ? 'selected' : ''; ?>>Seventh-day Adventist</option>
                                    <option value="Bible Baptist Church" <?= e($resident['resident_religion']) == 'Bible Baptist Church' ? 'selected' : ''; ?>>Bible Baptist Church</option>
                                    <option value="United Church of Christ in the Philippines" <?= e($resident['resident_religion']) == 'United Church of Christ in the Philippines' ? 'selected' : ''; ?>>United Church of Christ in the Philippines</option>
                                    <option value="Jehovah's Witnesses" <?= e($resident['resident_religion']) == "Jehovah's Witnesses" ? 'selected' : ''; ?>>Jehovah's Witnesses</option>
                                </select>


                            </div>
                        </div>
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
    document.getElementById("purok").focus();
</script>
<?php include $this->resolve("partials/_footer.php"); ?>