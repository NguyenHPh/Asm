<?php
    include '../Lib/session.php';
    include '../Lib/connect-database.php';
    include '../helper/format.php';

    class adminLogin{

        private  $connect;
        private $format;

        public function __construct(){
            $this->connect = new Database();
            $this->format = new Format();
        }

        public function loginAdmin($username, $password){
            $username = $this->format->validation($username);
            $password = $this->format->validation($password);
            if($username == '' || $password == ''){
                return false;
            }else{
                $result = $this->adminCheck($username, $password);
                $value = $result->fetch_array();
                if($value){ 
                    Session::set('login_admin', true);
                    Session::set('admin_name', $value['username']);
                    Session::set('admin_id', $value['id']);
                    return true;
                }else{
                    return false;
                }
            }
        }
        //test github

        private function adminCheck($username, $password){
            $result = $this->connect->query("Select * FROM admin WHERE username = '$username' AND password = '$password'");
            return $result;
        }

        public function loginDestroy(){

        }

        public function logOut(){
            unset($_SESSION['login_admin']);
            unset($_SESSION['admin_name']);
            unset($_SESSION['admin_id']);
            header('Location: index.php');
        }
    };
?>
