<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a href="{{ route('admin.index') }}" @routeIs('admin.index') class="active" @endif>
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.place.index') }}" @routeIs('admin.place.index') class="active" @endif>
                        <i class="fa fa-location-arrow"></i>
                        <span>Lugares</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.category.index') }}" @routeIs('admin.category.index') class="active" @endif>
                        <i class="fa fa-tags"></i>
                        <span>Categorías</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.user.index') }}" @routeIs('admin.user.index') class="active" @endif>
                        <i class="fa fa-users"></i>
                        <span>Usuarios</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-book"></i>
                        <span>Encuestas</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="">
                        <i class="fa fa-cog"></i>
                        <span>Configuraciones</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>