<?php

use App\Models\Answer;
use Illuminate\Database\Seeder;

class AnswerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 5) as $question_id)
        {
            foreach (range(1, 10) as $user_id)
            {
                factory(Answer::class)->create([
                    'user_id' => $user_id,
                    'question_id' => $question_id
                ]);
            }
        }
    }
}
