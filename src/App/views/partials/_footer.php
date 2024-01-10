<footer class="bg-dark text-center text-lg-start w-100">
    <div class="text-center fs-6 py-3 bg-light border-top">
        &copy; 2024 Poblacion-1 IMS | All Rights Reserved
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<!-- <script type="module" src="./scripts/main.js"></script> -->
<script>
    const allForms = document.querySelectorAll("form");

    allForms.forEach(form => {
        form.addEventListener("submit", (e) => {
            if (!form.checkValidity()) {
                e.preventDefault();
            }
            form.classList.add('was-validated');
        });
    });
</script>
</body>

</html>