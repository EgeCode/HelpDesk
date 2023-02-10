<div>
    <div class="container">
        @if(Session::has('success'))
        <div class="alert alert-success my-2 text-center">
            <strong>Listo!</strong> {{Session::get('success')}}
        </div>
        @endif
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header bg-secondary text-white">
                        <div class="card-title">Usuarios</div>
                    </div>
                    <div class="card-body">
                        <input type="search" name="search" id="search" wire:model="search" class="form-control form-control-sm mb-2" placeholder="Buscar..." autofocus>
                        <div style="overflow: auto; max-height:65vh">
                            <table class="table table-sm small">
                                <thead class="text-white">
                                    <th>Usuario</th>
                                    <th>Nombre</th>
                                    <th>Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach($users as $item)
                                    <tr>
                                        <td>{{$item->username}}</td>
                                        <td>{{$item->name.' '.$item->lastname}}</td>
                                        <td>
                                            <a href="#" title="Editar" wire:click.prevent="edit({{$item->id}})"><i class="fa fa-pencil"></i></a> &nbsp;&nbsp;|&nbsp;&nbsp;
                                            <a href="#" title="Eliminar" class="text-danger delete" data-id="{{$item->id}}"><i class="fa fa-minus-circle"></i></a> &nbsp;&nbsp;|&nbsp;&nbsp;
                                            <a href="{{route('roles', $item->id)}}" title="Asignar permisos" class="text-muted"><i class="fa fa-unlock"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="card-footer">
                        {{$users->links()}}
                    </div>
                </div>

            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header bg-secondary text-white">
                        @if(!$editarRegistro)
                        <div class="card-title">Nuevo usuario</div>
                        @else
                        <div class="card-title">Editar usuario</div>
                        @endif
                    </div>
                    <div class="card-body">
                        @error('exist')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                        <div>
                            <label for="nombre">Nombre</label>
                            <input type="text" wire:model="nombre" class="form-control" name="nombre" id="nombre">
                        </div>
                        @error('nombre')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                        <div>
                            <label for="apellido">Apellido</label>
                            <input type="text" wire:model="apellido" class="form-control" name="apellido" id="apellido">
                        </div>
                        @error('apellido')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                        <div>
                            <label for="usuario">Usuario</label>
                            <input type="text" wire:model="usuario" class="form-control" name="usuario" id="usuario">
                        </div>
                        @error('usuario')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                        <div>
                            <label for="password">Password</label>
                            <input type="password" wire:model="password" class="form-control" name="password" id="password">
                        </div>
                        @error('password')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                        <div>
                            <label for="confirmaPass">Confirma password</label>
                            <input type="password" wire:model="confirmaPassword" class="form-control" name="confirmaPass" id="confirmaPass">
                        </div>
                        @error('confirmaPassword')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                        @error('nomatch')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                        @if(!$editarRegistro)
                        <button class="btn btn-primary mt-2" wire:click="store"><i class="fa fa-save"></i> Guardar</button>
                        @else
                        <button class="btn btn-primary mt-2" wire:click="update"><i class="fa fa-save"></i> Guardar</button>
                        <button class="btn btn-light mt-2" wire:click="cancel"><i class="fa fa-times"></i> Cancelar</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('custom-scripts')
    <script>
        $(document).on('click', '.delete', function(e) {
            e.preventDefault()
            if (confirm('¿Estas seguro de eliminar el usuario?')) {
                let id = $(this).data('id')
                Livewire.emit('delete', id)
            }

        })
    </script>
    @endpush
</div>