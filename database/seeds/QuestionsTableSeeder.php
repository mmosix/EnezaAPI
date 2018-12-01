<?php

use Illuminate\Database\Seeder;
use App\Question;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Question::truncate();

        $questions = [
            'What is the largest continent in the world?',
            'Latitudes move which direction on a map?',
            'What is the largest planet in our galaxy?'
        ];
        $answers = [
            'Asia',
            'East to West',
            'Jupiter'
        ];

        for ($i=0; $i <3; $i++) { 
                Question::create([
                'id'=>$i+1,
                'title' => $questions[$i],
                'answer' => $answers[$i]
            ]);
        }
    }
}
