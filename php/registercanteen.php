<?php
session_start();
include('conn.php');
$canteenname=$_POST['canteenname'];
$canteenid=$_POST['canteenid'];
$password=$_POST['password'];
$email=$_POST['email'];
$managername=$_POST['managername'];
$mobile=$_POST['mobile'];
$location=$_POST['location'];
$openingtime=$_POST['openingtime'];
$closingtime=$_POST['closingtime'];
$password_hash = password_hash($password, PASSWORD_BCRYPT);


$sql="insert into canteen(canteenname,canteenid,password,email,managername,mobile,location,openingtime,closingtime)
 values('$canteenname','$canteenid','$password_hash','$email','$managername','$mobile','$location','$openingtime','$closingtime')";

$create_table_canteen_order="create table order_$canteenname(id int primary key auto_increment,itemno int(10) unique,
 item_name varchar(30), price int(20));";
$conn->query($create_table_canteen_order);

$create_table_canteen_menu="create table menu_$canteenname(id int primary key auto_increment,itemno int(10) unique,
item_name varchar(30), price int(20));";
$conn->query($create_table_canteen_menu);

if ($conn->query($sql)==true) {
      echo false;
}
else {
      echo "Registration failed";
    }
    
$conn->close();
?>