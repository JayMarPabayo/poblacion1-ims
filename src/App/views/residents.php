<?php include $this->resolve("partials/_header.php") ?>

<main class="container-fluid flex-grow-1 py-2 login-main">
    <div class="row mt-2 pb-2 px-5 mx-5 gy-3 shadow-lg rounded-3 bg-light bg-opacity-50">
        <h4 class="p-0">Residents</h4>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Purok</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Age</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Voter</th>
                    <th scope="col">Civil Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Maria Santos</td>
                    <td>Tuburan 1-A</td>
                    <td>Female</td>
                    <td>32</td>
                    <td>0912-345-6789</td>
                    <td>Yes</td>
                    <td>Married</td>
                </tr>
                <tr>
                    <td>Juan Dela Cruz</td>
                    <td>Purok Alubijid</td>
                    <td>Female</td>
                    <td>25</td>
                    <td>0987-654-3210</td>
                    <td>Yes</td>
                    <td>Single</td>
                </tr>
                <tr>
                    <td>Sofia Rodriguez</td>
                    <td>Silao 1-A</td>
                    <td>Female</td>
                    <td>45</td>
                    <td>0935-876-5432</td>
                    <td>Yes</td>
                    <td>Widow</td>
                </tr>
            </tbody>
        </table>
    </div>
    <button class="btn fixed-btn" data-bs-toggle="modal" data-bs-target="#addResident" title="Add New Resident"><i class="bi bi-plus-circle-fill fs-1"></i></button>
    <div class="modal fade" id="addResident">
        <div class="modal-dialog">
            <div class="modal-content">
                <header class="modal-header">Add Resident</header>
                <section class="modal-body">Body</section>
                <footer class="modal-footer">
                    <input type="button" value="Cancel" data-bs-dismiss="modal" data-bs-target="#addResident" class="btn btn-secondary w-25">
                    <input type="submit" value="Save" class="btn btn-dark w-25">
                </footer>
            </div>
        </div>
    </div>
</main>
<?php include $this->resolve("partials/_footer.php"); ?>