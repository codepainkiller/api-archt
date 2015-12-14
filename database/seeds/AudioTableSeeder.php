<?php

use App\Models\Audio;
use Illuminate\Database\Seeder;

class AudioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Audio::class, 20)->create();
    }
}
