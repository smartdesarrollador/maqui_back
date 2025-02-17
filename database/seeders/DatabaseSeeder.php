<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\ActividadEconomica;
use App\Models\Categoria1;
use App\Models\Feedback;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $horaActual = Carbon::now();
        
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        /* \App\Models\Accion::factory(7)->create();
        \App\Models\ActividadDenuncia::factory(7)->create();
        \App\Models\ActividadEconomica::factory(5)->create();
        \App\Models\Anno::factory(7)->create();
        \App\Models\Empleador::factory(7)->create();
        \App\Models\Modalidad::factory(7)->create();
        \App\Models\Afp::factory(7)->create();
        \App\Models\EstadoContrato::factory(7)->create();
        \App\Models\TipoContrato::factory(7)->create();
        \App\Models\Trabajador::factory(7)->create();
        \App\Models\Documento::factory(7)->create();
        \App\Models\Contrato::factory(7)->create(); */

        $this->call([
            UserSeeder::class,
            RolesSeeder::class,
            PermisosSeeder::class,
            PermisosRolesSeeder::class,
            RolesUsuariosSeeder::class,
            TiposMediosSeeder::class,
            MediosSeeder::class,
            MisionSeeder::class,
            CarouselSeeder::class,
            ClientesSeeder::class,
            CategoriaProductoSeeder::class,
            EstadoPedidoSeeder::class,
            ProductoSeeder::class,
            PedidoSeeder::class,
            DetallePedidoSeeder::class,
            FeedbackSeeder::class,
            ContactoSeeder::class,
            TestimonioSeeder::class,
            PostsTableSeeder::class,
            CategoriesTableSeeder::class,
            CommentsTableSeeder::class,
            TagsTableSeeder::class,
            PostTagsTableSeeder::class,
            PostCategoryTableSeeder::class,
            Categoria1Seeder::class,
            Tabla1Seeder::class,
            ClienteSeeder::class,
            MarcaSeeder::class,
            ModeloSeeder::class,
            TipoMotoSeeder::class,
            motoSeeder::class,
            TipoAccesorioSeeder::class,
            AccesorioSeeder::class,
            AccesorioMotoSeeder::class,
            TipoRepuestoSeeder::class,
            RepuestoSeeder::class,
            RepuestoMotoSeeder::class,
            CotizacionSeeder::class,
            CotizacionAccesorioSeeder::class,
            CotizacionRepuestoSeeder::class,
            FinanciamientoSeeder::class,
            ResenaSeeder::class,
            MediaCategorieSeeder::class,
            MediaFileSeeder::class,
            CategoriaArticuloSeeder::class,
            ArticuloSeeder::class,
            EstudianteSeeder::class,
            CursoSeeder::class,
            EstudianteCursoSeeder::class,
        ]);
    }
}
