<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use Livewire\Component;
use Livewire\WithPagination;

class Categorias extends Component
{

    use WithPagination;

    public $nombre;
    public $search = "";

    protected $paginationTheme = "bootstrap";

    public function render()
    {
        $categorias = Categoria::where('active', 1)
            ->orderBy("name")
            ->paginate(10);

            return view('livewire.categorias', compact('categorias'));
    }

    public function store(){

        $this->validate([
            'nombre'=> 'required'
        ]);
        
        $ed = new Categoria();
        $ed->name = $this->nombre;
        $ed->save();
        $this->dispatchBrowserEvent('alerta',['msg'=> 'Registro guardado']);
        $this->reset();

    }
}
