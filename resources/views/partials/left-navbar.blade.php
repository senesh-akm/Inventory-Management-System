{{-- Sidebar --}}
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm sidebar">
    <div class="container-fluid">
        {{-- Toggle button for mobile view, positioned at top-left --}}
        <button class="navbar-toggler position-absolute top-0 start-0 m-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav flex-column">
                <li class="nav-item mb-3">
                    <a class="nav-link fs-5 bg-orange text-white active" aria-current="page" href="#" style="padding-right: 130px;">Dashboard</a>
                </li>
                <li class="nav-item mb-3">
                    <a class="nav-link fs-5" href="#">Orders</a>
                </li>
                <li class="nav-item mb-3">
                    <a class="nav-link fs-5" href="#">Products</a>
                </li>
                <li class="nav-item mb-3">
                    <a class="nav-link fs-5" href="#">Customers</a>
                </li>
                <li class="nav-item mb-3">
                    <a class="nav-link fs-5" href="#">Transaction</a>
                </li>
                <li class="nav-item mb-3">
                    <a class="nav-link fs-5" href="#">Reports</a>
                </li>
                <li class="nav-item mb-3">
                    <a class="nav-link fs-5" href="#">Integrations</a>
                </li>
                <li class="nav-item mb-3">
                    <a class="nav-link fs-5" href="#">Users</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
    // Get all nav-links
    const navLinks = document.querySelectorAll('.nav-link');

    // Add click event listener to each nav-link
    navLinks.forEach(link => {
        link.addEventListener('click', function() {
            // Remove 'active' class from all nav-links
            navLinks.forEach(link => link.classList.remove('active', 'bg-orange', 'text-white'));

            // Add 'active' class to the clicked nav-link
            this.classList.add('active', 'bg-orange', 'text-white');
        });
    });
</script>
