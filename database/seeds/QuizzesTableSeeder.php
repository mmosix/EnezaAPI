<?php

use Illuminate\Database\Seeder;
use App\Quiz;

class QuizzesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $title=['Quiz 1','Quiz 2'];
        $descp = 'Description for this quiz';

        Quiz::truncate();
        
        for ($i=0; $i < 2; $i++) { 
            $quiz =  Quiz::create([
                 'id'=> $i+1,
                 'title' => $title[$i],
                 'description'=>$descp,
                 'subject_id' => 1
             ]);
 
             
         }
    }
}
