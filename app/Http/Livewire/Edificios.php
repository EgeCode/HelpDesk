<?php

namespace App\Http\Livewire;

use App\Models\edificio;
use Livewire\Component;
use Livewire\WithPagination;

class Edificios extends Component
{
    use WithPagination;

    public $nombre;
    public $search = "";

    protected $paginationTheme = "bootstrap";

    public function render()
    {
        $edificios = edificio::where('active', 1)
            ->orderBy("nombre")
            ->paginate(10);

        return view('livewire.edificios', compact('edificios'));
    }

    public function store(){

        $this->validate([
            'nombre'=> 'required'
        ]);
        
        $ed = new edificio();
        $ed->nombre = $this->nombre;
        $ed->save();
        $this->dispatchBrowserEvent('alerta',['msg'=> 'Registro guardado']);
        $this->reset();

    }
}
