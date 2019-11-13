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

    $posi = $_POST['po']; // position
    $height = $_POST['he']; // height
    $width = $_POST['wid']; // width 
    $wFactor = $_POST['wf']; // width factor
    $depth = $_POST['dp']; // Depth
    $rpwrloss = $_POST['pwrloss']; //row power loss
    $Ae = $_POST['ae'];
    $hs = $_POST['horz']; // horizontal separation
    $dfac = $_POST['dfac']; // demand factor

    $k = 0.0459536911922546/(1-0.987175746302811*exp(-0.0647798482560785*$Ae)); // based on Ae k value is calculated
    
    switch ($hs) { // based on horizontal sep. d is calculated
    case 0:
        $d = 1;
        break;
    case 1:
        $d = 1.05;
        break;
    case 2:
        $d = 1.15;
        break;
    case 3:
        $d = 1.3;
        break;
    default:
        $d = 1.3;
    }
    
    //$array = array();
    $sql = $conn->query("SELECT `curve` FROM `position` WHERE `pos_name`='$posi'");
    $row = $sql->fetch_assoc();
    $curve = $row['curve']; //curve measurment
    //echo $curve;

    $sql = $conn->query("SELECT `a`,`b`,`c` FROM `l1.25wo` WHERE `curve` = '$curve'");
    while ($row = $sql->fetch_assoc()) {
        $a=$row['a'];
        $b=$row['b'];
        $c=$row['c'];
        //echo $a.$b.$c;
       
    }
    $ao = (($width/$wFactor)*$depth)/(1000*1000); // top surface
    $f = (($height/1000)**1.35)/$ao; 
    $cd = $a*exp(-exp($b-$c*$f))*(0.6/1.6)+1;  
    $loss = $rpwrloss*($dfac**2);  // Actual power loss
    $t05 = $k*$d*($loss**0.804); // t05
    $t1 = $t05 * $cd;
    echo $t05.'<br/>';
    echo $f.'<br/>';
    echo $cd.'<br/>';
    echo $t1.'<br/>';

}

    

?>