<?php
    require_once 'dbconfig.php';
    session_start();

    function checkAuth(){
        if(isset($_SESSION["userid"])) {
            return $_SESSION["userid"];
        } else 
        error_log("checkAuth failed: User ID not found in session");
        return false;
    }
?>