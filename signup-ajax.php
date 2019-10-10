<?php
    include('conn.php');

    if (isset($_POST['neweng'])){

        $name=$_POST['uname'];
        $pass=$_POST['upass'];
        $mail=$_POST['mail'];
    
        $options = [
            'cost' => 12,
        ];
        $pass = password_hash($pass, PASSWORD_BCRYPT, $options);
    
        $sql = "INSERT INTO `users`(`emp_no`, `user_name`, `user_password`, `user_type`, `user_pin`, `pin_statues`) 
        VALUES ('0','$name','$pass','u','123456','N')";
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