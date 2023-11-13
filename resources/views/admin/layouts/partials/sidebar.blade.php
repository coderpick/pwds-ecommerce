<nav class="page-sidebar" id="sidebar">
    <div id="sidebar-collapse">
        <div class="admin-block d-flex">
            <div>
                <img src="{{ asset('assets/backend/img/admin-avatar.png') }}" width="45px" />
            </div>
            <div class="admin-info">
                <div class="font-strong">James Brown</div><small>Administrator</small></div>
        </div>
        <ul class="side-menu metismenu">
            <li class="{{ Request::is('admin/dashboard')?'active':'' }}">
                <a href="{{ route('admin.dashboard')}}"><i class="sidebar-item-icon fa fa-th-large"></i>
                    <span class="nav-label">Dashboard</span>
                </a>
            </li> 
            <li class="{{ Request::is('admin/category*')?'active':'' }}">
                <a href="{{ route('admin.category.index') }}"><i class="sidebar-item-icon fa fa-th-large"></i>
                    <span class="nav-label">Category</span>
                </a>
            </li> 
            <li class="{{ Request::is('admin/sub-category*')?'active':'' }}">
                <a href="{{ route('admin.sub-category.index') }}"><i class="sidebar-item-icon fa fa-th-large"></i>
                    <span class="nav-label">Sub Category</span>
                </a>
            </li> 
              <li class="{{ Request::is('admin/brand*')?'active':'' }}">
                <a href="{{ route('admin.brand.index') }}"><i class="sidebar-item-icon fa fa-th-large"></i>
                    <span class="nav-label">Brand</span>
                </a>
            </li> 
        </ul>
    </div>
</nav>