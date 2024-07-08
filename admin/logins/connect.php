<?php
error_reporting(0);
 session_start();
/*include ("imenc.php");*/
/*** mysql hostname ***/
$hostname = '127.0.0.1';

/*** mysql username ***/
$username = 'root';

/*** mysql password ***/
$password = '';

$dbname = 'twewolefinal';

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    
    }
catch(PDOException $e)
    {
    echo $e->getMessage();
    }
?>
