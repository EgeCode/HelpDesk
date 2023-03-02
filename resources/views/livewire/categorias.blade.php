<div>
    <div class="card">
        <div class="card-body">
            <label for="nombre">Nueva categoría</label>
            <div class="input-group mb-2">
                <input type="text" class="form-control" id="nombre" wire:model="nombre" placeholder="Nombre">
                <div class="input-group-append">
                    <button class="btn btn-secondary" wire:click="store()"><i class="fa fa-save"></i> Guardar</button>
                </div>
            </div>
            @error('nombre')
            <small class="text-danger">{{$message}}</small>
            @enderror
            <hr>
            <label for="">Categorias registrados</label>
            <table class="table table-sm small">
                <thead>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </thead>
                <tbody>

                    @foreach($categorias as $categoria)
                    <tr>
                        <td>{{$categoria->name}}</td>
                        <td></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                {{$categorias->links()}}
            </div>
        </div>
    </div>
</div>