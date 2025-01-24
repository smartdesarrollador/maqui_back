<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Contacto; // Importa el modelo Contacto
/* use Illuminate\Foundation\Testing\RefreshDatabase; */

class ContactoTest extends TestCase
{
    // Comenta o elimina esta línea si no quieres que la base de datos se refresque antes de cada prueba
    // use RefreshDatabase;

    /** @test */
    public function se_puede_obtener_un_contacto_existente()
    {
        // Obtén el primer registro de la tabla 'contactos'
        $contacto = Contacto::first();

        // Asegúrate de que el registro exista
        $this->assertNotNull($contacto, 'No se encontró ningún contacto en la base de datos.');

        // Verifica que el registro exista en la base de datos
        $this->assertDatabaseHas('contactos', [
            'id_contacto' => $contacto->id_contacto,
            'nombre' => $contacto->nombre,
            'correo' => $contacto->correo,
        ]);

        // Prueba que la API devuelva correctamente el contacto
        $respuesta = $this->get("/api/contactos/{$contacto->id_contacto}");

        $respuesta->assertStatus(200)
                  ->assertJson([
                      'id_contacto' => $contacto->id_contacto,
                      'nombre' => $contacto->nombre,
                      'correo' => $contacto->correo,
                  ]);
    }

    public function test_crear_nuevo_contacto()
{
    $datos = [
        'nombre' => 'Juan Pérez',
        'correo' => 'juan@example.com',
        'telefono' => '1234567890',
        'asunto' => 'Consulta',
        'mensaje' => 'Este es un mensaje de prueba',
    ];

    // Envía una solicitud POST a la API
    $respuesta = $this->post('/api/contactos', $datos);

    // Verifica que la respuesta tenga un estado 201 (creado)
    $respuesta->assertStatus(201);

    // Verifica que el registro se haya insertado en la base de datos
    $this->assertDatabaseHas('contactos', $datos);
}

public function test_actualizar_contacto()
{
    // Obtiene un contacto existente
    $contacto = Contacto::first();
    $this->assertNotNull($contacto, 'No se encontró ningún contacto en la base de datos.');

    $datosActualizados = [
        'nombre' => 'Juan Actualizado',
        'correo' => 'actualizado@example.com',
    ];

    // Envía una solicitud PUT a la API
    $respuesta = $this->put("/api/contactos/{$contacto->id_contacto}", $datosActualizados);

    // Verifica que la respuesta tenga un estado 200 (OK)
    $respuesta->assertStatus(200);

    // Verifica que los datos se hayan actualizado en la base de datos
    $this->assertDatabaseHas('contactos', $datosActualizados);
}


public function test_eliminar_segundo_contacto()
{
    // Obtiene el segundo contacto en la tabla
    $contacto = Contacto::skip(1)->first();
    $this->assertNotNull($contacto, 'No se encontró un segundo contacto en la base de datos.');

    // Envía una solicitud DELETE a la API
    $respuesta = $this->delete("/api/contactos/{$contacto->id_contacto}");

    // Verifica que la respuesta tenga un estado 204 (sin contenido)
    $respuesta->assertStatus(204);

    // Verifica que el registro se haya eliminado de la base de datos
    $this->assertDatabaseMissing('contactos', [
        'id_contacto' => $contacto->id_contacto,
    ]);
}


}
