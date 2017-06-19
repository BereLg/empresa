<?php

namespace App\Repositories;

use App\Models\Empleado;
use InfyOm\Generator\Common\BaseRepository;

class EmpleadoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'dni',
        'nombre',
        'apellido'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Empleado::class;
    }

}
