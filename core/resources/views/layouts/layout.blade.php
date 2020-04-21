<!DOCTYPE html>

<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>EsteHotel</title>
  
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  {{-- <link rel="stylesheet" href="theme/plugins/bootstrap3/dist/css/bootstrap.min.css"> --}}
  {!!Html::style("theme/plugins/bootstrap3/dist/css/bootstrap.min.css")!!}
  <!-- Font Awesome -->
  {{-- <link rel="stylesheet" href="theme/plugins/font-awesome/css/font-awesome.min.css"> --}}
  {!!Html::style("theme/plugins/font-awesome/css/font-awesome.min.css")!!}

  <!-- Ionicons -->
  {{-- <link rel="stylesheet" href="theme/plugins/Ionicons/css/ionicons.min.css"> --}}
  {!!Html::style("theme/plugins/Ionicons/css/ionicons.min.css")!!}

  <!-- Theme style -->
  {{-- <link rel="stylesheet" href="theme/dist/css/AdminLTE.min.css"> --}}
  {!!Html::style("theme/dist/css/AdminLTE.min.css")!!}
  
  {{-- <link rel="stylesheet" href="theme/dist/css/skins/skin-blue.min.css"> --}}
  {!!Html::style("theme/dist/css/skins/skin-blue.min.css")!!}
  {{-- <link rel="stylesheet" href="theme/dist/css/skins/skin-red.min.css"> --}}
  {!!Html::style("theme/dist/css/skins/skin-red.min.css")!!}
  {{-- <link rel="stylesheet" href="theme/dist/css/skins/skin-black.min.css"> --}}
  {!!Html::style("theme/dist/css/skins/skin-black.min.css")!!}
 
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  @include("layouts.css")
  @yield('css')
  <!-- Google Font -->
  {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> --}}
  {!!Html::style("https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic")!!}
  
  {{ Html::favicon( 'theme/dist/img/favicon.ico' ) }}

</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-black sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header fixedheader">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>{{ HTML::image('theme/dist/img/logov2.png', 'alt',["style"=>"max-width: 150px;"] ) }}</b></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
     
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              {{-- <img src="theme/dist/img/zero.jpg" class="user-image" alt="User Image"> --}}
              {{ HTML::image('theme/dist/img/logov3.png', 'alt', array( 'class' => "user-image", 'height' => 70 )) }}
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">{{ Auth::user() != null ? Auth::user()->name : 'Usuario no registrado' }}</span> 
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                {{-- <img src="theme/dist/img/zero.jpg" class="img-circle" alt="User Image"> --}}
                {{ HTML::image('theme/dist/img/logov3.png', 'alt', array( 'class' => "img-circle", 'height' => 70 )) }}
                <p>
                  {{-- {{ Auth::user()->name }} --}}
                  {{ Auth::user() != null ? Auth::user()->name : 'Usuario no registrado' }}
                  <small> {{ Auth::user() != null ? Auth::user()->email : 'Usuario no registrado' }} </small>
                  {{-- <small>{{ Auth::user()->email }}</small> --}}
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Perfil</a>
                </div>
                <div class="pull-right">
                  <a href="{{ url('logout') }}" class="btn btn-default btn-flat">Salir</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
 
  <aside class="main-sidebar">  
    <section class="sidebar"> 
       
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Busqueda...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form>
      @if (Auth::user() !=null)
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menu</li>
        <!-- Optionally, you can add icons to the links -->
        
        @if (Auth::user()->cargo=="administrador") 
        <li class=" admin treeview active">
          <a href="#"><i class="fas fa-user-tie "></i> &nbsp<span>Administrador</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu"> 
            @if (Auth::user()->create_hotel_state==0)                
            <li class='active'><a href="/hotel_create"><i class="fa fa-link"></i> <span> Crear Hotel</span></a></li>
            @endif
            <li class='active'><a href="/habitaciones_administrar"><i class="fa fa-link"></i> <span> Habitaciones</span></a></li>
            <li class='active'><a href="/graficas"><i class="fa fa-link"></i> <span>Ver gr&aacuteficas de reservas</span></a></li>
            <li class='active'><a href="/graficashuespedes"><i class="fa fa-link"></i> <span>Ver gr&aacuteficas de hu&eacute;spedes</span></a></li>
            <li class='active'><a href="/reportes"><i class="fa fa-link"></i> <span>Reportes</span></a></li>
            <li class='active'><a href="/servicios_administrar"><i class="fa fa-link"></i> <span>Servicios del hotel</span></a></li>
            <li class='active'><a href="/imagenes"><i class="fa fa-link"></i> <span>Im&aacutegenes</span></a></li>
           </ul>
        </li>
        @endif  
         @if (Auth::user()->cargo=="recepcionista")
        <li class="recep treeview active">
          <a href="#"><i class="fas fa-user"></i> &nbsp<span>Recepcionista</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu"> 
          <li class='active'><a href="/hoteles_administrar"><i class="fa fa-link"></i> <span> Control</span></a></li>
            <li class='active'><a href="/reservas_administrar"><i class="fa fa-link"></i> <span>Reservas</span></a></li>
           </ul>
        </li>
        @endif 
       
              
       
       @if (!Auth::user()->cargo=="recepcionista" && !Auth::user()->cargo=="administrador" )
           
       <li class="cliente treeview active" >
         <a href="#"><i class="fa fa-users"></i>&nbsp <span>Clientes</span>
           <span class="pull-right-container">
               <i class="fa fa-angle-left pull-right"></i>
             </span>
         </a>
         <ul class="treeview-menu"> 
           <li  class='active'><a href="/clientes"><i class="fa fa-link"></i> <span> Realizar reserva</span></a></li>
       <li class='active'><a href="/confirmarReserva"><i class="fa fa-link"></i> <span>Confirmar reserva</span></a></li>
          </ul>
       </li> 
       </ul>
       @endif
      @else 

      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menu</li>
           
       <li class="cliente treeview active" >
         <a href="#"><i class="fa fa-users"></i>&nbsp <span>Clientes</span>
           <span class="pull-right-container">
               <i class="fa fa-angle-left pull-right"></i>
             </span>
         </a>
        <ul class="treeview-menu"> 
           <li  class='active'><a href="/clientes"><i class="fa fa-link"></i> <span> Realizar reserva</span></a></li>
          <li class='active'><a href="/confirmarReserva"><i class="fa fa-link"></i> <span>Confirmar reserva</span></a></li>
              </ul>
          </li> 
       </ul>
      

         
      @endif
      
      
      <!-- /.sidebar-menu -->
      
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      @yield('titulo_grande')
        <small>@yield('titulo_pequeno')</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
        @yield('contenido')

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer ">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Proyecto de investigaci&oacute;n
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2018 <a href="#">Miguel Mejia - Heyner Becerra</a>.</strong> Todos los derechos reservados.
  </footer>

 
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
   
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>
      

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="pull-right-container">
                    <span class="label label-danger pull-right">70%</span>
                  </span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>
      

      </div>
     
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
    
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
        
        </form>
      </div>
    
    </div>
  </aside>
 
  <div class="control-sidebar-bg"></div>
</div>

@include("layouts.js")


@yield('js')

</body>
</html>