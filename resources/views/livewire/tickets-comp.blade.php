<?php

use Carbon\Carbon; ?>
<div>
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                @if (Session::has('success'))
                <div class="alert alert-success mt-2 text-center" role="alert">
                    <strong>Listo!</strong> {{ Session::get('success') }}
                </div>
                @endif
                @error('email_no_send')
                <div class="text-danger mb-2">
                    <strong>ALGO SALIO MAL</strong>
                    <small>{{$message}}</small>
                </div>
                @enderror

                <div>
                    <label for="filtro_status">Status</label>
                    <select name="filtro_status" id="filtro_status" wire:model="filtro_status">
                        <option>ABIERTO</option>
                        <option>CERRADO</option>
                        <option>PENDIENTE</option>
                        <option>CANCELADO</option>
                    </select>
                    <label for="search">Buscar</label>
                    <input type="search" id="search" name="search" wire:model="search" style="border-radius: 3px; outline: none; border: 1px solid gray;">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card" id="card-tickets" style="max-height:80vh;">
                    <div class="card-header bg-secondary text-white">
                        Tickets
                    </div>
                    <div class="card-body p-0">
                        {{-- Tabla de tickets --}}
                        <div wire:init="loadTickets">
                            @if (count($tickets) > 0)
                            @if ($readyToLoad)

                            <div id="content-tickets" style="max-height:60vh; overflow: auto">

                                <table id="table-tickets" class="table table-sm table-hover small">
                                    <thead class="sticky-top bg-primary text-white">
                                        <th>ID</th>
                                        <th style="width:1200px; white-space:nowrap">Tema</th>
                                        <th>Reporta</th>
                                        <th>Asignado</th>
                                        <th>Creador</th>
                                        <th>Prioridad</th>
                                        <th>Categoria</th>
                                        <th>IP</th>
                                        <th>Status</th>
                                        <th>Telefono</th>
                                        <th>Creado</th>
                                        <th>Actualizado</th>
                                        <th style="width:450px; white-space:nowrap">Dpto</th>
                                        <th>Edificio</th>

                                        <th style="width:250px; white-space:nowrap">Usuario de red</th>
                                        <th>Autoriza</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($tickets as $item)
                                        <tr wire:click="goEdit({{ $item->id }})">
                                            <td>{{ $item->id }}</td>
                                            <td style="width:1200px; white-space:nowrap">
                                                {{ substr($item->tema, 0, 50) }}
                                            </td>
                                            <td>{{ $item->reporta }}</td>
                                            <td>{{ $item->asignado }}</td>
                                            <td style="width:700px">{{ $item->creador }}</td>
                                            <td>{{ $item->prioridad }}</td>
                                            <td>{{ $item->categoria }}</td>
                                            <td>{{ $item->ip }}</td>
                                            <td>{{ $item->status }}</td>
                                            <td style="width:250px; white-space:nowrap">
                                                {{ $item->telefono }}
                                            </td>
                                            <td style="width:250px; white-space:nowrap">
                                                {{ Carbon::parse($item->created_at)->diffForHumans() }}
                                            </td>
                                            <td style="width:250px; white-space:nowrap">
                                                {{ Carbon::parse($item->updated_at)->diffForHumans() }}
                                            </td>
                                            <td style="width:450px; white-space:nowrap">
                                                {{ $item->departamento }}
                                            </td>
                                            <td style="width:200px; white-space:nowrap">
                                                {{ $item->edificio }}
                                            </td>

                                            <td>{{ $item->usuario_red }}</td>
                                            <td style="width:600px; white-space:nowrap">
                                                {{ $item->autoriza }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>

                            @else
                            <div class="d-flex align-items-center" style="padding: 10px;">
                                <div class="spinner-border text-info" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                &nbsp;&nbsp;
                                <div>Cargando tickets...</div>
                            </div>

                            @endif
                            @endif

                        </div>
                        {{-- ./tabla de tickets --}}
                    </div>
                    <div class="card-footer">
                        {{ $tickets->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
    <br>

    <!-- boton para crear tickets -->
        <button id="btn-nuevo-ticket" class="btn btn-primary mr-4 mb-4 rounded-circle" title="Nuevo Ticket" data-toggle="tooltip" style="position: absolute; bottom:0; right:0;"><i class="fa fa-plus"></i></button>
    <!-- ./boton para crear tickets -->


    <div id="mod-nuevo-ticket" class="modal" tabindex="-1" wire:ignore>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header  bg-secondary text-white">
                    <h5 class="modal-title">Nuevo ticket</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="max-height: 65vh; overflow: auto;">
                        <div class="d-flex flex-column">
                            <label for="tema">Tema</label>
                            <input type="text" name="tema" id="tema" wire:model="tema" class="form-control">
                            @error('tema')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="d-flex flex-column">
                            <label for="descripcion">Descripción</label>
                            <textarea type="text" name="descripcion" id="descripcion" wire:model="descripcion" class="form-control" rows="5"></textarea>
                            @error('descripcion')
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
                            <label for="telefono">Teléfono / EXT</label>
                            <input type="tel" name="telefono" id="telefono" wire:model="telefono" class="form-control">
                            @error('telefono')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="d-flex flex-column">
                            <label for="edificio">Edificio</label>
                            <select class="form-control" name="edificio" id="edificio" wire:model="edificio">
                                <option value="">---Selecciona una opción---</option>
                                @foreach ($edificios as $item)
                                    <option>{{$item->nombre}}</option>
                                @endforeach
                            </select>
                            <!-- <input type="text" name="edificio" id="edificio" wire:model="edificio" class="form-control"> -->
                        </div>

                        <div class="d-flex flex-column">
                            <label for="departamento">Departamento</label>
                            <select class="form-control" name="departamento" id="departamento" wire:model="departamento">
                                <option value="">---Selecciona una opción---</option>
                                @foreach ($departamentos as $item)
                                    <option>{{$item->nombre}}</option>
                                @endforeach
                            </select>
                            <!-- <input type="text" name="departamento" id="departamento" wire:model="departamento" class="form-control"> -->
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
                                <option value="{{ $item->id }}">{{ $item->name . ' ' . $item->lastname }}
                                </option>
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

                        <div>
                            <div class="d-flex flex-row align-items-center">
                                <label for="attach" class="mr-3">Archivo adjunto </label>
                                <div wire:loading wire:target="attachment">
                                    <p style="font-size: 11px"><img style="height: 20px; width:20px;" src="{{ asset('img') }}/loading.gif" alt="cargando..."> Cargando...</p>
                                </div>
                            </div>
                            <input type="file" name="attach" id="attach" wire:model="attachment" class="form-control">
                        </div>
                        @error('attachment')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror


                </div>
                <div class="modal-footer">
                    <div wire:loading.remove wire:target="store">
                        <button class="btn btn-primary mt-2" wire:click="store">Guardar</button>
                    </div>
                    <div wire:loading wire:target="store">
                        <button class="btn btn-primary btn-block mt-2" type="button" disabled>
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Procesando...
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('custom-scripts')
    <script>
        $(document).ready(function(){
            $(document).on('click','#btn-nuevo-ticket',function(){
                $('#mod-nuevo-ticket').modal('show')
                setTimeout(() => {
                    $("#tema").focus()
                }, 200);
            })
        })

        document.addEventListener('focusTema', function() {
            $('#mod-nuevo-ticket').modal('hide')
            $("#tema").focus()
        })
    </script>
    @endpush

</div>