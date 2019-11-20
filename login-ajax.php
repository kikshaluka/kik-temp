<?php
session_start();
include('conn.php');

if (isset($_POST['val_option'])){ // rated current

    $valoption=$_POST['val_option'];
    $uname=$_POST['name'];
    $passwrd=$_POST['pass'];
    $str1="sxojjfmkcvjfskfoiro";
    $str2="judfhiurklfnsdifhreis";
    $pass=$str1.$passwrd.$str2;

    $sql = $conn->query("SELECT  `user_name`, `user_password`, `user_email`, `user_type`, `pin_statues` FROM `cus_users` WHERE `user_name`='$uname'");

    $array=array();
    while ($row = $sql->fetch_assoc()) { 
        $hashpass = $row['user_password'];
        $r=password_verify($pass,$hashpass);          
        $pinstatues = $row['pin_statues'];
        if($pinstatues=='0'){
            
            $array = array(
                'stat' => $r,
                'res' => 'pin not verified',
            );
        }
        else{
            $_SESSION['name'] = $row['user_name']; // user name
            $array = array(
                'stat' => $r,
                'res' => 'success',
            );
        }

        
    }
    die(json_encode($array));
}

?>