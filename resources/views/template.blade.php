<!DOCTYPE html>
<html lang="en">

<head>

  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>E-commerce</title>

  <link rel="shortcut icon" href="{{asset('assets/img/logo/koperasi.png')}}"> 
  <!-- Custom fonts for this template-->
  <link href="{{asset('assets/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
  @yield('css')
  <!-- Custom styles for this template-->
  <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
  <script src="{{asset('assets/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('js/jquery.printPage.js')}}"></script> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>


</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('dashboard.home')}}">
        <div class="sidebar-brand-icon rotate-n-15">
         <img class="img-profile" src="{{asset('assets/img/logo/koperasi.png')}}" style="width: 55px; height: 45px; border-radius: 50%;transform:rotate(14deg);">
        </div>
        <div class="sidebar-brand-text mx-3">{{$general->aplikasi}}
          
        </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="{{route('dashboard.home')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Manajemen Dashboard</span></a>
          @if(Session::has('username'))
            <input type="hidden" name="" value="{{Session::get('username')}}">
          @endif
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- looping menu -->
      @foreach($menu as $menu)
          @if($menu->induk == 0)
          <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#datamaster{{$menu->id_menu}}" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>{{$menu->nama_menu}}</span>
          </a>
           <div id="datamaster{{$menu->id_menu}}" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar" >
              <div class="bg-white py-2 collapse-inner rounded">
                <?php $id = $menu->id_menu ?>
                <?php $i = 0 ?>
                @for ($i = $i; $i <= $childCount; $i++)
                  @if($child[$i]->induk == $id)
                    <a class="collapse-item d-flex p-1" href="{{route($child[$i]->nama_controller)}}">{{$child[$i]->nama_menu}}</a>
                    @else

                  @endif
                @endfor
                  </div>
              </div>
            </li>
          @endif
      @endforeach
      <!-- selesai looping menu -->
      
      <li class="nav-item">
        <a class="nav-link" href="tentang_kami">
          <i class="fas fa-user"></i>
          <span>Tentang Kami</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>


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
     
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span id="userName" class="mr-2 d-none d-lg-inline text-gray-600 small">{{Session::get('username')}}</span>
                <img class="img-profile rounded-circle" src="{{asset('assets/img/users/user.png')}}">
              </a>
              <input type="hidden" name="oke">
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="profile">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profiles
                </a>
               
                <div class="dropdown-divider"></div>
                <a class="" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            @yield('breadcrumb')
          </div>

          <!-- Content Row -->
            @yield('konten')

      </div>
    </div>

    
      <!-- End of Main Content -->

      <!-- Footer -->
     {{-- @include('partials.footer') --}}
      <!-- End of Footer -->

  
    <!-- End of Content Wrapper -->
    
   </div>
  
  <!-- End of Page Wrapper -->
  </div>
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pilih "Keluar" Untuk Keluar dari Panel Admin.</div>
        <div class="modal-footer">
            {{csrf_field()}}
          <a href="{{route('logout')}}" class="btn btn-danger"> Logout </a>
         
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('assets/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- jquery -->
  <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 -->
  <!-- Core plugin JavaScript-->
  <script src="{{asset('assets/jquery-easing/jquery.easing.min.js')}}"></script>
  <!-- Page level custom scripts -->
  <script src="{{asset('assets/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('assets/datatables/dataTables.bootstrap4.min.js')}}"></script>

  <!-- Page level custom scripts -->

  <script src="{{asset('js/mystyle.js')}}"></script>
  <script src="{{asset('assets/notification/notify.js')}}"></script>

  
  @yield('js')

  <script type="text/javascript">
    $(function() {
    $('#dataTable').dataTable( {
        "bPaginate": false, 
        "ordering": true,
        "info":     false
        
    } );
} );
  </script>
  @if(Session::has('sukses'))
          <script type="text/javascript">
            
              $.confirm({
                title: 'Berhasil',
                content: '{{Session::get('sukses')}}',
                type: 'orange',
                typeAnimated: true,
                buttons: {
                    close: function () {
                    }
                }
             });
        </script>

    @endif

     @if(Session::has('gagal'))
          <script type="text/javascript">
            
              $.confirm({
                title: 'Gagal',
                content: '{{Session::get('gagal')}}',
                type: 'orange',
                typeAnimated: true,
                buttons: {
                    close: function () {
                    }
                }
             });
        </script>

    @endif
  
 

</body>

</html>
