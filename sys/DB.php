<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DB
 *
 * @author linux
 */
namespace App\Sys;
require 'Helper.php';

use App\Sys\Helper;

class DB extends \PDO{

    private $stmt;
    static private $_instance=null;
    
    
    static function getInstance(){
        if(!(self::$_instance instanceof self)){
            self::$_instance=new self();
        }
        return self::$_instance;
    }

    function __construct(){
       
        $dbconf=Helper::getConfig();
        
        $dsn=$dbconf['driver'].':host='.$dbconf['dbhost'].';dbname='.$dbconf['dbname'];
        $usr=$dbconf['dbuser'];
        $pwd=$dbconf['dbpass'];
        
        parent::__construct($dsn,$usr,$pwd);
    }


    public function query(){
        
}
}
