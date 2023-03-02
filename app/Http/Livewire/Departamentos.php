<?php

namespace App\Http\Livewire;

use App\Models\departamento;
use Livewire\Component;
use Livewire\WithPagination;

class Departamentos extends Component
{
    use WithPagination;

    public $nombre;
    public $search = "";

    protected $paginationTheme = "bootstrap";

    public function render()
    {
        $departamentos = departamento::where('active', 1)
            ->orderBy("nombre")
            ->paginate(10);

            return view('livewire.departamentos', compact('departamentos'));
    }

    public function store(){

        $this->validate([
            'nombre'=> 'required'
        ]);
        
        $ed = new departamento();
        $ed->nombre = $this->nombre;
        $ed->save();
        $this->dispatchBrowserEvent('alerta',['msg'=> 'Registro guardado']);
        $this->reset();

    }
}
