<?php

/**
 * Created by VSCode.
 * User: Shaluka
 * Date: 2019-10-16
 * Time: 12:33 PM
 */

include('conn.php');



//nearest value estimation

define('ARRAY_NEAREST_DEFAULT',    0);
define('ARRAY_NEAREST_LOWER',      1);
define('ARRAY_NEAREST_HIGHER',     2);

/**
 * Finds nearest value in numeric array. Can be used in loops.
 * Array needs to be non-assocative and sorted.
 * 
 * @param array $array
 * @param int $value
 * @param int $method ARRAY_NEAREST_DEFAULT|ARRAY_NEAREST_LOWER|ARRAY_NEAREST_HIGHER
 * @return int
 */
function array_numeric_sorted_nearest($array, $value, $method = ARRAY_NEAREST_DEFAULT) {    
    $count = count($array);

    if($count == 0) {
        return null;
    }    

    $div_step               = 2;    
    $index                  = ceil($count / $div_step);    
    $best_index             = null;
    $best_score             = null;
    $direction              = null;    
    $indexes_checked        = Array();

    while(true) {        
        if(isset($indexes_checked[$index])) {
            break ;
        }

        $curr_key = $array[$index];
        if($curr_key === null) {
            break ;
        }

        $indexes_checked[$index] = true;

        // perfect match, nothing else to do
        if($curr_key == $value) {
            return $curr_key;
        }

        $prev_key = $array[$index - 1];
        $next_key = $array[$index + 1];

        switch($method) {
            default:
            case ARRAY_NEAREST_DEFAULT:
                $curr_score = abs($curr_key - $value);

                $prev_score = $prev_key !== null ? abs($prev_key - $value) : null;
                $next_score = $next_key !== null ? abs($next_key - $value) : null;

                if($prev_score === null) {
                    $direction = 1;                    
                }else if ($next_score === null) {
                    break 2;
                }else{                    
                    $direction = $next_score < $prev_score ? 1 : -1;                    
                }
                break;
            case ARRAY_NEAREST_LOWER:
                $curr_score = $curr_key - $value;
                if($curr_score > 0) {
                    $curr_score = null;
                }else{
                    $curr_score = abs($curr_score);
                }

                if($curr_score === null) {
                    $direction = -1;
                }else{
                    $direction = 1;
                }                
                break;
            case ARRAY_NEAREST_HIGHER:
                $curr_score = $curr_key - $value;
                if($curr_score < 0) {
                    $curr_score = null;
                }

                if($curr_score === null) {
                    $direction = 1;
                }else{
                    $direction = -1;
                }  
                break;
        }

        if(($curr_score !== null) && ($curr_score < $best_score) || ($best_score === null)) {
            $best_index = $index;
            $best_score = $curr_score;
        }

        $div_step *= 2;
        $index += $direction * ceil($count / $div_step);
    }

    return $array[$best_index];
}




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

    echo $t05.'<br/>'; //t0.5
    echo $t1; //t1
}


$test = Array(5,2,8,3,9,12,20,52100,52460,62000);
sort($test);
$nearest = array_numeric_sorted_nearest($test, 8256);

if(isset($_POST['l125w']))   {
    
}

?>