



<aside id="aside">
                <!--
                    Always open:
                    <li class="active alays-open">

                    LABELS:
                        <span class="label label-danger pull-right">1</span>
                        <span class="label label-default pull-right">1</span>
                        <span class="label label-warning pull-right">1</span>
                        <span class="label label-success pull-right">1</span>
                        <span class="label label-info pull-right">1</span>
                    -->
                    <nav id="sideNav"><!-- MAIN MENU -->
                        <ul class="nav nav-list">
                            <li class="{{ in_array(\Request::segment(1),array('home')) ? 'active' : '' }}"><!-- dashboard -->
                                <a class="dashboard" href="{{ url('/') }}"><!-- warning - url used by default by ajax (if eneabled) -->
                                    <i class="main-icon fa fa-dashboard"></i> <span>Dashboard



                                    </span>
                                </a>
                            </li>
                           
                       
                            <li class="{{ in_array(\Request::segment(1),array('users', 'roles', 'permissions')) ? 'active' : '' }}">
                                <a href="#">
                                    <i class="fa fa-menu-arrow pull-right"></i>
                                    <i class="main-icon fa fa-users"></i> <span>Permissions</span>
                                </a>
                                <ul><!-- submenus -->
                                    <li class="{{ \Request::segment(1) == 'permissions' ? 'active' : '' }}"><a href="{{ route('permissions.index') }}">Manage Permission</a></li>
                                    <li class="{{ \Request::segment(1) == 'roles' ? 'active' : '' }}"><a href="{{ route('roles.index') }}">Manage Role</a></li>
                                    <li class="{{ \Request::segment(1) == 'users' ? 'active' : '' }}"><a href="{{ route('users.index') }}">Manage Users</a></li>
                                </ul>
                            </li>
                            
                           


                             <li class="{{ in_array(\Request::segment(1),array(
                             
                              'expense_categories',
                             
                              )) ? 'active' : '' }}">
                                <a href="#">
                                    <i class="fa fa-menu-arrow pull-right"></i>
                                    <i class="main-icon fa fa-cogs"></i> <span>General Setup</span>
                                </a>
                                <ul><!-- submenus -->
                                    <!-- @can('project') -->


                                    <!-- @endcan  -->
                                 
                                     @can('expense-category-list')
                                    <li class="{{ \Request::segment(1) == 'expense_categories' ? 'active' : '' }}"><a href="{{ route('expense_categories.index') }}">Expense Categories</a></li>
                                       @endcan
                                
                                  
                                </ul>
                            </li>

                            <li class="{{ in_array(\Request::segment(1),array(
                             'receipts',
                             'expenses',
                              )) ? 'active' : '' }}">
                             <a href="#">
                                    <i class="fa fa-menu-arrow pull-right"></i>
                                    <i class="main-icon fa fa-money"></i> <span>Transaction</span>
                                </a>
                             

                              <ul>
                                @can('receipt-list') 
                                    <li class="{{ \Request::segment(1) == 'receipts' ? 'active' : '' }}"><a href="{{ route('receipts.index') }}">Receipts</a></li>
                                    @endcan

                                    <li class="{{ \Request::segment(1) == 'expenses' ? 'active' : '' }}"><a href="{{ route('expenses.index') }}">Expenses</a></li>
                                       
                                  
                                </ul>

                        </li>


                        <li class="{{ in_array(\Request::segment(1),array(
                             'receivable-report',
                             'defaulter-report',
                              )) ? 'active' : '' }}">
                             <a href="#">
                                    <i class="fa fa-menu-arrow pull-right"></i>
                                    <i class="main-icon fa fa-file"></i> <span>Reports</span>
                                </a>
                             

                              <ul>
                                @can('receivable-report') 
                                    <li class="{{ \Request::segment(1) == 'receivable-report' ? 'active' : '' }}"><a href="{{ url('receivable-report') }}">Receivable Report</a></li>
                                @endcan

                                @can('defaulter-report') 
                                    <li class="{{ \Request::segment(1) == 'defaulter-report' ? 'active' : '' }}"><a href="{{ url('defaulter-report') }}">Defaulter Report</a></li>
                                @endcan
                                       
                                  
                                </ul>

                        </li>

                           
                             <li ><!-- dashboard -->
                                <a class="dashboard" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"><!-- warning - url used by default by ajax (if eneabled) -->
                                    <i class="main-icon fa fa-power-off"></i> <span>Logout



                                    </span>
                                </a>
                            </li>
                        </ul>

                    </nav>

                    <span id="asidebg"><!-- aside fixed background --></span>
                </aside>