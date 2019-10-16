<?php

/**
 * Created by VSCode.
 * User: Shaluka
 * Date: 2019-10-16
 * Time: 12:33 PM
 */

include('conn.php');

if (isset($_POST['neweng'])){

    $name=$_POST['engname'];
    $empno=$_POST['engemp'];
    $pass=$_POST['engpass'];

    $options = [
        'cost' => 12,
    ];
    $pass = password_hash($pass, PASSWORD_BCRYPT, $options);

    $sql = "INSERT INTO `users`(`emp_no`, `name`, `password`, `user_name`) 
    VALUES ('$empno','$name','$pass','$name')";
    $array=array();
    if ($conn->query($sql) === TRUE) {
        $array = array(
            'value' => '1',
            'message' => 'Account created',
        );
        $conn->close();
    } else {
        $array = array(
            'value' => '0',
            'message' => ''. $conn->errno,
        );
        $conn->close();
    }

    die(json_encode($array));
    


}

    

?>