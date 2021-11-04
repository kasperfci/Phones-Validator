<?php

namespace App\Dashboard\Tools;

class Phone
{
    const CAMERON_CODE      = 237;
    const ETHIOPIA_CODE     = 251;
    const MOROCCO_CODE      = 212;
    const MOZAMBIQUE_CODE   = 258;
    const UGANDA_CODE       = 256; 

    const STATE_VALID_PHONE = "Valid";
    const STATE_INVALID_PHONE = "Invalid";

    
    /**
     * return list of phones states for dropdown lists
     * @param 
     * @return array od records
    */
    public static function phonesStatesList(): Array{
        return [
            self::STATE_VALID_PHONE   => "Valid Phone",
            self::STATE_INVALID_PHONE =>"Invalid Phone"
        ];
    }


    public static function cleanNumner($phone , $countryCode){
        $cleandPhone  =  preg_replace("/[^0-9]/", "", $phone );

        return self::removeCountryCode( $cleandPhone , $countryCode);
    }

    public function removeCountryCode($phone , $countryCode){
        $pos = strpos($phone, $countryCode);

        if ($pos !== false) {
            $phone = substr_replace($phone, '', $pos, strlen($countryCode));
        }

        return $phone;
    }

    
    
}

