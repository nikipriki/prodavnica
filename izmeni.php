<?php
require "dbBroker.php";
require "model/proizvod.php";
require "content.php";
$naziv=$_POST["naziv"];
$cat_ID=$_POST["cat_ID"];
$rezultat = Proizvod::update($id, $naziv, $cat_ID,$conn);
if ($rezultat){
    ispis(Proizvod::getAll($conn), $conn);
}
$conn->close();
?>