<?php

/**
 * Created by VSCode.
 * User: Shaluka
 * Date: 2019-10-29
 * Time: 09:01 PM
 */

  include_once('conn.php');
  
  if (isset($_POST['gmnf'])){ // gear manufacturer

    $sql = $conn->query("SELECT DISTINCT g_mnf FROM gears");
    $array=array();
    while ($row = $sql->fetch_assoc()) {            
        array_push($array,$row['g_mnf']);
    }
    die(json_encode($array));
}
  
if (isset($_POST['gtype'])){ // gear type

    $mnf = $_POST['gtype']; // gear manufacturers. 
    $sql = $conn->query("SELECT DISTINCT g_type FROM gears where g_mnf='$mnf'");
    $array=array();
    while ($row = $sql->fetch_assoc()) {            
        array_push($array,$row['g_type']);
    }
    die(json_encode($array));
}

if (isset($_POST['typeg'])){ // gear ranges

    $type = $_POST['typeg']; // gear types
    $mnf = $_POST['mnfg'];     //gear manufacturers
    $sql = $conn->query("SELECT DISTINCT g_range FROM gears where g_type='$type' and g_mnf='$mnf'");
    $array=array();
    while ($row = $sql->fetch_assoc()) {            
        array_push($array,$row['g_range']);
    }
    die(json_encode($array));
}

if (isset($_POST['rang'])){ // gear Models

    $range = $_POST['rang'];    //gear ranges
    $type = $_POST['typg'];     // gear types
    $mnf = $_POST['mnfg'];      //gear manufacturers
    $sql = $conn->query("SELECT DISTINCT g_model FROM gears where g_type='$type' and g_mnf='$mnf' and g_range='$range'");
    $array=array();
    while ($row = $sql->fetch_assoc()) {            
        array_push($array,$row['g_model']);
    }
    die(json_encode($array));
}

if (isset($_POST['rateg'])){ // power rate

    $type=$_POST['typg'];     //power gear type
    $mnfg=$_POST['mnfg'];     // power gear manf
    $range=$_POST['rag'];     //power gear range
    $model=$_POST['modelg'];  // power gear model

    $sql = $conn->query("SELECT g_ratedi FROM gears where g_type='$type' and g_mnf='$mnfg' and g_range='$range' and g_model='$model'");
    $array=array();

    while ($row = $sql->fetch_assoc()) {
        $ratedi=$row['g_ratedi'];

        $array = array(
            'g_ratedi' => $ratedi
        );
    }
    die(json_encode($array));
}

if (isset($_POST['pwr'])){ // power loss

    $type=$_POST['typg'];     //power gear type
    $mnfg=$_POST['mnfg'];     // power gear manf
    $range=$_POST['rag'];     //power gear range
    $model=$_POST['modelg'];  // power gear model
    $pwr=$_POST['pwr'];       //power gear power

    $sql = $conn->query("SELECT g_powerloss FROM gears where g_type='$type' and g_mnf='$mnfg' and g_range='$range' and g_model='$model'");
    $array=array();

    while ($row = $sql->fetch_assoc()) {
        $pwr_less=floatval($row['g_powerloss']);
        $p_loss=$pwr_less*$pwr;
        $array = array(
            'p_loss' => $p_loss
        );
    }
    die(json_encode($array));
}

?>