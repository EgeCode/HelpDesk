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
        @if (count($tickets) > 0)
        <div class="row">
            <div class="col-lg-12">
                <div class="card" id="card-tickets" style="max-height:80vh;">
                    <div class="card-header bg-secondary text-white">
                        Tickets
                    </div>
                    <div class="card-body p-0">
                        {{-- Tabla de tickets --}}
                        <div wire:init="loadTickets">
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
                                        <th class="text-center">Copiar</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($tickets as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td style="width:1200px; white-space:nowrap"">
                                                <a title="Ir a detalles del ticket" href="{{route('tickets.editar', $item->id)}}">{{ substr($item->tema, 0, 50) }}</a>
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
                                            <td class="text-center">
                                                <a href="#" class="btn btn-link" wire:click.prevent="$emitTo('nuevo-ticket','copy',{{$item->id}})" title ="Crear una copia del ticket"><i class="fa fa-copy"></i></a>
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


                        </div>
                        {{-- ./tabla de tickets --}}
                    </div>
                    <div class="card-footer">
                        {{ $tickets->links() }}
                    </div>
                </div>

            </div>

        </div>
        @else
        <hr>
        <h5>NO SE ENCONTRARON TICKETS</h5>
        @endif
    </div>
    <br>

    <!-- boton para crear tickets -->
    <button id="btn-nuevo-ticket" class="btn btn-primary mr-4 mb-4 rounded-circle" title="Nuevo Ticket" data-toggle="tooltip" style="position: absolute; bottom:0; right:0;"><i class="fa fa-plus"></i></button>
    <!-- ./boton para crear tickets -->

    <!-- Modal para nuevos tickets -->
    <livewire:nuevo-ticket></livewire:nuevo-ticket>
    <!-- ./modal para nuevos tickets -->

    @push('custom-scripts')
    <script>
        $(document).ready(function() {

            $(document).on('click', '#btn-nuevo-ticket', function() {
                $('#mod-nuevo-ticket').modal('show')
                setTimeout(() => {
                    $("#tema").focus()
                }, 200);
            })

            $(document).on('copied', function() {
                
                $('#mod-nuevo-ticket').modal('show')
               
            })

            $(document).on('click', '.btnClose', function() {
                $('#mod-nuevo-ticket').modal('hide')
            })
        })

        document.addEventListener('closeModal', function() {
            $('#mod-nuevo-ticket').modal('hide')
        })

        $('#mod-nuevo-ticket').on('hidden.bs.modal', function(){
            Livewire.emitTo('nuevo-ticket', 'restore')
        })
    </script>
    @endpush

</div>