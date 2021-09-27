<?php
    require_once '../Lib/connect-database.php';
    require_once '../helper/format.php';

    class category{

        private  $connect;
        private $format;

        public function __construct(){
            $this->connect = new Database();
            $this->format = new Format();
        }

        public function insert($category_name, $is_show){
           $this->connect->query("INSERT INTO category(category_name, is_show) VALUES ('$category_name', '$is_show')");
        }

        public function delete($category_id){
            $result = $this->connect->query("DELETE FROM category WHERE id = '$category_id'");
            if($result == false){
                return false;
            }else{
                return true;
            }
        }

        public function edit($category_name, $is_show, $id){
            $result = $this->connect->query("UPDATE category SET category_name = '$category_name', is_show = '$is_show' WHERE id = '$id'");
            if($result == false){
                return false;
            }else{
                return true;
            }
        }

        public function showToWeb(){
            $result = $this->connect->query("SELECT * FROM category WHERE is_show = 'checked'");
            if($result){
                return $result;
            }else{
                return false;
            }
        }
        
        public function show(){
            $result = $this->connect->query("SELECT * FROM category");
            if($result){
                return $result;
            }else{
                return false;
            }
        }

        public function showOnly($id){
            $result = $this->connect->query("SELECT * FROM category WHERE id = '$id'");
            if($result){
                return $result;
            }else{
                return false;
            }
        }
    };
?>