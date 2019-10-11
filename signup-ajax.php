<?php
    include('conn.php');

    if (isset($_POST['sign_up'])){

        $name=$_POST['uname'];
        $pass=$_POST['upass'];
        $mail=$_POST['umail'];
    
        $options = [
            'cost' => 12,
        ];
        $str1="sxojjfmkcvjfskfoiro";
        $str2="judfhiurklfnsdifhreis";
        $pass=$str1.$pass.$str2; // To strengthen the password
        $pass = password_hash($pass, PASSWORD_BCRYPT, $options);
    
        $sql = "INSERT INTO `cus_users`(`user_name`, `user_password`, `user_email`, `user_type`, `user_pin`, `pin_statues`) 
        VALUES ('$name','$pass','$mail','u','123456','N')";
        $array=array();
        if ($conn->query($sql) === TRUE) {

            $array = array(
                'value' => '1', // 1=success
                'message' => 'Account created',
            );
            $conn->close();
        } else {
            $array = array(
                'value' => '0', // 0= error
                'message' => ''. $conn->errno,
            );
            $conn->close();
        } 
        die(json_encode($array));
    }

    function pin($id){ // pin generator
        $text=time();
        $str=$text.$id;
        $str=str_shuffle($str);
        $str=substr($str,0,6);
        return $str;
    }
?>