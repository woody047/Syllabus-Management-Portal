<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class courseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //for($i=1;$i<5;$i++)
        {
            DB::table('courses')->insert([
                'course_code' =>'UECS1233',
                'course_name' =>'Database System Fundamentals',
                'course_synopsis' =>'The unit covers various aspects of relational databases and database management systems such as constraints, languages,
                design, normalization, database design theory and methodology, and basic database security.',
                'course_staff' =>'Dr Ali',
                'course_trimester' =>'T1Y1,T1Y3',
                'course_credit' =>'3',
                'course_pre' =>'None',
                'course_classification' =>'Core',    
            ]);
            DB::table('courses')->insert([
                'course_code' =>'UECS6353',
                'course_name' =>'Programming and Problem Solving',
                'course_synopsis' =>'The course starts with an introduction to the basic structure of a computer system, types of programming languages, the programming
                process, and problem-solving concepts. Next the basics of programming are presented including program input and output. This is
                followed by a presentation on structured programming with control structures for selection and repetition, modular programming with
                functions, and arrays, and the use of these programming language elements in problem solving. Program design concepts and
                elements, such as algorithms, flowcharts, and structure charts, are also introduced.',
                'course_staff' =>'Dr Maryam',
                'course_trimester' =>'T1Y1,T2Y1',
                'course_credit' =>'4',
                'course_pre' =>'None',
                'course_classification' =>'Core',    
            ]);

        }
    }
}
