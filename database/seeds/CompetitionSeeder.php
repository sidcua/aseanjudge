<?php

use Illuminate\Database\Seeder;

class CompetitionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('performer_competition')->insert([
            [
                'performer' => '1 CTE - MR. ADRIAN B. BUCOY',
                'sex' => 'Male',
            ],
            [
                'performer' => '1 CTE - MS. ANGELINE N. FALCASANTOS',
                'sex' => 'Female',
            ],
            [
                'performer' => '2 CICS - MR. LAWRENCE JACOB S. GLOVA',
                'sex' => 'Male',
            ],
            [
                'performer' => '2 CICS - MS. NICHOLE M. DOMOCHO',
                'sex' => 'Female',
            ],
            [
                'performer' => '3 SBA - MR. GLENN MARK F. DELACRUZ',
                'sex' => 'Male',
            ],
            [
                'performer' => '3 SBA - MS. WHEILJANE S. RUIZ',
                'sex' => 'Female',
            ],
            [
                'performer' => '4 CME - MR. JUSTINE KYLE D. TAPALES',
                'sex' => 'Male',
            ],
            [
                'performer' => '4 CME - MS. ANGEL FAITH T. FULLIDO',
                'sex' => 'Female',
            ],
            [
                'performer' => '5 CAHS - MR. MARK JOVANNI C. MACAPILI',
                'sex' => 'Male',
            ],
            [
                'performer' => '5 CAHS - MS. ELAINE DANICA P. OSORIO',
                'sex' => 'Female',
            ],
            [
                'performer' => '6 CET - MR. JOHN REI S. ABEQUIBEL',
                'sex' => 'Male',
            ],
            [
                'performer' => '6 CET - MS. MA. ELEANOR A. URO',
                'sex' => 'Female',
            ],
            [
                'performer' => '7 ITE - MR. HARVEY JADE M. BORRES',
                'sex' => 'Male',
            ],
            [
                'performer' => '7 ITE - MS. ROSIDEL RAMOS',
                'sex' => 'Female',
            ],
            [
                'performer' => '8 SHS - MR. SAM DAVID C. GRAUNO',
                'sex' => 'Male',
            ],
            [
                'performer' => '8 SHS - MS. ROXIE ANN L. SILVA',
                'sex' => 'Female',
            ],
            [
                'performer' => '9 VITALI - MR. JOSHUA EMMANUEL B. HOMOROC',
                'sex' => 'Male',
            ],
            [
                'performer' => '9 VITALI - 	MS. AIZA LIMEN AIZON',
                'sex' => 'Female',
            ],
            [
                'performer' => '10 SIAY - MR. JEROME ANGELO G. CASINILLO',
                'sex' => 'Male',
            ],
            [
                'performer' => '10 SIAY - MS. PRECIOUS ALYSSA B. GEMPESAW',
                'sex' => 'Female',
            ],
            [
                'performer' => '11 KABASALAN - MR. KABASALAN',
                'sex' => 'Male',
            ],
            [
                'performer' => '11 KABASALAN - MS. KABASALAN',
                'sex' => 'Female',
            ],
            [
                'performer' => '12 MALANGS - MR. MALANGAS',
                'sex' => 'Male',
            ],
            [
                'performer' => '12 MALANGAS - MS. MALANGAS',
                'sex' => 'Female',
            ],
        ]);
    }
}
