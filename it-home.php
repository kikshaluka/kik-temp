<?php


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home | IT</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <div class="btn-group">
    <button type="button" class="btn btn-primary" value="u" onclick="clickevent(this.value)">User Control</button>
    <button type="button" class="btn btn-primary" value="i" onclick="clickevent(this.value)">Item Management</button>
    <button type="button" class="btn btn-primary">Orders</button>
  </div>
</div>
<table class="table table-striped table-bordered" id="onetable">
</table>
</body>
<script>
function clickevent(val){ //function to catch click events.
    switch (val) {
      case 'u':
        usertableload();
        break;
      case 'i':
        itemtableload();
        break;
      case 'o':
        ordertableview();
        break;
  }
}

function usertableload(){ //user table
  var table = document.getElementById('onetable');
  $.ajax({
          type: 'POST',
          url: 'ajax.php',
          data:
          {
            usrtableload: "utb"
            },
          dataType:'json',
          success: function usertableload (response) {
              //alert(response);
              $("#onetable tr").remove();
              var row = table.insertRow(0);
              var cell1 = row.insertCell(0);
              var cell2 = row.insertCell(1);
              var cell3 = row.insertCell(2);
              cell1.innerHTML = "<td><b>Number</b></td>";
              cell2.innerHTML = "<td><b>Names</b></td>";
              cell3.innerHTML = "<td><b>Actions</b></td>";
              for(var i = 1; i <= response.length; i++)
              {
                var row = table.insertRow(i);  
                if(i%2==0){continue;}
                else{
                //alert(i)
              var cel1 = row.insertCell(0);
              var cel2 = row.insertCell(1);
              var cel3 = row.insertCell(2);
              cel1.innerHTML = response[i-1];
              cel2.innerHTML = response[i];
              cel3.innerHTML = '<button type="button" class="btn btn-warning" value='+ i +' >Update</button><button type="button" class="btn btn-danger">Delete</button>';

              } 
            }
          }
        });
}

function itemtableload(){
  var table = document.getElementById('onetable');
  $.ajax({
          type: 'POST',
          url: 'ajax.php',
          data:
          {
            usrtableload: "utb"
            },
          dataType:'json',
          success: function usertableload (response) {
              //alert(response);
              $("#onetable tr").remove();
              var row = table.insertRow(0);
              var cell1 = row.insertCell(0);
              var cell2 = row.insertCell(1);
              var cell3 = row.insertCell(2);
              cell1.innerHTML = "<td><b>Number</b></td>";
              cell2.innerHTML = "<td><b>Names</b></td>";
              cell3.innerHTML = "<td><b>Actions</b></td>";
              for(var i = 1; i <= response.length; i++)
              {
                var row = table.insertRow(i);  
                if(i%2==0){continue;}
                else{
                //alert(i)
              var cel1 = row.insertCell(0);
              var cel2 = row.insertCell(1);
              var cel3 = row.insertCell(2);
              cel1.innerHTML = response[i-1];
              cel2.innerHTML = response[i];
              cel3.innerHTML = '<button type="button" class="btn btn-warning" value='+ i +' >Update</button><button type="button" class="btn btn-danger">Delete</button>';

              } 
            }
          }
        });
}
</script>
</html>
