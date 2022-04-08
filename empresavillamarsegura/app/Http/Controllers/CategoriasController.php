<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;
use JWTAuth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CategoriasController extends Controller
{


    
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    
    public function index(){
        $categoriasjson=Categoria::all(); 
        return $categoriasjson;
      }
 
  
  
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|min:3|unique:categorias,nombre',
         
        ]);
         $categoria=new Categoria();
         $categoria->nombre=$request->nombre;
         $categoria->save();
    }

 

 
    public function update(Request $request)
    {
      
        $categoria = Categoria::findOrFail($request->id);
        $request->validate([
         'nombre' => 'required|min:3|unique:categorias,nombre'
     ]);
        $categoria->update($request->all());
        return $categoria;
    }


    public function destroy(Request $request)
    {
        
        $categoria = Categoria::destroy($request->id);
        return $categoria;
    }
}