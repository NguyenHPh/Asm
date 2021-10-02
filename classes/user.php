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
                $this->ss->set('login-admin',$value['user_id']);
            }else{
                return false;
            }
        }

        public function logout(){
            unset($_SESSION["login-admin"]);
            header("../front-end/account.php");
        }
    };
?>