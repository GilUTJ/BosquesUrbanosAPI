<?php

namespace App\Http\Controllers;

use App\Services\ApiServices;
use Illuminate\Http\Request;

class ParkController extends Controller
{
    protected $apiService;


    //Contructor que llama la clase APIServer, servicios de la API en HTTP
    public function __construct(ApiServices $apiService){
        $this->apiService = $apiService;
    }

    //Funcion para crear parque
    public function store(Request $request){
        //Validamos datos de entrada necesarios para crear parque
        $data = $request->validate([
            'park_name'=> 'required|string|max:100',
            'park_abbreviation'=> 'required|string|max:10',
            'park_img_url'=> 'required|string',
            'park_address'=> 'required|string|max:150',
            'park_city' => 'required|string',
            'park_state' => 'required|string|max:100',
            'park_zip_code' => 'required|integer',
            'park_latitude' => 'required|numeric',
            'park_longitude'=> 'required|numeric'
        ]);

        //Llamamos al servicio de la API para crear parque
        $parque = $this->apiService->crearParque($data);

        //Debugg para saber si esta llegando la info
        // dd($data, $parque);

        // Si la petición espera JSON (API/Postman), retorna JSON
        if ($request->expectsJson() || $request->isJson() || $request->wantsJson()) {
            return response()->json($parque);
        }

        // Si la API devolvió éxito
        if ($parque && isset($parque['data']['id'])) {
            return redirect()->route('parques.index')
                ->with('success', 'Parque creado correctamente.');
        } else {
            return back()->with('error', 'No se pudo crear el parque.');
        }
    }

    public function create(){
        return view('actions.create');
    }

    //Mostrar todos los parques
    public function index(){
        //variable que almacena los parques obtenidos de la API
        $parque = $this->apiService->obtenerParques();
        //dd($parque);

        return view ('index', ['parque' => $parque]);
    }

    //Mostrar parque por ID
    public function show($id){
        //variable que almacena el parque obtenido por ID de la API
        $parque = $this->apiService->obtenerParquePorId($id);
        // dd($parque);
        return view('actions.show', ['parque' => $parque]);
}

//visualizar formulario de edicion
    public function edit($id){
        //variable que almacena el parque obtenido por ID de la API
        $parque = $this->apiService->obtenerParquePorId($id);
        return view('actions.edit', ['parque' => $parque]);
    }

    //Actualizar parque
    public function update(Request $request, $id){
        //Validamos datos de entrada necesarios para actualizar parque
        $data = $request->all();

        //variable que almacena el parque obtenido por ID de la API
        $parque = $this->apiService->actuazarParques($id, $data);

        // Debugg para saber si esta llegando la info
        // dd($parque);

            // Si la petición espera JSON (API/Postman), retorna JSON
        if ($request->expectsJson() || $request->isJson() || $request->wantsJson()) {
            return response()->json($parque);
        }


         // Si la API devolvió éxito
         if($parque && isset($parque['data'] ['id'])){
            return redirect()->route('parques.index')
                             ->with('success', 'Parque actualizado correctamente.');
         }else{
            //si no se pudo actualizar
            return back()->with('error', 'No se pudo actualizar el parque.');
         }
    }

    //Eliminar parque
    public function destroy($id , Request $request){
        //Llamamos al servicio de la API para eliminar parque
        $status = $this->apiService->eliminarParque($id);
        // dd($status);

            // Si la petición espera JSON (API/Postman), retorna JSON
        if ($request->expectsJson() || $request->isJson() || $request->wantsJson()) {
            return response()->json($status);
        }

        // si encuentra el parque y se elimina
         if ($status === 200 || $status === 204) {
             return redirect()->route('parques.index')->with('success', 'Parque eliminado correctamente.');
         } else {
            //si no se pudo eliminar
             return redirect()->route('parques.index')->with('error', 'No se pudo eliminar el parque.');
         }
    }

}
