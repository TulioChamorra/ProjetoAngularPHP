<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
if($_POST){

// include database connection
include 'config/database.php';

try{
    header("Content-type: application/json; charset=utf-8");
// insert query
$query = "INSERT INTO tabela SET campo1=:campo1, campo2=:campo2, campo3=:campo3";
// prepare query for execution
$stmt = $con->prepare($query);
// posted values
$campo1 = $_POST['campo1'];
$campo2 = $_POST['campo2'];
$campo3 = $_POST['campo3'];
// bind the parameters
$stmt->bindParam(':campo1', $campo1);
$stmt->bindParam(':campo2', $campo2);
$stmt->bindParam(':campo3', $campo3);
// Execute the query
if($stmt->execute()){
    echo json_encode(array('result'=>'success'));
}else{
    echo json_encode(array('result'=>'fail'));
}
}
// show error
catch(PDOException $exception){
die('ERROR: ' . $exception->getMessage());
}
}
?>
