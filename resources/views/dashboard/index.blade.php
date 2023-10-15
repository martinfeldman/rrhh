
@extends ('layouts.app')







<style>

    .task-card {
        /* width: 25%; */
        height: 15vh;
        text-align: center;
        padding: 20px;
        font-size: 24px;
        font-weight: bold;
        color: #fff;
        border-radius: 10px;
        transition: transform 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .task-card:hover {
        cursor: pointer;
        transform: scale(1.05);
        z-index: 1;
    }

    .task-card.task-1 {
        background-color: #F94144;
        box-shadow: 0 0 10px rgba(249, 65, 68, 0.5);
    }

    .task-card.task-2 {
        background-color: #F3722C;
        box-shadow: 0 0 10px rgba(243, 114, 44, 0.5);
    }

    .task-card.task-3 {
        background-color: #F8961E;
        box-shadow: 0 0 10px rgba(248, 150, 30, 0.5);
    }

    .task-card.task-4 {
        background-color: #90BE6D;
        box-shadow: 0 0 10px rgba(144, 190, 109, 0.5);
    }

    .task-card.task-5 {
        background-color: #43AA8B;
        box-shadow: 0 0 10px rgba(67, 170, 139, 0.5);
    }

    .task-card.task-6 {
        background-color: #4D908E;
        box-shadow: 0 0 10px rgba(77, 144, 142, 0.5);
    }

    .task-card.task-7 {
        background-color: #577590;
        box-shadow: 0 0 10px rgba(87, 117, 144, 0.5);
    }

    .task-card.task-8 {
        background-color: #277DA1;
        box-shadow: 0 0 10px rgba(39, 125, 161, 0.5);
    }

</style>




    {{-- {{ dd($expedientes);  }} --}}
    {{-- {{ dd($expedientes->nextPageUrl());  }} --}}
    {{-- {{ dd($expedientesProfesional);  }} --}}


@section('title', 'Dashboard')

@section('content_header')
    {{-- <h1>Dashboard</h1> --}}
    <h1 class="col-lg-5 col-md-5 col-sm-5 col-xs-5"><strong>Dashboard</strong></h1>
@stop

    
{{-- @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop --}}


@section('content')


    <div class="row col-lg-11 col-md-11 col-sm-11 col-xs-11" style="margin-bottom:3%">

        
        
        <br>
        @can('Registrar memopago')
            {{-- <a  href={{route('memospagos.create')}} 
                class="btn btn-success col-lg-3 col-md-3 col-sm-3 col-xs-3" 
                style="font-weight: bold; font-size: 130%; color: black; margin-right:5%"
                title="Registrar Nuevo MemoPago">
                NUEVO MEMO PAGO
            </a> --}}
        @endcan()

        <a  id="show-options-button"
            class="btn btn-primary col-lg-3 col-md-3 col-sm-3 col-xs-3" 
            style="font-weight: bold; font-size: 130%; color: black; display:none" 
            title="Ver menú de atajos" >
            VER MENÚ DE ATAJOS
        </a>


    </div>          {{-- row page title --}}



    <div class="row">

        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">

            @switch(true)

                {{-- @case(session('success'))
                    <div class="alert alert-success" role="alert">
                        <span id="mensaje_flash_data">{{session('success')}}</span>
                    </div> --}}

                @case (session('error'))
                    <div class="alert alert-danger" role="alert">
                        <span id="mensaje_flash_data">{{session('error')}}</span>
                    </div>

                {{-- @case (session('status'))
                    <div class="alert alert-info" role="alert">
                        <span id="mensaje_flash_data">{{session('status')}}</span>
                    </div> --}}

            @endswitch

        </div>

    </div>      {{-- row alerts --}}
    


    {{-- <livewire:index-memopago/> --}}






@stop

{{-- @endSection --}}






@section('jsScripts')

    {{-- <script src="{{asset('js/dashboard/dashboard_ministerio.js')}}"></script> --}}

@endSection




<!-- SELECT2 -->

@push('scripts')

<script>




</script>

@endpush










