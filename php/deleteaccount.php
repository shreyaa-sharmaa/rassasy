<?php
include("conn.php");
session_start();

$user = $_SESSION['id'];
$sql = "delete from student where id = $user ;";
if ($conn->query($sql)) {
    echo true;
} else
    echo "connection error";
