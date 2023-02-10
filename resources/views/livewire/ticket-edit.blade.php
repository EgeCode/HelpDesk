<?php

use Carbon\Carbon; ?>
<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                @if (Session::has('success'))
                <div class="alert alert-success text-center" role="alert">
                    <strong>Listo!</strong> {{Session::get('success')}} <strong><u>{{Session::get('msg')}}</u></strong>
                </div>
                @endif
            </div>
            <div class="col-lg-8">


                <div class="card direct-chat" style="max-height: 80vh;">
                    <div class="card-header bg-secondary text-white" style="text-shadow: 1px 1px 2px gray;">
                        <h5>Ticket #{{ $ticketEdit->id }} .- {{ $ticketEdit->tema }}</h5>
                    </div>
                    <!-- /.card-header -->
                    <div id="body-messages" class="card-body" style="height:65vh; max-height:60vh; overflow:scroll">

                        <!-- Conversations are loaded here -->
                        <div class="direct-chat-messages">

                            @if (count($seguimientos) > 0)
                            @foreach ($seguimientos as $item)
                            <!-- Message. Default to the left -->
                            <div class="direct-chat-msg">

                                <div class="direct-chat-infos clearfix small">
                                    <span class="direct-chat-name float-left"><strong>{{$item->nombre_usuario}}</strong></span>
                                    <span class="direct-chat-timestamp float-right small text-muted">
                                        {{Carbon::parse($item->created_at)->format('d/m/Y h:i:s A');}}
                                    </span>
                                </div>

                                <!-- /.direct-chat-infos -->
                                {{-- <img class="direct-chat-img" src="#"
                                            alt="message user image"> --}}
                                <!-- /.direct-chat-img -->

                                @if($item->file != "")
                                <div style=" white-space: pre-wrap;"><a href="{{asset('storage/documents').'/'. explode('/',$item->file)[2]}}" target="_blank"><i class="fa fa-paperclip"></i> {{$item->notas}} </a></div>
                                <hr>
                                @else
                                <div class="small" style=" white-space: pre-wrap;">{{$item->notas}}</div>
                                <hr>
                                @endif


                                <!-- /.direct-chat-text -->
                            </div>
                            <!-- /.direct-chat-msg -->
                            @endforeach


                            @endif


                        </div>
                        <!--/.direct-chat-messages-->

                        <!-- /.direct-chat-pane -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">

                        <div class="d-flex align-items-end">

                            <label for="archivoAdjunto" class="mr-2" style="cursor: pointer;" title="Adjuntar archivo">
                                <i class="fa fa-paperclip fa-2x"></i>
                                <input type="file" class="d-none" name="archivoAdjunto" id="archivoAdjunto" wire:model="archivoAdjunto">
                            </label>

                            <div class="input-group">
                                <textarea name="message" id="message" class="form-control" rows="1" placeholder="Escribe tus notas aquí..." wire:model="message"></textarea>
                                <span class="input-group-append">
                                    <button type="button" class="btn btn-secondary" wire:click="storeNotas">Enviar</button>
                                    <div class="dropdown">
                                        <button class="btn btn-light dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                            Status
                                        </button>
                                        <div class="dropdown-menu">
                                            @if($status != 'Abierto')
                                            <a class="dropdown-item" href="#" wire:click.prevent ="saveStatus('Abierto')">Abrir ticket</a>
                                            @else
                                            <a class="dropdown-item" href="#" wire:click.prevent ="saveStatus('Cerrado')">Cerrar ticket</a>    
                                            @endif
                                            <a class="dropdown-item" href="#" wire:click.prevent ="saveStatus('Pendiente')">Pendiente</a>
                                            <a class="dropdown-item" href="#" wire:click.prevent ="saveStatus('Cancelado')">Cancelar</a>
                                        </div>
                                    </div>
                                </span>
                            </div>

                        </div>


                        <span style="font-size: 12px" wire:loading wire:targe='archivoAdjunto'>
                            <img src="{{asset('img')}}/loading.gif" alt="cargando..." style="height: 25px; width:25px;"> Cargando...
                        </span>
                        {{-- Mostrar archivo que vamos a subir --}}
                        @if($archivoAdjunto)
                        <span style="color:#012E69"><strong>{{$archivoAdjunto->getClientOriginalName()}}</strong></span>
                        @endif
                        &nbsp;&nbsp;
                        {{-- Borrar archivo adjunto --}}
                        @if($archivoAdjunto)
                        <span style="cursor: pointer;" class="text-secondary" title="Eliminar archivo" wire:click="clearAtt"><i class="fa fa-times"></i></span>
                        @endif

                        @error('archivoAdjunto')
                        <small class="text-danger">{{$message}}</small>
                        @enderror

                    </div>
                    <!-- /.card-footer-->
                </div>
                <!--/.direct-chat -->




























            </div>
            <div class="col-lg-4">
                
                {{-- Formulario para editar los tickets --}}
                <div class="card mt-2" style="max-height: 80vh;">
                    <div class="card-header bg-secondary text-white">
                        Datos ticket
                    </div>
                    <div class="card-body" style="max-height:60vh;overflow:auto;padding-top:0px;">
                        <!-- <div class="btn-group w-100 sticky-top mb-3" role="group" aria-label="Basic example">
                            @if ($status != 'Abierto')
                            <button type="button" class="btn btn-success" wire:click="saveStatus('Abierto')">Abrir</button>
                            @else
                            <button type="button" class="btn btn-dark" wire:click="saveStatus('Cerrado')">Cerrar </button>
                            @endif
                            <button type="button" class="btn btn-warning" wire:click="saveStatus('Pendiente')">Pendiente</button>
                            <button type="button" class="btn btn-danger" wire:click="saveStatus('Cancelado')">Cancelar</button>
                        </div> -->
                        <div class="d-flex flex-column">
                            <label for="tema">Tema</label>
                            <input type="text" name="tema" id="tema" wire:model="tema" class="form-control">
                            @error('tema')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="d-flex flex-column">
                            <label for="quien_reporta">Quien reporta</label>
                            <input type="text" name="quien_reporta" id="quien_reporta" wire:model="quien_reporta" class="form-control">
                            @error('quien_reporta')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="d-flex flex-column">
                            <label for="telefono">Teléfono</label>
                            <input type="tel" name="telefono" id="telefono" wire:model="telefono" class="form-control">
                            @error('telefono')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="d-flex flex-column">
                            <label for="departamento">Departamento</label>
                            <input type="text" name="departamento" id="departamento" wire:model="departamento" class="form-control">
                            @error('departamento')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="d-flex flex-column">
                            <label for="usuario_red">Usuario de red</label>
                            <input type="text" name="usuario_red" id="usuario_red" wire:model="usuario_red" class="form-control">
                        </div>
                        <div class="d-flex flex-column">
                            <label for="ip">IP</label>
                            <input type="text" name="ip" id="ip" wire:model="ip" class="form-control">
                            @error('ip')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="d-flex flex-column">
                            <label for="edificio">Edificio</label>
                            <input type="text" name="edificio" id="edificio" wire:model="edificio" class="form-control">
                        </div>




                        <div class="d-flex flex-column">
                            <label for="autoriza">Autoriza</label>
                            <input type="text" name="autoriza" id="autoriza" wire:model="autoriza" class="form-control">
                        </div>

                        <div class="d-flex flex-column">
                            <label for="categoria">Categoría</label>
                            <select type="text" name="categoria" id="categoria" wire:model="categoria" class="form-control">
                                <option value="">---Selecciona una opción---</option>
                                @foreach ($categorias as $item)
                                <option>
                                    {{ $item->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-flex flex-column">
                            <label for="asignado">Asignar a</label>
                            <select name="asignado" id="asignado" wire:model="asignado" class="form-control">
                                <option value="">---Selecciona una opción---</option>
                                @foreach ($usuarios as $item)
                                <option value="{{ $item->id }}">{{ $item->name .' '. $item->lastname }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-flex flex-column">
                            <label for="prioridad">Prioridad</label>
                            <select name="prioridad" id="prioridad" wire:model="prioridad" class="form-control">
                                <option>Baja</option>
                                <option>Media</option>
                                <option>Alta</option>
                            </select>
                        </div>



                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary mt-2" wire:click="update">Guardar</button>
                    </div>
                </div>
                {{-- ./formulario para editar ticket --}}
            </div>
        </div>
    </div>
@push('custom-scripts')
    <script>
        document.addEventListener('scrollingBottom', function() {
            var offsetHeight = document.getElementById('body-messages').scrollHeight;
            document.getElementById("body-messages").scrollTop = offsetHeight
        })
    </script>
@endpush
</div>