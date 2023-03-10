<div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
        <a href="{{ URL::to('admin/dashboard') }}"
           class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <span class="fs-4 bi-speedometer2">Dashboard</span>
        </a>
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
            <li class="nav-item">
                <a href="{{ URL::to('admin/subscribers') }}" class="nav-link align-middle px-0">
                    <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Subscribers</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ URL::to('admin/blogs') }}" class="nav-link align-middle px-0">
                    <i class="fs-4 bi-grid"></i> <span class="ms-1 d-none d-sm-inline">Blogs</span>
                </a>
            </li>

        </ul>
    </div>
</div>

