<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ApiServices {
    //variable para la URL base de la API
    protected $apiBaseUrl;

    //Contructor que obtiene la URL base de la API desde el archivo .env
    public function __construct() {
        $this->apiBaseUrl = rtrim(env('API_BASE_URL'), '/').'/';
    }

    //Encabezados necesarios para la API
    private function headers() {
        //Regresa los encabezados necesarios para la autenticacion en la API
        return [
            "Accept" => "application/json",
            "Content-Type" => "application/json",
            "Ambu-Public-Key" => env('API_PUBLIC_KEY'),
            "Ambu-Private-Key" => env('API_PRIVATE_KEY')
        ];
    }
    //Crear parque
    public function crearParque($data) {
        //variable $data es un array con los datos del parque a crear y hacer la peticion POST
       $response = Http::withHeaders($this->headers()
       ) ->post($this->apiBaseUrl . "parks", $data);
        //retorna la respuesta en formato json
        return $response ->json();
    }


    //Obtener todos los parques
    public function obtenerParques() {
        //Hace la peticion GET para obtener todos los parques
        $response = Http::withHeaders($this->headers()
        )->get($this->apiBaseUrl . "parks");

        //retorna la respuesta en formato json
        return $response ->json();
    }

    //Obtener parque por ID
    public function obtenerParquePorId($park) {
        //Hace la peticion GET para obtener un parque por su ID
        $response = Http::withHeaders($this->headers()
        )->get($this->apiBaseUrl . "parks/{$park}");

        //retorna la respuesta en formato json
        return $response ->json();
    }



    // Actualizar los parques
    public function actuazarParques($park, $data) {
        // Hace la peticion PUT para actualizar un parque por su ID
        $response = Http::withHeaders($this->headers()
        )->put($this->apiBaseUrl . "parks/{$park}", $data);

        //retorna la respuesta en formato json
        return $response ->json();
    }

    //Eliminar parque
    public function eliminarParque($park){
        // Hace la peticion DELETE para eliminar un parque por su ID
        $response = Http::withHeaders($this->headers()
        )->delete($this->apiBaseUrl . "parks/{$park}");

        //retorna la respuesta en formato json
        return $response ->json();

    }



}
