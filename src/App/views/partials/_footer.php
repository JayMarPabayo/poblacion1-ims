<footer class="bg-dark text-center text-lg-start w-100">
    <div class="text-center fs-6 py-3 bg-light border-top">
        &copy; 2024 Poblacion-1 IMS | All Rights Reserved
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<!-- <script type="module" src="./scripts/main.js"></script> -->
<script>
    const excludedForms = ["search-form", "addOfficialForm", "search-modal-form"];
    const queryString = `form:not(${excludedForms.map(id => `#${id}`).join(', ')})`;
    const allFormsExceptExcluded = document.querySelectorAll(queryString);

    allFormsExceptExcluded.forEach(form => {
        form.addEventListener("submit", (e) => {
            if (!form.checkValidity()) {
                e.preventDefault();
            }
            form.classList.add('was-validated');
        });
    });

    function confirmLogout() {
        var confirmLogout = confirm("Are you sure you want to log out?");
        if (confirmLogout) {
            window.location.href = "/logout"; // Redirect to the logout page if confirmed
        }
    }

    // -- PASSWORD VIEW/HIDE
    document
        .getElementById("togglePassword")?.addEventListener("click", function() {
            var passwordField = document.getElementById("password");
            var passwordFieldType = passwordField.getAttribute("type");
            if (passwordFieldType == "password") {
                passwordField.setAttribute("type", "text");
                this.classList.remove("bi-eye");
                this.classList.add("bi-eye-slash");
            } else {
                passwordField.setAttribute("type", "password");
                this.classList.remove("bi-eye-slash");
                this.classList.add("bi-eye");
            }
        });
</script>
</body>

</html>