<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeaturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function PathCreate($length = 2) {
        $name = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $nameLength = strlen($name);
        $randomString = '.';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= "\\" ;
            for ($j = 0; $j < $length+1; $j++) {
                $randomString .= $name[rand(0, $nameLength - 1)];
            }
        }
        return $randomString;
    }

    public function FeatureCreate($length = 5) {
        $value = [NULL,'-','.','0','1','2','3','4','5','6','7','8','9'];
        $valueLength = count($value);
        $randomString = $value[rand(0, $valueLength - 12)] . $value[3] . $value[2];
        for ($j = 0; $j < $length - 2; $j++) {
        $randomString .= $value[rand(3, $valueLength - 1)];
        }
        // $randomString = '[ ';
        // for ($i = 0; $i < 128; $i++) {
        //     $randomString .= $value[rand(0, $valueLength - 11)] . $value[3] . $value[2];
        //     for ($j = 0; $j < $length - 2; $j++) {
        //     $randomString .= $value[rand(3, $valueLength - 1)];
        //     $randomString .= ', ';
        // }
        // }
        // $randomString .= ' ]';
        return $randomString;
    }

    public function run()
    {
        for($i=0;$i<30;$i++){
            $path = $this->PathCreate();
            $feature = $this->FeatureCreate();

            DB::table('features')->insert([
            'sbid' => rand(1, 30),
            'path' => $path,
            'feature' => $feature,
            ]);
        }
    }
}