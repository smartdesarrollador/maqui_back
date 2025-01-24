<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
/* 6.- ENVIO-CORREO-V1-P1 */
use App\Mail\ContactoEmail;
use App\Mail\NotificacionAdminEmail;
use Illuminate\Support\Facades\Mail;
use App\Models\Contacto;
/* /6.- ENVIO-CORREO-V1-P1 */
use Illuminate\Http\Response;

class ContactoController extends Controller
{
/* 7.- ENVIO-CORREO-V1-P1 */
     public function index()
    {
        $contactos = Contacto::all();
        return response()->json($contactos, Response::HTTP_OK);
    }

    public function show($id_contacto)
    {
        // Busca el contacto por ID
        $contacto = Contacto::find($id_contacto);

        // Si no se encuentra, devuelve una respuesta con estado 404
        if (!$contacto) {
            return response()->json(['message' => 'Contacto no encontrado'], 404);
        }

        // Si se encuentra, devuelve el contacto con estado 200
        return response()->json($contacto, 200);
    }



     public function sendContactForm(Request $request)
    {
        $data = [
            'nombre' => $request->input('nombre'),
            'correo' => $request->input('correo'),
            'telefono' => $request->input('telefono'),
            'asunto' => $request->input('asunto'),
            'mensaje' => $request->input('mensaje'),
        ];

        // Enviar email al cliente
        $emailCliente = new ContactoEmail($data);
        Mail::to($request->input('correo'))->send($emailCliente);

        // Enviar notificación diferente al administrador
        $emailAdmin = new NotificacionAdminEmail($data);
        Mail::to('atencion@kalmaperu.org')->send($emailAdmin);

        // Guardar en base de datos
        $contacto = new Contacto([
            'nombre' => $request->input('nombre'),
            'correo' => $request->input('correo'),
            'telefono' => $request->input('telefono'),
            'asunto' => $request->input('asunto'),
            'mensaje' => $request->input('mensaje'),
        ]);
        
        $contacto->save();

        return response()->json([
            'Success' => 'Emails enviados correctamente',
            'code' => '200',
        ], 200);
    


    }
    /* /7.- ENVIO-CORREO-V1-P1 */

    public function store(Request $request)
    {
        // Valida los datos de entrada
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|max:255',
            'telefono' => 'nullable|string|max:255',
            'asunto' => 'nullable|string|max:255',
            'mensaje' => 'nullable|string',
        ]);

        // Crea un nuevo contacto
        $contacto = Contacto::create($validatedData);

        return response()->json($contacto, 201); // 201 Created
    }

    /**
     * Actualiza un contacto existente en la base de datos.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id_contacto
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id_contacto)
    {
        // Busca el contacto por ID
        $contacto = Contacto::find($id_contacto);

        if (!$contacto) {
            return response()->json(['message' => 'Contacto no encontrado'], 404);
        }

        // Valida los datos de entrada
        $validatedData = $request->validate([
            'nombre' => 'sometimes|required|string|max:255',
            'correo' => 'sometimes|required|email|max:255',
            'telefono' => 'nullable|string|max:255',
            'asunto' => 'nullable|string|max:255',
            'mensaje' => 'nullable|string',
        ]);

        // Actualiza el contacto
        $contacto->update($validatedData);

        return response()->json($contacto, 200); // 200 OK
    }

    /**
     * Elimina un contacto de la base de datos.
     *
     * @param int $id_contacto
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id_contacto)
    {
        // Busca el contacto por ID
        $contacto = Contacto::find($id_contacto);

        if (!$contacto) {
            return response()->json(['message' => 'Contacto no encontrado'], 404);
        }

        // Elimina el contacto
        $contacto->delete();

        return response()->json(null, 204); // 204 No Content
    }
}
