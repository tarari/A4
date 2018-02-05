<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Sys;

/**
 * Description of Helper
 *
 * @author linux
 */
class Helper {
    
    
    static function getConfig(){
        
        return (array) json_decode(file_get_contents(CONF));
    }
}
