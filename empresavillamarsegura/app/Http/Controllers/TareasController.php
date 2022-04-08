<?php

namespace App\Http\Controllers;
use App\Models\Tarea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use JWTAuth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TareasController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth:api');
    }
 

    public function index(){
       
    

        $tareasjson=DB::table('tareas')->addSelect(['tareas.id as id_tareas','tareas.nombre as Nombre','tareas.created_at','tareas.updated_at','categorias.nombre','categorias.id as id_categoria','tareas.id_categoria'])
        ->join('categorias','categorias.id','=','tareas.id_categoria')->orderBy('tareas.id','desc')->get();


        
        return $tareasjson;
      }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

  
  
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|min:3|unique:tareas,nombre',
            'id_categoria'=>'required'
        ]);
         $tarea=new Tarea();
         $tarea->nombre=$request->nombre;
         $tarea->id_categoria=$request->id_categoria;
         $tarea->save();
    }

 

 
    public function update(Request $request)
    {
      
        $tarea = Tarea::findOrFail($request->id);
        $request->validate([
         'nombre' => 'required|min:3|unique:tareas,nombre',
         'id_categoria'=>'required'
     ]);
        $tarea->update($request->all());
        return $tarea;
    }


    public function destroy(Request $request)
    {
        
        $tareas = Tarea::destroy($request->id);
        return $tareas;
    }
}