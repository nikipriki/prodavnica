<?php
require "dbBroker.php";
require "model/proizvod.php";
require "content.php";
$naziv=$_POST["naziv"];
$cat_ID=$_POST["cat_ID"];
$id=$_POST["id"];
$action = $_POST["action"];
if($action == "unos"){
    $rezultat = Proizvod::add($naziv, $cat_ID,$conn);
   
}else{
    $rezultat = Proizvod::update($id, $naziv, $cat_ID,$conn);
}
if ($rezultat){
    ispis(Proizvod::getAll($conn), $conn);
}
$conn->close();
?>
