<?php

if(Login::isLogged(Login::$_login_front)){
    Helper::redirect(Login::$_dashboard_front);
}
$objForm = new Form();
$objValid = new Validation($objForm);
$objUser = new User();

if($objForm->isPost('login_email')){
    if($objUser->isUser($objForm->getPost('login_email'), 
            $objForm->getPost('login_password')))
    {
        Login::loginFront($objUser->_id, Url::getReferrerUrl());
    }
}else{
    //$objValid->add2Errors('login');
}


if ($objForm->isPost('first_name')) {
	
	$objValid->_exptected = array(
		'first_name',
		'last_name',
		'address_1',
		'address_2',
		'town',
		'county',
		'post_code',
		'country',
		'email',
		'password',
		'confirm_password'
	);
	
	$objValid->_required = array(
		'first_name',
		'last_name',
		'address_1',
		'town',
		'county',
		'post_code',
		'country',
		'email',
		'password',
		'confirm_password'
	);
	
	$objValid->_special = array(
		'email' => 'email'
	);
	
	$objValid->_post_remove = array(
		'confirm_password'
	);
	
	$objValid->_post_format = array(
		'password' => 'password'
	);
	
	
	// validate password
	$pass_1 = $objForm->getPost('password');
	$pass_2 = $objForm->getPost('confirm_password');
	
	if (!empty($pass_1) && !empty($pass_2) && $pass_1 != $pass_2) {
		$objValid->add2Errors('password_mismatch');
	}
	
	
        $email = $objForm->getPost('email');
	/*$user = $objUser->getByEmail($email);
	
	if (!empty($user)) {
		$objValid->add2Errors('email_duplicate');
	}*/
	
	
	if ($objValid->isValid()) {
		
		// add hash for activating account
		$objValid->_post['hash'] = mt_rand().date('YmdHis').mt_rand();
		// add registration date
		$objValid->_post['date'] = Helper::setDate();
		//Helper::redirect('/Com_shopping/?page=registered');
		 $file = '/var/www/Com_shopping/people2.txt';
                 $cont = "Current character set: \n". $objForm->getPost('password') . "and"
                         .$objValid->_post;
                 file_put_contents($file, $cont);
                 
		if ($objUser->addUser($objValid->_post, $objForm->getPost('password'))) {
			Helper::redirect('/Com_shopping/?page=registered');
		} else {
			Helper::redirect('/Com_shopping/?page=registered-failed');
		}
		
	}
	
	
}


require_once('_header.php');

?>


<?php require_once('_footer.php'); ?>
