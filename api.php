<?php
$msg = "";
$MySQLdb = new PDO("mysql:host=127.0.0.1;dbname=inventory", "root", "");
$MySQLdb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



header("content-type:application/json");



if(isset($_POST["action"])){

    switch($_POST["action"]){
       
        case "insert":
            $product = $_POST["product"];
            $price = $_POST["price"];
            $cursor = $MySQLdb->prepare("SELECT * FROM merchandise WHERE product=:product");
            $cursor->execute( array(":product"=>$_POST["product"]) );
            if($price <=0){
                echo '{"success":"false","data":"The number must be above zero!"}';
            }
            else if($cursor->rowCount()){
                echo '{"success":"false","data":"product already exists!!"}';
            }else{
                $cursor = $MySQLdb->prepare("INSERT INTO merchandise (product, price) value (:product,:price)");
                $cursor->execute(array(":product"=>$_POST["product"], ":price"=>$_POST["price"]));
                echo '{"success":"true","data":"Uploaded successfully!!"}';
    
            }


            break;


            case "select":
                $product = $_POST["product"];
                $cursor = $MySQLdb->prepare("SELECT * FROM merchandise WHERE product=:product");
                $cursor->execute( array(":product"=>$_POST["product"]) );
                if($row = $cursor->fetch()){
                    $cursor = $MySQLdb->prepare("SELECT * FROM merchandise WHERE product=:product");
                    $cursor->execute( array(":product"=>$_POST["product"]) );;
                    echo $cursor->fetch()["price"];
                }
                else{
                    echo -1;
                }


             break;
        
        }

        } 


?>
