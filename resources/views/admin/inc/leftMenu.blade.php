<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                </div>
                <!-- /input-group -->
            </li>
            <li>
                <a href="{{ url('dashboard') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="{{ url('users') }}"><i class="fa fa-dashboard fa-fw"></i> Users</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Role<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ url('addrole') }}"><i class="fa fa-sitemap fa-fw"></i> Add New Role</a>
                    </li>
                    <li>
                        <a href="{{ url('role') }}"><i class="fa fa-sitemap fa-fw"></i> Role List</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> StockIn<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('stockin') }}"><i class="fa fa-edit fa-fw"></i> Stock In</a>
                    </li>
                    <li>
                        <a href="{{ url('stockinlist') }}"><i class="fa fa-edit fa-fw"></i> Stock In List</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> stockOut<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('stockout') }}"><i class="fa fa-edit fa-fw"></i> Stock Out</a>
                    </li>
                    <li>
                        <a href="{{ url('stockoutlist') }}"><i class="fa fa-edit fa-fw"></i> Stock Out List</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="{{ url('registration') }}"><i class="fa fa-user fa-fw"></i> Registration</a>
            </li>

        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
