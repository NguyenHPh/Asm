<?php
	include "../classes/category.php";
    include "../classes/product.php";
    $category = new category();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $product = new product();
        $result = $product->insert($_POST, $_FILES);
        if($result){
            header("Location: manage-product.php");
        }
    }
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Add Productt</title>
<link rel = 'stylesheet' href="../css/add-product.css">
</head>

<body>
	
<div class = "form-add">
	<form method="post" action="" enctype="multipart/form-data" class = "form">
		<table cellpadding="6px;">
			<th colspan="2"><span style="font-size: 30px;">Thêm Sản Phẩm</span></th>
			<tr>
				<td>Tên sản phẩm: </td>
				<td><input type="text" name = "product_name" style = "width: 200px;" required/></td>
			</tr>
			<tr>
				<td>Chọn file ảnh: </td>
				<td><input type = "file" name="image" style = "width: 200px;" required/></td>
			</tr>
			<tr>
				<td>Tác giả: </td>
				<td><input type = "text" name = "artist" style = "width: 200px;" required></td>
			</tr>
			<tr>
			<td>Chọn file nhạc: </td>
				<td><input type = "file" name="music" style = "width: 200px;" required/></td>
			</tr>
			<tr>
				<td>Mã danh mục: </td>
				<td><select name = "category_id">
					<?php
						$result = $category->show();
						while($row = mysqli_fetch_assoc($result)){
							
					?>
					 	<option value = "<?php echo $row["id"]?>"><?php echo $row["category_name"] ?></option>
					
					<?php
						}
					?>
				</select></td>
			</tr>
			<tr>
				<td>Mô tả: </td>
				<td><textarea name = "product_content" style="height: 60px; width: 200px" required></textarea></td>
			</tr>
            <tr>
				<td>Hiển thị: </td>
				<td><input type = "checkbox" name = "is_show"></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name = "submit" style = "width: 80px; cursor: pointer" id = "submit" value="Thêm"></td>
			</tr>
		</table>
	</form>
	</br>
	</br>
	<a href="Manage-product.php" style ="text-decoration: none; margin-left: 150px;">Quay lại trang admin</a>	
</div>

</body>
</html>