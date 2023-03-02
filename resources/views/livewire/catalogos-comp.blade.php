<div>
    <div class="container">
        <div class="accordion" id="accordionExample">
            <div class="card">
                <div class="card-header bg-secondary" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left text-white" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Edificios
                        </button>
                    </h2>
                </div>

                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <livewire:edificios></livewire:edificios>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header bg-secondary" id="headingTwo">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left text-white collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Departamentos
                        </button>
                    </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                    <livewire:departamentos></livewire:departamentos>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header bg-secondary" id="headingThree">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left text-white collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Categorias para los tickets
                        </button>
                    </h2>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                    <livewire:categorias></livewire:categorias>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>