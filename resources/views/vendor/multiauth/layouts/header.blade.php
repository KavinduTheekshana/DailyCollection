<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>KC Daily Collection</title>
    <meta name="description" content="Zapily is a Dashboard & Admin Site Responsive Template by hencework." />
    <meta name="keywords"
        content="admin, admin dashboard, admin template, cms, crm, Zapily Admin, Zapilyadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
    <meta name="author" content="hencework" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="../theame/favicon.ico" type="image/x-icon">

    <!-- Data table CSS -->
    <link href="{{ asset('theame/vendors/bower_components/datatables/media/css/jquery.dataTables.min.css') }} "
        rel="stylesheet" type="text/css">

    <!-- Toast CSS -->
    <link href="{{ asset('theame/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css') }}"
        rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link href="{{ asset('theame/dist/css/style.css') }} " rel="stylesheet" type="text/css">


    <link href="{{ asset('theame/vendors/bower_components/sweetalert/dist/sweetalert.css') }} " rel="stylesheet"
        type="text/css">


    <link href="" rel="stylesheet" type="text/css">

    <link href="{{ asset('theame/vendors/bower_components/select2/dist/css/select2.min.css') }} " rel="stylesheet"
        type="text/css">





    <script src="//code.jquery.com/jquery-1.12.3.js"></script>
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">




</head>

