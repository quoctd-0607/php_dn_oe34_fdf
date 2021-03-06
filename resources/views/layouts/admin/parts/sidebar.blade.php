<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{asset('template/adminLTE/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">{{trans('messages.dashboard')}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <a href="#"><img src="{{asset('template/adminLTE/img/user1-128x128.jpg')}}" class="img-circle elevation-2" alt="User Image"></a>
            </div>
            <div class="info">
                <a href="#" class="d-block">{{trans('messages.admin')}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('user.list')}}" class="nav-link">
                        <i class="fa fa-list"></i>
                        <span>{{trans('messages.user_list')}}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('category.list')}}" class="nav-link">
                        <i class="fa fa-list"></i>
                        <span>{{trans('messages.category_list')}}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('product.list')}}" class="nav-link">
                        <i class="fa fa-list"></i>
                        <span>{{trans('messages.product_list')}}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('order.list')}}" class="nav-link">
                        <i class="fa fa-list"></i>
                        <span>{{trans('messages.order_list')}}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('logout')}}" class="nav-link btn btn-danger">
                        {{trans('messages.logout')}}
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
