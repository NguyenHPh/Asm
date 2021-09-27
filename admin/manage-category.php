<?php
    include "../Lib/session.php";
    include '../classes/category.php';
    Session::checkSession();
    $category = new category();
    if(isset($_GET['action']) && !empty($_GET['action'])){
        if($_GET['action'] == 'logout'){
            Session::destroy();
        }
    }
    if(isset($_GET['id']) && isset($_GET['view'])){
        if($_GET['view'] == 'delete'){
            $category_id = $_GET['id'];
            $result = $category->delete($category_id);
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
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome Admin</title>
	<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="../css/manage-category.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
    <div class = "row">
	<?php
        include '../include/side-bar.php';
        $result = $category->show();
    ?>
    <div class = "col-lg-9 table-list">
		<table>
			<tr>
				<td><strong>Id</strong></td>
				<td><strong>Tên Danh Mục</strong></td>
				<td><strong>Ngày Cập Nhật</strong></td>
				<td><strong>Show</strong></td>
				<td><strong>Xóa</strong></td>
				<td><strong>Sửa</strong></td>
			</tr>
    <?php
			while($row = mysqli_fetch_assoc($result)){
	?>
			<tr>
				<td><?php echo $row["id"]?></td>
				<td><?php echo $row["category_name"];?></td>
				<td><?php echo $row["update_date"]?>
				<td><input type="checkbox" <?php echo $row["is_show"]?>/></td>
				<td><a href="?view=delete&id=<?php echo $row["id"]?>">Xóa</a></td>
				<td><a href="edit-category.php?&id=<?php echo $row["id"]?>">Sửa</a></td>
			</tr>
	
	
	<?php
			}
	?>
        </table>
    </div>
    </div>
</body>
</html>