<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $valores = [
            'Ciencia' => 'Tag de Ciencias Naturales',
            'Social' => 'Tag de Ciencias Sociales',
            'Deportes' => 'Tag de Deportes',
            'Arte' => 'Tag de Arte',
            'Vacio' => '',
        ];

        ksort($valores);

        foreach($valores as $name => $description) {
            Tag::create(compact('name', 'description'));
        }
    }
}
