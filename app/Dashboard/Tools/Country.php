<?php

namespace App\Dashboard\Tools;
use  App\Dashboard\Tools\Phone;

class Country
{
    const CAMERON_CODE      = 237;
    const ETHIOPIA_CODE     = 251;
    const MOROCCO_CODE      = 212;
    const MOZAMBIQUE_CODE   = 258;
    const UGANDA_CODE       = 256; 

    /**
     * return list of countries codes 
     * @param 
     * @return array od records
    */
    public static function countriesCodesList(): Array{
        return [
            self::CAMERON_CODE    =>"Cameron",
            self::ETHIOPIA_CODE   =>"Ethiopia",
            self::MOROCCO_CODE    =>"Morocco",
            self::MOZAMBIQUE_CODE =>"Mozambique",
            self::UGANDA_CODE     =>"Uganda"
        ];
    }

    /**
     * return list of countries names for dropdown list
     * @param 
     * @return array od records
    */
    public static function countriesNamesList(): Array{
        return [
            "Cameron"    =>"Cameron",
            "Ethiopia"   =>"Ethiopia",
            "Morocco"    =>"Morocco",
            "Mozambique" =>"Mozambique",
            "Uganda"     =>"Uganda"
        ];
    }

    /**
     * return list of countries phones validation regex 
     * @param 
     * @return array od records
    */

    public static function countriesPhonesValidationRegex(): Array{
        return [
            self::CAMERON_CODE    =>"/\(237\)\ ?[2368]\d{7,8}$/",
            self::ETHIOPIA_CODE   =>"/\(251\)\ ?[1-59]\d{8}$/",
            self::MOROCCO_CODE    =>"/\(212\)\ ?[5-9]\d{8}$/",
            self::MOZAMBIQUE_CODE =>"/\(258\)\ ?[28]\d{7,8}$/",
            self::UGANDA_CODE     =>"/\(256\)\ ?\d{9}$/"
        ];
    }

    /**
     * return available regex for validating phone number
     * @param Country code
     * @return regex
    */
    public static function getValidationRegexForcoutryCode($countryCode){
        $regex = self::countriesPhonesValidationRegex();
        return isset($regex[$countryCode])? $regex[$countryCode]:NULL;

    }

    /**
     * return available country name
     * @param Country code
     * @return country name
    */
    public static function getCountryNameFromCode($countryCode){
        $countries = self::countriesCodesList();
        return isset($countries[$countryCode])? $countries[$countryCode]:NULL;
    }

    /**
     * validate phone number accroding to country code validation regex
     * @param Country code
     * @param Phone number 
     * @return country name
    */
    public static function validateNumberAccordingToCode($phone,$countryCode){

        $regex = self::getValidationRegexForcoutryCode($countryCode);

        return (isset($regex) && preg_match($regex , $phone)==true)? Phone::STATE_VALID_PHONE:Phone::STATE_INVALID_PHONE;
    }

    public static function getCountryCodeFromPhone($phone){
        return substr($phone, 1,3);
    }

    
}

