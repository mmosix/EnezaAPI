<?php

use Illuminate\Database\Seeder;
use App\Option;

class OptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Option::truncate();
        $option1 = [
            'America',
            'Asia',
            'Europe',
            'Africa'
        ];

        $option2 = [
            'East to West',
            'North to South'
        ];

        $option3 = [
            'Earth',
            'Satan',
            'Jupiter'
        ];

        for ($i=0; $i <4; $i++) { 

            Option::create([
                'choice' => $option1[$i],
                'question_id'=> 1
            ]);
        }

        for ($i=0; $i <2; $i++) { 

            Option::create([
                'choice' => $option2[$i],
                'question_id'=> 2
            ]);
        }

        for ($i=0; $i <3; $i++) { 

            Option::create([
                'choice' => $option3[$i],
                'question_id'=> 3
            ]);
        }
        
    }
}
