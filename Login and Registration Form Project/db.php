<?php
$hostname="localhost";
$username="root";
$password="";
$dbname="registration_form";
try{
$conn=mysqli_connect($hostname,$username,$password,$dbname);

}
catch(Exception){
    echo"connection failed";
}


?>