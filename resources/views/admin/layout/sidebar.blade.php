<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admindashboard') ? 'active' : '' }}" aria-current="page" href="/admindashboard">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item" >
                <a class="nav-link {{ Request::is('admin/categories*') ? 'active' : '' }}" href="/admin/categories">
                    <span data-feather="grid"></span>
                    kategori
                </a>
            </li>
            <li class="nav-item" >
                <a class="nav-link {{ Request::is('admin/book*') ? 'active' : '' }}" href="/admin/book">
                    <span data-feather="file"></span>
                    Buku
                </a>
            </li>



        </ul>

    </div>
</nav>
