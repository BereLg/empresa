<?php

use Illuminate\Database\Seeder;
use App\Models\Empleado;

class EmpleadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Empleado::create([
			'dni' => '31455672',
            'nombre' => "Empleado",
            'apellido' => "Uno",
            'fecha_nac' => date_create('12-04-1985'),
			'area_id' => "1",
			'user_id' => "1"
        ]);
    }
}