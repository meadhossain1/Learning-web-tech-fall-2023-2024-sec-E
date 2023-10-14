<?php
if(isset($_REQUEST['submit']))
{   session_start();
    $localhost = '127.0.0.1';
    $username= 'root';
    $password = '';
    $dbname = 'data';
    
    function getconnection ()
    {
           global $localhost;
           global  $username;
           global $password ;
           global $dbname ;
           return mysqli_connect($localhost,$username,$password,$dbname);
    }
    $con = getconnection();
    //including the php files 


$username_i= trim($_REQUEST['name']);
$password_i= trim($_REQUEST['password']);

if ($username_i=='' || $password_i== '')
{
   
    header("location:login.php");

}
else{
/*  if (trim($username) == 'Khalid' && trim($password)== "1234")
{
    setcookie('flag',true,time()+300,'/')   ; 
    header("location:dashboard.php");
} */
function auth($username, $password)
{
    $con= getconnection();
    $sql = "select * from auth where username= '{$username}' and password='{$password}'";
    $status = mysqli_query($con,$sql);
    $row= mysqli_num_rows($status);
    if ($row==1)
    {
        return true;
    }
    else 
    {
        return false;
    }
    
    
}
$deliver = auth($username_i,$password_i);
if ($deliver)
{
    setcookie('flag',true,time()+300,'/')   ; 
    header("location:dashboard.php");
}
else {
    echo "Invalid username or Password";
}
}
}