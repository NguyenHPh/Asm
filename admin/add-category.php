<?php
    include '../classes/category.php';
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $category_name = $_POST['name'];
        $show = $_POST['is_show'];
        if($show){
            $is_show = 'checked';
        }else{
            $is_show = '';
        }
        $category = new category();
        $category->insert($category_name, $is_show);
        if($category){
?>
<?php
            header("Location: manage-category.php");
        }
    }
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Add category</title>
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
	
	
<div class = "form-add">
	<form method="post" action="" class = "form">
		<table cellpadding="6px;">
			<th colspan="2"><span style="font-size: 30px;">Thêm Danh Mục</span></th>
			<tr>
				<td>Tên danh mục: </td>
				<td><input type="text" name = "name" style = "width: 200px;" required/></td>
			</tr>
            <tr>
                <td>Hiển thị: </td>
                <td><input type="checkbox" name = "is_show"/></td>
            </tr>
		</table>
        <input type="submit" name = "submit" style = "margin-left: 130px; margin-top: 20px; width: 80px; cursor: pointer" id = "submit" value="Thêm">
	</form>
	</br>
	</br>
	<a href="Manage-category.php" style ="text-decoration: none; margin-left: 150px;">Quay lại trang quản lí</a>	
</div>

</body>
</html>