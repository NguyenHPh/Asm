<?php

class Session{

  public function Session()
  {
     session_start();
  } 

 public static function init(){
  if (version_compare(phpversion(), '5.4.0', '<')) {
        if (session_id() == '') {
            session_start();
        }
    } else {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }
 }

 public static function set($key, $val){
    $_SESSION[$key] = $val;
 }

 public static function get($key){
    if (isset($_SESSION[$key])) {
     return true;
    } else {
     return false;
    }
 }

 public static function checkSession(){
    self::init();
    if (self::get("login_admin")== false) {
     self::destroy();
     header("Location: index.php");
    }
 }

 public static function checkLogin(){
    self::init();
    if (self::get("login_admin") == true) {
     header("Location: manage-product.php");
    }
 }

 public static function checkExistInCart($key, $id){
   $noExist = 4;
   self::init();
   if(isset($_SESSION[$key])){
      for($i = 0; $i < sizeof($_SESSION[$key]); $i++){ // kiểm tra xem trong giỏ hàng đã có sản phẩm đó chưa
         if($_SESSION[$key][$i][0] == $id){
            return $i;
         }
      }
   }
   return $noExist;
 }

 public static function destroy(){
  session_destroy();
  header("Location: index.php");
 }
}
