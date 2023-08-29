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
                        <li class="nav-item"><a class="nav-link" href="{{ url('/index_Gestionnaire') }}"
                                style="color: rgba(0,0,0,0.8);"><i class="fas fa-tachometer-alt"
                                    style="color: rgba(0,0,0,0.3);"></i><span>Tableau de bord</span></a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/calendrier') }}"
                                style="color: rgba(0,0,0,0.8);"><i class="fas fa-calendar-alt"
                                    style="color: rgba(0,0,0,0.3);"></i><span>Calendrier</span></a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/resultat_collectif') }}"
                                style="color: rgba(0,0,0,0.8);"><i class="fas fa-headset"
                                    style="color: rgba(0,0,0,0.3);"></i><span>Resultats collectifs</span></a>
                        </li>
                        <li class="nav-item"><a class="nav-link active" href="{{ url('/resultat_individuel') }}"
                                style="color: rgba(0,0,0,0.8);"><i class="fas fa-headset"
                                    style="color: rgba(0,0,0,0.3);"></i><span>Resultats individuels</span></a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/importDR') }}"
                                style="color: rgba(0,0,0,0.8);"><i class="fas fa-money-bill-alt"
                                    style="color: rgba(0,0,0,0.3);"></i><span>Ajout dépense/recette</span></a>
                        </li>
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
                                                class="d-none d-lg-inline me-2 text-gray-600 small">Gestionnaire</span><img
                                                class="border rounded-circle img-profile"
                                                src="assets/img/user-1.jpg"></a>
                                        <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in">
                                            <div class="dropdown-divider"></div><a class="dropdown-item"
                                                href="{{ url('/logoutGestionnaire') }}"><i
                                                    class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <section class="contact-clean" style="background: rgba(241,247,252,0);">
                        <form method="post" action="{{ route('ajout_rang_athlete') }}"
                            enctype="multipart/form-data">
                            @csrf
                            @if (Session::has('success'))
                                <div class="alert alert-success">{{ Session::get('success') }}</div>
                            @endif
                            @if (Session::has('error'))
                                <div class="alert alert-danger">{{ Session::get('error') }}</div>
                            @endif
                            <h2 class="text-center">Enregistrement des résultats</h2>
                            <div class="mb-3"><label class="form-label">Rang</label><select class="form-select"
                                    name="rang">
                                    <optgroup label="Rang du pays">
                                        @for ($i = 1; $i < 8; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </optgroup>
                                </select>
                                @error('rang')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3"><label class="form-label">Athlète</label><select class="form-select"
                                    name="athleteid">
                                    <optgroup label="Athlète">
                                        @foreach ($athlete as $athletes)
                                            <option value="{{ $athletes->id }}">
                                                {{ $athletes->nom }}-{{ $athletes->pays }}-{{ $athletes->discipline }}
                                            </option>
                                        @endforeach
                                    </optgroup>
                                </select>
                                @error('paysid')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3" style="text-align: center;"><button class="btn btn" type="submit"
                                    style="background: rgb(249,167,25);color: rgb(0,0,0);">Ajouter </button></div>
                        </form>
                    </section>
                    <section class="contact-clean" style="background: rgba(241,247,252,0);">
                        <div class="container">
                            <div class="card shadow">
                                <div class="card-header py-3">
                                    <p class="text-primary m-0 fw-bold">Employee Info</p>
                                </div>
                                <div class="card-body" style="text-align: left;">
                                    <div class="table-responsive table mt-2" id="dataTable-1" role="grid"
                                        aria-describedby="dataTable_info">
                                        <table class="table my-0" id="dataTable">
                                            <thead>
                                                <tr>
                                                    <th>Rang</th>
                                                    <th>Pays</th>
                                                    <th>Athlète</th>
                                                    <th>Discipline</th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($rangAthlete as $rangAthletes)
                                                    <tr>
                                                        <td>{{ $rangAthletes->rang }}</td>
                                                        <td>{{ $rangAthletes->pays }}</td>
                                                        <td>{{ $rangAthletes->nom }}</td>
                                                        <td>{{ $rangAthletes->discipline }}</td>
                                                        <td style="text-align: left;">
                                                            <button class="btn btn-link" type="button"
                                                                style="border: none; color: blue; text-decoration: underline;"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#modification-modal-{{ $rangAthletes->id }}">
                                                                Modifier
                                                            </button>
                                                        </td>
                                                        <td style="text-align: left;">
                                                            <button class="btn btn-link" type="button"
                                                                style="border: none; color: rgb(244,3,3); text-decoration: underline;"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#suppression-modal-{{ $rangAthletes->id }}">
                                                                Supprimer
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <div class="modal fade" role="dialog" tabindex="-1"
                                                        id="modification-modal-{{ $rangAthletes->id }}">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content"
                                                                style="background-color: white">
                                                                <div class="modal-header" style="text-align: left;">
                                                                    <h4 class="modal-title" style="color: black">
                                                                        Modification</h4>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p style="color: black">Vous êtes sur le point de
                                                                        modifier un élément</p>
                                                                    <form
                                                                        action="{{ route('update_rang_athlete', ['id' => $rangAthletes->id]) }}"
                                                                        method="post" enctype="multipart/form-data">
                                                                        @csrf
                                                                        @if (Session::has('success'))
                                                                            <div class="alert alert-success">
                                                                                {{ Session::get('success') }}</div>
                                                                        @endif
                                                                        @if (Session::has('error'))
                                                                            <div class="alert alert-danger">
                                                                                {{ Session::get('erreur') }}</div>
                                                                        @endif
                                                                        <div class="mb-3"><label
                                                                                class="form-label">Rang</label><select
                                                                                class="form-select" name="rang">
                                                                                <optgroup label="Rang">
                                                                                    @for ($i = 1; $i < 8; $i++)
                                                                                        <option
                                                                                            value="{{ $i }}"
                                                                                            {{ $i == $rangAthletes->rang ? 'selected' : '' }}>
                                                                                            {{ $i }}
                                                                                        </option>
                                                                                    @endfor
                                                                                </optgroup>
                                                                            </select>
                                                                            @error('rang')
                                                                                <span
                                                                                    class="text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="mb-3"><label
                                                                                class="form-label">Athlète</label><select
                                                                                class="form-select" name="athleteid">
                                                                                <optgroup label="Athlète">
                                                                                    @foreach ($athlete as $athletes)
                                                                                        <option
                                                                                            value="{{ $athletes->id }}"
                                                                                            {{ $rangAthletes->athleteid == $athletes->id ? 'selected' : '' }}>
                                                                                            {{ $athletes->nom }}-{{ $athletes->pays }}-{{ $athletes->discipline }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </optgroup>
                                                                            </select>
                                                                            @error('athleteid')
                                                                                <span
                                                                                    class="text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                        </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-light" type="button"
                                                                        data-bs-dismiss="modal">Fermer</button>
                                                                    <button class="btn btn-primary" type="submit"
                                                                        style="background: rgb(249,167,25); color: rgb(0, 0, 0);">Modifier</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal fade" role="dialog" tabindex="-1"
                                                        id="suppression-modal-{{ $rangAthletes->id }}">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content"
                                                                style="background-color: white">
                                                                <div class="modal-header" style="text-align: left;">
                                                                    <h4 class="modal-title" style="color: black">
                                                                        Suppression</h4>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form method="POST"
                                                                        action="{{ route('delete_rang_athlete', ['id' => $rangAthletes->id]) }}">
                                                                        @csrf
                                                                        @if (Session::has('success'))
                                                                            <div class="alert alert-success">
                                                                                {{ Session::get('success') }}</div>
                                                                        @endif
                                                                        @if (Session::has('error'))
                                                                            <div class="alert alert-danger">
                                                                                {{ Session::get('erreur') }}</div>
                                                                        @endif
                                                                        <p style="color: black">Voulez-vous vraiment
                                                                            supprimer cet élément ?</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-light" type="button"
                                                                        data-bs-dismiss="modal">Fermer</button>
                                                                    <button class="btn btn-primary" type="submit"
                                                                        style="background: rgb(238, 88, 74); color: rgb(0, 0, 0);">Supprimer</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
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
        <script src="assets/js/bs-init.js"></script>
        <script src="assets/js/theme.js"></script>
    </body>

</html>
