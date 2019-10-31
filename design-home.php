<?php

include_once('conn.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Design | Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
          <option value="select a valid option">--select option--</option>
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
        <input type="text" class="form-control" id="loc" placeholder="Location" name="loc">
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
        <input type="text" class="form-control" id="hseparation" placeholder="Horizontal Separation" name="email">
      </div>
    </div>

  </form>
  <button type="button" class="btn btn-primary btn-lg" onclick="calcutaion()">Send</button>
  <button type="button" class="btn btn-outline-danger">Danger</button>
</div> <!------Left side div ends here--------->


  <!---------Right side div starts here--->
  <div class="col-lg-6">
  <form class="form-horizontal">

  <div class="form-group">

  <div class="form-group">
    <label class="control-label col-sm-4" for="atemp">Ambient Temperature:</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="atemp" placeholder="Ambient Temperature" name="atemp">
    </div>
    </div> 

    <div class="form-group">
    <label class="control-label col-sm-3" for="Dfactor">Demand Factor:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="Dfactor" placeholder="Demand Factor" name="Dfactor">
    </div>
    </div>



    <div class="form-group">
    <label class="control-label col-sm-3" for="Ttemp">Target Temp:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="Ttemp" placeholder="Target Temp" name="Ttemp">
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
      <th scope="col">Width</th>
      <th scope="col">Thinckness</th>
      <th scope="col">Runs</th>
      <th scope="col">Length</th>
      <th scope="col">Current</th>
      <th scope="col">Power Loss</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Bus bar</td>
      <td>
        <select class="form-control" id="etype" name="etype">
              <option value="0">-- Select Value --</option>
              <option value="Al">Al</option>
              <option value="Cu">Copper</option>

          </select>        
      </td>
      <td>
        <input type="text" class="form-control" id="PlossWidth" placeholder="Width" name="dwidth">
      </td>
      <td>
        <input type="text" class="form-control" id="PlossWidth" placeholder="Thickness" name="dwidth">
      </td>
      <td>
        <input type="text" class="form-control" id="PlossWidth" placeholder="Runs" name="dwidth">
      </td>
      <td>
        <input type="text" class="form-control" id="PlossWidth" placeholder="Length" name="dwidth">
      </td>
      <td>
        <input type="text" class="form-control" id="PlossWidth" placeholder="current" name="dwidth">
      </td>
      <td>
        <input type="text" class="form-control" id="PlossWidth" placeholder="Power Loss" name="dwidth" disabled>
      </td>
      <td>
        <button type="button" class="btn btn-warning">Add</button>
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
      <th scope="col">Length</th>
      <th scope="col">Current</th>
      <th scope="col">Power Loss</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>power cables</td>
      <td>
        <select class="form-control" id="pc_mat" name="pc_mat" onchange="pctype_load(this.value)">
              <option value="0">-- Select Value --</option>
          </select>        
      </td>
      <td>
      <select class="form-control" id="pc_type" name="pc_type">
              <option value="0">-- Select Value --</option>
          </select>
      </td>
      <td>
        <input type="text" class="form-control" id="pc_size" placeholder="Thickness" name="pc_size" onkeyup='pcable_cal()'>
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
        <button type="button" class="btn btn-warning">Add</button>
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
      <th scope="col">Qty</th>
      <th scope="col">Rating</th>
      <th scope="col">Power Loss</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Switch gear</td>
      <td>
        <select class="form-control" id="gmnf" name="gmnf" onchange='gtype_load(this.value)'>
        <option value="">-- select one -- </option>

          </select>        
      </td>
      <td>
      <select class="form-control" id="gtype" name="gtype" onchange='grange_load(this.value)'>
        <option value="">-- select one -- </option>
      </select> 
      </td>
      <td>
      <select class="form-control" id="grange" name="grange" onchange='gmodel_load(this.value)'>
        <option value="">-- select one -- </option>
      </select> 
      </td>
      <td>
      <select class="form-control" id="gmodel" name="gmodel" onchange='grate_view()' >
        <option value="">-- select one -- </option>
      </select> 
      </td>
      <td>
        <input type="text" class="form-control" id="g_qty" placeholder="Length" name="dwidth" onkeyup='pwrloss(this.value)'>
      </td>
      <td>
        <input type="text" class="form-control" placeholder="current"  name="g_power" id='g_power' disabled>
      </td>
      <td>
        <input type="text" class="form-control" placeholder="Power Loss" id="pwrloss" disabled>
      </td>
      <td>
        <button type="button" class="btn btn-warning">Add</button>
      </td>
      

    </tr>
  </tbody>
</table>

<!--switch gear ends-->
</div>
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
    alert(name)
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

  }
}

function wfaccal(){ //width factor calculation
  var width = parseInt(document.getElementById('dwidth').value);
  var wfac=Math.floor(width/1500);
  if((width%1500)>0){wfac+=1;}
    document.getElementById('wFactor').value=wfac;
  }
  

  function gtype_load(val){ // switch gear type drop down depend on mnf
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

function startup(){ //page onload functions are included here.
  gmnf_load(); //switch gear manufacturer loader
  pcmaterial_load(); //power cable material loader
}

function gmnf_load(){ //gear manufacturers load - startup
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

function pwrloss(val){ //power loss calculation 
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

  var pc_size = document.getElementById("pc_size").value = '';
  var pc_runs = document.getElementById("pc_runs").value = '';
  var pc_length = document.getElementById("pc_length").value = '';
  var pc_current = document.getElementById("pc_current").value = '';
  var pc_ploss = document.getElementById("pc_ploss").value = '';
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
            
          }
        });
}

function pctype_load(val){ // power cable types loader

document.getElementById("pc_type").options.length = 0;
var pc_size = document.getElementById("pc_size").value = '';
var pc_runs = document.getElementById("pc_runs").value = '';
var pc_length = document.getElementById("pc_length").value = '';
var pc_current = document.getElementById("pc_current").value = '';
var pc_ploss = document.getElementById("pc_ploss").value = '';
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
          
        }
      });
}

function pcable_cal(){ // power cable resistance calculator

  var pc_mat = document.getElementById("pc_mat").value;
  var pc_type = document.getElementById("pc_type").value;
  var pc_size = document.getElementById("pc_size").value;
  var pc_runs = document.getElementById("pc_runs").value;
  var pc_length = document.getElementById("pc_length").value;
  var pc_current = document.getElementById("pc_current").value;
  

  if(pc_size==''&&pc_runs==''&&pc_length==''&&pc_current==''){
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



</script>



</html>
