<?php

class ControllerResetpwd extends Controller
{
	
	public function view()
	{

	}
/**
*	A tester a 42 pour lenvoie d'email
*/
	public function sendEmail()
	{
		if (CB::my_assert($_POST['email']))
		{
			$condition = array(
									'email' => "'" . $_POST['email'] . "'" 
								);
			$req = self::$sel->query_select('password', 'users', $condition, true);
			if (CB::my_assert($req))
			{
				$emailTo = htmlspecialchars($_POST['email']);
				$emailFrom = 'tamere@camagru.com';
				$subject = "Camagru - Reset your password";
				$message = "To reset your password, click on the link below <br> <a href='http://localhost:" . PORT . "/" . Routeur::$url['dir'] . "/Resetpwd/newPwd/" . "" . "'>Confirm account</a>";
				$headers = "From: " . $req['password'] . "\r\n";
				$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
				mail($emailTo, $subject, $message);
				$this->add_buff('email_sent', '<div class="alert alert-success">An email has been sent</div>');
			}
			else
			{
				$this->add_buff('invalid_email', '<div class="alert alert-danger">Email address does not exist</div>');
			}
		}
	}
}