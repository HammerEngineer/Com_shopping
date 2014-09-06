<?php
require('PHPMailer-master/PHPMailerAutoload.php');
require('PHPMailer-master/class.phpmailer.php');
require('PHPMailer-master/class.smtp.php');

class Email{
    private $objMailer;
    
    
    
    public function __construct() {
        
		$this->objMailer = new PHPMailer;
		$this->objMailer->IsSMTP();
		$this->objMailer->SMTPAuth = true;
		$this->objMailer->SMTPKeepAlive = true;
		$this->objMailer->Host = "mail.mail.com";
		$this->objMailer->Port = 25;
		$this->objMailer->Username = "email@mail.com";
		$this->objMailer->Password = "password";
		$this->objMailer->SetFrom("test@mail.com", "Name");
		$this->objMailer->AddReplyTo("test@mail.com", "Name");
		
	}
        
        
        
    
}
?>

