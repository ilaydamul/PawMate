<?php 
session_start();
class controlClass
{
    function SessionCheck(){
        if($_SESSION["user"] || $_SESSION["user_id"] || $_SESSION["user_name"] || $_SESSION["user_surname"]){
            return header("Location: index.php");
        }
        
    }
}

?>