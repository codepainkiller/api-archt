<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(UserTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(PlaceTableSeeder::class);
        $this->call(QuestionTableSeeder::class);
        $this->call(AnswerTableSeeder::class);
        $this->call(VisitTableSeeder::class);
        $this->call(PhotoTableSeeder::class);
        $this->call(AudioTableSeeder::class);

        Model::reguard();
    }
}
