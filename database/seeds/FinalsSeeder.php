<?php

use Illuminate\Database\Seeder;

class FinalsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('performer_finals')->insert([
            [
                'performer' => '1 CTE - MR. ADRIAN B. BUCOY',
                'sex' => 'Male'
            ],
            [
                'performer' => '2 CICS - MR. LAWRENCE JACOB S. GLOVA',
                'sex' => 'Male'
            ],
            [
                'performer' => '3 SBA - MR. GLENN MARK F. DELACRUZ',
                'sex' => 'Male'
            ],
            [
                'performer' => '3 SBA - MS. WHEILJANE S. RUIZ',
                'sex' => 'Female'
            ],
            [
                'performer' => '4 CME - MS. ANGEL FAITH T. FULLIDO',
                'sex' => 'Female',
            ],
            [
                'performer' => '5 CAHS - MS. ELAINE DANICA P. OSORIO',
                'sex' => 'Female',
            ],
        ]);
    }
}
