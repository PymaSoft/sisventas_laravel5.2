<?php

namespace sisventas\Http\Controllers;

use Illuminate\Http\Request;

use sisventas\Http\Requests;
use sisventas\Categoria;
use Illuminate\Support\Facades\Redirect;
use sisventas\Http\Requests\CategoriaFormRequest;
use DB;

class CategoriaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if($request)
    	{
    		$query=trim($request->get('searchText'));
    	   	$categorias=DB::table('categoria')->where('cat_nombre','LIKE','%'.$query.'%')
            ->where ('cat_condicion','=','1')
            ->orderBy('cat_id','desc')
            ->paginate(7);
            return view('almacen.categoria.index',["categorias"=>$categorias,"searchText"=>$query]);
    	}
    }

    public function create()
    {
    	return view("almacen.categoria.create");
    }

    public function store(CategoriaFormRequest $request)
    {
    	$categoria=new Categoria;
        $categoria->cat_nombre=$request->get('cat_nombre');
        $categoria->cat_descripcion=$request->get('cat_descripcion');
        $categoria->cat_condicion='1';
        $categoria->save();
        return Redirect::to('almacen/categoria');
    }

    public function show($id)
    {
    	return view("almacen.categoria.show",["categoria"=>Categoria::findOrFail($id)]);
    }

    public function edit($id)
    {
    	return view("almacen.categoria.edit",["categoria"=>Categoria::findOrFail($id)]);
    }

    public function update(CategoriaFormRequest $request,$id)
    {
    	$categoria=Categoria::findOrFail($id);
        $categoria->cat_nombre=$request->get('cat_nombre');
        $categoria->cat_descripcion=$request->get('cat_descripcion');
        $categoria->update();
        return Redirect::to('almacen/categoria');
    }
    
    public function destroy($id)
    {
		$categoria=Categoria::findOrFail($id);
        $categoria->cat_condicion='0';
        $categoria->update();
        return Redirect::to('almacen/categoria');
    }
}