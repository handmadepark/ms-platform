<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="{{ asset('admin/css/transaction_style.css') }}">
      <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">

      <title>Select transaction</title>
   </head>
   <body>
   <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

   <a class="navbar-brand ml-5" href="{{route('admin.select_transaction')}}">
       <strong>Handmade Park</strong>
   </a>

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


    <div class="topbar-divider d-none d-sm-block"></div>

    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
            <img class="img-profile rounded-circle"
                src="img/undraw_profile.svg">
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Profile
            </a>
            <a class="dropdown-item" href="#">
                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                Settings
            </a>
            <a class="dropdown-item" href="#">
                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                Activity Log
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('admin.logout') }}">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
            </a>
        </div>
    </li>

</ul>

</nav>
   <div class="container mt-5">
         <div class="row">
             <div class="col-xl-4 col-md-6 mb-4">
                <a href="" class="text-decoration-none">
               <div class=" shop card border-left-primary shadow h-100 py-2">
                  <div class="card-body">
                     <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                           <div class=" text-xs font-weight-bold text-primary text-uppercase mb-1">
                              Shop manager
                           </div>
                        </div>
                        <div class="col-auto">
                           <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                        </div>
                     </div>
                  </div>
               </div>
            </a>
            </div>
            <div class="col-xl-4 col-md-6 mb-4">
                <a href="" class="text-decoration-none">
               <div class="all card border-left-info shadow h-100 py-2">
                  <div class="card-body">
                     <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                           <div class=" text-xs font-weight-bold text-info text-uppercase mb-1">
                              All stores
                           </div>
                           <!-- <div class="h5 mb-0 font-weight-bold text-gray-800">(0)</div> -->
                        </div>
                        <div class="col-auto">
                           <i class="fas fa-store-alt fa-2x text-gray-300"></i>
                        </div>
                     </div>
                  </div>
               </div>
            </a>
            </div>
            <div class="col-xl-4 col-md-6 mb-4">
                <a href="" class="text-decoration-none">
               <div class="open card border-left-success shadow h-100 py-2">
                  <div class="card-body">
                     <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                           <div class=" text-xs font-weight-bold text-success text-uppercase mb-1">
                              Open new store
                           </div>
                        </div>
                        <div class="col-auto">
                           <i class="fas fa-plus fa-2x text-gray-300"></i>
                        </div>
                     </div>
                  </div>
               </div>
            </a>
            </div>
         </div>
      </div> 
      
    <script src="{{ asset('admin/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    
   </body>
</html>