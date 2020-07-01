<?php

namespace sisventas\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use sisventas\Http\Requests\PersonaFormRequest;
use sisventas\Persona;

class ClienteController extends Controller
{
    public function __construct()
    {
        
    }

    public function index(Request $request)
    {
        if($request)
    	{
    		$query=trim($request->get('searchText'));
               $personas=DB::table('persona')
            ->where('per_nombre','LIKE','%'.$query.'%')
            ->where ('per_tipo','=','Cliente')
            ->orwhere('per_numdoc','LIKE','%'.$query.'%')
            ->where ('per_tipo','=','Cliente')
            ->orderBy('per_id','desc')
            ->paginate(7);
            return view('ventas.cliente.index',["personas"=>$personas,"searchText"=>$query]);
    	}
    }

    public function create()
    {
    	return view("ventas.cliente.create");
    }

    public function store(PersonaFormRequest $request)
    {
    	$persona=new Persona();
        $persona->per_tipo='Cliente';
        $persona->per_nombre=$request->get('per_nombre');
        $persona->per_tipodoc=$request->get('per_tipodoc');
        $persona->per_numdoc=$request->get('per_numdoc');
        $persona->per_direccion=$request->get('per_direccion');
        $persona->per_telefono=$request->get('per_telefono');
        $persona->per_celular=$request->get('per_celular');
        $persona->per_email=$request->get('per_email');
        $persona->save();
        return Redirect::to('ventas/cliente');
    }

    public function show($id)
    {
    	return view("ventas.cliente.show",["persona"=>Persona::findOrFail($id)]);
    }

    public function edit($id)
    {
    	return view("ventas.cliente.edit",["persona"=>Persona::findOrFail($id)]);
    }

    public function update(PersonaFormRequest $request,$id)
    {
    	$persona=Persona::findOrFail($id);
        $persona->per_nombre=$request->get('per_nombre');
        $persona->per_tipodoc=$request->get('per_tipodoc');
        $persona->per_numdoc=$request->get('per_numdoc');
        $persona->per_direccion=$request->get('per_direccion');
        $persona->per_telefono=$request->get('per_telefono');
        $persona->per_celular=$request->get('per_celular');
        $persona->per_email=$request->get('per_email');
        $persona->update();
        return Redirect::to('ventas/cliente');
    }
    
    public function destroy($id)
    {
		$persona=Persona::findOrFail($id);
        $persona->per_tipo='Inactivo';
        $persona->update();
        return Redirect::to('ventas/cliente');
    }
}