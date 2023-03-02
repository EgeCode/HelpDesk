<?php

namespace App\Http\Controllers;

use App\Models\Seguimiento;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Adapter\PDFLib;
use Illuminate\Support\Facades\DB;

class PDFController extends Controller
{
    public function viewDocTicket($id)
    {
        $seg = Seguimiento::find($id);
        $ticket = Ticket::leftJoin('users as asignados', 'asignados.id', 'tickets.asignado')
            ->leftJoin('users as creadores', 'creadores.id', 'tickets.creador')
            ->leftJoin('users as reports', 'reports.id', 'tickets.reporta')
            ->select(DB::raw("tickets.*, CONCAT_WS(' ',asignados.name,asignados.lastname) as asignado, creadores.name as creador, reports.name as reporta"))
            ->where('tickets.id', $seg->ticket)
            ->first();

        $data = [

            'id' => $ticket->id,
            'tema' => $ticket->tema,
            'descripcion' => $ticket->descripcion,
            'telefono' => $ticket->telefono,
            'departamento' => $ticket->departamento,
            'ip' => $ticket->ip,
            'asignado' => $ticket->asignado,
            'edificio' => $ticket->edificio,
            'usuario_red' => $ticket->usuario_red,
            'autoriza' => $ticket->autoriza,
            'creador' => $ticket->creador,
            'prioridad' => $ticket->prioridad,
            'categoria' => $ticket->categoria,
            'creador' => $ticket->creador,
            'status' => $ticket->status,
            'created_at' => $ticket->created_at,
            'updated_at' => $ticket->updated_at,
            'comentarios_print' => $seg->notas,

        ];

        $pdf = Pdf::loadView('pdf.ticket', $data);
        return $pdf->stream('ticket' . $ticket->id . '.pdf');
    }
}
