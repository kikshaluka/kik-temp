<?php

include_once('conn.php');


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Temparature Calculator</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!--searchable drop down dependencies-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/i18n/defaults-*.min.js"></script>

</head>

<body>

<div class="container">
<form>

<table class="table">
<tbody>
      <tr>
        <td>Rated Current(A)</td>
        <td>  <div class="col-xs-6" >
        <select class='selectpicker' id="rc" data-live-search="true" onchange="drop(this.value)">
          <?php
            $stmt = $conn->query("SELECT DISTINCT rated_current FROM busbars ORDER BY rated_current ASC");
              while ($row = $stmt->fetch_assoc()):
                    $rc = $row['rated_current'];?>
                    <option value="<?php echo $rc?>" data-tokens="<?php echo $rc?>"><?php echo $rc?></option>
              <?php endwhile;?>

              </select>
            </div>
        </td>
        <td>Bus bar size</td>
        <td><div class="col-xs-6" >
                <select class='form-control' id="bus" onchange="busdrop(this.value)">
                <option value="">-- select one -- </option>
                </select>
            </div>
        </td>
      </tr>
     
    </tbody>
</table>

<table class="table">
<thead class="thead-dark">
<tr>
    <th colspan="5">200</th>
</tr>
      <tr class="danger">
        <td>30K / 3P</td>
        <td>30K / 3P+N</td>
        <td>70K</td>
        <td>70K / 3P+N</td>
        <td>Cu weight</td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><input class="form-control input-sm" id="200303p" type="text"  disabled></td>
        <td><input class="form-control input-sm" id="200303pn" type="text"  disabled></td>
        <td><input class="form-control input-sm" id="200703p" type="text"  disabled></td>
        <td><input class="form-control input-sm" id="200703pn" type="text" disabled></td>
        <td><input class="form-control input-sm" id="200cu" type="text"  disabled></td>
      </tr>
     
    </tbody>
  </table>


<table class="table">
<thead class="thead-dark">
<tr>
    <th colspan="5">1000</th>
</tr>
      <tr class="danger">
        <td>30K / 3P</td>
        <td>30K / 3P+N</td>
        <td>70K</td>
        <td>70K / 3P+N</td>
        <td>Cu weight</td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><input class="form-control input-sm" id="1000303p" type="text"  disabled></td>
        <td><input class="form-control input-sm" id="1000303pn" type="text"  disabled></td>
        <td><input class="form-control input-sm" id="1000703p" type="text"  disabled></td>
        <td><input class="form-control input-sm" id="1000703pn" type="text"  disabled></td>
        <td><input class="form-control input-sm" id="1000cu" type="text"  disabled></td>
      </tr>
     
    </tbody>
  </table>



<table class="table">
<tbody>
<tr>
    <td>Select K rating</td>
<td>
      <div class="col-xs-6">
  <select class="form-control" id="krating" onchange="buslencalc()">
    <option value="30K / 3P">30K / 3P</option>
    <option value="30K / 3P+N">30K / 3P+N</option>
    <option value="70K / 3P">70K / 3P</option>
    <option value="30K / 3P+N">30K / 3P+N</option>
  </select>
  </td>
  <td>
  Bus Bar Length
  </td>
  <td>
  <div class="col-xs-6">
    <input class="form-control input-sm" id="bblen" type="text" placeholder="Bus bar length" onkeyup="buslencalc()">
  </td>
  <td>
  Total
  </td>
  <td>
  <div class="col-xs-6">
    <input class="form-control input-sm" id="bbtotal" type="text" placeholder="total" disabled>
  </td>
</tr>
</table>
</form>
<button type="button" class="btn btn-success" onclick="tableload()">Add</button>
<table class="table" id="rcsumm">
    <thead class="thead-dark">
      <tr>
        <th>Rated Current</th>
        <th>Busbar Size</th>
        <th>K Rating</th>
        <th>Busbar Length</th>
        <th>W/1M</th>
        <th>Total</th>
        <th>Option</th>


      </tr>
    </thead>
    <tbody>
     
    </tbody>
  </table>

</div>
<b><span id="total_sum_value"></span></b>
</div>

</body>
<script>

function drop(rc){ //rated current dropdown
  //$("#bus").append(new Option("option text", "value"));
  //alert(rc);
  $.ajax({
          type: 'POST',
          url: 'ajax.php',
          data:
          {
            rcdrop_option: rc
            },
          dataType:'json',
          success: function drop (response) {
            document.getElementById("bus").options.length = 0;
            for (i = 0; i < response.length; i++) {
              $("#bus").append(new Option(response[i], response[i]));

          }
          }
        });
}

function busdrop(val){ // bus dropdown menu
  $.ajax({
          type: 'POST',
          url: 'ajax.php',
          data:
          {
            busdrop_option: val
            },
          dataType:'json',
          success: function drop (response) {
            $('#200303p').val(response['30k3p']);
            $('#200303pn').val(response['30k3p+n']);
            $('#200703p').val(response['70k3p']);
            $('#200703pn').val(response['70k3p+n']);
            $('#200cu').val(response['200cu']);
            $('#1000303p').val(response['100030k3p']);
            $('#1000303pn').val(response['100030k3p+n']);
            $('#1000703p').val(response['100070k3p']);
            $('#1000703pn').val(response['100070k3p+n']);
          }
        });
}

function buslencalc(){ // weight over bus bar calculation

  var krating=document.getElementById('krating').value;
  var ttp=document.getElementById('1000303p').value;
  var ttpn=document.getElementById('1000303pn').value;
  var stp=document.getElementById('1000703p').value;
  var stpn=document.getElementById('1000703pn').value;
  var bblen=document.getElementById('bblen').value;
  
  switch(krating) {
  case "30K / 3P":
    var tot = bblen*ttp;
    document.getElementById('bbtotal').value=tot;
    break;
  case "30K / 3P+N":
    var tot = bblen*ttpn;
    document.getElementById('bbtotal').value=tot;
    break;
  case "70K / 3P":
    var tot = bblen*stp;
    document.getElementById('bbtotal').value=tot;
    break;
  
  case "30K / 3P+N":

  var tot = bblen*stpn;
    document.getElementById('bbtotal').value=tot;
    break;

  default:
    alert("Try again");
}

}

function tableload(){

  var rc = $('#rc').val();
  var bbsize = $('#bus').val();
  var krate = $('#krating').val();
  var bblen = $('#bblen').val();
  var bbtotal = $('#bbtotal').val();
  var w1m = (bbtotal/bblen);


  var newrow = '<tr><td>' + rc + '</td><td>' + bbsize + '</td><td>' + krate + '</td><td>' + bblen + '</td><td>' + w1m + '</td><td>' + bbtotal + '</td><td><button type="button" class="btn btn-danger">Delete</button></td></tr>';
  $('#rcsumm tr:last').after(newrow);
  calc();

}

function calc(){
       var calculated_total_sum = 0;
       $("#rcsumm #bbtotal").each(function () {
           var get_textbox_value = $(this).val();
           if ($.isNumeric(get_textbox_value)) {
              calculated_total_sum += parseFloat(get_textbox_value);
              } 
              else{
                calculated_total_sum=512;
              }                 
            });
              $("#total_sum_value").html(calculated_total_sum);
       }

</script>
</html>