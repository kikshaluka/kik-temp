<?php



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
<body>

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
        <input type="text" class="form-control" id="larea" placeholder="Louver Area" name="email">
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
            <option value="0">0</option>
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

  </form>
  <button type="button" class="btn btn-primary btn-lg" onclick="calcutaion()">Send</button>
  <button type="button" class="btn btn-outline-danger">Danger</button>
</div> <!------Left side div ends here--------->


  <!---------Right side div starts here--->
  <div class="col-lg-6">
  <form class="form-horizontal">

  <div class="form-group">
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
            document.getElementById('Ae').value = response['Ae'].toFixed(3);
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
  
</script>



</html>
