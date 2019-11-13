<?php

include_once('conn.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Design | Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body onload="startup()">

<div class="container">
  <h3>Heat Tempreture Rise Calculator</h3>
  <div class="row">
  <div class="col-lg-6">
  <form class="form-horizontal">
  <div class="form-group">
    <label class="control-label col-sm-3" for="csys">Cooling System:</label>
    <div class="col-sm-5">
        <select class="form-control" id="csys" onchange="selFunction(this.value)">
          <option value="0">--select option--</option>
            <option value="natural">Natural Ventilasion</option>
            <option value="forced">Forced Ventilasion</option>
            <option value="air">Air Condition</option>
        </select>
    </div>
    </div> 

    <div class="form-group row">
    <label class="control-label col-sm-3" for="larea">Louver Area:</label>
      <div class="col-sm-3">
        <input type="text" class="form-control" id="larea" placeholder="Louver Area" name="email" value='0'>
      </div>
    <label class="control-label col-sm-2" for="loc">Location:</label>
      <div class="col-sm-3">
      <select class="form-control" id="loc" name="loc">
            <option value="0">-- Select Value --</option>
            <option value="0">0</option>
            <option value="500">500</option>
            <option value="1000">1000</option>
            <option value="1500">1500</option>
            <option value="2000">2000</option>
            <option value="2500">2500</option>
            <option value="3000">3000</option>
            <option value="3500">3500</option>
            
        </select>
      </div>
  </div>

  <div class="form-group"> <!--Enclosure Type drop down-->
      <label class="control-label col-sm-3" for="etype">Enclosure Type:</label>
      <div class="col-sm-5">
        <select class="form-control" id="etype" name="etype">
            <option value="0">-- Select Value --</option>
            <option value="Free standing panel">Free standing panel</option>
            <option value="Free standing cubicle">Free standing cubicle</option>
            <option value="Wall Mounted">Wall Mounted</option>
        </select>
    </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-3" for="pos">Position:</label>
      <div class="col-sm-5">
        <select class="form-control" id="pos" name="pos">
          <option value="0">0</option>
          <option value="surface">Surface Mounted</option>
          <option value="flush">Flush Mounted</option>
        </select>
    </div>
    </div>

    <div class="panel-group form-group">
    <label class="control-label col-sm-2" for="email">Item:</label>
    <div class="panel panel-primary col-sm-6">
      <div class="panel-heading">Dimensions</div>
      <div class="panel-body">
      
      <div class="form-group">
      <label class="control-label col-sm-3" for="dheight">Height:</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" id="dheight" placeholder="Enter Height" name="dheight">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" for="dwidth">Width:</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" id="dwidth" placeholder="Enter Width" name="dwidth" onkeyup="wfaccal()">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" for="ddepth">Depth:</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" id="ddepth" placeholder="Enter Depth" name="ddepth">
      </div>
    </div>
    </div>
    </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-4" for="hseparation">Horiszontal Separation:</label>
      <div class="col-sm-4">
      <select class="form-control" id="hseparation" name="hseparation">
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>            
        </select>
      </div>
    </div>

  </form>
</div> <!------Left side div ends here--------->


  <!---------Right side div starts here--->
  <div class="col-lg-6">
  <form class="form-horizontal">

  <div class="form-group">

  <div class="form-group">
    <label class="control-label col-sm-4" for="atemp">Ambient Temperature:</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="atemp" placeholder="Ambient Temperature" name="atemp" value="35">
    </div>
    </div> 

    <div class="form-group">
    <label class="control-label col-sm-3" for="Dfactor">Demand Factor:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="Dfactor" placeholder="Demand Factor" name="Dfactor" value="0.85">
    </div>
    </div>



    <div class="form-group">
    <label class="control-label col-sm-3" for="Ttemp">Target Temp:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="Ttemp" placeholder="Target Temp" name="Ttemp" value='40'>
    </div>
    </div>

    <label class="control-label col-sm-3" for="width Factor">Width Factor:</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="wFactor" placeholder="Width Factor" name="width Factor">
    </div>
    </div> 

    <div class="form-group">
    <label class="control-label col-sm-3" for="Ae">Ae:</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="Ae" placeholder="Ae" name="Ae">
    </div>
    </div>

    <div class="panel-group form-group" id="natural">
    <label class="control-label col-sm-2" for="email">Power:</label>
    <div class="panel panel-primary col-sm-10">
      <div class="panel-heading">Natural Ventilation</div>
      <div class="panel-body">
      
        <div class="form-group">
          <label class="control-label col-sm-5" for="Tmaxheight">Temp. of Max Height:</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" id="Tmaxheight" placeholder="Raw Power Loss" name="Tmaxheight">
          </div>
        </div>
    </div>
    </div>
    </div>

    <div class="panel-group form-group" id="forced">
    <label class="control-label col-sm-2" for="email">Fan:</label>
    <div class="panel panel-primary col-sm-10">
      <div class="panel-heading">Forced Ventilation</div>
      <div class="panel-body">
      
        <div class="form-group">
          <label class="control-label col-sm-5" for="FCapacity">Fan Capacity:</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" id="FCapacity" placeholder="FCapacity" name="FCapacity">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-5" for="FQty">Fan Qty:</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" id="FQty" placeholder="FQty" name="FQty">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-5" for="MaxTemp">Max Temp:</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" id="MaxTemp" placeholder="Max Temp" name="MaxTemp">
          </div>
        </div>
    </div>
    </div>
    </div>

    <div class="panel-group form-group" id="air">
    <label class="control-label col-sm-2" for="email">Power:</label>
    <div class="panel panel-primary col-sm-10">
      <div class="panel-heading">Air Condition</div>
      <div class="panel-body">
      
        <div class="form-group">
          <label class="control-label col-sm-5" for="RPLoss">Raw Power Loss:</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" id="RPLoss" placeholder="Raw Power Loss" name="dheight">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-5" for="APLoss">Actual Power Loss:</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" id="APLoss" placeholder="Actual Power Loss" name="dwidth">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-5" for="apprxto">Approx. 0.5:</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" id="apprxto" placeholder="Approax. 0.5" name="apprxt">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-5" for="apprxt">Approx. t:</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" id="apprxt" placeholder="Approax. t" name="apprxt">
          </div>
        </div>

    </div>
    </div>
    </div>

  </form>
</div>  

  </div>

  <!--bottom div-->
  <div class="col-lg-12">
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Bus bar</th>
      <th scope="col">Description</th>
      <th scope="col">Material</th>
      <th scope="col">Width (mm)</th>
      <th scope="col">Thinckness (mm)</th>
      <th scope="col">Runs</th>
      <th scope="col">Length (m)</th>
      <th scope="col">Current (A)</th>
      <th scope="col">Power Loss (W)</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Bus bar</td>
      <td>
        <select class="form-control" id="bbmaterial" name="bbmaterial" onchange='bbar_cal()'>
              <option value="0">-- Select Value --</option>
              <option value="Al">Al</option>
              <option value="Cu">Copper</option>
              <option value="TinCu">Tin Copper</option>

          </select>        
      </td>
      <td>
        <input type="number" class="form-control" id="bbwidth" placeholder="Width" name="bbwidth" onkeyup='bbar_cal()'>
      </td>
      <td>
        <input type="number" class="form-control" id="bbthick" placeholder="Thickness" name="bbthick" onkeyup='bbar_cal()'>
      </td>
      <td>
        <input type="number" class="form-control" id="bbruns" placeholder="Runs" name="bbruns" onkeyup='bbar_cal()'>
      </td>
      <td>
        <input type="number" class="form-control" id="bblength" placeholder="Length" name="bblength" onkeyup='bbar_cal()'>
      </td>
      <td>
        <input type="number" class="form-control" id="bbcurrent" placeholder="current" name="bbcurrent" onkeyup='bbar_cal()'>
      </td>
      <td>
        <input type="text" class="form-control" id="bbploss" placeholder="Power Loss" name="bbploss" disabled>
      </td>
      <td>
        <button type="button" class="btn btn-warning" id="bbadd" onclick='busbar_tableload()' disabled>Add</button>
      </td>
      

    </tr>
  </tbody>
</table>

<!-- power cables-->


<table class="table">
  <thead>
    <tr>
      <th scope="col">Cables</th>
      <th scope="col">Description</th>
      <th scope="col">Material</th>
      <th scope="col">Type</th>
      <th scope="col">Size(mm<sup>2</sup>)</th>
      <th scope="col">Runs</th>
      <th scope="col">Length (m)</th>
      <th scope="col">Current (A)</th>
      <th scope="col">Power Loss (W)</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">2</th>
      <td>power cables</td>
      <td>
        <select class="form-control" id="pc_mat" name="pc_mat" onchange="pctype_load(this.value)">
              <option value="0">-- Select Value --</option>
          </select>        
      </td>
      <td>
      <select class="form-control" id="pc_type" name="pc_type" onchange='pcable_cal();'>
              <option value="0">-- Select Value --</option>
          </select>
      </td>
      <td>
        <input type="text" class="form-control" id="pc_size" placeholder="Size" name="pc_size" onkeyup='pcable_cal()'>
      </td>
      <td>
        <input type="text" class="form-control" id="pc_runs" placeholder="Runs" name="pc_runs" onkeyup='pcable_cal()'>
      </td>
      <td>
        <input type="text" class="form-control" id="pc_length" placeholder="Length" name="pc_length" onkeyup='pcable_cal()'>
      </td>
      <td>
        <input type="text" class="form-control" id="pc_current" placeholder="current" name="pc_current" onkeyup='pcable_cal()'>
      </td>
      <td>
        <input type="text" class="form-control" id="pc_ploss" placeholder="Power Loss" name="pc_ploss" disabled>
      </td>
      <td>
        <button type="button" class="btn btn-warning" id="pcadd" onclick='pcable_tableload()' disabled>Add</button>
      </td>
      

    </tr>
  </tbody>
</table>


<!--power cables ends here-->

<!--switch gear-->

<table class="table">
  <thead>
    <tr>
      <th scope="col">Gears</th>
      <th scope="col">Description</th>
      <th scope="col">Manufacturer</th>
      <th scope="col">Type</th>
      <th scope="col">Range</th>
      <th scope="col">Model</th>
      <th scope="col">Quantity</th>
      <th scope="col">Rating (A)</th>
      <th scope="col">Power Loss (W)</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">3</th>
      <td>Switch gear</td>
      <td>
        <select class="form-control" id="gmnf" name="gmnf" onchange='gtype_load(this.value)'>
        <option value="0">-- select one -- </option>

          </select>        
      </td>
      <td>
      <select class="form-control" id="gtype" name="gtype" onchange='grange_load(this.value)'>
        <option value="0">-- select one -- </option>
      </select> 
      </td>
      <td>
      <select class="form-control" id="grange" name="grange" onchange='gmodel_load(this.value)'>
        <option value="0">-- select one -- </option>
      </select> 
      </td>
      <td>
      <select class="form-control" id="gmodel" name="gmodel" onchange='grate_view()' >
        <option value="0">-- select one -- </option>
      </select> 
      </td>
      <td>
        <input type="text" class="form-control" id="g_qty" placeholder="Quantity" name="dwidth" onkeyup='pwrloss(this.value)'>
      </td>
      <td>
        <input type="text" class="form-control" placeholder="Rating"  name="g_power" id='g_power' disabled>
      </td>
      <td>
        <input type="text" class="form-control" placeholder="Power Loss" id="pwrloss" disabled>
      </td>
      <td>
        <button type="button" class="btn btn-warning" id='sgadd' onclick='sgear_tableload()' disabled>Add</button>
      </td>
      

    </tr>
  </tbody>
</table>

<!--rated current summery-->
<table class="table" id="rcsumm">
    <thead class="thead-dark">
      <tr>
        <th>Name</th>
        <th>Power Loss</th>
      </tr>
    </thead>
    <tbody>
     
    </tbody>
  </table>
  <b><span>Raw Power Loss : </span><span id="total_sum_value"></span></b> <!--total power loss cal-->
  
<!--switch gear ends-->
</div>
<button type="button" class="btn btn-primary btn-lg" onclick="calcutaion()">Send</button>
  <!--ends here-->
</div>
</body>

<script>

// Short-form of `document.ready`
$(function(){ //Hide all the divs on start
    $("#natural").hide(); 
    $("#forced").hide();
    $("#air").hide();
    $("#larea").prop('disabled', true);

});

// Position Type change according Enclosure Type
let prices = {"Free standing panel":[{value:"Seperated",desc:"seperated"},{value:"Wall attached",desc:"Wall attached"}],
              "Free standing cubicle":[{value:"First / Last Separated",desc:"First / Last Separated"},{value:"First / Last Wall Attached",desc:"First / Last Wall Attached"},{value:"Central Seperated",desc:"Central Seperated"},{value:"Central Wall Attached",desc:"Central Wall Attached"}],
              "Wall Mounted":[{value:"Surface Mounted",desc:"Surface Mounted"},{value:"Flush Mounted",desc:"Flush Mounted"}]}

  document.getElementsByName('etype')[0].addEventListener('change', function(e) {
  document.getElementsByName('pos')[0].innerHTML = prices[this.value].reduce((acc, elem) => `${acc}<option value="${elem.value}">${elem.desc}</option>`, "");
});


function myFunction(one,two,three) { // Div selection to hide
  var x = document.getElementById(one);
  var y = document.getElementById(two);
  var z = document.getElementById(three);
   if (x.style.display === "none" ) {
    if(one=='natural'){
      $("#larea").prop('disabled', false);
    }
    else{
      $("#larea").prop('disabled', true);
    }
    y.style.display = "none";
    z.style.display = "none";
    x.style.display = "block";
  }} 


  function selFunction(name) { // //Div box selection function
  var selection=name;
  switch(selection) {
  case 'natural':
    myFunction('natural','forced','air');
    break;
  case 'forced':
    myFunction('forced','natural','air');
    break;
  case 'air':
    myFunction('air','forced','natural');
    break;
  default:
    alert("Select a valid option")
} 
  
} 

function calcutaion(){  //Ae Calculation

  var position = document.getElementById('pos').value;
  var height = document.getElementById('dheight').value;
  var width = document.getElementById('dwidth').value;
  var depth = document.getElementById('ddepth').value;
  var wFactor = document.getElementById('wFactor').value;

  if(position=="0"||height==""||width==""||depth==""){
    alert("Height, width, depth need to be filled");
  }
  else{
  // here comes dimension calculation
  var top =((width/wFactor)*depth)/(1000*1000);
  var bnf = ((width/wFactor)*height)/(1000*1000);
  var sides = (depth*height) / (1000*1000);
  $.ajax({
          type: 'POST',
          url: 'cal.php',
          data:
          {
            pos: position,
            top: top,
            bknfr: bnf,
            lfnrg: sides
          },
          dataType:'json',
          success: function calcutaion (response) {
            document.getElementById('Ae').value = response['Ae'].toFixed(2);
          }
        });
        ef_cooling();

  }
}

function wfaccal(){ //width factor calculation
  var width = parseInt(document.getElementById('dwidth').value);
  var wfac=Math.floor(width/1500);
  if((width%1500)>0){wfac+=1;}
    document.getElementById('wFactor').value=wfac;
  }
  

  function gtype_load(val){ // switch gear type drop down depend on mnf

    sgear_add_dis(); // switch gear add button disable

    document.getElementById("gtype").options.length = 0;
    document.getElementById("grange").options.length = 0;
    document.getElementById("gmodel").options.length = 0;


    $.ajax({
          type: 'POST',
          url: 'cal-data.php',
          data:
          {
            gtype: val
            },
          dataType:'json',
          success: function gtype_load (response) {
            $("#gtype").append(new Option('--select option--', '0'));
            for (i = 0; i < response.length; i++) {
             $("#gtype").append(new Option(response[i], response[i]));

          }
            
          }
        });
}

function startup(){   //page onload functions are included here.
  gmnf_load();        //switch gear manufacturer loader
  pcmaterial_load();  //power cable material loader
}

function gmnf_load(){ //gear manufacturers load - startup

  sgear_add_dis(); // switch gear add button disable

  document.getElementById("pwrloss").value="";
  document.getElementById("g_qty").value="";
  document.getElementById("g_power").value="";

  $.ajax({
          type: 'POST',
          url: 'cal-data.php',
          data:
          {
            gmnf: "ok"
            },
          dataType:'json',
          success: function gmnf_load (response) {
            for (i = 0; i < response.length; i++) {
             $("#gmnf").append(new Option(response[i], response[i]));

          }
            
          }
        });
}

function grange_load(val){ //gear range loader

  sgear_add_dis(); // switch gear add button disable

  document.getElementById("grange").options.length = 0;
  document.getElementById("gmodel").options.length = 0;
  var gmnf = document.getElementById("gmnf").value;
  document.getElementById("pwrloss").value="";
  document.getElementById("g_qty").value="";
  document.getElementById("g_power").value="";

  $.ajax({
          type: 'POST',
          url: 'cal-data.php',
          data:
          {
            typeg: val,
            mnfg: gmnf

            },
          dataType:'json',
          success: function grange_load (response) {
            $("#grange").append(new Option('--select option--', '0'));
            for (i = 0; i < response.length; i++) {
             $("#grange").append(new Option(response[i], response[i]));

          }
            
          }
        });
}

function gmodel_load(val){ //gear range loader

  sgear_add_dis(); // switch gear add button disable

  document.getElementById("gmodel").options.length = 0;
  var mnfg = document.getElementById("gmnf").value;
  var typeg = document.getElementById("gtype").value;
  document.getElementById("pwrloss").value="";
  document.getElementById("g_qty").value="";
  document.getElementById("g_power").value="";

  $.ajax({
          type: 'POST',
          url: 'cal-data.php',
          data:
          {
            typg: typeg,
            mnfg: mnfg,
            rang: val
            },
          dataType:'json',
          success: function gmodel_load (response) {
            $("#gmodel").append(new Option('--select option--', '0'));
            for (i = 0; i < response.length; i++) {
             $("#gmodel").append(new Option(response[i], response[i]));

          }
            
          }
        });
}


function grate_view(){ //gear current rate view

  sgear_add_dis(); // switch gear add button disable

  var mnfg = document.getElementById("gmnf").value;
  var typeg = document.getElementById("gtype").value;
  var rangeg = document.getElementById("grange").value;
  var modelg = document.getElementById("gmodel").value;
  document.getElementById("pwrloss").value="";
  document.getElementById("g_qty").value="";
  document.getElementById("g_power").value="";

  $.ajax({
          type: 'POST',
          url: 'cal-data.php',
          data:
          {
            typg: typeg,
            mnfg: mnfg,
            rag: rangeg,
            rateg:"ok",
            modelg:modelg
            },
          dataType:'json',
          success: function grate_view (response) {
            //alert(response["power"]);
            document.getElementById("g_power").value=response["g_ratedi"];
          }
        });
}

function pwrloss(val){ //power gear power loss calculation 

  sgear_add_dis(); // switch gear add button disable


  var mnfg = document.getElementById("gmnf").value;
  var typeg = document.getElementById("gtype").value;
  var rangeg = document.getElementById("grange").value;
  var modelg = document.getElementById("gmodel").value;

  $.ajax({
          type: 'POST',
          url: 'cal-data.php',
          data:
          {
            pwr: val,
            typg: typeg,
            mnfg: mnfg,
            rag: rangeg,
            modelg: modelg
            },
          dataType:'json',
          success: function pwrloss (response) {
            document.getElementById("pwrloss").value=response["p_loss"];
            
          }
        });
}

function pcmaterial_load(){ // cable material loader - startup

  /* 
  var pc_size = document.getElementById("pc_size").value = '';
  var pc_runs = document.getElementById("pc_runs").value = '';
  var pc_length = document.getElementById("pc_length").value = '';
  var pc_current = document.getElementById("pc_current").value = '';
  var pc_ploss = document.getElementById("pc_ploss").value = '';
  */
  $.ajax({
          type: 'POST',
          url: 'cal-data.php',
          data:
          {
            c_mat: "ok"
            },
          dataType:'json',
          success: function pcmaterial_load (response) {
            for (i = 0; i < response.length; i++) {
             $("#pc_mat").append(new Option(response[i], response[i]));
          
          }
          pcable_cal(); // power cable calculations 
          }
        });
}

function pctype_load(val){ // power cable types loader

  pcable_add_dis();
document.getElementById("pc_type").options.length = 0;
/*
var pc_size = document.getElementById("pc_size").value = '';
var pc_runs = document.getElementById("pc_runs").value = '';
var pc_length = document.getElementById("pc_length").value = '';
var pc_current = document.getElementById("pc_current").value = '';
var pc_ploss = document.getElementById("pc_ploss").value = '';
*/

$.ajax({
        type: 'POST',
        url: 'cal-data.php', 
        data:
        {
          pc_type: val
        },
        dataType:'json',
        success: function pctype_load (response) {
          $("#pc_type").append(new Option('--select option--', '0'));
          for (i = 0; i < response.length; i++) {
            $("#pc_type").append(new Option(response[i], response[i]));
        
        }
        pcable_cal(); // power cable calculations 
        }
      });      
}

function pcable_cal(){ // power cable resistance calculator

  pcable_add_dis(); //power cable add button diable

  var pc_mat = document.getElementById("pc_mat").value;
  var pc_type = document.getElementById("pc_type").value;
  var pc_size = document.getElementById("pc_size").value;
  var pc_runs = document.getElementById("pc_runs").value;
  var pc_length = document.getElementById("pc_length").value;
  var pc_current = document.getElementById("pc_current").value;


  if(pc_size=='' || pc_runs=='' || pc_length=='' || pc_current==''){
    pc_size = 0;
    pc_runs = 0;
    pc_length = 0;
    pc_current = 0;
  }

  $.ajax({
          type: 'POST',
          url: 'cal-data.php',
          data:
          {
            pc_cal: 'ok',
            mat: pc_mat, // power cable material
            ptype: pc_type, // power cable type
            size: pc_size,
            runs: pc_runs,
            len: pc_length,
            curr: pc_current
            
          },
          dataType:'json',
          success: function pcable_cal (response) { 
            document.getElementById("pc_ploss").value=response["sum"];
                     
          }
        });
}

function bbar_cal(){ // bus bar resistance calculator

  //document.getElementById("bbploss").value=0;

  var b_mat = document.getElementById("bbmaterial").value;
  var b_wid = document.getElementById("bbwidth").value;
  var b_thk = document.getElementById("bbthick").value;
  var b_run = document.getElementById("bbruns").value;
  var b_len = document.getElementById("bblength").value;
  var b_curr = document.getElementById("bbcurrent").value;

  bbar_add_dis(); // bus bar add button disable

  $.ajax({
          type: 'POST',
          url: 'cal-data.php',
          data:
          {
            bb_cal: 'ok',
            bmat: b_mat,  //bus bar material
            bwid: b_wid,  //bus bar width
            bthk: b_thk,  //bus bar thick
            brun: b_run,  //bus bar run
            blen: b_len,  //bus bar length
            bcurr: b_curr //bus bar currency
          },
          dataType:'json',
          success: function bbar_cal (response) { 
            document.getElementById("bbploss").value=response["sum"];         
          }
        });
  }

function busbar_tableload(){ //busbar power loss to table

var bbploss = $('#bbploss').val();
var newrow = '<tr><td>bus bar</td><td>' + bbploss + '</td><td><button type="button" class="btn btn-danger" onclick="prow(this)" >Delete</button></td></tr>';
$('#rcsumm tr:last').after(newrow);
ploss_calc();
}

function pcable_tableload(){ //power cable loss to table
  var pc_ploss = $('#pc_ploss').val();
  var newrow = '<tr><td>power cable</td><td>' + pc_ploss + '</td><td><button type="button" class="btn btn-danger" onclick="prow(this)" >Delete</button></td></tr>';
  $('#rcsumm tr:last').after(newrow);
  ploss_calc();
}

function sgear_tableload(){ //switch gear loss to power
  var sg_ploss = $('#pwrloss').val();
  var name = $('#gmnf').val() +" "+$('#gtype').val()+" "+ $('#gmodel').val();
  var newrow = '<tr><td>'+ name +'</td><td>' + sg_ploss + '</td><td><button type="button" class="btn btn-danger" onclick="prow(this)" >Delete</button></td></tr>';
  $('#rcsumm tr:last').after(newrow);
  ploss_calc();
}

function prow(ele){ //  power loss row deletion
  row = ele.parentNode.parentNode.rowIndex;
  document.getElementById("rcsumm").deleteRow(row);
  ploss_calc();
}

function ploss_calc(){ //total power loss calculation
  var table = document.getElementById("rcsumm"), sumVal = 0;
    for(var i = 1; i < table.rows.length; i++)
    {
      sumVal = sumVal + parseFloat(table.rows[i].cells[1].innerHTML);
    }
  document.getElementById("total_sum_value").innerHTML = sumVal;
} 

function sgear_add_dis(){ //swich gear add buton disable
    
    var qtyg = document.getElementById("g_qty").value; //space gear add button
    var mnfg = document.getElementById("gmnf").value;
    var typeg = document.getElementById("gtype").value;
    var rangeg = document.getElementById("grange").value;
    var modelg = document.getElementById("gmodel").value;

      //alert(qtyg);
      if(qtyg!='' && mnfg !='0' && typeg!='0' && rangeg!='0' && modelg!='0'){
        document.getElementById("sgadd").disabled = false; 
      }
      else{
        document.getElementById("sgadd").disabled = true; 
      }
}

function pcable_add_dis(){ //power cable add buton disable
    
    var matp = document.getElementById("pc_mat").value; //space gear add button
    var typep = document.getElementById("pc_type").value;
    var sizep = document.getElementById("pc_size").value;
    var runsp = document.getElementById("pc_runs").value;
    var lenp = document.getElementById("pc_length").value;
    var currp = document.getElementById("pc_current").value;

      if(sizep!='' && runsp != '' && lenp != '' && currp != '' && matp !='0' && typep !='0'){
        document.getElementById("pcadd").disabled = false; 
      }
      else{
        document.getElementById("pcadd").disabled = true; 
      }
}

function bbar_add_dis(){ //bus bar add buton disable
    
    var matb = document.getElementById("bbmaterial").value; //space gear add button
    var widb = document.getElementById("bbwidth").value;
    var thickb = document.getElementById("bbthick").value;
    var runsb = document.getElementById("bbruns").value;
    var lenb = document.getElementById("bblength").value;
    var currb = document.getElementById("bbcurrent").value;

      if(widb != '' && thickb != '' && runsb != '' && lenb !='' && currb !='' && matb !='0'){
        document.getElementById("bbadd").disabled = false; 
      }
      else{
        document.getElementById("bbadd").disabled = true; 
      }
}

function ef_cooling(){ //t0.5 calculation
  var ae = document.getElementById("Ae").value; // ae
  var cs = document.getElementById("csys").value;// cool system
  var height = document.getElementById('dheight').value; // height
  var width = document.getElementById('dwidth').value; // width
  var depth = document.getElementById('ddepth').value; // depth
  var wFactor = document.getElementById('wFactor').value; // width factor
  var pos = document.getElementById('pos').value; // position
  var top = ((width/wFactor)*depth)/(1000*1000); // top dimention
  var hs = document.getElementById("hseparation").value; // horizontal sep
  var Dfactor = document.getElementById("Dfactor").value; // Demand Factor
  var rpwrloss = document.getElementById("total_sum_value").innerHTML; //row power loss
  
  if (ae != '' || cs != ''){ // to find ae or cooling system is blank
  //to send data to T0.5 calculation.
    if(ae > 1.25 && (cs=='forced' || cs=='air')){ 
      
      $.ajax({
          type: 'POST',
          url: 'cal.php',
          data:
          {
            l125wo: '123',
            horz: hs,  //horizontal separation
            po: pos,   //position
            he: height, //height
            wid: width, // width
            wf: wFactor, // width factor
            dp: depth, //depth
            pwrloss: rpwrloss, // row power loss
            Ae: ae, // Ae value 
            dfac: Dfactor // demand factor
          },
          dataType:'json',
          success: function ef_cooling (response) { 
            document.getElementById("bbploss").value=response["sum"];         
          }
        });
    }
  // 
  }
  else{
    alert("Fill the empty boxes");
  }
}


</script>
</html>
