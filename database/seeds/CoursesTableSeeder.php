<?php

use Illuminate\Database\Seeder;
use App\Course;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::truncate();
        $title = [ 'Primary', 'Secondary' ];
        $descp = 'Description for this course';

        for ($i=0; $i < 2; $i++) { 
            DB::table('courses')->insert([
                'id' => $i+1,
                'title'=>$title[$i],
                'description'=>$descp
            ]);
        }  

    }
}
