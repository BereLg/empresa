<?php

use Faker\Factory as Faker;
use App\Models\Empleado;
use App\Repositories\EmpleadoRepository;

trait MakeEmpleadoTrait
{
    /**
     * Create fake instance of Empleado and save it in database
     *
     * @param array $empleadoFields
     * @return Empleado
     */
    public function makeEmpleado($empleadoFields = [])
    {
        /** @var EmpleadoRepository $empleadoRepo */
        $empleadoRepo = App::make(EmpleadoRepository::class);
        $theme = $this->fakeEmpleadoData($empleadoFields);
        return $empleadoRepo->create($theme);
    }

    /**
     * Get fake instance of Empleado
     *
     * @param array $empleadoFields
     * @return Empleado
     */
    public function fakeEmpleado($empleadoFields = [])
    {
        return new Empleado($this->fakeEmpleadoData($empleadoFields));
    }

    /**
     * Get fake data of Empleado
     *
     * @param array $postFields
     * @return array
     */
    public function fakeEmpleadoData($empleadoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'dni' => $fake->randomDigitNotNull,
            'nombre' => $fake->word,
            'apellido' => $fake->word,
            'fecha_nac' => $fake->word,
            'area_id' => $fake->randomDigitNotNull,
            'user_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $empleadoFields);
    }
}
