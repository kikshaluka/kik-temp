<?php

/**
 * Created by VSCode.
 * User: Shaluka
 * Date: 2019-10-16
 * Time: 12:33 PM
 */

include('conn.php');

if (isset($_POST['pos'])){ // position 

    $pos=$_POST['pos'];
    $sql = $conn->query("SELECT `top`, `front`, `back`, `side1`, `side2`, `curve` FROM `position` WHERE `pos_name`='$pos'");
    $array=array();
    while ($row = $sql->fetch_assoc()) {            
        $array = array(
            'top' => $row['top'],
            'front' => $row['front'],
            'back' => $row['back'],
            'side1' => $row['side1'],
            'side2' => $row['side2'],
            'curve' => $row['curve'],
        );
    }
    die(json_encode($array));
}

    

?>