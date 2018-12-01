<?php

use Illuminate\Database\Seeder;
use App\Subject;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subjects=['English','Mathematics','Science','Social Studies','Swahili','Twi'];
        $ids = [ 1, 1, 1, 2, 2, 2 ];
        $descp = 'Description for this subject';

        Subject::truncate();

        for ($i=0; $i < 6; $i++) { 
            Subject::create([
                'id'=>$i+1,
                'title'=> $subjects[$i],
                'description'=>$descp,
                'course_id' => $ids[$i]
            ]);
        }

        // $data = array(
        //     array('course_id'=>1, 'title'=>'English', 'description'=> 'Description for this subject'),
        //     array('course_id'=>1, 'title'=>'Social Studies', 'description'=> 'Description for this subject'),
        //     array('course_id'=>1, 'title'=>'Science', 'description'=> 'Description for this subject'),
        //     array('course_id'=>2, 'title'=>'Swahili', 'description'=> 'Description for this subject'),
        //     array('course_id'=>2, 'title'=>'Social Studies', 'description'=> 'Description for this subject'),
        //     array('course_id'=>2, 'title'=>'Science', 'description'=> 'Description for this subject'),
        // );

        // DB::table('subjects')->insert($data); // Query Builder approach
    }
}
