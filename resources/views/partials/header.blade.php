<nav class="navbar navbar-expand-lg bg-dark shadow-sm border-bottom">
    <div class="container">
        <a class="navbar-brand fw-bold text-white" href="{{ url('/') }}">
            <i class="bi bi-stack me-2 text-primary"></i>Product Management System
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link text-white fw-semibold px-3" href="{{ route('products.index') }}">
                        Products
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white fw-semibold px-3" href="{{ route('categories.index') }}">
                        Categories
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
