<?php

    require 'sys/DB.php';
    define('CONF',__DIR__.'/Config.json');
      
    use App\Sys\DB;
    //connection gdb
    
    $gdb=DB::getInstance();
   
    // insert data
    
    $sql="INSERT INTO users(username,rol,email,passw) values(:username,:rol,:email,:passw)";
    echo "<h2>".$sql."</h2>";
    $sentencia=$gdb->query($sql);
    
    $gdb->bind(':username','Elon');
    $gdb->bind(':rol',2);
    $gdb->bind(':email','elon@blog');
    $gdb->bind(':passw','123456');
    //execute statement
    $res=$gdb->execute();
    // if true, show all users
    if($res){
        $sql="SELECT * FROM users";
        $gdb->query($sql);
        if($gdb->execute()){
           $rows=$gdb->resultSet();
           print_r($rows);
           }
        }
       
        
    
   
   