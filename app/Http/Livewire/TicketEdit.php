<?php

namespace App\Http\Livewire;

use App\Jobs\ProccessEmail;
use App\Mail\NotificationTickets;
use Livewire\Component;
use App\Models\Ticket;
use App\Models\Seguimiento;
use App\Models\User;
use App\Models\Categoria;
use App\Models\departamento;
use App\Models\edificio;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\WithFileUploads;


class TicketEdit extends Component
{
    use WithFileUploads;

    public $ticket;
    public $ticketEdit = "";

    public $usuarios = [];
    public $prioridad = "Media";
    public $categorias = [];

    public $descripcion = "";
    public $quien_reporta="";
    public $tema = "";
    public $telefono = "";
    public $edificio = "";
    public $departamento = "";
    public $ip = "";
    public $usuario_red = "";
    public $creador = "";
    public $asignado = "";
    public $categoria = ""; 
    public $autoriza = "";
    public $status = "Abierto";
    public $archivoAdjunto;

    public $seguimientos = [];
    public $message = "";

    public $comentarios_print ="";

    public function mount()
    {

        //Get datos de ticket
        $this->ticketEdit = Ticket::leftJoin('users as asignados', 'asignados.id', 'tickets.asignado')
            ->leftJoin('users as creadores', 'creadores.id', 'tickets.creador')
            ->select(DB::raw("tickets.*,
            CONCAT_WS(' ',creadores.name,creadores.lastname) as creadorName"))->where('tickets.id', $this->ticket)
            ->first();

        //Setear datos
        $this->tema = $this->ticketEdit->tema;
        $this->quien_reporta = $this->ticketEdit->reporta;
        $this->telefono = $this->ticketEdit->telefono;
        $this->edificio = $this->ticketEdit->edificio;
        $this->departamento = $this->ticketEdit->departamento;
        $this->usuario_red = $this->ticketEdit->usuario_red;
        $this->ip = $this->ticketEdit->ip;
        $this->edificio = $this->ticketEdit->edificio;
        $this->autoriza = $this->ticketEdit->autoriza;
        $this->categoria = $this->ticketEdit->categoria;
        $this->asignado = $this->ticketEdit->asignado;
        $this->prioridad = $this->ticketEdit->prioridad;
        $this->status = $this->ticketEdit->status;
        $this->creador = $this->ticketEdit->creadorName;
        $this->comentarios_print = $this->ticketEdit->comentarios_print;
    }

    public function render()
    {
        //Carga de selects
        $this->usuarios = User::orderBy('name')->get();
        $this->categorias = Categoria::orderBy('name')->get();
        $departamentos = departamento::orderBy('nombre')->get();
        $edificios = edificio::orderBy('nombre')->get();

        //Renderizamos los seguimientos para que cada que ingresmos uno nuevo se muestre al momento
        $this->seguimientos = Seguimiento::leftJoin('users', 'users.id', 'seguimientos.usuario')
            ->select(DB::raw('seguimientos.*, 
                        users.name as nombre_usuario'))
            ->where('ticket', $this->ticket)->get();

        //Renderizamos el estado del ticket para que cambie cada vez que yo efectue un cambio 
        $this->status = $this->ticketEdit->status;

        return view('livewire.ticket-edit', compact('departamentos', 'edificios'));
    }

    public function update()
    {
        //determina si enviaremos correo de notificacion
        $enviarCorreo = false;

        //Enviar correo unicamente si se actualiza tema, asignacion, prioridad o descripcion del ticket
        if (
            $this->ticketEdit->tema != $this->tema || $this->ticketEdit->asignado != $this->asignado ||
            $this->ticketEdit->prioridad != $this->prioridad || $this->ticketEdit->descripcion != $this->descripcion
        ) {
            $enviarCorreo = true;
        }


        $this->ticketEdit->tema = $this->tema;
        $this->ticketEdit->reporta = $this->quien_reporta;
        $this->ticketEdit->telefono = $this->telefono;
        $this->ticketEdit->edificio = $this->edificio;
        $this->ticketEdit->departamento = $this->departamento;
        $this->ticketEdit->usuario_red = $this->usuario_red;
        $this->ticketEdit->ip = $this->ip;
        $this->ticketEdit->edificio = $this->edificio;
        $this->ticketEdit->autoriza = $this->autoriza;
        $this->ticketEdit->categoria = $this->categoria;
        $this->ticketEdit->asignado = ($this->asignado != "") ? $this->asignado : null;
        $this->ticketEdit->prioridad = $this->prioridad;
        $this->ticketEdit->comentarios_print = $this->comentarios_print;
        $this->ticketEdit->save();

        // if ($enviarCorreo) {

        //    //obtenemos la ultima fecha de creacion
        //    $date_created = Seguimiento::where('ticket', $this->ticketEdit->id)
        //                                 ->max('created_at','DESC');
            
        //     //obtenemos los registros de los ultimos cambios efectuados
        //     $seguimientos = Seguimiento::where('created_at',$date_created)->get();

        //     //Seteamos datos del ticket
        //     $details['tipo'] = 'update';
        //     $details['user'] = Auth::user()->name . ' ' . Auth::user()->lastname;
        //     $details['creator'] = $this->creador;
        //     $details['header'] = '#' . $this->ticketEdit->id . ' ' . $this->ticketEdit->tema;
        //     $details['descripcion'] = $this->ticketEdit->descripcion;
        //     $details['cambios'] =   $seguimientos;  
        //     $details['prioridad'] = $this->ticketEdit->prioridad;
        //     $details['asignado'] = 'Sin asignar';

        //     //Validamos si se ha asignado a alguien 
        //     if ($this->ticketEdit->asignado != null) {
                
        //         $asignado = User::find($this->ticketEdit->asignado);
                
        //         //verificamos que tenga registrado un correo
        //         if ($asignado->email != null) {

        //             $details['asignado'] = $asignado->name . ' ' . $asignado->lastname;
        //             $details['email'] = $asignado->email;
        //             dispatch(new ProccessEmail($details));
        //         }
        //     } 

        //     //
        //     //Despues mandamos email a todos los usuarios que tienen activada la opcion de 
        //     //recibir notificaciones de todos los tickets.
        //     $usersSend = User::permission('Recibir notificación de todos los tickets')->get();

        //     foreach ($usersSend as $item) {
        //         $details['email'] = $item->email;
        //         dispatch(new ProccessEmail($details));
        //     }
            
        // }


        $this->dispatchBrowserEvent('alerta', ['msg' => 'Cambios guardados!!']);
        $this->dispatchBrowserEvent('scrollingBottom');
    }

    public function storeNotas()
    {
        if ($this->message != "" || $this->archivoAdjunto) {

            if ($this->archivoAdjunto) {

                $this->validate([
                    'archivoAdjunto' => 'mimes:jpg,pdf'
                ]);
            }

            if ($this->message) {
                $seguimiento = new Seguimiento;
                $seguimiento->notas = $this->message;
                $seguimiento->ticket = $this->ticket;
                $seguimiento->usuario = Auth::user()->id;
                $seguimiento->print = 1;
                $seguimiento->save();
            }

            if ($this->archivoAdjunto) {

                $filename = $this->archivoAdjunto->store('public/documents');
                $seguimiento = new Seguimiento;
                $seguimiento->notas = 'Archivo adjunto';
                $seguimiento->ticket = $this->ticket;
                $seguimiento->file = $filename;
                $seguimiento->usuario = Auth::user()->id;
                $seguimiento->save();
            }


            $this->message = "";
            $this->archivoAdjunto = null;
            $this->dispatchBrowserEvent('scrollingBottom');
        }
    }

    public function saveStatus($stat)
    {
        $this->ticketEdit->status = $stat;
        $this->ticketEdit->save();
        $this->dispatchBrowserEvent('alerta', ['msg' => 'El ticket cambio a ' . $this->ticketEdit->status]);
        $this->dispatchBrowserEvent('scrollingBottom');
    }

    public function clearAtt()
    {
        $this->archivoAdjunto = null;
    }

    public function verDocumento(){

        return redirect(route('ticketDocument',$this->ticket));
    }
}
