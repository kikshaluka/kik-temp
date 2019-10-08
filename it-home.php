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
<!-- Modal -->
<div id="adduserModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New Engineer</h4>
      </div>
      <div class="modal-body">
      <form>
      <div class="form-group">
          <label for="email">Employee Number:</label>
          <input type="number" class="form-control" id="aempnumber">
        </div>
        <div class="form-group">
          <label for="email">User Name:</label>
          <input type="text" class="form-control" id="ausername">
        </div>
        <div class="form-group">
          <label for="pwd">Password:</label>
          <input type="password" class="form-control" id="ausrpwd">
        </div>
        </form>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-success" data-dismiss="modal" onclick="addnewuser('aempnumber','ausername','ausrpwd')">Create</button>
      </div>
    </div>

  </div>
</div>
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
              var cel1 = row.insertCell(0);
              var cel2 = row.insertCell(1);
              var cel3 = row.insertCell(2);
              cel1.innerHTML = response[i-1];
              cel2.innerHTML = response[i];
              cel3.innerHTML = '<button type="button" class="btn btn-warning" value='+ i +' >Update</button><button type="button" class="btn btn-danger">Delete</button>';
              } 
            }
            var lastrow = $('#onetable tr').length;
            var row = table.insertRow(lastrow);
            var cell1 = row.insertCell(0);
            cell1.innerHTML = '<button type="button" class="btn btn-success" data-toggle="modal" data-target="#adduserModal" >Add New Enginner</button>';
          }
        });
}

function itemtableload(){ //item load table
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
              $("#onetable tr").remove();
              var row = table.insertRow(0);
              var cell1 = row.insertCell(0);
              var cell2 = row.insertCell(1);
              var cell3 = row.insertCell(2);
              cell1.innerHTML = "<td class='table-dark'><b>Number</b></td>";
              cell2.innerHTML = "<td><b>Names</b></td>";
              cell3.innerHTML = "<td><b>Actions</b></td>";
              for(var i = 1; i <= response.length; i++)
              {
                var row = table.insertRow(i);  
                if(i%2==0){continue;}
                else{
              var cel1 = row.insertCell(0);
              var cel2 = row.insertCell(1);
              var cel3 = row.insertCell(2);
              cel1.innerHTML = response[i-1];
              cel2.innerHTML = response[i];
              cel3.innerHTML = '<button type="button" class="btn btn-warning" value='+ i +' >Update</button><button type="button" class="btn btn-danger">Delete</button>';
              } 
            }
            var crows = document.getElementById(onetable).getElementsByTagName("tr").length;
            alert(crows);
          }
        });
}

function addnewuser(empno,name,pass){ // add new engineer 
  var empno = document.getElementById(empno).value;
  var name = document.getElementById(name).value;
  var pass = document.getElementById(pass).value;

  if (empno==""||name==""||pass==""){
    alert("Every textbox need to be filled correctly");
  }
  else{
    $.ajax({
          type: 'POST',
          url: 'ajax.php',
          data:
          {
            neweng: "neweng",
            engemp: empno,
            engname: name,
            engpass: pass     
            },
          dataType:'json',
          success: function addnewuser (response) {
              var val=response['value'];
              if(val=="1"){
                alert(response['message']);
              }
              else{
                if(response['message']=="1062"){
                  alert("Duplicate Entry");
                }
                else{
                  alert("An error occured");
                }
              }
              $('#adduserModal').on('hidden.bs.modal', function () {
              $(this).find('form').trigger('reset');
})
          }
        });
  }
}
</script>
</html>
