<?php
    include "../classes/product.php";
    $pd = new product();
    $result = $pd->show();
?>
<script>
  let allMusic = new Array;
<?php
  while($row = mysqli_fetch_assoc($result)){
?>
// To add more song, just copy the following code and paste inside the array

//   {
//     name: "Here is the music name",
//     artist: "Here is the artist name",
//     img: "image name here - remember img must be in .jpg formate and it's inside the images folder of this project folder",
//     src: "music name here - remember img must be in .mp3 formate and it's inside the songs folder of this project folder"
//   }

//paste it inside the array as more as you want music then you don't need to do any other thing
    allMusic.push({
      name: "<?php echo $row['product_name']?>",
      artist: "<?php echo $row['artist']?>",
      img: "<?php echo $row['image']?>",
      src: "<?php echo $row['music_file']?>"
    });
</script>
<?php
 } 
?>