<body>
    <!-- Preloader -->
    <div class="preloader-it">
        <div class="la-anim-1"></div>
    </div>
    <!-- /Preloader -->
    <div class="wrapper theme-5-active pimary-color-gold">
        <!-- Top Menu Items -->
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="mobile-only-brand pull-left">
                <div class="nav-header pull-left">
                    <div class="logo-wrap">
                        <a href="index.html">
                            {{-- <img class="brand-img" src="../theame/img/logo.png" alt="brand" /> --}}
                            <span class="brand-text">KC Daily Collection</span>
                        </a>
                    </div>
                </div>
                <a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left"
                    href="javascript:void(0);"><i class="zmdi zmdi-menu"></i></a>
                <a id="toggle_mobile_search" data-toggle="collapse" data-target="#search_form" class="mobile-only-view"
                    href="javascript:void(0);"><i class="zmdi zmdi-search"></i></a>
                <a id="toggle_mobile_nav" class="mobile-only-view" href="javascript:void(0);"><i
                        class="zmdi zmdi-more"></i></a>
                <form id="search_form" role="search" class="top-nav-search collapse pull-left">
                    <div class="input-group">
                        <input type="text" name="example-input1-group2" class="form-control" placeholder="Search">
                        <span class="input-group-btn">
                            <button type="button" class="btn  btn-default" data-target="#search_form"
                                data-toggle="collapse" aria-label="Close" aria-expanded="true"><i
                                    class="zmdi zmdi-search"></i></button>
                        </span>
                    </div>
                </form>
            </div>
            <div id="mobile_only_nav" class="mobile-only-nav pull-right">
                <ul class="nav navbar-right top-nav pull-right">
                    <li>
                        {{-- <a id="open_right_sidebar" href="#"><i class="zmdi zmdi-settings top-nav-icon"></i></a> --}}
                    </li>
                    <li class="dropdown app-drp">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                class="zmdi zmdi-apps top-nav-icon"></i></a>
                        <ul class="dropdown-menu app-dropdown" data-dropdown-in="slideInRight"
                            data-dropdown-out="flipOutX">
                            <li>
                                <div class="app-nicescroll-bar">
                                    <ul class="app-icon-wrap pa-10">
                                        <li>
                                            <a href="{{route('admin.home')}}" class="connection-item">
                                                <i class="zmdi zmdi-landscape txt-success"></i>
                                                <span class="block">Dashboard</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{route('viewuser')}}" class="connection-item">
                                                <i class="zmdi zmdi-account txt-info"></i>
                                                <span class="block">Users</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{route('admin.routes')}}" class="connection-item">
                                                <i class="zmdi zmdi-map txt-primary"></i>
                                                <span class="block">Routes</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{route('admin.managecustomers')}}" class="connection-item">
                                                <i class="zmdi zmdi-assignment-account txt-danger"></i>
                                                <span class="block">Customers</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{route('admin.holidays')}}" class="connection-item">
                                                <i class="zmdi zmdi-calendar txt-warning"></i>
                                                <span class="block">Holidays</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="" class="connection-item">
                                                <i class="zmdi zmdi-money"></i>
                                                <span class="block">Transactions</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <div class="app-box-bottom-wrap">
                                    <hr class="light-grey-hr ma-0" />
                                    <a class="block text-center read-all" href="javascript:void(0)"> Close </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown full-width-drp">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                class="zmdi zmdi-more-vert top-nav-icon"></i></a>
                        <ul class="dropdown-menu mega-menu pa-0" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">

                        </ul>
                    </li>
                    {{-- <li class="dropdown alert-drp">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                class="zmdi zmdi-notifications top-nav-icon"></i><span
                                class="top-nav-icon-badge">5</span></a>
                        <ul class="dropdown-menu alert-dropdown" data-dropdown-in="bounceIn"
                            data-dropdown-out="bounceOut">
                            <li>
                                <div class="notification-box-head-wrap">
                                    <span class="notification-box-head pull-left inline-block">notifications</span>
                                    <a class="txt-danger pull-right clear-notifications inline-block"
                                        href="javascript:void(0)"> clear all </a>
                                    <div class="clearfix"></div>
                                    <hr class="light-grey-hr ma-0" />
                                </div>
                            </li>
                            <li>
                                <div class="streamline message-nicescroll-bar">
                                    <div class="sl-item">
                                        <a href="javascript:void(0)">
                                            <div class="icon bg-green">
                                                <i class="zmdi zmdi-flag"></i>
                                            </div>
                                            <div class="sl-content">
                                                <span
                                                    class="inline-block capitalize-font  pull-left truncate head-notifications">
                                                    New subscription created</span>
                                                <span
                                                    class="inline-block font-11  pull-right notifications-time">2pm</span>
                                                <div class="clearfix"></div>
                                                <p class="truncate">Your customer subscribed for the basic plan. The
                                                    customer will pay $25 per month.</p>
                                            </div>
                                        </a>
                                    </div>
                                    <hr class="light-grey-hr ma-0" />
                                    <div class="sl-item">
                                        <a href="javascript:void(0)">
                                            <div class="icon bg-yellow">
                                                <i class="zmdi zmdi-trending-down"></i>
                                            </div>
                                            <div class="sl-content">
                                                <span
                                                    class="inline-block capitalize-font  pull-left truncate head-notifications txt-warning">Server
                                                    #2 not responding</span>
                                                <span
                                                    class="inline-block font-11 pull-right notifications-time">1pm</span>
                                                <div class="clearfix"></div>
                                                <p class="truncate">Some technical error occurred needs to be resolved.
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                    <hr class="light-grey-hr ma-0" />
                                    <div class="sl-item">
                                        <a href="javascript:void(0)">
                                            <div class="icon bg-blue">
                                                <i class="zmdi zmdi-email"></i>
                                            </div>
                                            <div class="sl-content">
                                                <span
                                                    class="inline-block capitalize-font  pull-left truncate head-notifications">2
                                                    new messages</span>
                                                <span
                                                    class="inline-block font-11  pull-right notifications-time">4pm</span>
                                                <div class="clearfix"></div>
                                                <p class="truncate"> The last payment for your G Suite Basic
                                                    subscription
                                                    failed.</p>
                                            </div>
                                        </a>
                                    </div>
                                    <hr class="light-grey-hr ma-0" />
                                    <div class="sl-item">
                                        <a href="javascript:void(0)">
                                            <div class="sl-avatar">
                                                <img class="img-responsive" src="../img/avatar.jpg" alt="avatar" />
                                            </div>
                                            <div class="sl-content">
                                                <span
                                                    class="inline-block capitalize-font  pull-left truncate head-notifications">Sandy
                                                    Doe</span>
                                                <span
                                                    class="inline-block font-11  pull-right notifications-time">1pm</span>
                                                <div class="clearfix"></div>
                                                <p class="truncate">Neque porro quisquam est qui dolorem ipsum quia
                                                    dolor
                                                    sit amet, consectetur, adipisci velit</p>
                                            </div>
                                        </a>
                                    </div>
                                    <hr class="light-grey-hr ma-0" />
                                    <div class="sl-item">
                                        <a href="javascript:void(0)">
                                            <div class="icon bg-red">
                                                <i class="zmdi zmdi-storage"></i>
                                            </div>
                                            <div class="sl-content">
                                                <span
                                                    class="inline-block capitalize-font  pull-left truncate head-notifications txt-danger">99%
                                                    server space occupied.</span>
                                                <span
                                                    class="inline-block font-11  pull-right notifications-time">1pm</span>
                                                <div class="clearfix"></div>
                                                <p class="truncate">consectetur, adipisci velit.</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="notification-box-bottom-wrap">
                                    <hr class="light-grey-hr ma-0" />
                                    <a class="block text-center read-all" href="javascript:void(0)"> read all </a>
                                    <div class="clearfix"></div>
                                </div>
                            </li>
                        </ul>
                    </li> --}}
                    <li class="dropdown auth-drp">
                        <a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown"><img
                                src="{{$profile->profilepic}}" alt="user_auth" class="user-auth-img img-circle" /><span
                                class="user-online-status"></span></a>
                        <ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="flipInX"
                            data-dropdown-out="flipOutX">
                            <li>
                                <a href="{{route('admin.profile')}}"><i
                                        class="zmdi zmdi-account"></i><span>Profile</span></a>
                            </li>
                            <li>
                                <a href="#"><i class="zmdi zmdi-card"></i><span>my balance</span></a>
                            </li>
                            <li>
                                <a href="#"><i class="zmdi zmdi-assignment"></i><span>Reports</span></a>
                            </li>

                            <li class="divider"></li>
                            <li class="sub-menu show-on-hover">
                                <a href="#" class="dropdown-toggle pr-0 level-2-drp"><i
                                        class="zmdi zmdi-check text-success"></i> available</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                {{-- <a class="dropdown-item" href="/admin/logout" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                           {{ __('Logout') }}
                                </a> --}}

                                <a href="/admin/logout" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"><i
                                        class="zmdi zmdi-power"></i><span>Log Out</span></a>

                                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- /Top Menu Items -->

        <!-- Left Sidebar Menu -->
        <div class="fixed-sidebar-left">
            <ul class="nav navbar-nav side-nav nicescroll-bar">
                <li class="navigation-header">
                    <span>Main</span>
                    <i class="zmdi zmdi-more"></i>
                </li>
                <li>
                    <a href="{{route('admin.home')}}">
                        <div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i><span
                                class="right-nav-text">Dashboard</span></div>
                        <div class="clearfix"></div>
                    </a>
                </li>

                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#users">
                        <div class="pull-left"><i class="zmdi zmdi-account mr-20"></i><span class="right-nav-text">Users
                            </span>
                        </div>
                        <div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
                        <div class="clearfix"></div>
                    </a>
                    <ul id="users" class="collapse collapse-level-1">
                        <li>
                            <a href="{{route('admin.register')}}">Add Users</a>
                        </li>
                        <li>
                            <a href="{{route('viewuser')}}">Manage Users</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="{{route('admin.routes')}}">
                        <div class="pull-left"><i class="zmdi zmdi-map mr-20"></i><span
                                class="right-nav-text">Routes</span></div>
                        <div class="clearfix"></div>
                    </a>
                </li>

                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#customers">
                        <div class="pull-left"><i class="zmdi zmdi-assignment-account mr-20"></i><span
                                class="right-nav-text">Customers </span>
                        </div>
                        <div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
                        <div class="clearfix"></div>
                    </a>
                    <ul id="customers" class="collapse collapse-level-1">
                        <li>
                            <a href="{{route('admin.addcustomers')}}">Add Customers</a>
                        </li>
                        <li>
                            <a href="{{route('admin.managecustomers')}}">Manage Coustomers</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="{{route('admin.holidays')}}">
                        <div class="pull-left"><i class="zmdi zmdi-calendar mr-20"></i><span
                                class="right-nav-text">Holidays</span></div>
                        <div class="clearfix"></div>
                    </a>
                </li>



                <li>
                    <a href="{{route('admin.transactions')}}">
                        <div class="pull-left"><i class="zmdi zmdi-money mr-20"></i><span
                                class="right-nav-text">Transactions</span></div>
                        <div class="clearfix"></div>
                    </a>
                </li>



                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#transactions">
                        <div class="pull-left"><i class="zmdi zmdi-view-headline mr-20"></i><span
                                class="right-nav-text">Transactions List</span>
                        </div>
                        <div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
                        <div class="clearfix"></div>
                    </a>
                    <ul id="transactions" class="collapse collapse-level-1">
                        <li>
                            <a href="{{route('admin.transactionslistcompleted')}}">Completed</a>
                        </li>
                        <li>
                            <a href="{{route('admin.transactionslistnotcompleted')}}">Not Completed</a>
                        </li>
                    </ul>
                </li>


                <li>
                    <a href="{{route('admin.reports')}}">
                        <div class="pull-left"><i class="zmdi zmdi-file-text mr-20"></i><span
                                class="right-nav-text">Reports</span></div>
                        <div class="clearfix"></div>
                    </a>
                </li>


                <li>
                    <a href="{{route('admin.dailyreports')}}">
                        <div class="pull-left"><i class="zmdi zmdi-file-text mr-20"></i><span
                                class="right-nav-text">Daily Reports</span></div>
                        <div class="clearfix"></div>
                    </a>
                </li>


                


                {{-- <li>
                    <a href="{{route('admin.transactionslist')}}">
                <div class="pull-left"><i class="zmdi zmdi-view-headline mr-20"></i><span
                        class="right-nav-text">Transactions List</span></div>
                <div class="clearfix"></div>
                </a>
                </li> --}}









                <li>
                    <hr class="light-grey-hr mb-10" />
                </li>
                <li class="navigation-header">
                    <span>component</span>
                    <i class="zmdi zmdi-more"></i>
                </li>
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#ui_dr">
                        <div class="pull-left"><i class="zmdi zmdi-smartphone-setup mr-20"></i><span
                                class="right-nav-text">UI Elements</span></div>
                        <div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
                        <div class="clearfix"></div>
                    </a>
                    <ul id="ui_dr" class="collapse collapse-level-1 two-col-list">
                        <li>
                            <a href="panels-wells.html">Panels & Wells</a>
                        </li>
                        <li>
                            <a href="modals.html">Modals</a>
                        </li>
                        <li>
                            <a href="sweetalert.html">Sweet Alerts</a>
                        </li>
                        <li>
                            <a href="notifications.html">notifications</a>
                        </li>
                        <li>
                            <a href="typography.html">Typography</a>
                        </li>
                        <li>
                            <a href="buttons.html">Buttons</a>
                        </li>
                        <li>
                            <a href="accordion-toggle.html">Accordion / Toggles</a>
                        </li>
                        <li>
                            <a href="tabs.html">Tabs</a>
                        </li>
                        <li>
                            <a href="progressbars.html">Progress bars</a>
                        </li>
                        <li>
                            <a href="skills-counter.html">Skills & Counters</a>
                        </li>
                        <li>
                            <a href="pricing.html">Pricing Tables</a>
                        </li>
                        <li>
                            <a href="nestable.html">Nestables</a>
                        </li>
                        <li>
                            <a href="dorpdown.html">Dropdowns</a>
                        </li>
                        <li>
                            <a href="bootstrap-treeview.html">Tree View</a>
                        </li>
                        <li>
                            <a href="carousel.html">Carousel</a>
                        </li>
                        <li>
                            <a href="range-slider.html">Range Slider</a>
                        </li>
                        <li>
                            <a href="grid-styles.html">Grid</a>
                        </li>
                        <li>
                            <a href="bootstrap-ui.html">Bootstrap UI</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#form_dr">
                        <div class="pull-left"><i class="zmdi zmdi-edit mr-20"></i><span
                                class="right-nav-text">Forms</span>
                        </div>
                        <div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
                        <div class="clearfix"></div>
                    </a>
                    <ul id="form_dr" class="collapse collapse-level-1 two-col-list">
                        <li>
                            <a href="form-element.html">Basic Forms</a>
                        </li>
                        <li>
                            <a href="form-layout.html">form Layout</a>
                        </li>
                        <li>
                            <a href="form-advanced.html">Form Advanced</a>
                        </li>
                        <li>
                            <a href="form-mask.html">Form Mask</a>
                        </li>
                        <li>
                            <a href="form-picker.html">Form Picker</a>
                        </li>
                        <li>
                            <a href="form-validation.html">form Validation</a>
                        </li>
                        <li>
                            <a href="form-wizard.html">Form Wizard</a>
                        </li>
                        <li>
                            <a href="form-x-editable.html">X-Editable</a>
                        </li>
                        <li>
                            <a href="cropperjs.html">Cropperjs</a>
                        </li>
                        <li>
                            <a href="form-file-upload.html">File Upload</a>
                        </li>
                        <li>
                            <a href="dropzone.html">Dropzone</a>
                        </li>
                        <li>
                            <a href="bootstrap-wysihtml5.html">Bootstrap Wysihtml5</a>
                        </li>
                        <li>
                            <a href="tinymce-wysihtml5.html">Tinymce Wysihtml5</a>
                        </li>
                        <li>
                            <a href="summernote-wysihtml5.html">summernote</a>
                        </li>
                        <li>
                            <a href="typeahead-js.html">typeahead</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#chart_dr">
                        <div class="pull-left"><i class="zmdi zmdi-chart-donut mr-20"></i><span
                                class="right-nav-text">Charts </span></div>
                        <div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
                        <div class="clearfix"></div>
                    </a>
                    <ul id="chart_dr" class="collapse collapse-level-1 two-col-list">
                        <li>
                            <a href="flot-chart.html">Flot Chart</a>
                        </li>
                        <li>
                            <a href="echart.html">Echart Chart</a>
                        </li>
                        <li>
                            <a href="morris-chart.html">Morris Chart</a>
                        </li>
                        <li>
                            <a href="chart.js.html">chartjs</a>
                        </li>
                        <li>
                            <a href="chartist.html">chartist</a>
                        </li>
                        <li>
                            <a href="easy-pie-chart.html">Easy Pie Chart</a>
                        </li>
                        <li>
                            <a href="sparkline.html">Sparkline</a>
                        </li>
                        <li>
                            <a href="peity-chart.html">Peity Chart</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#table_dr">
                        <div class="pull-left"><i class="zmdi zmdi-format-size mr-20"></i><span
                                class="right-nav-text">Tables</span></div>
                        <div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
                        <div class="clearfix"></div>
                    </a>
                    <ul id="table_dr" class="collapse collapse-level-1 two-col-list">
                        <li>
                            <a href="basic-table.html">Basic Table</a>
                        </li>
                        <li>
                            <a href="bootstrap-table.html">Bootstrap Table</a>
                        </li>
                        <li>
                            <a href="data-table.html">Data Table</a>
                        </li>
                        <li>
                            <a href="export-table.html">Export Table</a>
                        </li>
                        <li>
                            <a href="responsive-data-table.html">RSPV DataTable</a>
                        </li>
                        <li>
                            <a href="responsive-table.html">Responsive Table</a>
                        </li>
                        <li>
                            <a href="editable-table.html">Editable Table</a>
                        </li>
                        <li>
                            <a href="foo-table.html">Foo Table</a>
                        </li>
                        <li>
                            <a href="jsgrid-table.html">Jsgrid Table</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#icon_dr">
                        <div class="pull-left"><i class="zmdi zmdi-iridescent mr-20"></i><span
                                class="right-nav-text">Icons</span></div>
                        <div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
                        <div class="clearfix"></div>
                    </a>
                    <ul id="icon_dr" class="collapse collapse-level-1">
                        <li>
                            <a href="fontawesome.html">Fontawesome</a>
                        </li>
                        <li>
                            <a href="themify.html">Themify</a>
                        </li>
                        <li>
                            <a href="linea-icon.html">Linea</a>
                        </li>
                        <li>
                            <a href="simple-line-icons.html">Simple Line</a>
                        </li>
                        <li>
                            <a href="pe-icon-7.html">Pe-icon-7</a>
                        </li>
                        <li>
                            <a href="glyphicons.html">Glyphicons</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#maps_dr">
                        <div class="pull-left"><i class="zmdi zmdi-map mr-20"></i><span
                                class="right-nav-text">maps</span>
                        </div>
                        <div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
                        <div class="clearfix"></div>
                    </a>
                    <ul id="maps_dr" class="collapse collapse-level-1">
                        <li>
                            <a href="vector-map.html">Vector Map</a>
                        </li>
                        <li>
                            <a href="google-map.html">Google Map</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <hr class="light-grey-hr mb-10" />
                </li>
                <li class="navigation-header">
                    <span>featured</span>
                    <i class="zmdi zmdi-more"></i>
                </li>
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#pages_dr">
                        <div class="pull-left"><i class="zmdi zmdi-google-pages mr-20"></i><span
                                class="right-nav-text">Special Pages</span></div>
                        <div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
                        <div class="clearfix"></div>
                    </a>
                    <ul id="pages_dr" class="collapse collapse-level-1 two-col-list">
                        <li>
                            <a href="blank.html">Blank Page</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#auth_dr">Authantication
                                pages
                                <div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="auth_dr" class="collapse collapse-level-2">
                                <li>
                                    <a href="login.html">Login</a>
                                </li>
                                <li>
                                    <a href="signup.html">Register</a>
                                </li>
                                <li>
                                    <a href="forgot-password.html">Recover Password</a>
                                </li>
                                <li>
                                    <a href="reset-password.html">reset Password</a>
                                </li>
                                <li>
                                    <a href="locked.html">Lock Screen</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#invoice_dr">Invoice<div
                                    class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="invoice_dr" class="collapse collapse-level-2">
                                <li>
                                    <a href="invoice.html">Invoice</a>
                                </li>
                                <li>
                                    <a href="invoice-archive.html">Invoice Archive</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#error_dr">error pages<div
                                    class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="error_dr" class="collapse collapse-level-2">
                                <li>
                                    <a href="404.html">Error 404</a>
                                </li>
                                <li>
                                    <a href="500.html">Error 500</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="gallery.html">Gallery</a>
                        </li>
                        <li>
                            <a href="timeline.html">Timeline</a>
                        </li>
                        <li>
                            <a href="faq.html">FAQ</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="documentation.html">
                        <div class="pull-left"><i class="zmdi zmdi-book mr-20"></i><span
                                class="right-nav-text">documentation</span></div>
                        <div class="clearfix"></div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#dropdown_dr_lv1">
                        <div class="pull-left"><i class="zmdi zmdi-filter-list mr-20"></i><span
                                class="right-nav-text">multilevel</span></div>
                        <div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
                        <div class="clearfix"></div>
                    </a>
                    <ul id="dropdown_dr_lv1" class="collapse collapse-level-1">
                        <li>
                            <a href="#">Item level 1</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#dropdown_dr_lv2">Dropdown
                                level 2<div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="dropdown_dr_lv2" class="collapse collapse-level-2">
                                <li>
                                    <a href="#">Item level 2</a>
                                </li>
                                <li>
                                    <a href="#">Item level 2</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /Left Sidebar Menu -->


        @yield('content')


        <footer class="footer container-fluid pl-30 pr-30">
            <div class="row">
                <div class="col-sm-12">
                    <p>2019 &copy; KC Daily Collections. Powerd By : <a href="http://inovora.uk">Inovora
                            Technologies</a>
                    </p>
                </div>
            </div>
        </footer>
        <!-- /Footer -->

    </div>
    <!-- /Main Content -->

    </div>
    <!-- /#wrapper -->

    <!-- JavaScript -->

    <!-- jQuery -->
    <script src="{{ asset('theame/vendors/bower_components/jquery/dist/jquery.min.js') }}" defer></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('theame/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js') }}" defer></script>

    <!-- Data table JavaScript -->
    <script src="{{ asset('theame/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js') }}" defer>
    </script>

    <!-- Slimscroll JavaScript -->
    <script src="{{ asset('theame/dist/js/jquery.slimscroll.js') }}" defer></script>

    <!-- simpleWeather JavaScript -->
    <script src="{{ asset('theame/vendors/bower_components/moment/min/moment.min.js') }}" defer></script>
    <script src="{{ asset('theame/vendors/bower_components/simpleWeather/jquery.simpleWeather.min.js') }}" defer>
    </script>
    <script src="{{ asset('theame/dist/js/simpleweather-data.js') }}" defer></script>

    <!-- Progressbar Animation JavaScript -->
    <script src="{{ asset('theame/vendors/bower_components/waypoints/lib/jquery.waypoints.min.js') }}" defer></script>
    <script src="{{ asset('theame/vendors/bower_components/jquery.counterup/jquery.counterup.min.js') }}" defer>
    </script>

    <!-- Fancy Dropdown JS -->
    <script src="{{ asset('theame/dist/js/dropdown-bootstrap-extended.js') }}" defer></script>

    <!-- Sparkline JavaScript -->
    <script src="{{ asset('theame/vendors/jquery.sparkline/dist/jquery.sparkline.min.js') }}" defer></script>

    <!-- Owl JavaScript -->
    <script src="{{ asset('theame/vendors/bower_components/owl.carousel/dist/owl.carousel.min.js') }}" defer></script>

    <!-- Toast JavaScript -->
    {{-- <script src="{{ asset('theame/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js') }}"
    defer></script> --}}

    <!-- EChartJS JavaScript -->
    <script src="{{ asset('theame/vendors/bower_components/echarts/dist/echarts-en.min.js') }}" defer></script>
    <script src="{{ asset('theame/vendors/echarts-liquidfill.min.js') }}" defer></script>

    <!-- Switchery JavaScript -->
    <script src="{{ asset('theame/vendors/bower_components/switchery/dist/switchery.min.js') }}" defer></script>

    <!-- Init JavaScript -->
    <script src="{{ asset('theame/dist/js/init.js') }}" defer></script>
    <script src="{{ asset('theame/dist/js/dashboard5-data.js') }}" defer></script>

    <script src="{{ asset('theame/vendors/bower_components/sweetalert/dist/sweetalert.min.js') }}" defer></script>

    {{-- <script src="{{ asset('theame/vendors/bower_components/select2/select2.min.js') }}" defer></script> --}}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="{{ asset('theame/vendors/bower_components/select2/dist/js/select2.full.min.js') }}" defer></script>

    <script src="{{ asset('theame/dist/js/form-advance-data.js') }}" defer></script>




    {{-- </script> --}}
</body>

</html>