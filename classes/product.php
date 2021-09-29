<?php
    require_once '../Lib/connect-database.php';
    require_once '../helper/format.php';

    class product{

        private  $connect;
        private $format;

        public function __construct(){
            $this->connect = new Database();
            $this->format = new Format();
        }

        public function insert($data, $file){
           $product_name = $this->format->validation($data['product_name']);
           $product_price = $this->format->validation($data['product_price']);
           $quantity = $this->format->validation($data['quantity']);
           $product_content = $this->format->validation($data['product_content']);
           $category_id = $this->format->validation($data['category_id']);
           $show = $data['is_show'];
           if($show){
               $is_show = 'checked';
           }else{
               $is_show = '';
           }
           move_uploaded_file($file['image']['tmp_name'], "../image/".$file['image']['name']);
           $image = $file['image']['name'];

           move_uploaded_file($file['image']['tmp_name'], "../music/".$file['music']['name']);
            $music = $file['music']['name'];
           

           $result = $this->connect->query("INSERT INTO product(product_name, category_id ,product_price, music_file, image, product_content, is_show) VALUES ('$product_name', '$category_id', $product_price , '$music', '$image', '$product_content' ,'$is_show')");
           if($result == false){
                return false;
            }else{
                return true;
            }   
        }

        public function delete($product_id){
            $result = $this->connect->query("DELETE FROM product WHERE id = '$product_id'");
            if($result == false){
                return false;
            }else{
                return true;
            }
        }

        public function edit($data, $files, $id){
            $product_name = $this->format->validation($data['product_name']);
            $product_price = $this->format->validation($data['product_price']);
            $quantity = $this->format->validation($data['quantity']);
            $product_content = $this->format->validation($data['product_content']);
            $category_id = $this->format->validation($data['category_id']);
            $show = $data['is_show'];
            if($show){
                $is_show = 'checked';
            }else{
                $is_show = '';
            }
            if(isset($files['image']) && $files['image']['error'] == 0){
                move_uploaded_file($files['image']['tmp_name'], "../image/".$files['image']['name']);
                $image = $files['image']['name'];
                $result = $this->connect->query("UPDATE product SET image = '$image' WHERE id = '$id'");
            }

            if(isset($files['music']) && $files['music']['error'] == 0){
                move_uploaded_file($files['image']['tmp_name'], "../music/".$files['music']['name']);
                $music = $files['music']['name'];
                $result = $this->connect->query("UPDATE product SET music_file = '$music' WHERE id = '$id'");
            }
 
            $result = $this->connect->query("UPDATE product SET product_name = '$product_name', is_show = '$is_show', product_price = '$product_price', quantity = '$quantity', category_id = '$category_id', product_content = '$product_content'  WHERE id = '$id'");
            return $result;
        }

        
        public function show(){
            $result = $this->connect->query("SELECT * FROM product");
            if($result){
                return $result;
            }else{
                return false;
            }
        }

        public function showToWeb(){
            $result = $this->connect->query("SELECT * FROM product WHERE is_show = 'checked'");
            if($result){
                return $result;
            }else{
                return false;
            }
        }

        public function showOnly($id){
            $result = $this->connect->query("SELECT * FROM product WHERE id = '$id'");
            if($result){
                return $result;
            }else{
                return false;
            }
        }

        public function showByCategory($category_id){
            $result = $this->connect->query("SELECT * FROM product WHERE category_id = '$category_id'");
            if($result){
                return $result;
            }else{
                return false;
            }
        }

        public function search($key){
            
            if($key == ""){
                return $this->showToWeb();
            }else{
                $result = $this->connect->query("SELECT * FROM product WHERE is_show = 'checked' AND product_name like '%$key%'");
                if($result){
                    return $result;
                }else{
                    return false;
                }
            }
        }
        
    };
?>