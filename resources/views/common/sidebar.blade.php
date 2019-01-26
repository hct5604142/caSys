<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">运单管理</li>
            <li class="treeview">
                <a href="#"><i class="fa fa-circle-o"></i>运单填写<span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{asset('/order/eproduct?company=3')}}"><i class="fa fa-circle-o"></i>顺达运输有限公司</a></li>
                    <li><a href="{{asset('/order/eproduct?company=2')}}"><i class="fa fa-circle-o"></i>安文运输有限公司</a></li>
                    <li><a href="{{asset('/order/eproduct?company=1')}}"><i class="fa fa-circle-o"></i>鑫发货运有限公司</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-circle-o"></i>核算<span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                    <li class="treeview">
                        <a href="#"><i class="fa fa-circle-o"></i>核量<span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{asset('/order/check_order_number?company=3')}}"><i class="fa fa-circle-o"></i>顺达运输有限公司</a></li>
                            <li><a href="{{asset('/order/check_order_number?company=2')}}"><i class="fa fa-circle-o"></i>安文运输有限公司</a></li>
                            <li><a href="{{asset('/order/check_order_number?company=1')}}"><i class="fa fa-circle-o"></i>鑫发货运有限公司</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-circle-o"></i>核价<span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{asset('/order/check_order_price?company=3')}}"><i class="fa fa-circle-o"></i>顺达运输有限公司</a></li>
                            <li><a href="{{asset('/order/check_order_price?company=2')}}"><i class="fa fa-circle-o"></i>安文运输有限公司</a></li>
                            <li><a href="{{asset('/order/check_order_price?company=1')}}"><i class="fa fa-circle-o"></i>鑫发货运有限公司</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-circle-o"></i>运单审批<span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{asset('/order/order_approval?company=3')}}"><i class="fa fa-circle-o"></i>顺达运输有限公司</a></li>
                    <li><a href="{{asset('/order/order_approval?company=2')}}"><i class="fa fa-circle-o"></i>安文运输有限公司</a></li>
                    <li><a href="{{asset('/order/order_approval?company=1')}}"><i class="fa fa-circle-o"></i>鑫发货运有限公司</a></li>
                </ul>
            </li>
            <li><a href="{{asset('/order/eproduct_query')}}"><i class="fa fa-circle-o"></i>运单查看</a></li>
            <li><a href="{{asset('/order/car_no_type_manage')}}"><i class="fa fa-circle-o"></i>车号-车型管理</a></li>
            <li><a href="{{asset('/order/start_end_manage')}}"><i class="fa fa-circle-o"></i>起止-里程管理</a></li>
            <li><a href="{{asset('/formula/base_price')}}"><i class="fa fa-circle-o"></i>当前季度执行价格公式</a></li>
            <li><a href="{{asset('/formula/unit_manage')}}"><i class="fa fa-circle-o"></i>单位管理</a></li>
            <li><a href="{{asset('/formula/base_price')}}"><i class="fa fa-circle-o"></i>当前执行文件阅览</a></li>
            <!--<li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i> <span>账户功能</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    {{--<li><a href="{{asset('/auth/user_manage')}}"><i class="fa fa-circle-o"></i> 用户管理</a></li>--}}
                    <li><a href="{{asset('/auth/user_roles_manage')}}"><i class="fa fa-circle-o"></i> 用户角色管理</a></li>
                    <li><a href="{{asset('/auth/role_permissions_manage')}}"><i class="fa fa-circle-o"></i> 角色权限管理</a></li>
                    <li><a href="{{asset('/auth/permissions_manage')}}"><i class="fa fa-circle-o"></i> 权限管理</a></li>
                    {{--<li><a href="{{asset('/auth/add')}}"><i class="fa fa-circle-o"></i> 增加账户</a></li>--}}
                    {{--<li><a href="pages/examples/login.html"><i class="fa fa-circle-o"></i> 更改权限</a></li>--}}
                </ul>
            </li>-->
            <li class="header">运单相关</li>
            <li><a href="{{asset('/formula/oil_price_chgs')}}"><i class="fa fa-circle-o"></i> 油价涨跌幅公式</a></li>
            <li><a href="{{asset('/formula/base_price')}}"><i class="fa fa-circle-o"></i>当前季度执行价格公式</a></li>
            <li><a href="{{asset('/formula/unit_manage')}}"><i class="fa fa-circle-o"></i>单位管理</a></li>
            <li><a href="{{asset('/formula/base_price')}}"><i class="fa fa-circle-o"></i>当前执行文件阅览</a></li>
            <li class="header">账户相关</li>
            <li><a href="{{asset('/auth/user_roles_manage')}}"><i class="fa fa-circle-o"></i> 用户角色管理</a></li>
            <li><a href="{{asset('/auth/role_permissions_manage')}}"><i class="fa fa-circle-o"></i> 角色权限管理</a></li>
            <li><a href="{{asset('/auth/permissions_manage')}}"><i class="fa fa-circle-o"></i> 权限管理</a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>