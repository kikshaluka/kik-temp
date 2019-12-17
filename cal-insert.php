<?php

/**
 * Created by VSCode.
 * User: Shaluka
 * Date: 2019-12-17
 * Time: 01:41 PM
 */
session_start();
include('conn.php');
$name=$_SESSION['name'];


if (isset($_POST['bb_ins'])){ // bus bar insert 

    $cub = $_POST['cub']; //cubicle number
    $des = $_POST['des']; //description
    $mat = $_POST['mat']; //material
    $wid = $_POST['wid']; //width
    $thi = $_POST['thi']; //thickness
    $run = $_POST['run']; //runs
    $len = $_POST['len']; //length
    $curr = $_POST['curr']; //currency
    $ploss = $_POST['ploss']; //power loss

    $sql = $conn->query("INSERT INTO `bbar`(`userid`, `project_no`, `cubicle`, `des`, `mat`, `wid`, `thi`, `run`, `len`, `curr`, `ploss`) VALUES ('$name','123','$cub','$des','$mat','$wid','$thi','$run','$len','$curr','$ploss')");
    
    if ($conn->query($sql) === TRUE) {
        $mess =  "New record created successfully";
    } else {
        $mess =  "Error: " . $sql . "<br>" . $conn->error;
}


    die(json_encode($mess));
}






?>