<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Playlist - App</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
     <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="./css/sb-admin-2.css" rel="stylesheet">
    <link href="./css/sb-admin-2.min.css" rel="stylesheet">

    <!--<link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">-->
    <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">
    <!-- Bootstrap JS + Popper.js (Notwendig für Modals) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('playlists.index') }}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-music"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Playlist <sup>App</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>-->

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Medien
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('playlists.index') }}">
                    <i class="fas fa-play-circle"></i>
                    <span>Playlists</span>
                </a>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed"> <!--href="{{ route('songs') }}"-->
                    <i class="fas fa-fw fa-music"></i>
                    <span>Songs</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Erweiterungen
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link "> <!--href="{{ route('favorit') }}"-->
                    <i class="fas fa-fw fa-heart"></i>
                    <span> Favoriten</span>
                </a>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link"> <!--href="{{ route('podcast') }}"-->
                    <i class="fas fa-fw fa-podcast"></i>
                    <span>Podcasts</span></a>
            </li>

            <!-- Nav Item - Tables
            <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li>-->

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="{{ asset('img/undraw_rocket.svg') }}" alt="...">
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search 
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small"
                                placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>-->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to
                                            download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All
                                    Alerts</a>
                            </div>-->
                        </li>



                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Ismail Souhili</span>
                                <img class="img-profile rounded-circle" src="{{ asset('img/undraw_profile.svg') }}"
                                    alt="Profile Image">

                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal"
                                    data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="row d-flex">
                        <!-- Playlists Container -->
                        <nav class="col-md-6 col-lg-5 d-md-block bg-white sidebar shadow-sm">
                            <div class="position-sticky p-3">
                                <h6 class="text-blue-800 font-weight-bold mb-3  text-primary"> Playlists</h6>


                                <ul class="list-group">
                                    @foreach ($playlists as $playlist)
                                        <li
                                            class="list-group-item d-flex justify-content-between align-items-center 
                                            {{ $playlist->id == $playlist_id ? 'active bg-primary text-white' : '' }}">

                                            <!-- Klickbare Playlist -->
                                            <a href="{{ route('playlists.index', $playlist->id) }}"
                                                class="text-decoration-none flex-grow-1 d-flex align-items-center 
                                               {{ $playlist->id == $playlist_id ? 'text-white' : 'text-dark' }}">
                                                <i class="fas fa-play me-4"></i> &nbsp;
                                                {{ $playlist->name }}
                                            </a>


                                            <!-- Songs Anzahl -->
                                            <span class="badge badge-pill badge-light text-dark me-2">
                                                {{ $playlist->songs()->count() }} S
                                            </span> &nbsp;

                                            <!-- Buttons: Bearbeiten, Löschen, Teilen -->
                                            <div class="d-flex">
                                                <!-- Bearbeiten -->
                                                <form action="{{ route('playlists.edit', $playlist->id) }}"
                                                    style="display:inline;">
                                                    <button type="submit"
                                                        class="btn btn-outline-warning btn-sm btn-action mx-1">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                </form>

                                                <!-- Löschen -->
                                                <form action="{{ route('playlists.destroy', $playlist->id) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger btn-sm mx-1"
                                                        onclick="return confirm('Willst du diese Playlist wirklich löschen?');">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>

                                                <!-- Teilen -->
                                                <button onclick="shareSong('{{ $playlist->name }}')"
                                                    class="btn btn-outline-dark btn-sm mx-1">
                                                    <i class="fas fa-share-alt"></i>
                                                </button>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>

                                <!-- Neue Playlist erstellen -->
                                <div class="text-center mt-3">
                                    <a href="#" class="btn btn-primary btn-block btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#playlistModal">
                                        <i class="fas fa-plus-circle"></i> Neue Playlist
                                    </a>
                                </div>
                            </div>
                        </nav>

                        <!-- START SB Admin 2 Styled Modal -->
                        <div class="modal fade" id="playlistModal" tabindex="-1"
                            aria-labelledby="playlistModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content shadow-lg border-0 rounded-lg">

                                    <!-- Modal Header -->
                                    <div class="modal-header bg-primary text-white">
                                        <h5 class="modal-title" id="playlistModalLabel">
                                            <i class="fa fa-play-circle" aria-hidden="true"></i> Neue Playlist
                                            erstellen
                                        </h5>
                                        <button type="button" class="btn-close btn-close-white"
                                            data-bs-dismiss="modal"></button>
                                    </div>

                                    <!-- Modal Body -->
                                    <div class="modal-body bg-light">
                                        <form action="{{ route('playlists.store') }}" method="POST">
                                            @csrf

                                            <!-- Playlist Name -->
                                            <div class="mb-3">
                                                <label for="name" class="form-label fw-bold text-dark"> Name der
                                                    Playlist</label>
                                                <input type="text" name="name" id="name"
                                                    class="form-control form-control-user" required>
                                            </div>

                                            <!-- Playlist Typ -->
                                            <div class="mb-3">
                                                <label for="type" class="form-label fw-bold text-dark"> Typ der
                                                    Playlist</label>
                                                <input type="text" name="type" id="type"
                                                    class="form-control form-control-user" required>
                                            </div>

                                            <!-- Modal Footer (Buttons) -->
                                            <div class="modal-footer d-flex justify-content-between">
                                                <button type="button" class="btn btn-secondary btn-sm"
                                                    data-bs-dismiss="modal">
                                                    <i class="fas fa-times"></i> Abbrechen
                                                </button>
                                                <button type="submit" class="btn btn-primary btn-sm">
                                                    <i class="fas fa-save"></i> Speichern
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END SB Admin 2 Styled Modal -->



                        <!-- Songs Container -->
                        <div class="col-md-7 ">
                            <main class="ms-sm-auto col-lg-12 px-md-2">
                                <div class="card shadow mb-2">
                                    <div
                                        class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
                                        <h5 class="m-0 font-weight-bold text-primary">Songs in Playlist</h5>
                                        <div class="text-center">
                                            <a href="{{ route('songs.create', ['playlist' => $playlist_id]) }}"
                                                class="btn btn-primary mb-2 text-center heading-style add-btn">
                                                <i class="fa fa-plus-circle" aria-hidden="true"></i> Neuen Song
                                                hinzufügen
                                            </a>
                                        </div>
                                    </div>
                                    <!--<div class="card-body d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
                                        
                                    </div>-->
                                </div>


                                <!-- Suchfeld und Filterbox -->

                                <div class="card-body">
                                    <form class="form-inline w-100">
                                        <div class="row w-100 d-flex justify-content-between">
                                            <!-- Suchfeld (ganz links) -->
                                            <div class="col-md-5 d-flex justify-content-start">
                                                <div class="input-group w-100">
                                                    <input type="text" id="songSearch"
                                                        class="form-control bg-light border-0 small"
                                                        placeholder=" Song suchen..." aria-label="Search"
                                                        aria-describedby="searchButton">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-primary" type="button"
                                                            id="searchButton">
                                                            <i class="fas fa-search fa-sm"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Filterbox (ganz rechts) -->
                                            <div class="col-md-4 d-flex justify-content-end">
                                                <div class="input-group w-100">
                                                    <select id="artistFilter"
                                                        class="form-select bg-light border-0 small">
                                                        <option value="">Alle Künstler</option>
                                                        @foreach ($songs->unique('artist') as $song)
                                                            <option value="{{ $song->artist }}">{{ $song->artist }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <div class="input-group-append">
                                                        <button class="btn btn-primary" type="button">
                                                            <i class="fas fa-filter fa-sm"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>


                                <!-- Songs Liste -->
                                <div class="row">
                                    @if ($songs->isEmpty())
                                        <p class="text-center text-muted mt-3">Diese Playlist hat noch keine Songs.</p>
                                    @else
                                        @foreach ($songs as $song)
                                            <div class="col-12 mb-3">
                                                <!-- Song Karte -->
                                                <div class="card shadow-sm border-0 rounded-3 p-3 song-card"
                                                    data-artist="{{ strtolower($song->artist) }}">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <!-- Song Titel und Artist -->
                                                        <div class="d-flex flex-grow-1 align-items-center">
                                                            <div>
                                                                <h5 class="song-title mb-0">{{ $song->title }}</h5>
                                                                <p class="song-artist text-muted mb-0">
                                                                    {{ $song->artist }}</p>
                                                            </div>
                                                        </div>
                                                        <!-- Song Dauer -->
                                                        <div class="text-muted ms-3">
                                                            <span>{{ $song->duration }}</span>
                                                        </div>
                                                        <!-- Aktionen (Play, Bearbeiten, Löschen, Teilen) -->
                                                        <div class="d-flex align-items-center">
                                                            <!-- Zurück -->
                                                            <button class="btn  btn-circle btn-action"
                                                                onclick="prevSong()">
                                                                <i class="fas fa-backward"></i>
                                                            </button>

                                                            <!-- Play/Pause -->

                                                            <button onclick="playSong(index, this)"
                                                                class="btn btn-circle btn-action play-pause-btn">
                                                                <i class="fas fa-play"></i> <!-- Initiales Icon -->
                                                            </button>


                                                            <!-- Vor -->
                                                            <button class="btn btn-circle btn-action"
                                                                onclick="nextSong()">
                                                                <i class="fas fa-forward"></i>
                                                            </button>
                                                            &nbsp;&nbsp;

                                                            <!-- Bearbeiten -->
                                                            <a href="{{ route('songs.edit', $song) }}"
                                                                class="btn btn-outline-warning btn-sm btn-action mx-1">
                                                                <i class="fas fa-edit"></i>
                                                            </a>

                                                            <!-- Löschen -->
                                                            <form action="{{ route('songs.destroy', $song) }}"
                                                                method="POST" style="display:inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-outline-danger btn-sm btn-action mx-1">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                            </form>

                                                            <!-- Teilen -->
                                                            <button onclick="shareSong('{{ $song->title }}')"
                                                                class="btn btn-outline-dark btn-sm btn-action mx-1">
                                                                <i class="fas fa-share-alt"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </main>
                        </div>

                    </div>
                </div>

                <!-- Footer -->
                <footer class="text-light text-center mt-3">
                    <div class="card shadow-lg p-2 text-center head-style">
                        <a href="{{ route('exportCSV') }}"
                            class="btn btn-primary mb-3 text-center heading-style add-btn input-light-purple">
                            <i class="fa fa-download"></i> Playlists & Songs als CSV herunterladen
                        </a>
                        <hr class="my-3">
                        <form action="{{ route('playlists.import') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="d-flex justify-content-center align-items-center gap-2 csv-upload-container">
                                <input type="file" name="csv_file"
                                    class="form-control d-inline w-auto text-center input-light-purple">
                                <button type="submit"
                                    class="btn btn-primary text- heading-style add-btn input-light-purple">
                                    <i class="fa fa-upload"></i> Playlists & Songs als CSV hochladen
                                </button>
                            </div>
                        </form>
                    </div>
                </footer>

                <!-- Modal für Song-Details -->
                <div class="modal fade" id="songModal" tabindex="-1" aria-labelledby="songModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content text-white wrapper">
                            <div class="modal-header d-flex align-items-center justify-content-between">
                                <div class="btn mx-4 text-white p-0" data-bs-dismiss="modal"><span
                                        class="fas fa-times"></span></div>
                                <div class="fs-09">Now Playing</div>
                                <div class="btn mx-4 text-white p-0"><span class="fas fa-ellipsis-h"></span></div>
                            </div>
                            <div class="modal-body">
                                <div class="d-flex flex-column align-items-center">
                                    <img id="songImage" src="" class="song-thumbnail">
                                    <div id="songTitle" class="song-name mt-2 fs-8"></div>
                                    <div id="songArtist" class="singers fs-09"></div>
                                </div>
                                <input class="toggle-heart" type="checkbox">
                                <span class="fas fa-heart"></span>
                                <div class="middle">
                                    <div class="multi-range-slider">
                                        <input type="range" id="input-left" min="0" max="100"
                                            value="0">
                                        <div class="slider">
                                            <div class="track"></div>
                                            <div class="range"></div>
                                            <div class="thumb left"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-4">
                                    <span id="amount-left" class="font-weight-bold"></span>
                                    <span id="amount-right" class="font-weight-bold"></span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-4 mb-4">
                                    <div class="btn text-white"><span class="fas fa-random"></span></div>
                                    <div class="btn text-white"><span class="fas fa-step-backward"></span></div>
                                    <div class="btn text-white play-icon" id="playBtn"><span
                                            class="fas fa-play playbutton"></span></div>
                                    <div class="btn text-white"><span class="fas fa-step-forward"></span></div>
                                    <div class="btn text-white"><span class="fas fa-volume-up"></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <!-- /.container-fluid -->
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->



        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>





   

       <!-- jQuery -->
<script src="/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap JS -->
<script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript -->
<script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages -->
<script src="/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="/js/demo/chart-area-demo.js"></script>
<script src="/js/demo/chart-pie-demo.js"></script>


<!-- jQuery -->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>

<!-- Bootstrap JS -->
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript -->
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages -->
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

<!-- Page level plugins -->
<script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>
<script src="{{ asset('js/demo/chart-bar-demo.js') }}"></script>


   










    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Song-Suche
            document.getElementById("songSearch").addEventListener("input", function() {
                let filter = this.value.toLowerCase();
                let songs = document.querySelectorAll(".song-card");

                songs.forEach(song => {
                    let title = song.querySelector(".song-title").textContent.toLowerCase();
                    if (title.includes(filter)) {
                        song.style.display = "block";
                    } else {
                        song.style.display = "none";
                    }
                });
            });

            // Artist-Filter
            document.getElementById("artistFilter").addEventListener("change", function() {
                let selectedArtist = this.value.toLowerCase();
                let songs = document.querySelectorAll(".song-card");

                songs.forEach(song => {
                    let artist = song.getAttribute("data-artist").toLowerCase();
                    if (selectedArtist === "" || artist === selectedArtist) {
                        song.style.display = "block";
                    } else {
                        song.style.display = "none";
                    }
                });
            });

            // Play/Pause-Funktionalität für Songs
            let currentAudio = null;
            let currentSongIndex = -1;
            const songs = @json($songs);

            document.querySelectorAll('.play-pause-btn').forEach((button, index) => {
                button.addEventListener('click', function() {
                    playSong(index, this);
                });
            });

            function playSong(index, button) {
                const songUrl = songs[index].audio_url;

                // Überprüfen, ob der aktuelle Song der gleiche ist
                if (currentAudio && currentAudio.src === songUrl) {
                    // Wenn der Song nicht pausiert ist
                    if (!currentAudio.paused) {
                        currentAudio.pause(); // Pausiere den Song
                        button.innerHTML = '<i class="fas fa-play"></i>'; // Ändere Icon auf Play
                    } else {
                        currentAudio.play(); // Starte den Song
                        button.innerHTML = '<i class="fas fa-pause"></i>'; // Ändere Icon auf Pause
                    }
                } else {
                    // Wenn der Song gewechselt wird
                    if (currentAudio) {
                        currentAudio.pause(); // Pausiere den alten Song
                        currentAudio.currentTime = 0; // Setze den alten Song zurück
                    }
                    currentAudio = new Audio(songUrl); // Lade den neuen Song
                    currentAudio.play(); // Starte den neuen Song
                    button.innerHTML = '<i class="fas fa-pause"></i>'; // Ändere Icon auf Pause
                    currentSongIndex = index; // Setze den aktuellen Song-Index
                }
            }


            function nextSong() {
                if (currentSongIndex < songs.length - 1) {
                    currentSongIndex++;
                    playSong(currentSongIndex, document.querySelectorAll('.play-pause-btn')[currentSongIndex]);
                }
            }

            function prevSong() {
                if (currentSongIndex > 0) {
                    currentSongIndex--;
                    playSong(currentSongIndex, document.querySelectorAll('.play-pause-btn')[currentSongIndex]);
                }
            }

            // Song teilen
            function shareSong(songTitle) {
                const shareText = `Höre dir diesen Song an: ${songTitle}`;
                if (navigator.share) {
                    navigator.share({
                        title: "Song teilen",
                        text: shareText,
                        url: window.location.href
                    }).catch(console.error);
                } else {
                    alert("Teilen wird in diesem Browser nicht unterstützt.");
                }
            }


        });
    </script>


</body>

</html>
