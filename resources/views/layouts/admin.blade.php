<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>RRHH</title>


    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">




    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">

    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">

    <!--  CSS Styles -->
    <link rel="stylesheet" href="{{ asset('css/views/styles.css') }}">
    
    
    {{-- toastr css--}}

    <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">



    <!-- Icon -->
    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">


    @livewireStyles

</head>


@php
    // use Illuminate\Support\Facades\Auth;
    // use Illuminate\Support\Facades\Session;
    // use App\Repositories\NotificacionQueries; 
    // use App\Models\Configuracion;

    // header("Content-type: text/css; charset: UTF-8");
    // $theme_color    = config('app.theme_color');
    // $dropdown_color = config('app.dropdown_color');

    // $user_id = Auth()->id();

    // $nombre_archivo_logo = Configuracion::first()->nombre_archivo_logo;

    // $path = '/storage/LogosSistema/' . $nombre_archivo_logo;


@endphp



<body class="hold-transition skin-blue sidebar-mini" >

    {{-- {{dump($path)}} --}}


    <div class="wrapper" style="background-color: {{config('app.theme_color')}};" id="sidebar">


        <header class="main-header"style="background-color: {{config('app.theme_color')}};" id="barra_superior" >


            <a href="/" class="logo" style="background-color: {{config('app.theme_color')}};" id="barra_superior">

                {{-- <span class="logo-mini"><b></b></span> <!-- mini logo for sidebar mini 50x50 pixels --> --}}
                
                <span class="logo-lg" id="barra_superior"> <!-- logo for regular state and mobile devices -->
                    <img src="{{$path}}" alt="LOGO" height='50px'  width="190px" >
                </span>

            </a>

            

            <nav class="navbar navbar-static-top " role="navigation" style="background-color: {{config('app.theme_color')}};" id="barra_superior" >   <!-- Header Navbar: style can be found in header.less -->

                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" style="color:black" role="button" id="barra_superior">       <!-- Sidebar toggle button-->
                    <span class="sr-only">Navegación</span>
                </a>

                {{-- <span>Este es asset + path : {{asset($path)}}</span> --}}

                @if (Auth()->user() != null)        {{-- solo usuarios logeados pueden ver la seccion notificaciones --}}


                    <div class="navbar-custom-menu" id="barra_superior">        <!-- Navbar Right Menu -->



                        <ul class="nav navbar-nav" id="barra_superior">     {{-- seccion notificaciones --}}
                            <li class="dropdown p-4 text-muted "  id="listaNotificaciones">  
                            
                                <a href="#" class="dropdown-toggle btn btn-primary btn-xs border-0" data-toggle="dropdown" id="barra_superior"   {{-- icono campana --}}
                                aria-expanded="false" aria-haspopup="true" style="border-style: none; background-color: {{config('app.theme_color')}};">
                                        <livewire:notification-counter />
                                </a>
                                
                                <livewire:notification-dropdown />
                            
                            </li>       {{-- id="listaNotificaciones" --}}
                        </ul>           {{-- seccion notificaciones --}}
                    
                    
                        {{-- <menu   > --}}
                        <li class="dropdown user user-menu" id="bienvenido-user">  {{-- User Account: style can be found in dropdown.less  --}}
                        
                        
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                {{--  <small class="bg-red">Online</small> --}}
                                <span class="hidden-xs" style="color: black; font-size: 135%;">
                                    Bienvenido {{(Auth()) ? ucwords(strtolower(Auth()->user()->name ." ". Auth()->user()->last_name)) : ""}}
                                </span>
                            </a>
                        
                        
                        
                            <ul class="dropdown-menu" id="dropdown-user-nav-bar">
                            
                                <li class="user-header" id="dropdown-user-nav-bar">       
                                
                                    <a href="" id="sidebar_element" data-target="#modal-mi-perfil" data-toggle="modal">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                        <span>Mi perfil</span>                                  {{-- modal debe estar al final del header para que funcione el backdrop (sombreado)--}}
                                    </a>
                                    
                                    
                                    @can('Manipular Configuracion del sistema')                 {{--  Configuración  --}}
                                    <a href="{{url('/configuracion')}}" id="sidebar_element">
                                        <i class="fa fa-cog" aria-hidden="true"></i>
                                        <span>Configuración</span>
                                    </a>
                                    @endcan
                                    
                                </li>
                                
                                
                                <li class="user-footer" id="dropdown-user-nav-bar">             {{--  Menu Footer --}}
                                    <div id="sidebar_element">
                                        <a href="{{url('/logout')}}" class="btn btn-block" 
                                        style="font-weight: bold; font-size: 95%; color: #8cd4da; background-color:black">
                                            Cerrar mi sesión
                                        </a>
                                    
                                    </div>
                                </li>
                                
                            
                            </ul>   {{-- class="dropdown-menu"> --}}
                            
                        </li>       {{-- id="bienvenido-user" --}}

                    </div>              {{-- navbar-custom-menu --}}
                

            </nav>                  {{-- navigation-nav --}}

        </header>                   {{-- main-header . encabezado --}}

        @include('usuario.modal-mi-perfil')
        
        @else                       {{-- lo que le falta al header para cerrar el if. Esto pasó porque el modal LO NECESITO fuera del header --}}
                </div>              {{-- navbar-custom-menu --}}

            </nav>
        </header>                   {{-- main-header . encabezado --}}    
        @endif                      {{-- Auth()->user() != null --}}



        
        <aside class="main-sidebar" style=" {{--background-color: {{config('app.sidebar_color')}}; --}} min-height: 100vh;" id="sidebar">    {{-- Left side column. contains the logo and sidebar --}}

            <section class="sidebar" {{-- style="background-color: {{config('app.sidebar_color')}};" --}} id="sidebar" >         <!-- sidebar: style can be found in sidebar.less -->

                <ul class="sidebar-menu" style=" min-height: 130vh" id="sidebar" >     <!-- sidebar user menu: : style can be found in sidebar.less -->

                    <li class="header" style="background-color: rgb(241, 241, 241)" {{-- id="barra_superior" --}}></li>  {{-- pequeño espacio vació --}}
                
                    @can('Ver Expedientes en sidebar')
                    <li id="expedientes" >
                        <a href="/expedientes" id="sidebar_element">
                            <i class="fa fa-folder-o"></i>
                            <span>Expedientes</span>
                        </a>
                    </li>
                    @endcan



                    @can('Ver Profesionales en sidebar')
                    <li id="profesionales.sidebar">
                        <a href="/profesionales" id="sidebar_element">
                            <i class="fa fa-child"></i>
                            <span>Profesionales</span>
                        </a>
                    </li>
                    @endcan           



                    @can('Ver Propietarios en sidebar')
                    <li id="propietario">
                        <a href="/propietarios" id="sidebar_element">
                            <i class="fa fa-child"></i>
                            <span>Propietarios</span>
                        </a>
                    </li>
                    @endcan



                    @can('Ver Reemplazo Profesional en sidebar')
                    <li>
                        <a href="/reemplazo-profesional" id="sidebar_element">
                            <i class="fa fa-exchange"></i> 
                            <span>Reemplazo Profesional</span>
                        </a>
                    </li>
                    @endcan



                    @can('Ver Estadistica en sidebar')
                        <li id="estadistica">
                            <a href="/estadistica" id="sidebar_element">
                                <i class="fa fa-signal"></i>
                                <span>Estadística</span>
                            </a>
                        </li>
                    @endcan          



                    @can('Ver Informes en sidebar')
                    <li id="informes">
                        <a href="/informes" id="sidebar_element">
                            <i class="fa fa-paperclip"></i> <span>Informes</span>
                        </a>
                    </li>
                    @endcan



                    @can('Ver Auditoria en sidebar')
                        <li>
                            <a href="/auditoria" id="sidebar_element">
                                <i class="fa fa-files-o"></i> <span>Auditoría</span>
                            </a>
                        </li>
                    @endcan



                    @can('Ver Usuarios en sidebar')
                        <li>
                            <a href="/usuarios" id="sidebar_element">
                                <i class="fa fa-users"> </i> <span>Usuarios</span>
                            </a>
                        </li>
                    @endcan



                    {{-- <li>
                        <a href="#">
                            <i class="fa fa-info-circle"></i> <span>Acerca De</span>
                            <small class="label pull-right bg-yellow">IT</small>
                        </a>
                    </li>    --}}               
                


                </ul>   {{-- sidebar user menu: --}}
            </section>  {{-- sidebar --}}


        </aside>    {{-- Left side column --}}




        <!-- Contenido de Pagina .Content Wrapper -->
        <div class="content-wrapper">

            <!-- Main content -->
            <section class="content">
            
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-12">
                                    
                                        <!--Contenido-->
                                        {{-- @include('sweet::alert') --}}
                                        @yield('contenido')
                                        <!--Fin Contenido-->
                                    
                                    </div><!-- /.col -->
                                </div><!-- /.row -->
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
                
                
            </section><!-- /.content -->


        </div>  <!-- /.content-wrapper --> <!--Fin-Contenido-->
        


        <footer class="main-footer" style="max-height: 5vh;">
            
            <div class="pull-right hidden-xs">
                <b>Version</b> 0.1
            </div>
            
            <strong>Todos los derechos reservados &copy; - 2021 .</strong>
            
        <footer>
            
    
            
        </div> {{-- class = "wrapper" --}}


        

        
        @livewireScripts


    <!-- jQuery 3.6.1 -->
    {{-- <script
        src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
        crossorigin="anonymous">
    </script> --}}


    {{-- <script src="{{asset('js/jquery.min.js')}}" type="text/javascript"></script> --}}




    <!-- jQuery 3.6.0 -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"> </script>



    {{-- toastr notifications js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    
    

    <script type="text/javascript">

        toastr.options = {
            "closeButton":      true,
            "newestOnTop":      true,
            "showDuration":     "300",
            "hideDuration":     "1000",
            "timeOut":          "10000",
            "extendedTimeOut":  "11000",
            "showEasing":       "swing",
            "hideEasing":       "linear",
            "showMethod":       "fadeIn",
            "hideMethod":       "fadeOut"
        }
        
        window.addEventListener('alert', event => {
            toastr.success(event.detail.message)
        })
        
        // toastr.info('Nueva Notificaciónn');
        
    </script>


    <script>    // disparar toastr notifications segun dos tipos de session flash data 
        
        $(document).ready(function() {
            // toastr.options.timeOut = 10000;
            @if (Session::has('success'))
                toastr.success('{{ Session::get('success') }}');
            
            @elseif(Session::has('status'))
                toastr.info('{{ Session::get('status') }}');
            @else
            @endif
        });

    </script>
    

    <script src="{{asset('js/bootstrap.min.js')}}"></script>  <!-- Bootstrap 3.4.4 -->
    {{--   <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script> <!-- Bootstrap 4.0.0 --> --}}


    <!-- AdminLTE App -->
    <script src="{{asset('js/app.min.js')}}"></script>



    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    {{-- <link href={{asset('css/select2.min.css')}}" rel="stylesheet" />
    <script src="{{asset('js/select2.min.js')}}"></script> --}}



    <!-- Sweet Alert cdn -->
    {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}

    <!-- SweetAlert2 -->
    {{-- <script src="{{asset('js/sweetalert2.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/sweetalert2.min.css')}}">  --}}



    @yield('jsScripts')


        <!-- with this directive now any file can push content to these <<script>> files -->


    @stack('scripts')






</body>














</html>
