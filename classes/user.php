<?php
    require_once "../Lib/connect-database.php";
    require_once "../helper/format.php";
    require_once "../Lib/session.php";
    class User{
        private $db; // Không được cấp phát new cho properties
        private $fm;
        private $ss;

        public function __construct()
        {
            $this->db = new Database(); // không được thiếu $this
            $this->fm = new Format();
            $this->ss = new Session();
        }

        public function showInfoUser($id){
           return $this->db->query("SELECT * FROM user WHERE user_id = '$id'");
        }

        public function addNewUser($username, $password, $email){
            $username = $this->fm->validation($username);
            $password = $this->fm->validation($password);
            $email = $this->fm->validation($email);
            $result = $this->db->query("INSERT INTO user (username, password, email) VALUES ('$username', '$password', '$email')");
            if($result){
                return $result;
            }else{
                return false;
            }
        }

        public function login($username, $password){
            $result = $this->db->query("SELECT * FROM user WHERE username = '$username' AND password = '$password'");
            if($result){
                $value = $result->fetch_array();
                $this->ss->set("login-user",$value['user_id']);
                header("Location: ../front-end/account.php");
            }else{
                return false;
            }
        }

        public function logout(){
            unset($_SESSION["login-user"]);
            header("Location: ../front-end/account.php");
        }

        public function editUserInfo($files, $name, $sex, $phone, $address){
            if(!empty($files['tmp_name'])){
                move_uploaded_file($files['tmp_name'], "../image/".$files['name']);
                $image = $files['name'];
                $update = $this->db->query("UPDATE user SET image = '$image'");
            }
            $result = $this->db->query("UPDATE user SET name = '$name', phone = '$phone', address = '$address', sex = '$sex'");
            if($result){
                return true;
            }else{
                return false;
            }
        }
    };
?>