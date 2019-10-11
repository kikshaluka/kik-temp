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
  <h2>Heat tempreture </h2>
  <div class="row">
  <form class="form-horizontal">
  <div class="form-group">
    <label class="control-label col-sm-2" for="csys">Cooling System:</label>
    <div class="col-sm-3">
        <select class="form-control" id="csys">
            <option>Natural Ventilasion</option>
            <option>Forced Ventilasion</option>
            <option>Air Condition</option>
        </select>
    </div>
    </div> 

    <div class="form-group row">
    <label class="control-label col-sm-2" for="larea">Louver Area:</label>
      <div class="col-sm-2">
        <input type="text" class="form-control" id="larea" placeholder="Louver Area" name="email">
      </div>
    <label class="control-label col-sm-2" for="loc">Location:</label>
      <div class="col-sm-2">
        <input type="text" class="form-control" id="loc" placeholder="Location" name="loc">
      </div>
  </div>

  <div class="form-group"> <!--Enclosure Type drop down-->
      <label class="control-label col-sm-2" for="etype">Enclosure Type:</label>
      <div class="col-sm-3">
        <select class="form-control" id="etype">
            <option>Free standing panel</option>
            <option>Free standing cubicle</option>
            <option>Wall Mounted</option>
        </select>
    </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="pos">Position:</label>
      <div class="col-sm-3">
        <select class="form-control" id="pos">
            <option>Separated</option>
            <option>Surface Mounted</option>
            <option>Flush Mounted</option>
        </select>
    </div>
    </div>

    <div class="panel-group form-group">
    <label class="control-label col-sm-2" for="email">Item:</label>
    <div class="panel panel-primary col-sm-6">
      <div class="panel-heading">Dimensions</div>
      <div class="panel-body">
      
      <div class="form-group">
      <label class="control-label col-sm-2" for="dheight">Height:</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" id="dheight" placeholder="Enter Height" name="dheight">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="dwidth">Width:</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" id="dwidth" placeholder="Enter Width" name="dwidth">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="ddepth">Depth:</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" id="ddepth" placeholder="Enter Depth" name="ddepth">
      </div>
    </div>

    </div>
    </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="hseparation">Horiszontal Separation:</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="hseparation" placeholder="Horizontal Separation" name="email">
      </div>
    </div>

    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-7">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>

    

  </form>

    

  </div>
</div>
</body>


<script>

</script>



</html>
