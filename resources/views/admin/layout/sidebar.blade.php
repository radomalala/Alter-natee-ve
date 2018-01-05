<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{!! $user->getProfileImage() !!}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{!! $user->first_name !!} {!! $user->last_name !!}</p>
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
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            @if(check_user_access(['dashboard']))
            <li class="active treeview">
                <a href="{!! route('dashboard') !!}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            @endif
            @if(check_user_access(['orders','order-status.index']))
            <li class="treeview {{ set_active(['admin/order-status','admin/order-status/*','admin/sales/*']) }}">
                <a href="#">
                    <i class="fa fa-files-o"></i>
                    <span>Sales</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    @if(check_user_access('orders'))
                    <li class="{{ set_active(['admin/sales/1','admin/sales/view/1']) }}"><a
                                href="{!! Url('/admin/sales/1') !!}"><i class="fa fa-circle-o"></i> Ongoing</a></li>
                    @endif
                    @if(check_user_access('orders'))
                    <li class="{{ set_active(['admin/sales/2','admin/sales/view/2']) }}"><a
                                href="{!! Url('/admin/sales/2') !!}"><i class="fa fa-circle-o"></i> Completed</a></li>
                    @endif
                    @if(check_user_access('orders'))
                    <li><a href="{!! Url('/admin/sales/3') !!}"><i class="fa fa-circle-o"></i> Special Ask</a></li>
                    @endif
                    @if(check_user_access('order-status.index'))
                    <li class="{{ set_active(['admin/order-status','admin/order-status/*']) }}">
                        <a href="{!! Url('/admin/order-status') !!}"><i class="fa fa-circle-o"></i> Order Status</a>
                    </li>
                    @endif
                </ul>
            </li>
            @endif


            <!-- Produit -->
            @if(check_user_access(['product']))
            <li class="treeview {{ set_active(['admin/product','admin/product/*','admin/new_page','admin/new_page/*']) }}">
                <a href="#">
                    <i class="fa fa-puzzle-piece"></i>
                    <span>Products</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">

                    @if(check_user_access('product'))
                    <li class="{{ set_active(['admin/product','admin/product/*']) }}"><a
                                href="{!! route('product') !!}"><i class="fa fa-circle-o"></i> List</a></li>
                    @endif

                    @if(check_user_access('product'))
                    <li class="{{ set_active(['admin/new_page','admin/new_page/*']) }}"><a
                                href="{!! URL::to('admin/new_page/page') !!}"><i class="fa fa-circle-o"></i> Training</a></li>
                    @endif
                    
                    <!-- @if(check_user_access('product'))
                    <li class="{{ set_active(['admin/new_page','admin/new_page/*']) }}"><a
                                href="{!! URL::to('admin/new_page/page') !!}"><i class="fa fa-circle-o"></i> Control center</a></li>
                    @endif -->
                </ul>
            </li>
            @endif


            <!-- Catalogue -->
            @if(check_user_access(['product-rating.index','category','brand.index','attribute','attribute_set','special-product.index','epartner.index']))
            <li class="treeview {{ set_active(['admin/attribute','admin/attribute/*','admin/attribute-set','admin/attribute-set/*','admin/brand','admin/brand/*','admin/category','admin/category/*','admin/product-rating','admin/product-rating/*','admin/special-product','admin/special-product/*','admin/epartner','admin/epartner/*']) }}">
                <a href="#">
                    <i class="fa fa-book"></i>
                    <span>Catalogue</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">

                    @if(check_user_access('product-rating.index'))
                    <li class="{{ set_active(['admin/product-rating','admin/product-rating/*']) }}"><a
                                href="{!! URL::to('/admin/product-rating') !!}"><i class="fa fa-circle-o"></i> Product
                            Rating</a></li>
                    @endif
                    @if(check_user_access('category'))
                    <li class="{{ set_active(['admin/category','admin/category/*']) }}"><a
                                href="{!! route('category') !!}"><i class="fa fa-circle-o"></i> Category Manager</a>
                    </li>
                    @endif
                    @if(check_user_access('brand.index'))
                    <li class="{{ set_active(['admin/brand','admin/brand/*']) }}"><a
                                href="{!! URL::to('/') !!}/admin/brand"><i class="fa fa-circle-o"></i> Brand Manager</a>
                    </li>
                    @endif
                    @if(check_user_access('attribute'))
                    <li class="{{ set_active(['admin/attribute','admin/attribute/*']) }}"><a
                                href="{!! route('attribute') !!}"><i class="fa fa-circle-o"></i> Attribute</a></li>
                    @endif
                    @if(check_user_access('attribute_set'))
                    <li class="{{ set_active(['admin/attribute-set','admin/attribute-set/*']) }}"><a
                                href="{!! route('attribute_set') !!}"><i class="fa fa-circle-o"></i> Attribute Set</a>
                    </li>
                    @endif
                    @if(check_user_access('special-product.index'))
                    <li class="{{ set_active(['admin/special-product','admin/special-product/*']) }}"><a
                                href="{!! URL::to('/admin/special-product') !!}"><i class="fa fa-circle-o"></i> Products On Home</a>
                    </li>
                    @endif
                    @if(check_user_access('epartner.index'))
                        <li class="{{ set_active(['admin/epartner','admin/epartner/*']) }}"><a
                                    href="{!! URL::to('/admin/epartner') !!}"><i class="fa fa-circle-o"></i> Epartner Image</a>
                        </li>
                    @endif
                </ul>
            </li>
            @endif

            @if(check_user_access(['page.index','email-template.index','coupon','banner.index']))
            <li class="treeview {{ set_active(['admin/page','admin/page/*','admin/email-template','admin/email-template/*','admin/banner','admin/banner/*','admin/coupon','admin/coupon/*'])}}">
                <a href="#">
                    <i class="fa fa-files-o"></i>
                    <span>CMS</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    @if(check_user_access('page.index'))
                    <li class="{{ set_active(['admin/page','admin/page/*']) }}"><a
                                href="{!! URL::to('/admin/page') !!}"><i class="fa fa-circle-o"></i> Page Manager</a>
                    </li>
                    @endif
                    @if(check_user_access('email-template.index'))

                        <li class="{{ set_active(['admin/email-template','admin/email-template/*']) }}"><a
                                href="{!! URL::to('/admin/email-template') !!}"><i class="fa fa-circle-o"></i> Email/SMS
                            Template</a></li>
                    @endif
                    @if(check_user_access('coupon'))
                    <li class="{{ set_active(['admin/coupon','admin/coupon/*']) }}"><a href="{!! route('coupon') !!}"><i
                                    class="fa fa-circle-o"></i> Coupon Manager</a></li>
                    @endif
                    @if(check_user_access('banner.index'))
                    <li class="{{ set_active(['admin/banner','admin/banner/*']) }}">
                        <a href="{!! URL::to('/admin/banner') !!}"><i class="fa fa-circle-o"></i> Banner Manager</a>
                    </li>
                    @endif
                </ul>
            </li>
            @endif
            @if(check_user_access(['customer.index','store.index','administrator','role.index']))
            <li class="treeview {{ set_active(['admin/role','admin/role/*','admin/customer','admin/customer/*','admin/store','admin/store/*','admin/administrator','admin/administrator/*']) }}">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>Account</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    @if(check_user_access('customer.index'))
                    <li class="{{ set_active(['admin/customer','admin/customer/*']) }}"><a
                                href="{!! URL::to('admin/customer') !!}"><i class="fa fa-circle-o"></i> Customers</a>
                    </li>
                    @endif
                    @if(check_user_access('store.index'))
                    <li class="{{ set_active(['admin/store','admin/store/*']) }}"><a
                                href="{!! URL::to('admin/store') !!}"><i class="fa fa-circle-o"></i> Merchants</a>
                    </li>
                    @endif
                    @if(check_user_access('administrator'))
                    <li class="{{ set_active(['admin/administrator','admin/administrator/*']) }}"><a
                                href="{!! URL::to('admin/administrator') !!}"><i class="fa fa-circle-o"></i> Admin</a>
                    </li>
                    @endif
                    @if(check_user_access('role.index'))
                    <li class="{{ set_active(['admin/role','admin/role/*']) }}"><a href="{!! URL::to('admin/role') !!}"><i
                                    class="fa fa-circle-o"></i> Role</a></li>
                    @endif
                </ul>
            </li>
            @endif
            @if(check_user_access(['price_adjustment','affiliate.index']))
            <li class="treeview {{ set_active(['admin/claim/price-adjustment','admin/claim/price-adjustment/*','admin/affiliate','admin/affiliate/*']) }}">
                <a href="#">
                    <i class="fa fa-exchange"></i>
                    <span>Claim Management</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    @if(check_user_access('price_adjustment'))
                    <li class="{{ set_active(['admin/claim/price-adjustment','admin/claim/price-adjustment/*']) }}"><a
                                href="{!! route('price_adjustment') !!}"><i class="fa fa-circle-o"></i> Price Adjustment</a>
                    </li>
                    @endif
                    {{--<li><a href=""><i class="fa fa-circle-o"></i> Product Enhancement</a></li>--}}
                    @if(check_user_access('affiliate.index'))
                    <li class="{{ set_active(['admin/affiliate','admin/affiliate/*']) }}"><a
                                href="{!! URL::to('admin/affiliate') !!}"><i class="fa fa-circle-o"></i> Link Adjustment</a>
                    </li>
                    @endif
                </ul>
            </li>
            @endif


            @if(check_user_access(['blog.index','blog-category.index']))
                <li class="treeview {{ set_active(['admin/blog','admin/blog/*','admin/blog-category','admin/blog-category/*']) }}">
                    <a href="#">
                        <i class="fa fa-book"></i>
                        <span>Blog Management</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        @if(check_user_access('blog-category.index'))
                            <li class="{{ set_active(['admin/blog-category','admin/blog-category/*']) }}"><a
                                        href="{!! route('blog-category.index') !!}"><i class="fa fa-circle-o"></i> Blog Category</a>
                            </li>
                        @endif
                        @if(check_user_access('blog.index'))
                            <li class="{{ set_active(['admin/blog','admin/blog/*']) }}"><a
                                        href="{!! URL::to('admin/blog') !!}"><i class="fa fa-circle-o"></i> Blog Post</a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif

            <li class="treeview {{ set_active(['admin/faq','admin/faq/*']) }}">
                <a href="{!! url('admin/faq') !!}">
                    <i class="fa fa-question"></i>
                    <span>FAQ Management</span>
                 </a>
            </li>

        @if(check_user_access(['product_billed','company_account']))
            <li class="treeview {{ set_active(['admin/product-billed','admin/product-billed-detail/*','admin/company-account','admin/company-account/*','admin/invoice','admin/invoice/*']) }}">
                <a href="#">
                    <i class="fa fa-balance-scale"></i>
                    <span>Finance</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    @if(check_user_access('product_billed'))
                    <li class="{{ set_active(['admin/product-billed','admin/product-billed-detail/*']) }}"><a
                                href="{!! route('product_billed') !!}"><i class="fa fa-circle-o"></i> Product Billed</a>
                    </li>
                    @endif
                    @if(check_user_access('company_account'))
                        <li class="{{ set_active(['admin/invoice','admin/invoice/*']) }}">
                            <a href="{!! url('admin/invoice') !!}"><i class="fa fa-circle-o"></i> Invoices</a>
                        </li>
                    @endif
                    @if(check_user_access('company_account'))
                    <li class="{{ set_active(['admin/company-account','admin/company-account/*']) }}"><a
                                href="{!! route('company_account') !!}"><i class="fa fa-circle-o"></i> Company Accounts</a>
                    </li>
                    @endif
                </ul>
            </li>
            @endif

            <li class="treeview {{ set_active(['admin/system','admin/system/*']) }}">
                <a href="{!! url('admin/system') !!}">
                    <i class="fa fa-wrench"></i>
                    <span>System</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>