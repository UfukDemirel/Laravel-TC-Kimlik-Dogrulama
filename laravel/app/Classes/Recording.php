<?php

namespace App\Classes;
use Illuminate\Support\Facades\DB;

class Recording
{

    public function kiskaydet($tc, $ad, $soyad, $dogumyili){
        try {
            DB::table("birey")->insert([
                "tc"=> $tc,
                "ad" => $ad,
                "soyad" => $soyad,
                "dogumyili" => $dogumyili,
            ]);

            return true;
        } catch (\Exception $e) {
            return false;
        }

    }

    public function hatalikaydet($tc,$ad,$soyad,$dogumyili,$userIp ,$hata){
        try{
            DB::table("failedLogs")->insert([
                "tc"=>$tc,
                "ad"=>$ad,
                "soyad"=>$soyad,
                "dogumyili"=>$dogumyili,
                "ip"=>$userIp,
                "hata"=> $hata
            ]);
            return true;
        }catch (\Exception $e){
            return false;
        }
    }


}
