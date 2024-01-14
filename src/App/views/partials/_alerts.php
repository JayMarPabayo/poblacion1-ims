<!-- Successful -->
<?php if (isset($_SESSION['update_message'])) : ?>
    <div role="alert" class="alert alert-success alert-dismissible fade show position-absolute py-2 top-0 end-0 me-2 mt-2 p-0 row justify-content-between align-items-center" style="font-size: 0.85rem; width: fit-content;">
        <div class="col d-flex">
            <i class="bi bi-check-circle-fill text-success-emphasis"></i>
            <span class="ms-2"><?= $_SESSION['update_message']; ?></span>
        </div>
        <input type="button" value="" class="btn-close position-relative py-0 col-1" aria-label="close" data-bs-dismiss="alert">
    </div>
<?php unset($_SESSION['update_message']);
endif; ?>


<!-- Warning -->
<?php if (isset($_SESSION['warning_message'])) : ?>
    <div role="alert" class="alert alert-warning alert-dismissible fade show position-absolute py-2 top-0 end-0 me-2 mt-2 p-0 row justify-content-between align-items-center" style="font-size: 0.85rem; width: fit-content;">
        <div class="col d-flex">
            <i class="bi bi-exclamation-circle-fill text-warning-emphasis"></i>
            <span class="ms-2"><?= $_SESSION['warning_message']; ?></span>
        </div>
        <input type="button" value="" class="btn-close position-relative py-0 col-1" aria-label="close" data-bs-dismiss="alert">
    </div>
<?php unset($_SESSION['warning_message']);
endif; ?>