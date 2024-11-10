<?php

namespace App\Exports;

use App\Models\Entrevista;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class EntrevistaExport implements FromCollection, WithMapping, ShouldAutoSize, WithHeadings
{
    use Importable;
    
    protected $idCiclo;
    protected $idDocente;

    public function __construct($idCiclo = null, $idDocente = null)
    {
        $this->idCiclo = $idCiclo;
        $this->idDocente = $idDocente;
    }

    public function collection()
    {
        $query = Entrevista::with(['estudiante', 'docente', 'ciclo', 'preguntas']);

        if ($this->idCiclo) {
            $query->where('id_ciclo', $this->idCiclo);
        }

        if ($this->idDocente) {
            $query->where('id_docente', $this->idDocente);
        }

        return $query->get();
    }

    public function headings(): array
    {
        return [
            'Nombre del estudiante',
            'Nombre del docente',
            'Código ciclo',
            'Fecha Entrevista',
            'Conclusiones de la Entrevista',
            '¿Recomienda la Admisión en la carrera?',
            'Observación'
        ];
    }

    public function map($entrevistas): array
    {
        return [
            $entrevistas->estudiante?->nombres . ' ' . $entrevistas->estudiante?->apellidos,
            $entrevistas->docente?->nombres . ' ' . $entrevistas->docente?->apellidos,
            $entrevistas->ciclo?->codigo,
            $entrevistas->created_at->format('d/m/Y'),
            $this->formatPreguntas($entrevistas),
            $entrevistas->aprobada ? 'Sí' : 'No',
            $entrevistas->observaciones,
        ];
    }

    private function formatPreguntas($entrevistas)
    {
        return $entrevistas->preguntas->map(function ($pregunta) {
            return "{$pregunta->enunciado}: {$pregunta->pivot->respuesta}";
        })->implode("\n");
    }
}
