<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Blank Page - Brand</title>
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
        <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
        <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
        <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
        <link rel="stylesheet" href="assets/css/Contact-Form-Clean.css">
        <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
        <link rel="stylesheet" href="assets/css/Newsletter-Subscription-Form.css">
    </head>

    <body id="page-top">
        <div id="wrapper">
            <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0"
                style="background: rgb(23,148,214);">
                <div class="container-fluid d-flex flex-column p-0"><a
                        class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0"
                        href="#">
                        <div class="sidebar-brand-icon rotate-n-0"><img class="circular-icon" src="assets/img/JIOI.png"
                                alt="Image" style="width: 40px; height: 40px; color: #5D87FF;"></i></div>
                        <div class="sidebar-brand-text mx-3"><span style="color: #022436;">JIOI 11e edition&nbsp;</span>
                        </div>
                    </a>
                    <hr class="sidebar-divider my-0">
                    <ul class="navbar-nav text-light" id="accordionSidebar" style="color: rgb(0,0,0);">
                        <li class="nav-item"><a class="nav-link" href="index.html" style="color: rgba(0,0,0,0.8);"><i
                                    class="fas fa-tachometer-alt"
                                    style="color: rgba(0,0,0,0.3);"></i><span>Dashboard</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="profile.html" style="color: rgba(0,0,0,0.8);"><i
                                    class="fas fa-user" style="color: rgba(0,0,0,0.3);"></i><span>Profile</span></a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="table.html" style="color: rgba(0,0,0,0.8);"><i
                                    class="fas fa-table" style="color: rgba(0,0,0,0.3);"></i><span>Table</span></a><a
                                class="nav-link" href="table.html" style="color: rgba(0,0,0,0.8);"><i
                                    class="fas fa-table" style="color: rgba(0,0,0,0.3);"></i><span>Insertion</span></a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="login.html" style="color: rgba(0,0,0,0.8);"><i
                                    class="far fa-user-circle"
                                    style="color: rgba(0,0,0,0.3);"></i><span>Login</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="register.html" style="color: rgba(0,0,0,0.8);"><i
                                    class="fas fa-user-circle"
                                    style="color: rgba(0,0,0,0.3);"></i><span>Register</span></a></li>
                    </ul>
                    <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0"
                            id="sidebarToggle" type="button"
                            style="color: rgb(0,0,0);background: rgba(0,0,0,0.2);"></button></div>
                </div>
            </nav>
            <div class="d-flex flex-column" id="content-wrapper">
                <div id="content">
                    <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                        <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3"
                                id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                            <ul class="navbar-nav flex-nowrap ms-auto">
                                <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link"
                                        aria-expanded="false" data-bs-toggle="dropdown" href="#"><i
                                            class="fas fa-search"></i></a>
                                    <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in"
                                        aria-labelledby="searchDropdown">
                                        <form class="me-auto navbar-search w-100">
                                            <div class="input-group"><input class="bg-light form-control border-0 small"
                                                    type="text" placeholder="Search for ...">
                                                <div class="input-group-append"><button class="btn btn-primary py-0"
                                                        type="button"><i class="fas fa-search"></i></button></div>
                                            </div>
                                        </form>
                                    </div>
                                </li>
                                <div class="d-none d-sm-block topbar-divider"></div>
                                <li class="nav-item dropdown no-arrow">
                                    <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link"
                                            aria-expanded="false" data-bs-toggle="dropdown" href="#"><span
                                                class="d-none d-lg-inline me-2 text-gray-600 small">Administrateur</span><img
                                                class="border rounded-circle img-profile"
                                                src="assets/img/user-1.jpg"></a>
                                        <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in">
                                            <div class="dropdown-divider"></div><a class="dropdown-item"
                                                href="{{ url('/logoutAdmin') }}"><i
                                                    class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <div class="container-fluid">
                        <div class="card shadow mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h6 class="text-primary fw-bold m-0">Earnings Overview</h6>
                                <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle"
                                        aria-expanded="false" data-bs-toggle="dropdown" type="button"><i
                                            class="fas fa-ellipsis-v text-gray-400"></i></button>
                                    <div class="dropdown-menu shadow dropdown-menu-end animated--fade-in">
                                        <p class="text-center dropdown-header">dropdown header:</p><a
                                            class="dropdown-item" href="#">&nbsp;Action</a><a
                                            class="dropdown-item" href="#">&nbsp;Another action</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item"
                                            href="#">&nbsp;Something else here</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart-area"><canvas
                                        data-bss-chart="{&quot;type&quot;:&quot;line&quot;,&quot;data&quot;:{&quot;labels&quot;:[&quot;Jan&quot;,&quot;Feb&quot;,&quot;Mar&quot;,&quot;Apr&quot;,&quot;May&quot;,&quot;Jun&quot;,&quot;Jul&quot;,&quot;Aug&quot;],&quot;datasets&quot;:[{&quot;label&quot;:&quot;Earnings&quot;,&quot;fill&quot;:true,&quot;data&quot;:[&quot;0&quot;,&quot;10000&quot;,&quot;5000&quot;,&quot;15000&quot;,&quot;10000&quot;,&quot;20000&quot;,&quot;15000&quot;,&quot;25000&quot;],&quot;backgroundColor&quot;:&quot;rgba(78, 115, 223, 0.05)&quot;,&quot;borderColor&quot;:&quot;rgba(78, 115, 223, 1)&quot;}]},&quot;options&quot;:{&quot;maintainAspectRatio&quot;:false,&quot;legend&quot;:{&quot;display&quot;:false,&quot;labels&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;}},&quot;title&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;},&quot;scales&quot;:{&quot;xAxes&quot;:[{&quot;gridLines&quot;:{&quot;color&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;zeroLineColor&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;drawBorder&quot;:false,&quot;drawTicks&quot;:false,&quot;borderDash&quot;:[&quot;2&quot;],&quot;zeroLineBorderDash&quot;:[&quot;2&quot;],&quot;drawOnChartArea&quot;:false},&quot;ticks&quot;:{&quot;fontColor&quot;:&quot;#858796&quot;,&quot;fontStyle&quot;:&quot;normal&quot;,&quot;padding&quot;:20}}],&quot;yAxes&quot;:[{&quot;gridLines&quot;:{&quot;color&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;zeroLineColor&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;drawBorder&quot;:false,&quot;drawTicks&quot;:false,&quot;borderDash&quot;:[&quot;2&quot;],&quot;zeroLineBorderDash&quot;:[&quot;2&quot;]},&quot;ticks&quot;:{&quot;fontColor&quot;:&quot;#858796&quot;,&quot;fontStyle&quot;:&quot;normal&quot;,&quot;padding&quot;:20}}]}}}"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" role="dialog" tabindex="-1" id="modal-2">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" style="text-align: center;">Modification</h4><button
                                        type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <section class="contact-clean">
                                        <form method="post">
                                            <div class="mb-3"><input class="form-control" type="text"
                                                    name="name" placeholder="Name"></div>
                                            <div class="mb-3"><select class="form-select">
                                                    <optgroup label="This is a group">
                                                        <option value="12" selected="">This is item 1</option>
                                                        <option value="13">This is item 2</option>
                                                        <option value="14">This is item 3</option>
                                                    </optgroup>
                                                </select></div>
                                            <div class="mb-3"><input class="form-control" type="file"></div>
                                        </form>
                                    </section>
                                </div>
                                <div class="modal-footer"><button class="btn btn-light" type="button"
                                        data-bs-dismiss="modal">Fermer</button><button class="btn btn-primary"
                                        type="button"
                                        style="background: rgb(252,222,123);color: rgb(0,0,0);">Modifier</button></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" role="dialog" tabindex="-1" id="modal-1">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header" style="text-align: left;">
                                    <h4 class="modal-title">Suppression</h4><button type="button" class="btn-close"
                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Voulez-vous vraiment supprimer cette élément ?</p>
                                </div>
                                <div class="modal-footer"><button class="btn btn-light" type="button"
                                        data-bs-dismiss="modal">Fermer</button><button class="btn btn-primary"
                                        type="button"
                                        style="background: rgb(238,88,74);color: rgb(0,0,0);">Supprimer</button></div>
                            </div>
                        </div>
                    </div>
                </div>
                <footer class="bg-white sticky-footer">
                    <div class="container my-auto">
                        <div class="text-center my-auto copyright"><span>Copyright © Mendrika 2023</span></div>
                    </div>
                </footer>
            </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i
                    class="fas fa-angle-up"></i></a>
        </div>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/chart.min.js"></script>
        <script src="assets/js/bs-init.js"></script>
        <script src="assets/js/theme.js"></script>
    </body>

</html>
