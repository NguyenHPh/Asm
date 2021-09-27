<?php
include "../Lib/connect-database.php";
$db = new Database();
if(isset($_GET['data'])){
    $data = $_GET['data'];
    $sql = "SELECT * FROM product WHERE product_name LIKE '$data%'";
    $result = $db->query($sql);
while($row = mysqli_fetch_assoc($result)){
    echo $row['product_name']."</br>";
}
}
?>