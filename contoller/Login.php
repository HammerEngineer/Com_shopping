<?php
class Login{
    
    public static $_login_page_front = "?page=login";
    public static $_dashboard_front = "?page=orders";
    public static $_login_front = "?page=cid";
    public static $_login_page_admin = "/admin/";
    public static $_dashboard_page_admin = "/admin/?page=products";
    public static $_login_admin = "aid";
    
    public static $_valid_login="valid";
    public static $_referer = "refer";
    
    public static function isLogged($case = null){
        if(!empty($case)){
            if(isset($_SESSION[self::$_valid_login]) && $_SESSION[self::$_valid_login]==1){
                return isset($_SESSION[$case]) ? true : false;
            }
            return false;
        }
        return false;
    }
    
    
   
}

