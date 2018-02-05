<?php

    require 'sys/DB.php';
    define('CONF',__DIR__.'/Config.json');
      
    use App\Sys\DB;
    //connection gdb
    
    $gdb=DB::getInstance();
    

