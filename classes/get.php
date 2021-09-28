<?php
include "../Lib/connect-database.php";
$db = new Database();
if(isset($_GET['data'])){
    $data = $_GET['data'];
    $sql = "SELECT * FROM product WHERE product_name LIKE '$data%' LIMIT 5";
    $result = $db->query($sql);
while($row = mysqli_fetch_assoc($result)){
    $name = $row['product_name'];
    echo "<a style = 'font-size:13px;' href = '?name=$name'><div class = 'live-search' style = 'height: 30px;'>".$name."</div></a></br>";
}
}
?>