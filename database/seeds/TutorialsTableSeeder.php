<?php

use Illuminate\Database\Seeder;
use App\Tutorial;

class TutorialsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 

$tut1 = <<<ABC
You could also say that abbreviations are shortened versions of written words or phrases used to replace the original. Here are some examples: A.D. = Anno Domini - in the year of the Lord A.M. = Ante Meridiem - before midday B.A. = Bachelor of Arts B.S. = Bachelor of Science e.g. = for example et al. = and others", "and co-workers" etc. = et cetera, "and the others", "and other things", "and the rest"i.e. = 'that is'N.B. = nota bene, "note well"Ph. D. = "Doctor of Philosophy" P.M. = Post Meridiem, "after midday" vs. = versus, "against" 
ABC;

$tut2 = <<<ABC
A clause is a group of related words that include a subject and predicate. Predicate is the part of a sentence that shows action or describes the subject. A sentence may have the main clause and one or more subordinate clauses. For example: The boy who was telling a story is a prefect. 'Who' is used to refer to the person who did the action. The pupil who worked hardest was given a reward. 'Whose' shows ownership or possession. For example: The boy whose shirt the cows tore got injured.
ABC;
        
        $tut=['Tutorial 1','Tutorial 2'];

        $content = [ $tut1, $tut2 ];
        
        Tutorial::truncate();

        for ($i=0; $i < 2; $i++) { 
            Tutorial::create([
                'id'=> $i+1,
                'title' => $tut[$i],
                'content' => $content[$i],
                'subject_id'=> 1
            ]);
        }
    }
}
