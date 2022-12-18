<?php
$con = mysqli_connect("localhost", "root","", "crud_sederhana");
// $barangs = query("SELECT * FROM barang");
// $data = mysqli_query($con, "SELECT * FROM barang");
// $rows = [];

function query($query){
    global $con;
    $result = mysqli_query($con,$query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)){
    $rows[]=$row;
}
return $rows;
}
?>