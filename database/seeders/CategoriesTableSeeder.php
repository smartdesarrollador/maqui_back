<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'nombre' => 'Ansiedad',
                'descripcion' => 'Es una emoción caracterizada por sentimientos de tensión, pensamientos preocupantes y síntomas físicos como aumento del ritmo cardíaco o sudoración. En casos severos, puede convertirse en un trastorno que afecta la vida diaria.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Estrés',
                'descripcion' => 'Es un trastorno del estado de ánimo que implica sentimientos persistentes de tristeza, pérdida de interés en actividades y una baja autoestima. Puede afectar el funcionamiento diario y, en casos graves, llevar a pensamientos suicidas.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Depresión',
                'descripcion' => 'Es un trastorno del estado de ánimo que implica sentimientos persistentes de tristeza, pérdida de interés en actividades y una baja autoestima. Puede afectar el funcionamiento diario y, en casos graves, llevar a pensamientos suicidas.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Trastornos de personalidad',
                'descripcion' => 'Son un grupo de trastornos mentales caracterizados por patrones de comportamiento, cognición y experiencia emocional inflexibles y desadaptativos que afectan negativamente la vida de la persona y sus relaciones con los demás.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Estados de ánimo',
                'descripcion' => 'Son emociones sostenidas que influyen en la forma en que una persona percibe e interactúa con el mundo. Los estados de ánimo pueden ser positivos (alegría) o negativos (tristeza), y varían en intensidad y duración.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Relaciones',
                'descripcion' => 'En psicología, se refiere a las conexiones emocionales y sociales entre individuos. Las relaciones interpersonales sanas son clave para el bienestar emocional y pueden verse afectadas por problemas psicológicos.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Desarrollo personal',
                'descripcion' => 'Se refiere al proceso continuo de mejorar las habilidades, el autoconocimiento y la autoestima para alcanzar el máximo potencial. Es un aspecto importante en la psicología humanista y el bienestar mental.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Tips psicológicos',
                'descripcion' => 'Son recomendaciones prácticas basadas en principios de la psicología para mejorar el bienestar mental, gestionar emociones, mejorar relaciones y promover hábitos saludables en la vida diaria.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
        ]);
    }
}
