
@extends ('layouts.admin')



















    {{--  NO Livewire --}}










    {{-- {{ dd($expedientes);  }} --}}
    {{-- {{ dd($expedientes->nextPageUrl());  }} --}}
    {{-- {{ dd($expedientesProfesional);  }} --}}


@section('contenido')

    

    <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <h2 class="col-lg-10 col-md-10 col-sm-10 col-xs-10"><strong>Expedientes</strong></h2>
        
        <br>
        {{-- <a href={{route('expedientes.create')}} class="btn btn-success col-lg-2 col-md-2 col-sm-2 col-xs-2" style="font-weight: bold; font-size: 130%; color: black" title="Registrar Nuevo Expediente"> --}}
            NUEVO
        {{-- </a> --}}

        <br> <br>

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

    </div>          {{-- row page title --}}
    


    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" name="filtros" style="font-size: 110%">      {{-- este div termina en linea 334 (aprox), dado que hay muchos filtros en esta pagina --}}

        {{--  <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12" name="filtros"> --}}

            {{-- {!! Form::open(array('url'=>'expedientes/search','method'=>'post','autocomplete'=>'off', 'style'=>'display:inline', 'id' =>'form_filtros' )) !!}
            {{ Form::token() }}
            {{csrf_field()}} --}}

            {{-- <form class="form" action=""> --}}

            <br> 
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">

                <label for="">Número Expediente</label>
                <select name="expediente_numero" id="expedientesNumeros" class="form-control">
                    <option value="" selected disabled>--Seleccione--</option>
                    {{-- @foreach ($expedientesNumeros as $expedienteNumero) --}}
                        {{-- <option value="{{$expedienteNumero->expediente_numero}}">{{$expedienteNumero->expediente_numero}}</option> --}}
                    {{-- @endforeach --}}

                </select>

            </div>






            @can('Ver filtro de Profesional en el indice de expedientes')
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">

                <label for="">Profesional</label>
                <select name="profesional" id="profesionales" class="form-control">

                    <option value="" selected disabled>--Seleccione--</option>
                    {{-- @foreach ($profesionales as $profesional) --}}
                        <option value="{{$profesional->id}}">{{$profesional->profesional_nombres}} {{$profesional->profesional_apellidos}} ({{$profesional->profesional_numero_matricula}})</option>
                    {{-- @endforeach --}}

                </select>

            </div>
            @endcan








            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">

                <label for="">Propietario</label>
                <select name="propietario" id="propietarios" class="form-control">

                    <option value="" selected disabled>--Seleccione--</option>
                    @foreach ($propietarios as $propietario)
                        <option value="{{$propietario->id}}">{{$propietario->propietario_nombres}} {{$propietario->propietario_apellidos}} ({{$propietario->propietario_cuit}})</option>
                    @endforeach

                </select>

            </div>


            @can('Tiene el bache del espacio vacio en la interfaz de expediente index porque no ve el filtro de Profesional. (Permiso [temporal] para profesionales)')

            {{-- para tapar el espacio vacío que tiene el index del profesional --}}
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"></div>

            <br> <br> 

            @endcan



            <br> <br> 


            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">

                <label for="">Tipologia</label>
                <select name="tipologia" id="tipologias" class="form-control">
                    <option value="" selected disabled>--Seleccione--</option>
                    @foreach ($tipologias as $tipologia)
                        <option value="{{$tipologia->tipologia_id}}">{{$tipologia->tipologia}}</option>
                    @endforeach

                </select>

            </div>







            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">

                <label for="">Tarea Profesional</label>
                <select name="tipo_tarea" id="tipos_tareas" class="form-control" {{-- data-default-value="empty" --}}>

                    <option value="" selected="selected">--Seleccione--</option>
                    @foreach ($tipos_tareas as $tipo_tarea)
                        <option value="{{$tipo_tarea->tipo_tarea_id}}">{{$tipo_tarea->tipo_tarea}}</option>
                    @endforeach

                </select>

            </div>






            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">

                <label for="">Localidad</label>
                <select name="localidad" id="localidades" class="form-control">

                    <option value="" selected disabled>--Seleccione--</option>
                    @foreach ($localidades as $localidad)
                        <option value="{{$localidad->localidad_id}}">{{$localidad->localidad}}</option>
                    @endforeach

                </select>

            </div>

    </div>



    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"  style="font-size: 110%">

            <br> 

            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">

                <label for="">Estado</label>
                <select name="estado" id="estados" class="form-control">

                    <option value="" selected disabled>--Seleccione--</option>
                    @foreach ($estados as $estado)
                        <option value="{{$estado->estado_id}}">{{$estado->estado}}</option>
                    @endforeach

                </select>

            </div>




            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">

                <label for="">Condicion</label>
                <select name="condicion" id="condiciones" class="form-control">

                    <option value="" selected disabled>--Seleccione--</option>
                    @foreach ($condiciones as $condicion)
                        <option value="{{$condicion->condicion_id}}">{{$condicion->condicion}}</option>
                    @endforeach

                </select>

            </div>



            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">

                <label for="">Objeto</label>
                <select name="objeto" id="objetos" class="form-control">

                    <option value="" selected disabled>--Seleccione--</option>
                    @foreach ($objetos as $objeto)
                        <option value="{{$objeto->objeto_id}}">{{$objeto->objeto}}</option>
                    @endforeach

                </select>

                <br><br>

            </div>




            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">

                <div class="form-group">
                    <label>Desde</label>
                    <input type="date" id="min" name="fecha1" value="" class="form-control">
                </div>

            </div>



            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">

                <div class="form-group">
                    <label>Hasta</label>
                    <input type="date" id="max" name="fecha2" value="" class="form-control">
                </div>
            </div>



            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">

                <br>
                <div class="form-group">
                        {{-- {{ Form::submit('Filtrar', ["class" => "btn btn-primary btn-block"])}} --}}
                        <button type="submit" class="btn btn-primary btn-block">Filtrar</button>
                </div>

            </div>



            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">

                <br>
                <button type="reset" class="btn btn-secondary btn-block" id="limpiar" onclick="limpiarCampos()">
                    Limpiar 
                </button>

            </div>

            {{-- </form> --}}
            {{-- {!!Form::close()!!} --}}

    </div>


    <div class="row col-lg-6 col-md-6 col-sm-6 col-xs-6" name="filtros">

        <br>

    </div> {{-- row - filtros --}}




    <div class="row" style="min-height: 75vh;">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

            <br> 


            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" style="font-size: 120%">
                    <thead>

                        <th class="bg-primary text-right">NÚMERO <br> EXPEDIENTE</th>

                        @can('Ver tabla de expedientes en el indice de expedientes como Administrativo')
                            <th class="bg-primary text-left">PROFESIONAL</th>
                        @endcan

                        <th class="bg-primary text-left">PROPIETARIO</th>
                        <th class="bg-primary text-left">FECHA INICIO</th>
                        <th class="bg-primary text-left">TIPOLOGÍA</th>
                        <th class="bg-primary text-left">TAREA</th>
                        <th class="bg-primary text-left">OPCIONES</th>
                        <th class="bg-primary text-left">CONDICIÓN</th>

                    </thead>

                        @forelse ($expedientes as $expt)

                            <tr>

                                {{-- <td>{{$expt->expediente_id}}</td> --}}
                                @can('Ver tabla de expedientes en el indice de expedientes como Administrativo')
                                <td class="text-right" style="font-weight: bold; background-color:


                                    @switch($expt->prioridad_administracion)

                                        @case(1)

                                            #ff0000;
                                            @break

                                        @case(2)

                                            #ff6666;
                                            @break

                                        @case(3)

                                            #ffb3b3;
                                            @break 
                            
                                    @endswitch

                                ">
                                @endcan


                                @can('Ver tabla de expedientes en el indice de expedientes como Profesional')
                                <td class="text-right" style="font-weight: bold; background-color:


                                    @switch($expt->prioridad_profesional)

                                        @case(1)

                                            #ff0000;
                                            @break

                                        @case(2)

                                            #ff6666;
                                            @break

                                        @case(3)

                                            #ffb3b3;
                                            @break 
                            
                                    @endswitch

                                ">
                                @endcan


                                    {{$expt->expediente_numero}}
                                </td>


                                @can('Ver tabla de expedientes en el indice de expedientes como Administrativo')
                                    <td>{{$expt->profesional_nombres}} {{$expt->profesional_apellidos}}</td>
                                @endcan


                                <td>{{$expt->propietario_nombres}} {{$expt->propietario_apellidos}}</td>


                                <td>{{\Carbon\Carbon::createFromTimestamp(strtotime($expt->fecha_inicio))->format('d-m-Y  H:i:s')}}</td>

                                <td>{{$expt->tipologia}}</td>


                                <td>{{$expt->tipo_tarea}}</td>

                                {{-- <td>{{$expt->partida_inmobiliaria}}</td> --}}



                                <td> {{-- Botones --}}
                                    <a href="{{route('expedientes.show', ['id' => $expt->expediente_id])}}">
                                        <button  class="btn btn-success"> <i class="fa fa-eye"></i></button>
                                    </a>

                                    @if ($expt->condicion_id == config('app.formulario_a_revisar'))
                                        <a href="{{route('expedientes.edit', ['id' => $expt->expediente_id])}}">
                                            <button class="btn btn-info"> <i class="fa fa-pencil"></i></button>
                                        </a>    
                                    @endif
                                    

                                    @if ($expt->condicion_id >= config('app.cerrado') && $expt->condicion_id <= config('app.cerrado_con_dir_obra_finalizado'))
                                        {{-- {!! Form::open(array('url'=>'expedientes','method'=>'post','autocomplete'=>'off', 'files'=>true, 'style'=>'display:inline')) !!}
                                        {{ Form::token() }} --}}
                                        {{-- @method('GET') --}}
                                        {{-- {{csrf_field()}} --}}

                                            {{-- <div class="form-group row col-lg-12 col-sm-12 col-md-12 col-xs-12"> --}}
                                            <form method="post" enctype="multipart/form-data" 
                                            action="{{route('expedientes.descargarCertificado', ['id' => $expt->expediente_id])}}" class="d-inline">
                                                @csrf
                                            
                                                <a href="{{route('expedientes.descargarCertificado', ['id' => $expt->expediente_id])}}" {{-- data-target="#modal-DescargarComprobantePago{{$expediente->expediente_id}}" data-toggle="modal" --}}>
                                                    <button  type="submit" class="btn btn-danger d-inline" formaction="{{url('/expedientes/descargarCertificado', ['id' => $expt->expediente_id])}}">
                                                        <i class="fa fa-file-pdf-o"></i>
                                                    </button>
                                                </a>

                                                {{-- <br><br> --}}
                                            
                                            </form>
                                            {{-- </div> <!-- .form-group row -->      --}}
                                        
                                        {{-- {!!Form::close()!!}    --}}
                                    @endif


                                    {{-- <a href="" data-target="#modal-delete-{{$expt->expediente_id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a> --}}
                                </td>  


                                <td>{{$expt->condicion_short}}</td>


                            </tr>
                    @empty 
                        
                    <h3><strong>Sin expedientes actualmente o coincidencias con la búsqueda</strong></h3>

                    @endforelse


                        
                </table>
            </div> {{-- table --}}

        </div> {{-- col --}}

    </div> {{-- row --}}




    {{-- <!-- para paginar --> --}}
    {{-- paginator from https://readintrend.com/www.codegrepper.com/code-examples/php/laravel+paginator --}}
    
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
        
            @php
                $link_limit = 10;
            @endphp

            @if ($expedientes->lastPage() > 1)
                <ul class="pagination">
                    <li class="{{ ($expedientes->currentPage() == 1) ? ' disabled' : '' }}">
                        <a href="{{ $expedientes->url(1) }}">Primero</a>
                    </li>
                    @for ($i = 1; $i <= $expedientes->lastPage(); $i++)
                        <?php
                        $half_total_links = floor($link_limit / 2);
                        $from = $expedientes->currentPage() - $half_total_links;
                        $to = $expedientes->currentPage() + $half_total_links;
                        if ($expedientes->currentPage() < $half_total_links) {
                            $to += $half_total_links - $expedientes->currentPage();
                        }
                        if ($expedientes->lastPage() - $expedientes->currentPage() < $half_total_links) {
                            $from -= $half_total_links - ($expedientes->lastPage() - $expedientes->currentPage()) - 1;
                        }
                        ?>
                        @if ($from < $i && $i < $to)
                            <li class="{{ ($expedientes->currentPage() == $i) ? ' active' : '' }}">
                                <a href="{{ $expedientes->url($i) }}">{{ $i }}</a>
                            </li>
                        @endif
                    @endfor
                    <li class="{{ ($expedientes->currentPage() == $expedientes->lastPage()) ? ' disabled' : '' }}">
                        <a href="{{ $expedientes->url($expedientes->lastPage()) }}">Último</a>
                    </li>
                </ul>
            @endif
            
        </div>
    
    
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 text-center">
        
            @if ($expedientes->total() < $expedientes->PerPage())
                <h3> Mostrando {{$expedientes->total()}} de {{$expedientes->total()}} registros </h3>
        
            @else 
        
                <h3> Mostrando {{$expedientes->perPage()}} de {{$expedientes->total()}} registros </h3>
        
            @endif
        
        </div>
    
    </div>





@endSection





@section('jsScripts')


<script type="text/javascript">

    function limpiarCampos(){
        $form_filtros = document.getElementById("form_filtros"); 
        $form_filtros.reset();
    }        
</script>



<script>
    $(document).ready(function() {

        $('#limpiar').click(function(){
            $("#tipos_tareas").val($("#tipos_tareas").data("default-value"));
        }) ;
            

        $("#tipos_tareas").data("default-value", $("#tipos_tareas").val())

    })
    
</script>


@endSection








<!-- SELECT2 -->


@push('scripts')






<script type="text/javascript">
    
    document.getElementById("myForm").reset(); 

</script>





<script>
    $('#expedientesNumeros').select2();        
    $('#profesionales').select2();        
    $('#propietarios').select2();        
    $('#tipologias').select2();        
    $('#tipos_tareas').select2();        
    $('#estados').select2();        
    $('#condiciones').select2();        
    $('#objetos').select2();        
    $('#localidades').select2();        
</script>






@endpush


