<?php
class Validation{
    
    private $objForm;
    
    private $_error = array();
    
    public $_message = array(
        "first_name" => "please provide your  First name",
        "last_name" => "please provide your  Last name",
        "address_1" => "please provide your first address name",
        "address_2" => "please provide your secondary address",
        "town" => "please provide your home town name",
        "county" => "please provide your county",
        "country" => "please select your country",
        "post_code" => "please provide your post code",
        "email" => "please provide your email address",
        "login" => "username and / or password were incorrect",
        "password" => "Please choose password",
        "confirm_password" => "please confirm password",
        "password_missmatch" => "passwords did not match"
    );
    
    public $_expected = array();
    
    public $_required = array();
    
    public $_special = array();
    
    public $_post = array();
    
    public $_post_remove = array();
    
    public $_post_format = array();
    
    public function __construct($objForm) {
        $this->objForm = $objForm;
    }
    
    
     public function process(){
        if($this->objForm->isPost() && !empty($this->_required)){
            $this->_post = $this->objForm->getPostArray($this->_expected);
            if(!empty($this->_post)){
                foreach ($this->_post as $key => $value){
                    $this->check($key , $value);
                }
            }
        }
    }

public function isEmail($email = null){
        if(!empty($email)){
            $result = filter_var($email, FILTER_VALIDATE_EMAIL);
            return !$result ? false : true;
        }
        return false;
    }

public function validate($key){
        if(!empty($this->_errors) && in_array($key, $this->_errors)){
            return $this->wrapWarn($this->_message[$key]);
        }
    }
    
    
}
