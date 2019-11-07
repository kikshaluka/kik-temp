<?php

/**
 * Created by VSCode.
 * User: Shaluka
 * Date: 2019-10-16
 * Time: 12:33 PM
 */

include('conn.php');

if (isset($_POST['pos'])){ // position 

    $pos=$_POST['pos']; //position
    $top=$_POST['top']; // top
    $bnf=$_POST['bknfr']; //back and front
    $sides=$_POST['lfnrg']; // left and right

    $sql = $conn->query("SELECT `top`, `front`, `back`, `side1`, `side2`, `curve` FROM `position` WHERE `pos_name`='$pos'");
    $array=array();

    while ($row = $sql->fetch_assoc()) {
        $top=$top*$row['top'];
        $front=$bnf*$row['front'];
        $back= $bnf*$row['back'];
        $side1= $sides*$row['side1'];
        $side2=$sides*$row['side2'];
        $Ae=$top+$front+$back+$side1+$side2;

        $array = array(
            'Ae' => $Ae,
        );
    }
    die(json_encode($array));
}

if(isset($_POST['l125wo'])){
    $pos = $_POST['po']; // position
    $hs = $_POST['horz']; // horizontal separation
    $height = $_POST['he']; // height
    $width = $_POST['wid']; // width 
    $wFactor = $_POST['wf']; // width factor
    $depth = $_POST['dp']; // Depth
    $rpwrloss = $_POST['pwrloss']; //row power loss



    $array = array(
    
    );
}

    

?>