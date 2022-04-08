# APIREST_LARAVEL_JWT_SEGURA
 Api Rest desarrollada en Laravel 8 con login y registro de usuarios, así como verificación de token bearer jwt para solicitar los recursos CRUD mediante peticiones POST,GET,DELETE,GET, de las entidades productos, y categorías usadas en la API.

Implementacion de seguridad JWT Api Rest Villamar.

En esta ocasión modificaremos nuestra api rest de usuario, tarea,categorias para hacerla más segura mediante el uso de jwt.

Las apis en las que nos basamos están en los siguientes links.

https://github.com/AdrianVillamar743/API_LARAVEL_MY_SQL_VILLAMAR

https://github.com/AdrianVillamar743/apivillamarJWTAuth

1.- Copiaremos el constructor de AuthController al controlador que utilizaremos en este caso para implementar copiaremos este constructor a CategoriasController.
Sin excepciones de control.

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;
use JWTAuth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;



    public function __construct()
    {
        $this->middleware('auth:api');
    }


Mejor dicho en los controladores que necesitaremos.

2.- Y eso es suficiente, nos logueamos, generamos el token, lo colocamos en la autorización y solicitamos el recurso con el método adecuado y su ruta, caso contrario sin el token nos dará un error.
