<?php
    include "../classes/product.php";
    $pd = new product();
    $result = $pd->show();
?>
<script>
  let allMusic = new Array();
<?php
  while($row = mysqli_fetch_assoc($result)){
?>
    allMusic.push({
      id: <?php echo $row['id']?>,
      name: "<?php echo $row['product_name']?>",
      artist: "<?php echo $row['artist']?>",
      img: "<?php echo $row['image']?>",
      src: "<?php echo $row['music_file']?>"
    });
<?php
 } 
?>
</script>
<?php ?>