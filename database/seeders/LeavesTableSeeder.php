<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeavesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function generateRandomString($length = 10) {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function run()
    {
        for ($i=0;$i<30;$i++){
            $random_startdatetime = Carbon::now()->subMonth(rand(1,5))->subDay(rand(1,29))->toDateString();
            $random_enddatetime = Carbon::now()->addMonth(rand(1,5))->addDay(rand(1,29))->toDateString();
            $reason = $this -> generateRandomString();
            //
            DB::table('leaves')->insert([
                'sbid' => rand(1,30),
                'start' => $random_startdatetime,
                'end' => $random_enddatetime,
                'reason' => $reason,
                'floorhead_check' => rand(0,1),
                'housemaster_check' => rand(0,1)
            ]);
        }
        
        
    }
}
