<!-- Side Navigation Bar -->
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center" href="{{ route('home') }}" onclick="setActive(this)">
                    <i class="bi bi-speedometer2 me-2"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center" href="{{ route('adjestments.index') }}" onclick="setActive(this)">
                    <i class="bi bi-gear me-2"></i> Adjustment
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center" href="{{ route('customers.index') }}" onclick="setActive(this)">
                    <i class="bi bi-people me-2"></i> Customer
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center" href="{{ route('items.index') }}" onclick="setActive(this)">
                    <i class="bi bi-box me-2"></i> Item
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed d-flex align-items-center" data-bs-toggle="collapse" href="#productsSubMenu" role="button" aria-expanded="false" aria-controls="productsSubMenu" onclick="setActive(this)">
                    <i class="bi bi-box-seam me-2"></i>
                    <span>Products</span>
                </a>
                <div class="collapse" id="productsSubMenu">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" href="{{ route('products.index') }}" onclick="setActive(this)">
                                <i class="bi bi-box me-2" style="font-size: 1rem;"></i> Product
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" href="{{ route('productCategories.index') }}" onclick="setActive(this)">
                                <i class="bi bi-tags me-2" style="font-size: 1rem;"></i> Product Category
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center" href="{{ route('purchaseorders.index') }}" onclick="setActive(this)">
                    <i class="bi bi-file-earmark-plus me-2"></i> Purchase Order
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center" href="{{ route('salesorders.index') }}" onclick="setActive(this)">
                    <i class="bi bi-cart-check me-2"></i> Sales Order
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed d-flex align-items-center" data-bs-toggle="collapse" href="#storeSubMenu" role="button" aria-expanded="false" aria-controls="storeSubMenu" onclick="setActive(this)">
                    <i class="bi bi-shop me-2"></i>
                    <span>Store</span>
                </a>
                <div class="collapse" id="storeSubMenu">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" href="{{ route('warehouses.index') }}" onclick="setActive(this)">
                                <i class="bi bi-archive me-2" style="font-size: 1rem;"></i> Warehouse
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" href="{{ route('stocklocations.index') }}" onclick="setActive(this)">
                                <i class="bi bi-box-seam me-2" style="font-size: 1rem;"></i> Stock Location
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center" href="{{ route('transactions.index') }}" onclick="setActive(this)">
                    <i class="bi bi-arrow-repeat me-2"></i> Transaction
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed d-flex align-items-center" data-bs-toggle="collapse" href="#settingsSubMenu" role="button" aria-expanded="false" aria-controls="settingsSubMenu" onclick="setActive(this)">
                    <i class="bi bi-sliders me-2"></i>
                    <span>Settings</span>
                </a>
                <div class="collapse" id="settingsSubMenu">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" href="{{ route('register') }}" onclick="setActive(this)">
                                <i class="bi bi-person me-2" style="font-size: 1rem;"></i> Users
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" href="#" onclick="setActive(this)">
                                <i class="bi bi-key me-2" style="font-size: 1rem;"></i> User Permissions
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" href="#" onclick="setActive(this)">
                                <i class="bi bi-palette me-2" style="font-size: 1rem;"></i> Themes
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>

<script>
    function setActive(element) {
        const navLinks = document.querySelectorAll('#sidebarMenu .nav-link');
        navLinks.forEach(link => {
            link.classList.remove('active');
        });
        element.classList.add('active');
        localStorage.setItem('activeNav', element.innerText);
    }

    document.addEventListener('DOMContentLoaded', () => {
        const activeNavText = localStorage.getItem('activeNav');
        if (activeNavText) {
            const activeNavLink = Array.from(document.querySelectorAll('#sidebarMenu .nav-link'))
                .find(link => link.innerText === activeNavText);
            if (activeNavLink) {
                activeNavLink.classList.add('active');
            }
        }

        const sidebarMenu = document.getElementById('sidebarMenu');
        const toggleButton = document.querySelector('.navbar-toggler');

        toggleButton.addEventListener('click', () => {
            sidebarMenu.classList.toggle('show');
        });

        const navLinks = sidebarMenu.querySelectorAll('.nav-link');
        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth < 768) {
                    sidebarMenu.classList.remove('show');
                }
            });
        });
    });
</script>
