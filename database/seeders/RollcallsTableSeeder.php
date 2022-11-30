<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RollcallsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    

    public function run()
    {
        //
        $choice = [null,true,false];
        for($i=0;$i<30;$i++){
            $random_datetime = Carbon::now()->subMonth(rand(1,5))->subDay(rand(1,29))->subHour(rand(1,6))->subMinute(rand(1,15))->subSecond(rand(1,30));

            DB::table('rollcalls')->insert([
                'date' => $random_datetime,
                'sbid' => rand(1,30),
                'presence' => rand(0,1),
                'leave' => $choice[rand(0,2)],
                'late' => $choice[rand(0,2)],
        ]);
        }
        
    }
}
