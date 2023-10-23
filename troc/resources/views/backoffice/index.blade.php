<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Echange & Service</title>
    <meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />
    <meta content="Themesdesign" name="author" />
    <link rel="shortcut icon" href="{{ asset('assets/backoffice/images/favicon.ico') }}">

    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="{{ asset('assets/backoffice/plugins/morris/morris.css') }}">

    <link href="{{ asset('assets/backoffice/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/backoffice/css/metismenu.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/backoffice/css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/backoffice/css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/backoffice/plugins/x-editable/css/bootstrap-editable.css') }}" rel="stylesheet"
        type="text/css">
</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        <div class="topbar">

            <!-- LOGO -->
            <div class="topbar-left">
                <a href="index.html" class="logo">
                    <span class="logo-light">
                            {{-- <i class="mdi mdi-camera-control"></i>Echanges</span>&Service --}}
                            <img style="width: 196px" src="{{asset('assets/frontoffice/img/logo_es.png')}}" alt="Echange & Service - " />
                        </span>
                <span class="logo-sm">
                            <i class="mdi mdi-camera-control"></i>
                        </span>
            </a>
        </div>

        <nav class="navbar-custom">
            <ul class="navbar-right list-inline float-right mb-0">
                <li class="d-none d-md-inline-block">
                    <form role="search" class="app-search">
                        <div class="form-group mb-0">
                            <a class="nav-link form-control2" href="{{ route('home') }}">home</a>
                        </div>
                    </form>
                </li>

                <!-- language-->
                <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
                    <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="{{asset('assets/backoffice/images/flags/us_flag.jpg')}}" class="mr-2" height="12" alt="" /> English <span class="mdi mdi-chevron-down"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated language-switch">
                        <a class="dropdown-item" href="#"><img src="{{asset('assets/backoffice/images/flags/french_flag.jpg')}}" alt="" height="16" /><span> French </span></a>
                        <a class="dropdown-item" href="#"><img src="{{asset('assets/backoffice/images/flags/spain_flag.jpg')}}" alt="" height="16" /><span> Spanish </span></a>
                        <a class="dropdown-item" href="#"><img src="{{asset('assets/backoffice/images/flags/russia_flag.jpg')}}" alt="" height="16" /><span> Russian </span></a>
                        <a class="dropdown-item" href="#"><img src="{{asset('assets/backoffice/images/flags/germany_flag.jpg')}}" alt="" height="16" /><span> German </span></a>
                        <a class="dropdown-item" href="#"><img src="{{asset('assets/backoffice/images/flags/italy_flag.jpg')}}" alt="" height="16" /><span> Italian </span></a>
                    </div>
                </li>

                <!-- full screen -->
                <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
                    <a class="nav-link waves-effect" href="#" id="btn-fullscreen">
                        <i class="mdi mdi-arrow-expand-all noti-icon"></i>
                    </a>
                </li>

                <!-- notification -->
                <li class="dropdown notification-list list-inline-item">
                    <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="mdi mdi-bell-outline noti-icon"></i>
                        <span class="badge badge-pill badge-danger noti-icon-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-menu-lg px-1">
                        <!-- item-->
                        <h6 class="dropdown-item-text">
                            Notifications
                        </h6>
                        <div class="slimscroll notification-item-list">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item active">
                                <div class="notify-icon bg-success"><i class="mdi mdi-cart-outline"></i></div>
                                <p class="notify-details"><b>Your order is placed</b><span class="text-muted">Dummy text of the printing and typesetting industry.</span></p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-danger"><i class="mdi mdi-message-text-outline"></i></div>
                                <p class="notify-details"><b>New Message received</b><span class="text-muted">You have 87 unread messages</span></p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-info"><i class="mdi mdi-filter-outline"></i></div>
                                <p class="notify-details"><b>Your item is shipped</b><span class="text-muted">It is a long established fact that a reader will</span></p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-success"><i class="mdi mdi-message-text-outline"></i></div>
                                <p class="notify-details"><b>New Message received</b><span class="text-muted">You have 87 unread messages</span></p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-warning"><i class="mdi mdi-cart-outline"></i></div>
                                <p class="notify-details"><b>Your order is placed</b><span class="text-muted">Dummy text of the printing and typesetting industry.</span></p>
                            </a>

                    <!-- language-->


                    <!-- full screen -->


                    <!-- notification -->
                    <li class="dropdown notification-list list-inline-item">
                        <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown"
                            href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="mdi mdi-bell-outline noti-icon"></i>
                            @if ($user->notifications->where('lu', 0)->count() > 0)
                                <span class="badge badge-pill badge-danger noti-icon-badge">
                                    {{ $user->notifications->where('lu', 0)->count() }}
                                </span>
                            @endif
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-menu-lg px-1">
                            <h6 class="dropdown-item-text">
                                Notifications
                            </h6>
                            <div class="slimscroll notification-item-list">

                                @foreach ($user->notifications as $notification)
                                    <a href="{{ route('backoffice.offres.redirectToOffre', ['notification' => $notification->id]) }}"
                                        class="dropdown-item notify-item {{ $notification->lu ? '' : 'active' }}">
                                        <div class="notify-icon bg-success"><i
                                                class="mdi mdi-message-text-outline"></i></div>
                                        <p class="notify-details"><b>Nouvelle offre reçue</b><span class="text-muted">
                                                {{ $notification->message }}
                                            </span></p>
                                    </a>
                                @endforeach


                            </div>
                            <!-- All-->
                            <a href="javascript:void(0);" class="dropdown-item text-center notify-all text-primary">
                                View all <i class="fi-arrow-right"></i>
                            </a>
                        </div>
                    </li>

                    <li class="dropdown notification-list list-inline-item">
                        <div class="dropdown notification-list nav-pro-img">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <a class="dropdown-toggle nav-link arrow-none nav-user" data-toggle="dropdown"
                                    href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}"
                                        class="rounded-circle">
                                </a>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button"
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-700 active:bg-gray-50 dark:active:bg-gray-700 transition ease-in-out duration-150">
                                        {{ Auth::user()->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                <!-- item-->
                                <a class="dropdown-item" href="{{ route('profile.show') }}"><i
                                        class="mdi mdi-account-circle"></i> {{ __('Profile') }}</a>
                                <a class="dropdown-item" href="#"><i class="mdi mdi-wallet"></i> Wallet</a>
                                <a class="dropdown-item d-block" href="#"><span
                                        class="badge badge-success float-right">11</span><i
                                        class="mdi mdi-settings"></i> Settings</a>
                                <a class="dropdown-item" href="#"><i class="mdi mdi-lock-open-outline"></i>
                                    Lock screen</a>
                                <div class="dropdown-divider"></div>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf <!-- This adds a CSRF token to protect against Cross-Site Request Forgery -->
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="mdi mdi-power text-danger"></i> Logout
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>
                </li>

            </ul>

            <ul class="list-inline menu-left mb-0">
                <li class="float-left">
                    <button class="button-menu-mobile open-left waves-effect">
                        <i class="mdi mdi-menu"></i>
                    </button>
                </li>
                <li class="d-none d-md-inline-block">
                    <form role="search" class="app-search">
                        <div class="form-group mb-0">
                            <input type="text" class="form-control" placeholder="Search..">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </li>
            </ul>

        </nav>

    </div>
    <!-- Top Bar End -->

    <!-- ========== Left Sidebar Start ========== -->
    <div class="left side-menu">
        <div class="slimscroll-menu" id="remove-scroll">

            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <!-- Left Menu Start -->
                <ul class="metismenu" id="side-menu">
                    <li class="menu-title">Menu</li>
                    <li>
                        <a href="index.html" class="waves-effect">
                            <i class="icon-accelerator"></i><span class="badge badge-success badge-pill float-right">9+</span> <span> Dashboard </span>
                        </a>
                    </li>

                    <li>
                        <a href="javascript:void(0);" class="waves-effect"><i class="icon-mail-open"></i><span> Email <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                        <ul class="submenu">
                            <li><a href="email-inbox.html">Inbox</a></li>
                            <li><a href="email-read.html">Email Read</a></li>
                            <li><a href="email-compose.html">Email Compose</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-account-circle"></i><span> Users <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                        <ul class="submenu">
                            <li><a href="{{ route('users') }}">List Of users</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="waves-effect"><i class="icon-todolist-check"></i><span> Products<span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                        <ul class="submenu">
                            <li>
                                <a href="{{ route('backoffice.products.index') }}">List Of Productss</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-account-circle"></i><span> Categories <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                        <ul class="submenu">
                            <li><a href="{{ route('categories.index') }}">List Of Categories</a></li>
                            <li><a href="{{ route('categories.create') }}">Add Categories</a></li>
                        </ul>
                    </li>
                    <li>
                    <a href="javascript:void(0);" class=" lni-cart"><i class="mdi mdi-account-circle"></i><span> Abonnements <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                    <ul class="submenu">
                    <li><a href="{{ route('backoffice.subscription.create') }}">Ajouter Abonnements</a></li>
                    <li><a href="{{ route('backoffice.subscription.show') }}">Consulter Liste des Abonnements</a></li>
                    </ul>


                    </li>
                    <li>
                        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-account-circle"></i><span> Sub Categories <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                        <ul class="submenu">
                            {{-- <li><a href="{{ route('subcategories.index') }}">List Of SubCategories</a></li>                     --}}
                            <li><a href="{{ route('subcategories.create') }}">Add  SubCategories</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:void(0);" class="waves-effect"><i class="icon-paper-sheet"></i><span> Pages <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                        <ul class="submenu">
                            <li><a href="pages-pricing.html">Pricing</a></li>
                            <li><a href="pages-invoice.html">Invoice</a></li>
                            <li><a href="pages-timeline.html">Timeline</a></li>
                            <li><a href="pages-faqs.html">FAQs</a></li>
                            <li><a href="pages-maintenance.html">Maintenance</a></li>
                            <li><a href="pages-comingsoon.html">Coming Soon</a></li>
                            <li><a href="pages-starter.html">Starter Page</a></li>
                            <li><a href="pages-login.html">Login</a></li>
                            <li><a href="pages-register.html">Register</a></li>
                            <li><a href="pages-recoverpw.html">Recover Password</a></li>
                            <li><a href="pages-lock-screen.html">Lock Screen</a></li>
                            <li><a href="pages-404.html">Error 404</a></li>
                            <li><a href="pages-500.html">Error 500</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="waves-effect"><i class="icon-paper-sheet"></i><span> Gestion des Produits <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                        <ul class="submenu">
                            <li><a href="AjouterEquipe.html">Ajouter Produit</a></li>
                            <li><a href="AfficherEquipe.html">Afficher Produit</a></li>
                        </ul>
                    </li>

                    <li class="menu-title">Components</li>

                    <li>
                        <a href="javascript:void(0);" class="waves-effect"><i class="icon-pencil-ruler"></i> <span> UI Elements <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span> </a>
                        <ul class="submenu">
                            <li><a href="ui-alerts.html">Alerts</a></li>
                            <li><a href="ui-badge.html">Badge</a></li>
                            <li><a href="ui-buttons.html">Buttons</a></li>
                            <li><a href="ui-cards.html">Cards</a></li>
                            <li><a href="ui-dropdowns.html">Dropdowns</a></li>
                            <li><a href="ui-navs.html">Navs</a></li>
                            <li><a href="ui-tabs-accordions.html">Tabs &amp; Accordions</a></li>
                            <li><a href="ui-modals.html">Modals</a></li>
                            <li><a href="ui-images.html">Images</a></li>
                            <li><a href="ui-progressbars.html">Progress Bars</a></li>
                            <li><a href="ui-pagination.html">Pagination</a></li>
                            <li><a href="ui-popover-tooltips.html">Popover & Tooltips</a></li>
                            <li><a href="ui-spinner.html">Spinner</a></li>
                            <li><a href="ui-carousel.html">Carousel</a></li>
                            <li><a href="ui-video.html">Video</a></li>
                            <li><a href="ui-typography.html">Typography</a></li>
                            <li><a href="ui-grid.html">Grid</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:void(0);" class="waves-effect"><i class="icon-diamond"></i> <span> Advanced UI <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span> </a>
                        <ul class="submenu">
                            <li><a href="advanced-alertify.html">Alertify</a></li>
                            <li><a href="advanced-rating.html">Rating</a></li>
                            <li><a href="advanced-nestable.html">Nestable</a></li>
                            <li><a href="advanced-rangeslider.html">Range Slider</a></li>
                            <li><a href="advanced-sweet-alert.html">Sweet-Alert</a></li>
                            <li><a href="advanced-lightbox.html">Lightbox</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:void(0);" class="waves-effect"><i class="icon-todolist-check"></i><span> Forms <span class="badge badge-pill badge-danger float-right">8</span> </span></a>
                        <ul class="submenu">
                            <li><a href="form-elements.html">Form Elements</a></li>
                            <li><a href="form-validation.html">Form Validation</a></li>
                            <li><a href="form-advanced.html">Form Advanced</a></li>
                            <li><a href="form-editors.html">Form Editors</a></li>
                            <li><a href="form-uploads.html">Form File Upload</a></li>
                            <li><a href="form-mask.html">Form Mask</a></li>
                            <li><a href="form-summernote.html">Summernote</a></li>
                            <li><a href="form-xeditable.html">Form Xeditable</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:void(0);" class="waves-effect"><i class="icon-graph"></i><span> Charts <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                        <ul class="submenu">
                            <li><a href="charts-morris.html">Morris Chart</a></li>
                            <li><a href="charts-chartist.html">Chartist Chart</a></li>
                            <li><a href="charts-chartjs.html">Chartjs Chart</a></li>
                            <li><a href="charts-flot.html">Flot Chart</a></li>
                            <li><a href="charts-c3.html">C3 Chart</a></li>
                            <li><a href="charts-other.html">Jquery Knob Chart</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:void(0);" class="waves-effect"><i class="icon-spread"></i><span> Tables <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                        <ul class="submenu">
                            <li><a href="tables-basic.html">Basic Tables</a></li>
                            <li><a href="tables-datatable.html">Data Table</a></li>
                            <li><a href="tables-responsive.html">Responsive Table</a></li>
                            <li><a href="tables-editable.html">Editable Table</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:void(0);" class="waves-effect"><i class="icon-coffee"></i> <span> Icons  <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span></span> </a>
                        <ul class="submenu">
                            <li><a href="icons-material.html">Material Design</a></li>
                            <li><a href="icons-fontawesome.html">Font Awesome</a></li>
                            <li><a href="icons-outline.html">Outline Icons</a></li>
                            <li><a href="icons-themify.html">Themify Icons</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:void(0);" class="waves-effect"><i class="icon-map"></i><span> Maps <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                        <ul class="submenu">
                            <li><a href="maps-google.html"> Google Map</a></li>
                            <li><a href="maps-vector.html"> Vector Map</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:void(0);" class="waves-effect"><i class="icon-share"></i><span> Multi Level <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                        <ul class="submenu">
                            <li><a href="javascript:void(0);"> Menu 1</a></li>
                            <li>
                                <a href="javascript:void(0);">Menu 2  <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="submenu">
                                    <li><a href="javascript:void(0);">Menu 2.1</a></li>
                                    <li><a href="javascript:void(0);">Menu 2.1</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                </ul>

                <ul class="list-inline menu-left mb-0">
                    <li class="float-left">
                        <button class="button-menu-mobile open-left waves-effect">
                            <i class="mdi mdi-menu"></i>
                        </button>
                    </li>
                    <li class="d-none d-md-inline-block">
                        <form role="search" class="app-search">
                            <div class="form-group mb-0">
                                <input type="text" class="form-control" placeholder="Search..">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </li>
                </ul>

            </nav>

        </div>
        <!-- Top Bar End -->

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left side-menu">
            <div class="slimscroll-menu" id="remove-scroll">

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu" id="side-menu">
                        <li class="menu-title">Menu</li>
                        <li>
                            <a href="index.html" class="waves-effect">
                                <i class="icon-accelerator"></i><span
                                    class="badge badge-success badge-pill float-right">9+</span> <span> Dashboard
                                </span>
                            </a>
                        </li>

                        <li>
                            <a href="javascript:void(0);" class="waves-effect"><i class="icon-mail-open"></i><span>
                                    Email <span class="float-right menu-arrow"><i
                                            class="mdi mdi-chevron-right"></i></span> </span></a>
                            <ul class="submenu">
                                <li><a href="email-inbox.html">Inbox</a></li>
                                <li><a href="email-read.html">Email Read</a></li>
                                <li><a href="email-compose.html">Email Compose</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="waves-effect"><i
                                    class="mdi mdi-account-circle"></i><span> Users <span
                                        class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span>
                                </span></a>
                            <ul class="submenu">
                                <li><a href="{{ route('users') }}">List Of users</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="waves-effect"><i
                                    class="icon-todolist-check"></i><span> Products<span
                                        class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span>
                                </span></a>
                            <ul class="submenu">
                                <li>
                                    <a href="{{ route('backoffice.products.index') }}">List Of Products</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="waves-effect"><i
                                    class="icon-todolist-check"></i><span> Offres<span
                                        class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span>
                                </span></a>
                            <ul class="submenu">
                                <li>
                                    <a href="{{ route('backoffice.offres.index') }}">Liste des Offres</a>
                                </li>
                            </ul>
                        </li>


                        <li>
                            <a href="javascript:void(0);" class="waves-effect"><i
                                    class="icon-todolist-check"></i><span> Reports<span
                                        class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span>
                                </span></a>
                            <ul class="submenu">
                                <li>
                                    <a href="{{ route('backoffice.reports.index') }}">List Of Reports</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="waves-effect"><i
                                    class="mdi mdi-account-circle"></i><span> Categories <span
                                        class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span>
                                </span></a>
                            <ul class="submenu">
                                <li><a href="{{ route('categories.index') }}">List Of Categories</a></li>
                                <li><a href="{{ route('categories.create') }}">Add Categories</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="waves-effect"><i
                                    class="mdi mdi-account-circle"></i><span> Sub Categories <span
                                        class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span>
                                </span></a>
                            <ul class="submenu">
                                {{-- <li><a href="{{ route('subcategories.index') }}">List Of SubCategories</a></li>                     --}}
                                <li><a href="{{ route('subcategories.create') }}">Add SubCategories</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="waves-effect"><i class="icon-paper-sheet"></i><span>
                                    Pages <span class="float-right menu-arrow"><i
                                            class="mdi mdi-chevron-right"></i></span> </span></a>
                            <ul class="submenu">
                                <li><a href="pages-pricing.html">Pricing</a></li>
                                <li><a href="pages-invoice.html">Invoice</a></li>
                                <li><a href="pages-timeline.html">Timeline</a></li>
                                <li><a href="pages-faqs.html">FAQs</a></li>
                                <li><a href="pages-maintenance.html">Maintenance</a></li>
                                <li><a href="pages-comingsoon.html">Coming Soon</a></li>
                                <li><a href="pages-starter.html">Starter Page</a></li>
                                <li><a href="pages-login.html">Login</a></li>
                                <li><a href="pages-register.html">Register</a></li>
                                <li><a href="pages-recoverpw.html">Recover Password</a></li>
                                <li><a href="pages-lock-screen.html">Lock Screen</a></li>
                                <li><a href="pages-404.html">Error 404</a></li>
                                <li><a href="pages-500.html">Error 500</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="waves-effect"><i class="icon-paper-sheet"></i><span>
                                    Gestion des Produits <span class="float-right menu-arrow"><i
                                            class="mdi mdi-chevron-right"></i></span> </span></a>
                            <ul class="submenu">
                                <li><a href="AjouterEquipe.html">Ajouter Produit</a></li>
                                <li><a href="AfficherEquipe.html">Afficher Produit</a></li>
                            </ul>
                        </li>

                        <li class="menu-title">Components</li>

                        <li>
                            <a href="javascript:void(0);" class="waves-effect"><i class="icon-pencil-ruler"></i>
                                <span> UI Elements <span class="float-right menu-arrow"><i
                                            class="mdi mdi-chevron-right"></i></span> </span> </a>
                            <ul class="submenu">
                                <li><a href="ui-alerts.html">Alerts</a></li>
                                <li><a href="ui-badge.html">Badge</a></li>
                                <li><a href="ui-buttons.html">Buttons</a></li>
                                <li><a href="ui-cards.html">Cards</a></li>
                                <li><a href="ui-dropdowns.html">Dropdowns</a></li>
                                <li><a href="ui-navs.html">Navs</a></li>
                                <li><a href="ui-tabs-accordions.html">Tabs &amp; Accordions</a></li>
                                <li><a href="ui-modals.html">Modals</a></li>
                                <li><a href="ui-images.html">Images</a></li>
                                <li><a href="ui-progressbars.html">Progress Bars</a></li>
                                <li><a href="ui-pagination.html">Pagination</a></li>
                                <li><a href="ui-popover-tooltips.html">Popover & Tooltips</a></li>
                                <li><a href="ui-spinner.html">Spinner</a></li>
                                <li><a href="ui-carousel.html">Carousel</a></li>
                                <li><a href="ui-video.html">Video</a></li>
                                <li><a href="ui-typography.html">Typography</a></li>
                                <li><a href="ui-grid.html">Grid</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript:void(0);" class="waves-effect"><i class="icon-diamond"></i> <span>
                                    Advanced UI <span class="float-right menu-arrow"><i
                                            class="mdi mdi-chevron-right"></i></span> </span> </a>
                            <ul class="submenu">
                                <li><a href="advanced-alertify.html">Alertify</a></li>
                                <li><a href="advanced-rating.html">Rating</a></li>
                                <li><a href="advanced-nestable.html">Nestable</a></li>
                                <li><a href="advanced-rangeslider.html">Range Slider</a></li>
                                <li><a href="advanced-sweet-alert.html">Sweet-Alert</a></li>
                                <li><a href="advanced-lightbox.html">Lightbox</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript:void(0);" class="waves-effect"><i
                                    class="icon-todolist-check"></i><span> Forms <span
                                        class="badge badge-pill badge-danger float-right">8</span> </span></a>
                            <ul class="submenu">
                                <li><a href="form-elements.html">Form Elements</a></li>
                                <li><a href="form-validation.html">Form Validation</a></li>
                                <li><a href="form-advanced.html">Form Advanced</a></li>
                                <li><a href="form-editors.html">Form Editors</a></li>
                                <li><a href="form-uploads.html">Form File Upload</a></li>
                                <li><a href="form-mask.html">Form Mask</a></li>
                                <li><a href="form-summernote.html">Summernote</a></li>
                                <li><a href="form-xeditable.html">Form Xeditable</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript:void(0);" class="waves-effect"><i class="icon-graph"></i><span>
                                    Charts <span class="float-right menu-arrow"><i
                                            class="mdi mdi-chevron-right"></i></span> </span></a>
                            <ul class="submenu">
                                <li><a href="charts-morris.html">Morris Chart</a></li>
                                <li><a href="charts-chartist.html">Chartist Chart</a></li>
                                <li><a href="charts-chartjs.html">Chartjs Chart</a></li>
                                <li><a href="charts-flot.html">Flot Chart</a></li>
                                <li><a href="charts-c3.html">C3 Chart</a></li>
                                <li><a href="charts-other.html">Jquery Knob Chart</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript:void(0);" class="waves-effect"><i class="icon-spread"></i><span>
                                    Tables <span class="float-right menu-arrow"><i
                                            class="mdi mdi-chevron-right"></i></span> </span></a>
                            <ul class="submenu">
                                <li><a href="tables-basic.html">Basic Tables</a></li>
                                <li><a href="tables-datatable.html">Data Table</a></li>
                                <li><a href="tables-responsive.html">Responsive Table</a></li>
                                <li><a href="tables-editable.html">Editable Table</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript:void(0);" class="waves-effect"><i class="icon-coffee"></i> <span>
                                    Icons <span class="float-right menu-arrow"><i
                                            class="mdi mdi-chevron-right"></i></span></span> </a>
                            <ul class="submenu">
                                <li><a href="icons-material.html">Material Design</a></li>
                                <li><a href="icons-fontawesome.html">Font Awesome</a></li>
                                <li><a href="icons-outline.html">Outline Icons</a></li>
                                <li><a href="icons-themify.html">Themify Icons</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript:void(0);" class="waves-effect"><i class="icon-map"></i><span> Maps
                                    <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span>
                                </span></a>
                            <ul class="submenu">
                                <li><a href="maps-google.html"> Google Map</a></li>
                                <li><a href="maps-vector.html"> Vector Map</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript:void(0);" class="waves-effect"><i class="icon-share"></i><span> Multi
                                    Level <span class="float-right menu-arrow"><i
                                            class="mdi mdi-chevron-right"></i></span> </span></a>
                            <ul class="submenu">
                                <li><a href="javascript:void(0);"> Menu 1</a></li>
                                <li>
                                    <a href="javascript:void(0);">Menu 2 <span class="float-right menu-arrow"><i
                                                class="mdi mdi-chevron-right"></i></span></a>
                                    <ul class="submenu">
                                        <li><a href="javascript:void(0);">Menu 2.1</a></li>
                                        <li><a href="javascript:void(0);">Menu 2.1</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                    </ul>

                </div>
                <!-- Sidebar -->
                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <!-- Start content -->
            @yield('content')
        </div>

        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->
        <footer class="footer">
            © 2019 - 2020 Stexo <span class="d-none d-sm-inline-block"> - Crafted with <i
                    class="mdi mdi-heart text-danger"></i> by Themesdesign</span>.
        </footer>
    </div>
    <!-- END wrapper -->

    <!-- jQuery  -->
    <script src="{{ asset('assets/backoffice/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/backoffice/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/backoffice/js/metismenu.min.js') }}"></script>
    <script src="{{ asset('assets/backoffice/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('assets/backoffice/js/waves.min.js') }}"></script>

    <!--Morris Chart-->
    <script src="{{ asset('assets/backoffice/plugins/morris/morris.min.js') }}"></script>

    <script src="{{ asset('assets/backoffice/plugins/raphael/raphael.min.js') }}"></script>

    <script src="{{ asset('assets/backoffice/pages/dashboard.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assets/backoffice/js/app.js') }}"></script>


    <script src="{{ asset('assets/backoffice/plugins/moment/moment.js') }}"></script>
    <script src="{{ asset('assets/backoffice/plugins/x-editable/js/bootstrap-editable.min.js') }}"></script>
    <script src="{{ asset('assets/backoffice/pages/xeditable.js') }}"></script>

</body>

</html>
