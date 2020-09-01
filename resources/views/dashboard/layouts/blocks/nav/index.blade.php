<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Действия</span>
            <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
                <span data-feather="plus-circle"></span>
            </a>
        </h6>

        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('categories') }}">
                    <span data-feather="home"></span>Json категорий <span class="sr-only">(current)</span>
                </a>
            </li>
        </ul>


        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.categories.index') }}">
                    <span data-feather="file-text"></span>
                    Категории
                </a>
            </li>
        </ul>
    </div>
</nav>
