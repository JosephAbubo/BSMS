<?php
header("Location: schedules.php");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "abms";


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    /* set the PDO error mode to exception */
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

     /*sql to delete a record*/
    $sql = "DELETE FROM notifications WHERE invoiceid='" . $_GET["userid"] . "'";

    /*use exec() because no results are returned*/
    $conn->exec($sql);
  
    }
catch(PDOException $e)
{
    echo $sql . "
" . $e->getMessage();
    }

$conn = null;
?>