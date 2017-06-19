<?php

namespace App\Http\Controllers;

use App\DataTables\EmpleadoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateEmpleadoRequest;
use App\Http\Requests\UpdateEmpleadoRequest;
use App\Repositories\EmpleadoRepository;
use App\Repositories\AreaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\User;

class EmpleadoController extends AppBaseController
{
    /** @var  EmpleadoRepository */
    private $empleadoRepository;

    public function __construct(EmpleadoRepository $empleadoRepo, AreaRepository $areaRepo)
    {
        $this->empleadoRepository = $empleadoRepo;
		$this->areaRepository = $areaRepo;
    }

    /**
     * Display a listing of the Empleado.
     *
     * @param EmpleadoDataTable $empleadoDataTable
     * @return Response
     */
    public function index(EmpleadoDataTable $empleadoDataTable)
    {
        return $empleadoDataTable->render('empleados.index');
    }

    /**
     * Show the form for creating a new Empleado.
     *
     * @return Response
     */
    public function create()
    {
		$areas = $this->areaRepository->pluck('nombre','id');
        return view('empleados.create', compact('areas',$areas));
    }

    /**
     * Store a newly created Empleado in storage.
     *
     * @param CreateEmpleadoRequest $request
     *
     * @return Response
     */
    public function store(CreateEmpleadoRequest $request)
    {
        $input = $request->all();
		if ($this->masEmpleados($input['area']))
		{
			$nombre = $input['nombre'];
			$mail = $input['email'];
			
			$usuario = $this->crearUsuario($nombre, $mail);
			
			$emp = array(
				'nombre'=> $nombre,
				'apellido'=>$input['apellido'],
				'dni'=>$input['dni'],
				'area_id'=>$input['area'],
				'user_id'=>$usuario->id,
				'fecha_nac'=>$input['fecha_nac'],
			);
	
			$empleado = $this->empleadoRepository->create($emp);
	
			Flash::success('Empleado creado.');
		}
		else
		{
			Flash::error('No se pueden agregar más empleados');
		}
	
		return redirect(route('empleados.index'));
    }

    /**
     * Display the specified Empleado.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $empleado = $this->empleadoRepository->findWithoutFail($id);

        if (empty($empleado)) {
            Flash::error('Empleado not found');

            return redirect(route('empleados.index'));
        }
		$usuario = User::find($empleado->user_id);
        return view('empleados.show',compact('usuario',$usuario))->with('empleado', $empleado);
    }

    /**
     * Show the form for editing the specified Empleado.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $empleado = $this->empleadoRepository->findWithoutFail($id);
		$areas = $this->areaRepository->pluck('nombre','id');
        //return view('empleados.create', );
        if (empty($empleado)) {
            Flash::error('Empleado not found');

            return redirect(route('empleados.index'));
        }

        return view('empleados.edit',compact('areas',$areas))->with('empleado', $empleado);
    }

    /**
     * Update the specified Empleado in storage.
     *
     * @param  int              $id
     * @param UpdateEmpleadoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEmpleadoRequest $request)
    {
        $empleado = $this->empleadoRepository->findWithoutFail($id);

        if (empty($empleado)) {
            Flash::error('Empleado not found');

            return redirect(route('empleados.index'));
        }
		$input = $request->all();
		if ($input['email'] != $empleado->user->email) 
		{
			$user = User::find($empleado->user_id);//id del usuario del empleado
			$user->email = $input['email'];
			$user->save();
		}
		if ($input['area'] != $empleado->area_id) 
		{
			$input['area_id'] = $input['area'];
		}
		
        $empleado = $this->empleadoRepository->update($request->all(), $id);

        Flash::success('Empleado updated successfully.');

        return redirect(route('empleados.index'));
    }

    /**
     * Remove the specified Empleado from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $empleado = $this->empleadoRepository->findWithoutFail($id);

        if (empty($empleado)) {
            Flash::error('Empleado not found');

            return redirect(route('empleados.index'));
        }

        $this->empleadoRepository->delete($id);

        Flash::success('Empleado deleted successfully.');

        return redirect(route('empleados.index'));
    }
	
	private function crearUsuario($name, $mail)
	{
		return User::create([
            'name' => $name,
            'email' => $mail,
            'password' => bcrypt("123456"),
        ]);
	}
	
	public function masEmpleados($area_id)
	{
		$empleados_area = $this->empleadoRepository->findByField('area_id',$area_id)->count();
		
		$area_empleados = $this->areaRepository->find($area_id,['max_cant_empleados'])['max_cant_empleados'];
				
		return json_encode($empleados_area < $area_empleados);
	}
}
