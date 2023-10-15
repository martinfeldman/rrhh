    
    {{-- {{dd($expediente)}} --}}


    {{-- {{dd($users, $userSelected, $roles)}} --}}
    
    {{-- {{dd($permisosAdministrativo, $permisosUnicosSupervisor, $permisosProfesional)}} --}}





    
    <div id="modal-mi-perfil" class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-15" >



        <div class="modal-dialog" role="document" {{-- style="width: 70%;" --}}>

            <div class="modal-content">


                <div class="modal-header text-center">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> x </span>    
                    </button>

                    <h4 class="modal-title">Editar mi perfil</h4> 
            
                </div>                  {{-- modal-header --}}



                <div class="modal-body" {{-- style="min-height:70vh" --}}>
                    

                    {{-- {{ Form::open(array('action'=> array('App\Http\Controllers\UsuarioController@update', Auth()->user()->id), 'method'=>'patch' )) }}
                    {{ Form::token() }}
                    {{csrf_field()}} --}}

                    <div class="row">

                        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                            
                            <div class="form-group" name="nombres">
                            
                                <label for="nombres">NOMBRES</label>           
        
                                <input type="text" name="nombres" class="form-control" placeholder="Nombres"
                                value="{{ null !== old('nombres') ? old('nombres') : Auth()->user()->name }}">   
        
                            </div> 
                        </div>
                        
        
        
                        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
        
                            <div class="form-group" name="apellidos">
                                
                                <label for="apellidos">APELLIDOS</label> <br>
        
                                <input type="text" name="apellidos" class="form-control" placeholder="Apellidos"
                                value="{{ null !== old('apellidos') ? old('apellidos') : Auth()->user()->last_name }}">   
        
                            </div>       
        
                        </div>



                        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                        
                            <div class="form-group" name="cuit">
                            
                                <label for="cuit">CUIT</label> <br>
                            
                                <input type="text" name="cuit" class="form-control" placeholder="Cuit"
                                value="{{ null !== old('cuit') ? old('cuit') : Auth()->user()->cuit }}"> 
                            
                            </div>       
                        
                        </div>


                        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                        
                            <div class="form-group" name="email">
                            
                                <label for="email">EMAIL</label> <br>
                            
                                <input type="text" name="email" class="form-control" placeholder="Email"
                                value="{{ null !== old('email') ? old('email') : Auth()->user()->email }}"> 
                            
                            </div>       
                        
                            <span>Recuerde que con el mail se identifica al ingresar.</span>

                        </div>
                            

                    </div>      {{-- row --}}

                                

                </div> {{-- modal-body --}}



                <div class="modal-footer">
                    <br> <br>
                    
                    <button type="submit" class="btn btn-success col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        Confirmar
                    </button>

                    {{-- {{ Form::Close() }} --}}
                    
                    <button type="button" class="btn btn-danger col-lg-5 col-md-5 col-sm-5 col-xs-5" data-dismiss="modal">
                        Cancelar
                    </button>

                </div>  {{-- modal-footer --}}

                

            </div>      {{-- modal-content --}}

        </div>          {{-- modal-dialog --}}




    </div> {{-- modal --}}




