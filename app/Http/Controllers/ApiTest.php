<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

class ApiTest extends Controller
{
    public function addProduct()
    {
        $client = new Client();
        
        // Enviar una solicitud POST con datos en formato JSON
        $response = $client->post('http://localhost:8000/api/products', [
            'json' => [
                'name' => 'Producto de ejemplo 2',
                'description' => 'Una descripción para el producto',
                'price' => 9.99,
            ]
        ]);
        
        // Verificar si la solicitud HTTP fue exitosa
        if ($response->getStatusCode() === 201) {
            // Si la respuesta fue exitosa, obtener los datos devueltos por la API
            $productData = json_decode($response->getBody()->getContents(), true);
            
            // Hacer cualquier otra cosa que necesites con los datos devueltos por la API
            // ...
        } else {
            // Si la respuesta fue incorrecta, devolver un error
            return response()->json(['error' => 'No se pudo crear el producto'], $response->getStatusCode());
        }
    }
}

