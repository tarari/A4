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
    static private $_instance;
    
    
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
        try{
            parent::__construct($dsn,$usr,$pwd);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
         
        }


    public function query($sql){
        try{
            $this->stmt=$this->prepare($sql);
        }catch(\PDOException $e){
            echo $e->getMessage();
        }
    }
    /**
     *  Binds statement with variables
     * @param string $param
     * @param string $value
     */
    public function bind($param,$value){
        switch(true){
            case is_int($value):
                $type= \PDO::PARAM_INT;
                break;
            case is_bool($value):
                $type=\PDO::PARAM_BOOL;
                break;
            case is_null($value):
                $type= \PDO::PARAM_NULL;
                break;
            default:
                $type= \PDO::PARAM_STR;
                break;
        }
        $this->stmt->bindValue($param, $value,$type);
        
    }
    /**
     *  Use only after query()
     * @return boolean
     */
    function execute(){
        $result=$this->stmt->execute();
        return $result;
    }
    /**
     * Use only after execute()
     * @return array
     */
    function resultSet(){
        return $this->stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    
    function single(){
        return $this->stmt->fetch(\PDO::FETCH_ASSOC);
    }
}
