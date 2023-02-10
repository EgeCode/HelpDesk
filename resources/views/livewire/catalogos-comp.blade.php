<div>
    <style>
        .btn-primary {
            background-color: #24ADF3 !important;
        }
    </style>

    <div class="container">
        <!--Catalogo de edificios  -->
        <div class="accordion mb-2" id="accordionEdificios">
            <div class="card">
                <div class="card-header bg-secondary">

                    <h2 class="mb-0 ">
                        <button class="btn btn-block text-white" style="box-shadow: none;" type="button" data-toggle="collapse" data-target="#collapseOne">
                            <div class="d-flex flex-row align-items-center justify-content-between">
                                <h5 class="text-white">Edificios</h5>
                                <i id="icon-one" class="fa fa-plus"></i>
                            </div>
                        </button>
                    </h2>

                </div>
                <div id="collapseOne" class="collapse " data-parent="#accordionEdificios">
                    <div class="card-body">

                        <label for="nombre_edificio">Agregar nuevo</label>
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" id="nombre_edificio" name="nombre_edificio" wire:model.defer="nombre_edificio" placeholder="Nombre">
                            <div class="input-group-append">
                                <button class="btn btn-primary" wire:click="storeEdificio"><i class="fa fa-save"></i> Guardar</button>
                            </div>
                        </div>
                        @error('nombre_edificio')
                        <div>
                            <small class="text-danger">{{$message}}</small>
                        </div>
                        @enderror


                        <div class="content-table" style=" max-height:250px; overflow: auto;">
                            <table class="table table-hover table-sm small">
                                <thead class="sticky-top">
                                    <th>Nombre</th>
                                    <th class="text-center">Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($edificios as $item)
                                    <tr>
                                        <td>{{$item->nombre}}</td>
                                        <td class="text-center"><a href="#" class="text-danger" title="Eliminar"><i class="fa fa-minus"></i></a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>
            </div>
        </div>

        <!-- Catalogos de Departamentos -->
        <div class="accordion mb-2" id="accordionDeptos">
            <div class="card">
                <div class="card-header bg-secondary">

                    <h2 class="mb-0 ">
                        <button class="btn btn-block text-white" style="box-shadow: none;" type="button" data-toggle="collapse" data-target="#collapseTwo">
                            <div class="d-flex flex-row align-items-center justify-content-between">
                                <h5 class="text-white">Departamentos</h5>
                                <i id="icon-two" class="fa fa-plus"></i>
                            </div>
                        </button>
                    </h2>

                </div>

                <div id="collapseTwo" class="collapse" data-parent="#accordionDeptos">
                    <div class="card-body">

                        <label for="nombre_departamento">Agregar nuevo</label>
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" id="nombre_departamento" name="nombre_departamento" wire:model="nombre_departamento" placeholder="Nombre">
                            <div class="input-group-append">
                                <button class="btn btn-primary" wire:click="storeDepto"><i class="fa fa-save"></i> Guardar</button>
                            </div>
                        </div>
                        @error('nombre_departamento')
                        <div>
                            <small class="text-danger">{{$message}}</small>
                        </div>
                        @enderror

                        <div class="content-table" style=" max-height:250px; overflow: auto;">
                            <table class="table table-hover table-sm small">
                                <thead class="sticky-top">
                                    <th>Nombre</th>
                                    <th class="text-center">Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($departamentos as $item)
                                    <tr>
                                        <td>{{$item->nombre}}</td>
                                        <td class="text-center"><a href="#" class="text-danger" title="Eliminar"><i class="fa fa-minus"></i></a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>
            </div>
        </div>

        <!-- Catalogos de categorias -->
        <div class="accordion" id="accordionCategorias">
            <div class="card">
                <div class="card-header bg-secondary">

                    <h2 class="mb-0 ">
                        <button class="btn btn-block text-white" style="box-shadow: none;" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseTwo">
                            <div class="d-flex flex-row align-items-center justify-content-between">
                                <h5 class="text-white">Categorias</h5>
                                <i id="icon-three" class="fa fa-plus"></i>
                            </div>
                        </button>
                    </h2>

                </div>

                <div id="collapseThree" class="collapse" data-parent="#accordionCategorias">
                    <div class="card-body">

                        <label for="nombre_categoria">Agregar nuevo</label>
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" id="nombre_categoria" name="nombre_categoria" wire:model="nombre_categoria" placeholder="Nombre">
                            <div class="input-group-append">
                                <button class="btn btn-primary" wire:click="storeCategoria"><i class="fa fa-save"></i> Guardar</button>
                            </div>
                        </div>
                        @error('nombre_categoria')
                        <div>
                            <small class="text-danger">{{$message}}</small>
                        </div>
                        @enderror

                        <div class="content-table" style=" max-height:250px; overflow: auto;">
                            <table class="table table-hover table-sm small">
                                <thead class="sticky-top">
                                    <th>Nombre</th>
                                    <th class="text-center">Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($categorias as $item)
                                    <tr>
                                        <td>{{$item->name}}</td>
                                        <td class="text-center"><a href="#" class="text-danger" title="Eliminar"><i class="fa fa-minus"></i></a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>
            </div>
        </div>

    </div>
    @push('custom-scripts')
    <script>
        $('#collapseOne').on('show.bs.collapse', function() {
            $('#icon-one').removeClass('fa-plus')
            $('#icon-one').addClass('fa-minus')
        })
        $('#collapseOne').on('hide.bs.collapse', function() {
            $('#icon-one').removeClass('fa-minus')
            $('#icon-one').addClass('fa-plus')
        })
        $('#collapseTwo').on('show.bs.collapse', function() {
            $('#icon-two').removeClass('fa-plus')
            $('#icon-two').addClass('fa-minus')
        })
        $('#collapseTwo').on('hide.bs.collapse', function() {
            $('#icon-two').removeClass('fa-minus')
            $('#icon-two').addClass('fa-plus')
        })
        $('#collapseThree').on('show.bs.collapse', function() {
            $('#icon-three').removeClass('fa-plus')
            $('#icon-three').addClass('fa-minus')
        })
        $('#collapseThree').on('hide.bs.collapse', function() {
            $('#icon-three').removeClass('fa-minus')
            $('#icon-three').addClass('fa-plus')
        })

        $(document).on('showCollapse', function() {
            $('#collapseOne').collapse('show')
        })
    </script>
    @endpush

</div>