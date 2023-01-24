<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="#" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('site/assets/images/white-logo.svg') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('site/assets/images/white-logo.svg') }}" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="#" class="logo logo-light">

            <span class="logo-lg">
                <img src="{{ asset('site/assets/images/white-logo.svg') }}" alt="" height="">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar" style="    margin-top: 20px;">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="nav-item">

                    <a class="nav-link menu-link" href="" role="button" aria-expanded="false"
                    aria-controls="sidebarDashboards">
                    <span data-key="t-dashboards">لوحة التحكم</span>
                </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('admin.information') }}" role="button" aria-expanded="false"
                        aria-controls="sidebarDashboards">
                        <span data-key="t-dashboards" >  البيانات     </span>
                    </a>

                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.services.index') }}" class="nav-link menu-link" href="#sidebarDashboards" role="button" aria-expanded="false"
                        aria-controls="sidebarDashboards">
                        <span data-key="t-dashboards">الخدمات</span>
                    </a>

                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.blogs.index') }}" class="nav-link menu-link" href="#sidebarDashboards" role="button" aria-expanded="false"
                        aria-controls="sidebarDashboards">
                        <span data-key="t-dashboards">المدونة</span>
                    </a>

                </li>

                <li class="nav-item">

                    <a href="{{ route('admin.order') }}" class="nav-link menu-link" href="#sidebarDashboards" role="button" aria-expanded="false"
                        aria-controls="sidebarDashboards">
                        <span data-key="t-dashboards">الطلبات</span>
                    </a>

                </li>



            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
