<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LatesTableSeeder extends Seeder
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
    public function generateRandomNumberString($length = 10) {
        $numbers = "0123456789";
        $numbersLength = strlen($numbers);
        $randomNumberString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomNumberString .= $numbers[rand(0, $numbersLength - 1)];
        }
        return $randomNumberString;
    }
    public function generateRandomcontact() {
        $area_code = $this->generateRandomNumberString(2);
        $code = $this->generateRandomNumberString(8);
        $contact = $area_code . "-". $code;
        return $contact;
    }
    public function generateRandombacktime() {
        $hours = ["23","00"];
        $hour = $hours[rand(0,1)];
        if ($hour == "00"){
            $minute = "00";
        }
        else{
            $minute = strval(rand(30,59));
        }
        
        $back_time = $hour . $minute;
        return $back_time;
    }
        
    public function run()
    {
        for($i=0;$i<30;$i++){
            $random_startdatetime = Carbon::now()->subMonth(rand(1,5))->subDay(rand(1,29));
            $random_enddatetime = Carbon::now()->addMonth(rand(1,5))->addDay(rand(1,29));
            $reason = $this -> generateRandomString();
            $company = $this -> generateRandomString(15);
            $address = $this -> generateRandomString(20);
            $contact = $this -> generateRandomcontact();
            $back_time = $this -> generateRandombacktime();
            
            
            DB::table('lates')->insert([
                'sbid' => rand(1,30),
                'start' => $random_startdatetime,
                'end' => $random_enddatetime,
                'reason' => $reason,
                'company' => $company,
                'contact' => $contact,
                'address' => $address,
                'back_time' => $back_time,
                'filename_path' => "",
                'floorhead_check' => rand(0,1),
                'chief_check' => rand(0,1),
                'housemaster_check' => rand(0,1),
                'admin_check' => rand(0,1),
            ]);}
    }
}
