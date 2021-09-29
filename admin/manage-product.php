<?php
    include "../Lib/session.php";
    include "../classes/product.php";
    $product = new product();
    Session::checkSession();
    if(isset($_GET['action']) && !empty($_GET['action'])){
        if($_GET['action'] == 'logout'){
            Session::destroy();
        }
    }
    if(isset($_GET['id']) && isset($_GET['view'])){
        if($_GET["view"] == "delete"){
            $product_id = $_GET['id'];
            $result = $product->delete($product_id);
            if($result){
?>
                <script>
                    alert('Đã xóa thành công');
                </script>
<?php
            }
        }
    }
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
<link rel="stylesheet" href="../css/manage-product.css"/>
</head>

<body>
	<div class = row>
    <?php
			include "../include/side-bar.php";
            $result = $product->show();
	?>
	<div class = "col-lg-9 table-list">
		<table>
			<tr>
				<td><strong>Id</strong></td>
				<td><strong>Hình Ảnh</strong></td>
				<td><strong>Tên Sản Phẩm</strong></td>
				<td><strong>Mã danh mục</strong></td>
				<td><strong>File Nhạc</strong></td>
				<td><strong>Tác giả</strong></td>
				<td><strong>Ngày Đăng</strong></td>
				<td><strong>Show</strong></td>
				<td><strong>Xóa</strong></td>
				<td><strong>Sửa</strong></td>
			</tr>
				
		<?php
			while($row = mysqli_fetch_assoc($result)){
		?>
			<tr>
				<td><?php echo $row["id"];?></td>
				<td><img src = "<?php echo ("../image/".$row["image"]);?>"></td>
				<td><?php echo $row["product_name"];?></td>
				<td><?php echo $row["category_id"];?></td>
				<td><?php echo $row["music_file"]?></td>
				<td><?php echo $row["artist"]?></td>
				<td><?php echo $row["update_date"]?></td>
				<td><input type="checkbox" name = "check" <?php echo $row["is_show"]?>></td>
				<td><a href="?view=delete&id=<?php echo $row["id"]?>">Xóa</a></td>
				<td><a href="edit-product.php?id=<?php echo $row["id"]?>">Sửa</a></td>
			</tr>
	
	
		<?php
			}
		?>

		</table>
	</div>
	</div>