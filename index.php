<!DOCTYPE html>

<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  


</head>
<body>

<style> body {background-color: #bbbbbb; }</style>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <h1 class="navbar-brand" style="color:#FFA07A;">Product inventory update:</h1>
        </div>
        <ul class="nav navbar-nav" style="float: right">
            <li><a href="search.php" id="search" style="color:red;">Data search</a></li>
        </ul>
    </div>
</nav>

  <h3> Product Name: <input type="text" id="inp1"></h3>
  <br>
	<br>
  <h3>Price: <input type="number" id="inp2"></h3>
  <br>
  <br>
  <button id="btn1" class="btn btn-outline-danger">Update data</button>
  
  
  
  <span id="MSG"></span>

  <script>
    
    $("#btn1").click(function() {
      $.post("api.php",{"action":"insert","product":$("#inp1").val(),"price":$("#inp2").val()},function(data){
        if(data.success == "false"){
            $("#MSG").html('<div class="alert alert-danger"><strong>Error:'+data.data+'</strong></div>').fadeIn().delay(2000).fadeOut();
        }else{
            $("#MSG").html('<div class="alert alert-success"><strong>Success:'+data.data+'</strong></div>').fadeIn().delay(2000).fadeOut();
        }
      });
    });


    </script>

</body>
</html>