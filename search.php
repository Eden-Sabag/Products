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
            <h1 class="navbar-brand" style="color:#FFA07A;">Data search:</h1>
        </div>
        <ul class="nav navbar-nav" style="float: right">
            <li><a href="index.php" id="update" style="color:red;">Product inventory update</a></li>
        </ul>
    </div>
</nav>


 <h3> Search: <input type="text" id="inp1" placeholder="      product name"></h3>
         <br>
         <br>
         <button id="btn1" style="color:hsl(0, 100%, 50%)">Show price</button>
         <br>
         <br>
         <h1><span id="result"></span></h1>


         <span id="MSG"></span>

  <script>
    
    $("#btn1").click(function() {
   
      $.post("api.php",{"action":"select","product":$("#inp1").val()},function(data){
        if(data > 0){
          $("#result").text(data);
        }
        else{
          $("#result").text("The product does not exist");
        }
      })
      });

        
      

   
    </script>

</body>
</html>