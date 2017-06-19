<?php

namespace App\DataTables;

use App\Models\Empleado;
use Form;
use Yajra\Datatables\Services\DataTable;

class EmpleadoDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'empleados.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $empleados = Empleado::with('area','user');//query();
        return $this->applyScopes($empleados);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->addAction(['width' => '10%'])
            ->ajax('')
            ->parameters([
                'dom' => 'Bfrtip',
                'scrollX' => false,
                'buttons' => [
                    'print',
                    'reset',
                    'reload',
                    [
                         'extend'  => 'collection',
                         'text'    => '<i class="fa fa-download"></i> Export',
                         'buttons' => [
                             'csv',
                             'excel',
                         ],
                    ],
                    'colvis'
                ]
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    private function getColumns()
    {
        return [
            'dni' => ['name' => 'dni', 'data' => 'dni'],
            'nombre' => ['name' => 'nombre', 'data' => 'nombre'],
            'apellido' => ['name' => 'apellido', 'data' => 'apellido'],
            'fecha_de_nacimiento' => ['name' => 'fecha_nac', 'data' => 'fecha_nac'],
            'area' => ['name' => 'area', 'data' => 'area.nombre'],
            'correo' => ['name' => 'correo', 'data' => 'user.email']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'empleados';
    }
}
