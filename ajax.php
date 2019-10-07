<?php

/**
 * Created by VSCode.
 * User: shaluka
 * Date: 2019-10-03
 * Time: 10:49 AM
 */

include('conn.php');

if (isset($_POST['rcdrop_option'])){ // rated current

    $rcoption=$_POST['rcdrop_option'];
    $sql = $conn->query("SELECT `busbar_size` FROM `busbars` where `rated_current`='$rcoption'");
    $array=array();
    while ($row = $sql->fetch_assoc()) {            
            array_push($array,$row['busbar_size']);
    }
    die(json_encode($array));
}

if (isset($_POST['busdrop_option'])){ // bus line 

    $busoption=$_POST['busdrop_option'];
    $sql = $conn->query("SELECT `30k3p`,`30k3p+n`,`70k3p`,`70k3p+n`,`cu`,`100030k3p`,`100030k3p+n`,`100070k3p`,`100070k3p+n` FROM `busbars` WHERE `busbar_size`='$busoption'");
    $array=array();
    while ($row = $sql->fetch_assoc()) {            
        $array = array(
            '30k3p' => $row['30k3p'],
            '30k3p+n' => $row['30k3p+n'],
            '70k3p' => $row['70k3p'],
            '70k3p+n' => $row['70k3p+n'],
            '200cu' => $row['cu'],
            '100030k3p' => $row['100030k3p'],
            '100030k3p+n' => $row['100030k3p+n'],
            '100070k3p' => $row['100070k3p'],
            '100070k3p+n' => $row['100070k3p+n'],
        );
    }
    die(json_encode($array));
}

if (isset($_POST['dropdownmenu'])){ // bus line 

    $busoption=$_POST['busdrop_option'];
    $sql = $conn->query("SELECT `30k3p`,`30k3p+n`,`70k3p`,`70k3p+n`,`cu`,`100030k3p`,`100030k3p+n`,
    `100070k3p`,`100070k3p+n` FROM `busbars` WHERE `busbar_size`='$busoption'");
    $array=array();
    while ($row = $sql->fetch_assoc()) {            
        $array = array(
            '30k3p' => $row['30k3p'],
            '30k3p+n' => $row['30k3p+n'],
            '70k3p' => $row['70k3p'],
            '70k3p+n' => $row['70k3p+n'],
            '200cu' => $row['cu'],
            '100030k3p' => $row['100030k3p'],
            '100030k3p+n' => $row['100030k3p+n'],
            '100070k3p' => $row['100070k3p'],
            '100070k3p+n' => $row['100070k3p+n'],
        );
    }
    die(json_encode($array));
}

if (isset($_POST['usrtableload'])){
    $sql = $conn->query("SELECT `emp_no`,`name` FROM users ORDER BY `name` ASC");
    $array=array();
    while ($row = $sql->fetch_assoc()) {
            array_push($array,$row['emp_no']);              
            array_push($array,$row['name']);
    }
    die(json_encode($array));
}

?>