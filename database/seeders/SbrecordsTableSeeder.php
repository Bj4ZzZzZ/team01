<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SbrecordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i=0;$i<30;$i++){
            DB::table('sbrecords')->insert([
            'school_year' => rand(110, 115),
            'semester' => rand(1,2),
            'sid' => rand(1, 30),
            'bid' => rand(1, 25)
            ]);
        }
        
    }
}
