<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->create([
            'Iglesias y nonasterios',
            'Casas coloniales y republicanas',
            'Museos y salas de exposicion',
            'Galerias y centros comerciales',
            'Sitios de interes',
            'Instituciones',
            'Lugares de entretenimiento'
        ]);
    }

    private function create(array $names)
    {
        foreach($names as $name) {
            Category::create([
                'name' => $name
            ]);
        }
    }
}
