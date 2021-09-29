<?php
    include '../classes/category.php';
    include '../classes/product.php';
    $category = new category();
    $product = new product();
    $result = $product->showOnly($_GET['id']);
    $result2 = $category->show();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $result = $product->edit($_POST, $_FILES, $_GET['id']);
        if($result){
            header('Location: manage-product.php');
        }
    }

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<style>
	.form-add{
		position: absolute;
		top: 20%;
		left: 37%;
		border: 2px solid #1EDFB1;
		width: 450px;
		height: 500px;	
		background-image: linear-gradient(to right, #A0E9EC, #06888C  );
	}
	.form{
		margin-left: 60px;	
		margin-top: 10px;
	}
</style>
</head>

<body>
	
<?php
	while($row = mysqli_fetch_assoc($result)){
?>	
	
<div class = "form-add">
	<form method="post" action="" enctype="multipart/form-data" class = "form">
		<table cellpadding="6px;">
			<th colspan="2"><span style="font-size: 30px;">Sửa Sản Phẩm</span></th>
			<tr>
				<td>Tên sản phẩm: </td>
				<td><input type="text" name = "product_name" style = "width: 200px;" value = "<?php echo $row["product_name"];?>"/></td>
			</tr>
			<tr>
				<td>Chọn file ảnh</td>
				<td><input type = "file" name="image" style = "width: 200px;" /></td>
			</tr>
			<tr>
				<td>Giá: </td>
				<td><input type = "text" name = "artist" style = "width: 200px;" value="<?php echo $row["artist"];?>"></td>
			</tr>
			<tr>
				<td>Số lượng: </td>
				<td><input type = "file" name = "music" style = "width: 200px;" value="<?php echo $row["music_file"];?>"></td>
			</tr>
			<tr>
				<td>Mã danh mục: </td>
				<td><select name="category_id">
					<?php
							while($row2 = mysqli_fetch_assoc($result2)){
								if($row["category_id"] == $row2["id"]){
					?>
								<option value="<?php echo $row2["id"]?>" selected><?php echo $row2["category_name"]?></option>
					<?php
								}else{
					?>
								<option value="<?php echo $row2["id"]?>"><?php echo $row2["category_name"]?></option>
					<?php
								
								}
							}
						
					?>	
				</select></td>
			</tr>
			<tr>
				<td>Mô tả: </td>
				<td><textarea name = "product_content" style="height: 60px; width: 200px"><?php echo $row["product_content"];?></textarea></td>
			</tr>
			<tr>
				<td>Hiển thị: </td>
				<td><input type = "checkbox" name = "is_show" <?php echo $row["is_show"]?>></td>
			</tr>
			<tr>
				<td><input type="hidden" name = "id" value="<?php echo $row["id"];?>"></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name = "submit" style = "width: 80px; cursor: pointer" id = "submit" value="Cập nhật"></td>
			</tr>
		</table>
	</form>
	</br>
	</br>
</div>
<?php 
	}
?>

</body>
</html>