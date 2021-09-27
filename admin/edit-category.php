
<?php
    include '../classes/category.php';
    $category = new category();
    $result = $category->showOnly($_GET['id']);
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $category_name = $_POST["category_name"];
        $show = $_POST['is_show'];
        if($show){
            $is_show = 'checked';
        }else{
            $is_show = '';
        }
        $res = $category->edit($category_name, $is_show, $_GET['id']);
        if($res){
            header("Location: manage-category.php");
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
		height: 300px;	
		background-image: linear-gradient(to right, #A0E9EC, #06888C  );
	}
	.form{
		margin-left: 60px;	
		margin-top: 30px;
	}
</style>
</head>

<body>

<?php
    while($row = mysqli_fetch_assoc($result)){
?>
<div class = "form-add">
	<form method="post" action="" class = "form">
		<table cellpadding="6px;">
			<th colspan="2"><span style="font-size: 30px;">Sửa Danh Mục</span></th>
			<tr>
				<td>Tên danh mục: </td>
				<td><input type="text" name = "category_name" style = "width: 200px;" value = "<?php echo $row["category_name"]?>"/></td>
			</tr>
			<tr>
				<td>Hiển Thị: </td>
				<td><input type = "checkbox" name = "is_show" <?php echo $row["is_show"]?>></td>
			</tr>
			<tr>
				<td><input type="hidden" name = "id" value="<?php echo $row["id"];?>"></td>
			<tr>
				<td colspan="2" align="center"><input type="submit" name = "submit" style = "width: 80px; cursor: pointer" id = "submit" value="Cập Nhật"></td>
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