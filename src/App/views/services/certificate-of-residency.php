<?php include $this->resolve("partials/_header.php") ?>

<main class="container-fluid flex-grow-1 py-2 login-main">
    <div class="row mt-2 pb-2 px-5 mx-5 gy-3 shadow-lg rounded-3 bg-light bg-opacity-50 position-relative">
        <h6 class="display-6 text-center" style="font-size: 2rem;">Certificate of Residency</h6>
        <!-- Viewing Column -->
        <div class="col-7">
            <h5>Records</h5>
            <form id="search-form" class="form-group-sm py-1 col-6 row align-items-center" method="GET">
                <label for="search" class="col-sm-1"><i class="bi bi-search fs-6"></i></label>
                <div class="col-sm">
                    <input type="search" name="search" id="search" placeholder="Search" class="form-control form-control-sm ps-3 bg-transparent rounded-0 border-dark-subtle border-bottom border-2 border-top-0 border-start-0 border-end-0" style="font-size: 0.85rem;">
                </div>
            </form>
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
                    <tr>
                        <td>Jay Mar B. Pabayo</td>
                        <td>01/12/2023</td>
                        <td>10:34 AM</td>
                        <td>Punong C. Barangay</td>
                        <td class="justify-content-center gap-2 d-flex justify-content-center align-items-center">
                            <a href="#" class="col text-decoration-none text-white flex">
                                <button type="button" class="btn btn-dark p-0 h-100 w-100 d-flex align-items-center justify-content-center gap-2 px-2 py-1" style="font-size: 0.8rem;">
                                    <i class="bi bi-printer-fill"></i> <span>Print</span>
                                </button>
                            </a>
                            <form action="#" method="POST" class="col flex">
                                <input type="hidden" name="_METHOD" value="DELETE" />
                                <?php include $this->resolve('partials/_csrf.php'); ?>
                                <button type="submit" class="btn btn-light p-0 h-100 w-100 d-flex align-items-center justify-content-center gap-2 px-2 py-1" style="font-size: 0.8rem;">
                                    <i class="bi bi-trash-fill"></i> <span>Remove</span>
                                </button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- Adding Column -->
        <div class="col-5">

        </div>
    </div>
</main>
<?php include $this->resolve("partials/_footer.php"); ?>