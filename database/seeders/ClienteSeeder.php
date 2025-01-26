<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $horaActual = Carbon::now();

        DB::table('cliente')->insert([
            'nombre' => 'Cliente 1',
            'apellido' => 'Apellido 1', 
            'email' => 'cliente1@example.com',
            'telefono' => '1234567890',
            'tipo_usuario' => 'cliente',
            'tipo_documento' => 'DNI',
            'numero_documento' => '12345678',
            'fecha_nacimiento' => '1990-01-01',
            'departamento' => 'Lima',
            'provincia' => 'Lima',
            'distrito' => 'Miraflores',
            'imagen' => 'https://example.com/cliente1.jpg',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('cliente')->insert([
            'nombre' => 'Cliente 2',
            'apellido' => 'Apellido 2',
            'email' => 'cliente2@example.com', 
            'telefono' => '2345678901',
            'tipo_usuario' => 'cliente',
            'tipo_documento' => 'DNI',
            'numero_documento' => '23456789',
            'fecha_nacimiento' => '1992-03-15',
            'departamento' => 'Lima',
            'provincia' => 'Lima', 
            'distrito' => 'San Isidro',
            'imagen' => 'https://example.com/cliente2.jpg',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('cliente')->insert([
            'nombre' => 'Cliente 3',
            'apellido' => 'Apellido 3',
            'email' => 'cliente3@example.com',
            'telefono' => '3456789012',
            'tipo_usuario' => 'cliente', 
            'tipo_documento' => 'DNI',
            'numero_documento' => '34567890',
            'fecha_nacimiento' => '1988-07-22',
            'departamento' => 'Lima',
            'provincia' => 'Lima',
            'distrito' => 'San Borja',
            'imagen' => 'https://example.com/cliente3.jpg',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('cliente')->insert([
            'nombre' => 'Cliente 4',
            'apellido' => 'Apellido 4',
            'email' => 'cliente4@example.com',
            'telefono' => '4567890123',
            'tipo_usuario' => 'cliente',
            'tipo_documento' => 'DNI', 
            'numero_documento' => '45678901',
            'fecha_nacimiento' => '1995-11-30',
            'departamento' => 'Lima',
            'provincia' => 'Lima',
            'distrito' => 'La Molina',
            'imagen' => 'https://example.com/cliente4.jpg',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('cliente')->insert([
            'nombre' => 'Cliente 5',
            'apellido' => 'Apellido 5',
            'email' => 'cliente5@example.com',
            'telefono' => '5678901234',
            'tipo_usuario' => 'admin',
            'tipo_documento' => 'DNI',
            'numero_documento' => '56789012',
            'fecha_nacimiento' => '1987-04-18',
            'departamento' => 'Lima',
            'provincia' => 'Lima',
            'distrito' => 'Surco',
            'imagen' => 'https://example.com/cliente5.jpg',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('cliente')->insert([
            'nombre' => 'Cliente 6',
            'apellido' => 'Apellido 6',
            'email' => 'cliente6@example.com',
            'telefono' => '6789012345',
            'tipo_usuario' => 'cliente',
            'tipo_documento' => 'Pasaporte',
            'numero_documento' => 'AB123456',
            'fecha_nacimiento' => '1993-09-25',
            'departamento' => 'Lima',
            'provincia' => 'Lima',
            'distrito' => 'San Miguel',
            'imagen' => 'https://example.com/cliente6.jpg',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('cliente')->insert([
            'nombre' => 'Cliente 7',
            'apellido' => 'Apellido 7',
            'email' => 'cliente7@example.com',
            'telefono' => '7890123456',
            'tipo_usuario' => 'cliente',
            'tipo_documento' => 'DNI',
            'numero_documento' => '67890123',
            'fecha_nacimiento' => '1991-12-05',
            'departamento' => 'Lima',
            'provincia' => 'Lima',
            'distrito' => 'Magdalena',
            'imagen' => 'https://example.com/cliente7.jpg',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('cliente')->insert([
            'nombre' => 'Cliente 8',
            'apellido' => 'Apellido 8',
            'email' => 'cliente8@example.com',
            'telefono' => '8901234567',
            'tipo_usuario' => 'cliente',
            'tipo_documento' => 'DNI',
            'numero_documento' => '78901234',
            'fecha_nacimiento' => '1994-06-14',
            'departamento' => 'Lima',
            'provincia' => 'Lima',
            'distrito' => 'Pueblo Libre',
            'imagen' => 'https://example.com/cliente8.jpg',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('cliente')->insert([
            'nombre' => 'Cliente 9',
            'apellido' => 'Apellido 9',
            'email' => 'cliente9@example.com',
            'telefono' => '9012345678',
            'tipo_usuario' => 'cliente',
            'tipo_documento' => 'DNI',
            'numero_documento' => '89012345',
            'fecha_nacimiento' => '1989-02-28',
            'departamento' => 'Lima',
            'provincia' => 'Lima',
            'distrito' => 'Jesus Maria',
            'imagen' => 'https://example.com/cliente9.jpg',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('cliente')->insert([
            'nombre' => 'Cliente 10',
            'apellido' => 'Apellido 10',
            'email' => 'cliente10@example.com',
            'telefono' => '0123456789',
            'tipo_usuario' => 'admin',
            'tipo_documento' => 'DNI',
            'numero_documento' => '90123456',
            'fecha_nacimiento' => '1986-08-10',
            'departamento' => 'Lima',
            'provincia' => 'Lima',
            'distrito' => 'Lince',
            'imagen' => 'https://example.com/cliente10.jpg',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);
    }
}
