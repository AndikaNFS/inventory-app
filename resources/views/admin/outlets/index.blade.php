<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    {{-- e-datatables@7.1.2/dist/style.min.css" rel="stylesheet" /> --}}
        {{-- <link href="css/styles.css" rel="stylesheet" /> --}}
        {{-- <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script> --}}
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <style>
            body {
                background: #1c2833   ;
            }
            .daftar {
                margin: 30px;
            }
            .web {
                padding: 10px;
                margin: 30px;
                /* background-color: red; */
                font-family: sans-serif;
                /* font-size: 30px; */
            }
        </style>
    </head>
  <body class="">
    {{-- @include('layouts.navigation') --}}
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <div class="web">
            <a class="navbar-brand ps-3" href="index.html">Inventory IT</a>

        </div>
        <!-- Sidebar Toggle-->
        {{-- <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button> --}}
        <!-- Navbar Search-->
        {{-- <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div>
        </form> --}}
        <!-- Navbar-->
        <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>

        </div>
    </nav>
    <main class="container">
        <div class="daftar">
            <h1 class="text-xl-center text-white">Daftar Outlet</h1>

        </div>
        <div class="card border-spacing-10 m-10">
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Location</th>
                        <th scope="col">Action</th>
                      </tr>
                  
                </thead>
                <tbody>
                    <tr>
                        <th scope="row" class="text-center" style="width:50px;">1</th>
                        <td>RR Sudirman</td>
                        <td>10, Jl. Jenderal Sudirman No.Kav. 86, RT.10/RW.11, Karet Tengsin, Daerah Khusus Ibukota Jakarta 10220</td>
                        <td><a href="#" style="text-decoration: none;">Lihat detail</a></td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-center" style="width:50px;">1</th>
                        <td>RR Lotte</td>
                        <td>10, Jl. Jenderal Sudirman No.Kav. 86, RT.10/RW.11, Karet Tengsin, Daerah Khusus Ibukota Jakarta 10220</td>
                        <td><a href="#" style="text-decoration: none;">Lihat detail</a></td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-center" style="width:50px;">1</th>
                        <td>RR Senopati</td>
                        <td>10, Jl. Jenderal Sudirman No.Kav. 86, RT.10/RW.11, Karet Tengsin, Daerah Khusus Ibukota Jakarta 10220</td>
                        <td><a href="#" style="text-decoration: none;">Lihat detail</a></td>
                    </tr>
                </tbody>
            </table>

        </div>

    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  </body>
</html>