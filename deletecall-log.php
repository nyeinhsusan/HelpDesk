<?php
require_once "./db_connection.php";
//echo $_GET['id'];//1,2,3,4,....
$id = $_GET['id'];

$sql = "DELETE FROM call_log WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    header("location:./callLog.php");
} else {
    echo "delete fail" . mysqli_error();
}
