<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'name' => 'Martin Cruz',
            'email' => 'i@martincruz.me',
            'password' => bcrypt('123456'),
        ]);

        factory(User::class)->create([
            'name' => 'Mario Vazquez',
            'email' => 'vasquezalvaradomario@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        factory(User::class, 8)->create();
    }
}
