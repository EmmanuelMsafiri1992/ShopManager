<aside class="main-sidebar elevation-4 @if (session('isSidebarDark')) sidebar-dark-primary @endif">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <!-- Large Device  -->


        @if(session()->get('isDark')== true || session()->get('isSidebarDark')== true )
            <img class="lg-logo" src="{{ $settings['darkLogo'] }}" alt="{{ $settings['compnayName'] }}">
            <!-- Small Device -->
            <img class="sm-logo" src="{{ $settings['smallDarkLogo'] }}" alt="{{ $settings['compnayName'] }}">
        @else

            <img class="lg-logo" src="{{ $settings['logo'] }}" alt="{{ $settings['compnayName'] }}">
            <!-- Small Device -->
            <img class="sm-logo" src="{{ $settings['smallLogo'] }}" alt="{{ $settings['compnayName'] }}">
        @endif

    </a>
    <!-- Sidebar -->
    <div class="sidebar custom-sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header text-bold">{{ __('ACTIVITY') }}</li>
                <li class="nav-item">
                    <a href=""
                        class="nav-link  {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>{{ __('Admin Dashboard') }}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href=""
                       class="nav-link">
                        <i class="nav-icon fas fa-people-carry"></i>
                        <p>Alerts</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href=""
                       class="nav-link">
                        <i class="nav-icon fas fa-people-carry"></i>
                        <p>Analytics</p>
                    </a>
                </li>
                <li  class="nav-item has-treeview {{ request()->is('admin/processing-report') ? 'menu-open' : '' }} {{ request()->is('admin/finished-report') ? 'menu-open' : '' }} {{ request()->is('admin/transferred-report') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-bar"></i>
                        <p>
                            {{ __('Users') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ">
                        <li class="nav-item">
                            <a href="{{route('users.index')}}"
                                class="nav-link {{ request()->is('admin/users*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-users-cog"></i>
                                <p>{{ __('View Users') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('users.create')}}"
                                class="nav-link {{ request()->is('admin/finished-report') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-th-list"></i>
                                <p>{{ __('Add User') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li  class="nav-item has-treeview {{ request()->is('admin/processing-report') ? 'menu-open' : '' }} {{ request()->is('admin/finished-report') ? 'menu-open' : '' }} {{ request()->is('admin/transferred-report') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-bar"></i>
                        <p>
                            {{ __('Roles') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ">
                        <li class="nav-item">
                            <a href=""
                                class="nav-link {{ request()->is('admin/processing-report') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tools"></i>
                                <p>{{ __('View Roles') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href=""
                                class="nav-link {{ request()->is('admin/finished-report') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-th-list"></i>
                                <p>{{ __('Add Role') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li  class="nav-item has-treeview {{ request()->is('admin/processing-report') ? 'menu-open' : '' }} {{ request()->is('admin/finished-report') ? 'menu-open' : '' }} {{ request()->is('admin/transferred-report') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-bar"></i>
                        <p>
                            {{ __('Wholesellers') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ">
                        <li class="nav-item">
                            <a href=""
                                class="nav-link {{ request()->is('admin/processing-report') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tools"></i>
                                <p>{{ __('View Wholesellers') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href=""
                                class="nav-link {{ request()->is('admin/finished-report') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-th-list"></i>
                                <p>{{ __('Add Wholeseller') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li  class="nav-item has-treeview {{ request()->is('admin/processing-report') ? 'menu-open' : '' }} {{ request()->is('admin/finished-report') ? 'menu-open' : '' }} {{ request()->is('admin/transferred-report') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-bar"></i>
                        <p>
                            {{ __('Retailers') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ">
                        <li class="nav-item">
                            <a href=""
                                class="nav-link {{ request()->is('admin/processing-report') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tools"></i>
                                <p>{{ __('View Retailers') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href=""
                                class="nav-link {{ request()->is('admin/finished-report') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-th-list"></i>
                                <p>{{ __('Add Retailer') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li  class="nav-item has-treeview {{ request()->is('admin/processing-report') ? 'menu-open' : '' }} {{ request()->is('admin/finished-report') ? 'menu-open' : '' }} {{ request()->is('admin/transferred-report') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-bar"></i>
                        <p>
                            {{ __('Shops') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ">
                        <li class="nav-item">
                            <a href=""
                                class="nav-link {{ request()->is('admin/processing-report') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tools"></i>
                                <p>{{ __('View Shops') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href=""
                                class="nav-link {{ request()->is('admin/finished-report') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-th-list"></i>
                                <p>{{ __('Add Shop') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li  class="nav-item has-treeview {{ request()->is('admin/processing-report') ? 'menu-open' : '' }} {{ request()->is('admin/finished-report') ? 'menu-open' : '' }} {{ request()->is('admin/transferred-report') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-bar"></i>
                        <p>
                            {{ __('Shopkeeper') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ">
                        <li class="nav-item">
                            <a href=""
                                class="nav-link {{ request()->is('admin/processing-report') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tools"></i>
                                <p>{{ __('View Shopkeepers') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href=""
                                class="nav-link {{ request()->is('admin/finished-report') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-th-list"></i>
                                <p>{{ __('Add Shopkeeper') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li  class="nav-item has-treeview {{ request()->is('admin/processing-report') ? 'menu-open' : '' }} {{ request()->is('admin/finished-report') ? 'menu-open' : '' }} {{ request()->is('admin/transferred-report') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-bar"></i>
                        <p>
                            {{ __('Products') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ">
                        <li class="nav-item">
                            <a href=""
                                class="nav-link {{ request()->is('admin/processing-report') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tools"></i>
                                <p>{{ __('View Products') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href=""
                                class="nav-link {{ request()->is('admin/finished-report') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-th-list"></i>
                                <p>{{ __('Add Product') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li  class="nav-item has-treeview {{ request()->is('admin/processing-report') ? 'menu-open' : '' }} {{ request()->is('admin/finished-report') ? 'menu-open' : '' }} {{ request()->is('admin/transferred-report') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-bar"></i>
                        <p>
                            {{ __('Customers') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ">
                        <li class="nav-item">
                            <a href=""
                                class="nav-link {{ request()->is('admin/processing-report') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tools"></i>
                                <p>{{ __('View Customers') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href=""
                                class="nav-link {{ request()->is('admin/finished-report') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-th-list"></i>
                                <p>{{ __('Add Customer') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li  class="nav-item has-treeview {{ request()->is('admin/processing-report') ? 'menu-open' : '' }} {{ request()->is('admin/finished-report') ? 'menu-open' : '' }} {{ request()->is('admin/transferred-report') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-bar"></i>
                        <p>
                            {{ __('Sale') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ">
                        <li class="nav-item">
                            <a href=""
                                class="nav-link {{ request()->is('admin/processing-report') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tools"></i>
                                <p>{{ __('View Sale') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href=""
                                class="nav-link {{ request()->is('admin/finished-report') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-th-list"></i>
                                <p>{{ __('Add Sale') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-header text-bold">{{ __('STOCK MANAGEMENT') }}</li>
                <li class="nav-item">
                    <a href=""
                       class="nav-link">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>{{ __('Add Category') }}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href=""
                       class="nav-link ">
                        <i class="nav-icon fas fa-code-branch"></i>
                        <p>{{ __('Add Sub Category') }}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href=""
                       class="nav-link ">
                        <i class="nav-icon fas fa-code-branch"></i>
                        <p>{{ __('View Stock') }}</p>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a href=""
                        class="nav-link">
                        <i class="nav-icon fas fa-tools"></i>
                        <p>{{ __('Processing') }}</p>
                    </a>
                </li> -->
                <!-- <li class="nav-item">
                    <a href=""
                        class="nav-link">
                        <i class="nav-icon fas fa-th-list"></i>
                        <p>{{ __('Finished') }}</p>
                    </a>
                </li> -->
                <li class="nav-header text-bold">{{ __('EXPENSE MANAGEMENT') }}</li>
                <li class="nav-item">
                    <a href=""
                       class="nav-link">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>{{ __('Add Category') }}</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href=""
                       class="nav-link">
                        <i class="nav-icon fas fa-wallet"></i>
                        <p>{{ __('Add Expense') }}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href=""
                       class="nav-link">
                        <i class="nav-icon fas fa-wallet"></i>
                        <p>{{ __('View Expense') }}</p>
                    </a>
                </li>

                <li class="nav-header text-bold">{{ __('SALES MANAGEMENT') }}</li>
                <li class="nav-item">
                    <a href="{{ route('purchases.index') }}"
                       class="nav-link ">
                        <i class="nav-icon fas fa-shopping-basket"></i>
                        <p>{{ __('Add Sales') }}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('purchases.index') }}"
                       class="nav-link">
                        <i class="nav-icon fas fa-shopping-basket"></i>
                        <p>{{ __('View Sales') }}</p>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a href="{{ route('purchaseReturn.index') }}"
                        class="nav-link {{ request()->is('admin/return-purchases*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-undo-alt"></i>
                        <p>{{ __('Return Purchases') }}</p>
                    </a>
                </li> -->
                <!-- <li class="nav-item">
                    <a href="{{ route('purchaseDamage.index') }}"
                        class="nav-link {{ request()->is('admin/damage-purchases*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-trash-alt"></i>
                        <p>{{ __('Damage Purchases') }}</p>
                    </a>
                </li> -->

                <!-- <li class="nav-item">
                    <a href="{{ route('purchaseInventory.index') }}"
                        class="nav-link {{ request()->is('admin/purchase-inventory*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-boxes"></i>
                        <p>{{ __('Purchase Inventory') }}</p>
                    </a>
                </li> -->

                <!-- <li class="nav-header text-bold">{{ __('PRODUCT') }}</li>
                <li class="nav-item">
                    <a href="{{ route('categories.index') }}"
                        class="nav-link {{ request()->is('admin/categories*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>{{ __('Categories') }}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('subCategories.index') }}"
                        class="nav-link {{ request()->is('admin/sub-categories*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-code-branch"></i>
                        <p>{{ __('Sub Categories') }}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('processing.index') }}"
                        class="nav-link {{ request()->is('admin/processing-products*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tools"></i>
                        <p>{{ __('Processing') }}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('finished.index') }}"
                        class="nav-link {{ request()->is('admin/finished-products*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th-list"></i>
                        <p>{{ __('Finished') }}</p>
                    </a>
                </li> -->
                <!-- <li class="nav-item">
                    <a href="{{ route('transferred.index') }}"
                        class="nav-link {{ request()->is('admin/transferred-products*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-random"></i>
                        <p>{{ __('Transferred') }}</p>
                    </a>
                </li> -->
                <li class="nav-header text-bold">{{ __('SUPPLIERS MANAGEMENT') }}</li>
                <li class="nav-item">
                    <a href="{{ route('suppliers.create') }}"
                       class="nav-link {{ request()->is('admin/suppliers*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-people-carry"></i>
                        <p>{{ __('Add Supplier') }}</p>
                    </a>
                    <a href="{{ route('suppliers.index') }}"
                       class="nav-link">
                        <i class="nav-icon fas fa-people-carry"></i>
                        <p>{{ __('View Supplier') }}</p>
                    </a>
                </li>
                <li class="nav-header text-bold">{{ __('CLIENT MANAGEMENT') }}</li>
                <li class="nav-item">
                    <a href=""
                       class="nav-link ">
                        <i class="nav-icon fas fa-people-carry"></i>
                        <p>{{ __('Add Client') }}</p>
                    </a>
                    <a href="pliers.index') }}"
                       class="nav-link">
                        <i class="nav-icon fas fa-people-carry"></i>
                        <p>{{ __('View Clients') }}</p>
                    </a>
                </li>
                <li class="nav-header text-bold">{{ __('DEBTORS MANAGEMENT') }}</li>
                <li class="nav-item">
                    <a href=""
                       class="nav-link ">
                        <i class="nav-icon fas fa-people-carry"></i>
                        <p>{{ __('Add Debtor') }}</p>
                    </a>
                    <a href=""
                       class="nav-link">
                        <i class="nav-icon fas fa-people-carry"></i>
                        <p>{{ __('View Debtors') }}</p>
                    </a>
                </li>
                <li class="nav-header text-bold">{{ __('REPORT') }}</li>
                <li class="nav-item">
                    <a href="{{ route('purchase.report') }}"
                       class="nav-link {{ request()->is('admin/purchase-report') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-chart-area"></i>
                        <p>{{ __('Sales Report') }}</p>
                    </a>
                </li>
                <li
                    class="nav-item has-treeview {{ request()->is('admin/processing-report') ? 'menu-open' : '' }} {{ request()->is('admin/finished-report') ? 'menu-open' : '' }} {{ request()->is('admin/transferred-report') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-bar"></i>
                        <p>
                            {{ __('Stock Report') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ">
                        <li class="nav-item">
                            <a href="{{ route('processing.report') }}"
                               class="nav-link {{ request()->is('admin/processing-report') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tools"></i>
                                <p>{{ __('Processing') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('finished.report') }}"
                               class="nav-link {{ request()->is('admin/finished-report') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-th-list"></i>
                                <p>{{ __('Finished') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('transferred.report') }}"
                               class="nav-link {{ request()->is('admin/transferred-report') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-random"></i>
                                <p>{{ __('Transferred') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-header text-bold">{{ __('ACCOUNT') }}</li>
                <li class="nav-item">
                    <form method="post" action="{{route('admin.logout')}}">
                    @csrf
                    <button type="submit" class="btn btn-warning w-100">
                    {{ __('Log Out') }}
                    </button>
                    </form>
                  </li>
                <li class="nav-item has-treeview {{ request()->is('admin/profile') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            {{ ucfirst(auth()->user()->name) }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ">
                        <li class="nav-item">
                            <a href="{{ route('admin.profile') }}"
                                class="nav-link {{ request()->is('admin/profile') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-user-circle"></i>
                                <p>{{ __('Profile') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link admin-logout" href="{{ route('logout') }}">
                                <i class="nav-icon fas fa-power-off"></i> {{ __('Logout') }}
                            </a>
                            <form id="sidebar-logout-form" action="{{ route('logout') }}" method="POST"
                                class="no-display logout-form">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
