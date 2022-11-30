<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BedsTableSeeder extends Seeder
{
    public $linkStr = "";
    public function generateRandomBedcode($length = 2) {
        $domitorycode = ["81","82","83"];
        $floorcode_girl1 = '3567';
        $floorcode_boy1andgirl2 = '12345';
        $floorcode_boy3 = '3456';

        $bedcode = '-01234567';
        $bedcodelength = strlen($bedcode);
        $randomString = "";
        $bedcodeString = $domitorycode[rand(0,count($domitorycode)-1)];

        for ($i = 0; $i < $length; $i++) { 
            if ($i == 0 && $bedcodeString==81){
                $randomString .= $floorcode_girl1[rand(1, strlen($floorcode_girl1) - 1)]."0".rand(1,9);
            }
            else if ($i == 0 && $bedcodeString==82){
                $floorcode_boy1andgirl2 = $floorcode_boy1andgirl2[rand(0, strlen($floorcode_boy1andgirl2) - 1)];
                $randomString .= $floorcode_boy1andgirl2;
                if ($floorcode_boy1andgirl2=="1"){
                    if(rand(1,28)/10<1)
                        $randomString.="0".rand(4,9);
                    else 
                        if (rand(10,28)<12)
                            $randomString.=rand(10,11);
                        else 
                            $randomString.=rand(12,28);
                }
                else if ($floorcode_boy1andgirl2=="2"){
                    if(rand(1,32)/10<1)
                        $randomString.="0".rand(1,9);
                    else 
                        if (rand(10,28)<15)
                            $randomString.=rand(10,14);
                        else 
                            $randomString.=rand(15,32);
                }
                else {
                    if(rand(1,32)/10<1)
                        $randomString.="0".rand(1,9);
                    else 
                        $randomString.=rand(10,32);
                }

            }
            else if ($i == 0 && $bedcodeString==83){
                $randomString .= $floorcode_boy3[rand(1, strlen($floorcode_boy3) - 1)];
                if(rand(1,39)/10<1)
                    $randomString.="0".rand(1,9);
                else
                    $randomString.=rand(10,39);
            }
            else if ($i == 1)
                if($bedcodeString==81)
                    $randomString .= $bedcode[0].rand(1,4);

                else if($bedcodeString==82)
                    $randomString .= $bedcode[0].rand(1,3);

                else if($bedcodeString==83)
                    $randomString .= $bedcode[0].rand(1,4);

            else
                $randomString .= $bedcode[rand(1, $bedcodelength - 1)];
        }
        $GLOBALS["linkStr"]=$bedcodeString.$randomString;
        return $bedcodeString.$randomString;
    }

    public function generateRandomDid() {
        $bedcord = $GLOBALS["linkStr"];
        $domitorycode = $bedcord[0].$bedcord[1];
        $floorcode = $bedcord[2];
        $domitorynumber = 0;
        $did = [1,2,3,4];
        
        if($domitorycode=="81")$domitorynumber=$did[0];
        else if($domitorycode=="82"){
            if ($floorcode == "1"){
                $int_value = (int)($bedcord[3].$bedcord[4]);
                if($int_value>11)$domitorynumber=$did[2];
                else $domitorynumber = $did[1];
            }
            else if ($floorcode =="2"){
                $int_value = (int)($bedcord[3].$bedcord[4]);
                if($int_value>14)$domitorynumber=$did[2];
                else $domitorynumber = $did[1];
            }
            else $domitorynumber = $did[1];
        }
        else if($domitorycode=="83")$domitorynumber=$did[3];
        return $domitorynumber;
    }

    public function generateRandomFloor() {
        $bedcord = $GLOBALS["linkStr"];
        $floorcode = $bedcord[2];
        $Floor = [1,2,3,4,5,6,7];
        
        return $Floor=$Floor[array_search($floorcode,$Floor)]."F";
    }

    public function generateRandomRoomtype() {
        $positions = ['三', '四'];
        $bedcord = $GLOBALS["linkStr"];
        $domitorycode = $bedcord[0].$bedcord[1];
        if ($domitorycode == "82")$positions = $positions[0];
        else $positions = $positions[1];
        return $positions . "人房";
    }

    public function run()
    {
        
        for($i = 0; $i<30; $i++){
            $bedcode = $this->generateRandomBedcode();
            $did = $this->generateRandomDid();
            $floor = $this->generateRandomFloor();
            $roomtype = $this->generateRandomRoomtype();
        
            DB::table('beds')->insert([
                'bedcode' => $bedcode,
                'did' => $did,
                'floor' => $floor,
                'roomtype' => $roomtype
            ]);
        }

        
    }
}