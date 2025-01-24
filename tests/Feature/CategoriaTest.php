<?php

namespace Tests\Feature;

use Tests\TestCase;

class CategoriaTest extends TestCase
{
    /**
     * Prueba que la ruta /categorias-con-registros devuelve una respuesta exitosa.
     */
    public function test_categorias_con_registros_returns_successful_response(): void
    {
        // Envía una solicitud GET a la ruta de la API
        $response = $this->get('/api/categorias-con-registros');

        // Asegúrate de que la respuesta tenga un estado 200
        $response->assertStatus(200, 'La ruta /api/categorias-con-registros no devolvió una respuesta exitosa (200).');

        // Opcional: verifica que la respuesta tenga una estructura JSON esperada
       /*  $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'nombre',
                    'registros',
                ],
            ],
        ]); */
    }
}
