<?php

namespace App\Http\Livewire;

use App\Jobs\ProccessEmail;
use App\Mail\NotificationTickets;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Ticket;
use App\Models\Categoria;
use App\Models\departamento;
use App\Models\edificio;
use App\Models\Seguimiento;
use Exception;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Mail;

class TicketsComp extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $filtro_status = "ABIERTO";
    public $search = "";
    public $usuarios = [];
    public $prioridad = "Media";
    public $categorias = [];
    public $tema = "";
    public $descripcion = "";
    public $quien_reporta = "";
    public $telefono = "";
    public $edificios = [];
    public $edificio = "";
    public $departamentos = [];
    public $departamento = "";
    public $ip = "";
    public $usuario_red = "";
    public $asignado = "";
    public $categoria = "";
    public $autoriza = "";
    public $attachment;
    public $readyToLoad = false; //propiedad usada para mostrar Loading... antes de renderizar tabla de tickets; se establece por default en false

    protected $paginationTheme = 'bootstrap'; //para usar la paginacion de livewire con bootstrap 


    public function updatingSearch()
    {
        $this->resetPage(); //para resetear a la primera pagina cuando tenemos paginacion y filtrado 
    }

    public function loadTickets()
    {
        $this->readyToLoad = true; // Cuando mandas llamar este metodo estableces la propiedad en true para indicar que muestre la info
    }

    public function render()
    {
        $this->usuarios = User::orderBy('name')->get();
        $this->categorias = Categoria::orderBy('name')->get();
        $this->departamentos = departamento::orderBy('nombre')->get();
        $this->edificios = edificio::orderBy('nombre')->get();

        if (Auth::user()->can('Mostrar todos los tickets')) {

            $tickets = Ticket::leftJoin('users as asignados', 'asignados.id', 'tickets.asignado')
                ->leftJoin('users as creadores', 'creadores.id', 'tickets.creador')
                ->select(DB::raw('tickets.*,
                                            asignados.name as asignado, 
                                            creadores.name as creador'))
                ->where('tickets.status', $this->filtro_status)
                ->where(function ($q) {
                    $q->where('tickets.id', 'LIKE', $this->search);
                    $q->orWhere('tickets.tema', 'LIKE', "%" . $this->search . "%");
                    $q->orWhere('tickets.descripcion', 'LIKE', "%" . $this->search . "%");
                    
                })
                ->orderBy('updated_at', 'DESC')
                ->paginate(15);
        } else {

            $tickets = Ticket::leftJoin('users as asignados', 'asignados.id', 'tickets.asignado')
                ->leftJoin('users as creadores', 'creadores.id', 'tickets.creador')
                ->select(DB::raw('tickets.*,
                                    asignados.name as asignado, 
                                    creadores.name as creador'))
                ->where('tickets.status', $this->filtro_status)
                ->where(function ($q) {
                    $q->where('tickets.creador', Auth::user()->id);
                    $q->orWhere('tickets.asignado', Auth::user()->id);
                })
                ->where(function ($q) {
                    $q->where('tickets.id', 'LIKE', $this->search);
                    $q->orWhere('tickets.tema', 'LIKE', "%" . $this->search . "%");
                    $q->orWhere('tickets.descripcion', 'LIKE', "%" . $this->search . "%");
                })
                ->orderBy('updated_at', 'DESC')
                ->paginate(15);
        }

        return view('livewire.tickets-comp', compact('tickets'));
    }

    public function store()
    {
        //validamos campos
        $this->validate([
            'tema' => 'required',
            'descripcion' => 'required',
            // 'telefono' => 'required',
            // 'departamento' => 'required',
            'attachment' => 'mimes:jpg,pdf|nullable' //validamos que sea de tipo pdf o jpg
        ]);

        //Guardamos el ticket
        $ticket = new Ticket;
        $ticket->tema = $this->tema;
        $ticket->descripcion = $this->descripcion;
        $ticket->reporta = $this->quien_reporta;
        $ticket->asignado = ($this->asignado != "") ? $this->asignado : null;
        $ticket->creador = Auth::user()->id;
        $ticket->prioridad = $this->prioridad;
        $ticket->categoria = $this->categoria;
        $ticket->usuario_red = $this->usuario_red;
        $ticket->status = "Abierto";
        $ticket->telefono = $this->telefono;
        $ticket->departamento = $this->departamento;
        $ticket->edificio = $this->edificio;
        $ticket->ip = $this->ip;
        $ticket->autoriza = $this->autoriza;
        $ticket->usuario = Auth::user()->id;
        $ticket->save();

        //Guardamos la primera nota del ticket
        $seguimiento = new Seguimiento;
        $seguimiento->notas = $this->descripcion;
        $seguimiento->ticket = $ticket->id;
        $seguimiento->usuario = Auth::user()->id;
        $seguimiento->save();

        //Si contiene un archivo adjunto lo guardamos en la carpeta public 
        if ($this->attachment) {

            $fileName = $this->attachment->store('public/documents');

            // //Luego lo guardamos como nota de seguimiento con el nombre del archivo generado
            $seguimiento = new Seguimiento;
            $seguimiento->notas = 'Archivo adjunto';
            $seguimiento->ticket = $ticket->id;
            $seguimiento->usuario = Auth::user()->id;
            $seguimiento->file = $fileName;
            $seguimiento->save();
        }
        
        //Enviar correo
            //Seteamos datos del ticket
            $details['tipo'] = 'open';
            $details['user'] = Auth::user()->name . ' ' . Auth::user()->lastname;
            
            $usr = User::find($ticket->creador);
            $details['creator']= $usr->name.' '.$usr->lastname;
            $details['header'] = '#'.$ticket->id.' '.$ticket->tema;
            $details['descripcion'] = $ticket->descripcion;
            $details['prioridad'] = $ticket->prioridad;
            $details['cambios'] = '';

            //Validamos si se ha asignado a alguien 
            if($ticket->asignado != null){
                $userAssigned = User::find($ticket->asignado);
                $details['asignado'] = $userAssigned->name.' '. $userAssigned->lastname;

                //verificamos que tenga registrado un correo
                if($userAssigned->email != null){
                    $details['email']= $userAssigned->email;
                    dispatch(new ProccessEmail($details));
                }

                //despues mandamos email a todos los usuarios que tienen activada la opcion de 
                //recibir notificaciones de todos los tickets
                $usersSend = User::permission('Recibir notificación de todos los tickets')->get();
                foreach($usersSend as $item){
                    //comprobamos que email de la persona asignada no sea el mismo para no enviar
                    //doble el correo
                    if($item->email != $userAssigned->email){
                        $details['email']= $item->email;
                        dispatch(new ProccessEmail($details));
                    }
                }
            }else{

                 //si no se asigno a nadie
                 //mandamos email a todos los usuarios que tienen activada la opcion de 
                 //recibir notificaciones de todos los tickets
                 $usersSend = User::permission('Recibir notificación de todos los tickets')->get();
                 foreach($usersSend as $item){
                     $details['email']= $item->email;
                     $details['asignado']= 'Aun no se ha asignado';
                     dispatch(new ProccessEmail($details));
                 }
            }

        //Limpiamos y mandamos alerta de registro guardado
        $this->clear();
        $this->dispatchBrowserEvent('alerta', ['msg' => 'Registro guardado!', 'type' => 'success']);
        $this->dispatchBrowserEvent('focusTema');
    }

    public function clear()
    {

        $this->filtro_status = "ABIERTO";
        $this->search = "";
        $this->usuarios = [];
        $this->prioridad = "Media";
        $this->categorias = [];

        $this->tema = "";
        $this->descripcion = "";
        $this->quien_reporta = "";
        $this->telefono = "";
        $this->edificio = "";
        $this->departamento = "";
        $this->ip = "";
        $this->usuario_red = "";
        $this->asignado = "";
        $this->categoria = "";
        $this->autoriza = "";
    }

    public function goEdit($id)
    {

        return redirect('tickets/editar/' . $id);
    }
}
