<?php
require_once('../lib/connections/db.php');
include('../lib/functions/functions.php');
$sitesettings = getSiteSettings();
$site_url = $sitesettings[0]['site_url'];

$username = $_POST['username'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$supervisor = $_POST['supervisor'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$usertype = $_POST['usertype'];
$institution = $_POST['institution'];
$address = $_POST['address'];
$postcode = $_POST['postcode'];
$password = $_POST['password'];
$current_facilities = $_POST['eprfacilities'];



//For registration

	// we check if everything is filled in and perform checks

	if(!$username)
	{
		die(msg(0,"<p>Please enter a username.</p>"));
	}

	if(!$firstname)
	{
		die(msg(0,"<p>Please enter a First Name.</p>"));
	}
	
	if(!$lastname)
	{
		die(msg(0,"<p>Please enter a Last Name.</p>"));
	}
	
	if(!$institution)
	{
		die(msg(0,"<p>Please enter a Company or University name.</p>"));
	}
	
	if(strlen($username)<3 || strlen($username)>15)
	{
		die(msg(0,"<p>Username must be between 3 and 15 characters.</p>"));
	}

	elseif(uniqueUser($username))
	{
		die(msg(0,"Username already taken."));
	}


	elseif(!$password)
	{
		die(msg(0,"<p>Please enter a password.</p>"));
	}
	
	elseif(strlen($password)<5)
	{
		die(msg(0,"<p>Passwords must be atleast 5 characters.</p>"));
	}

	elseif(($password)!=($_POST['re_password']))
	{
		die(msg(0,"<p>Passwords must match.</p>"));
	}

	elseif(!$email)
	{
		die(msg(0,"<p>Please enter an email address.</p>"));
	}
	
	/*elseif(validateEmail($_POST['email']))
	{
		die(msg(0,"<p>Invalid email address.</p>"));
	}*/

	elseif(uniqueEmail($email))
	{
		die(msg(0,"<p>An account already exists with this email.</p>"));
	}

	else
		{
			$res = addUser($username, $firstname, $lastname, $supervisor, $email, $phone, $usertype, $institution, $address, $postcode, $password, $current_facilities,$site_url);
				if ($res == 1){
					die(msg(0,"Failed to send activation email. Please contact the site admin."));
				}
				if ($res == 2){
					die(msg(0,"There was an error registering your details. Please contact the site admin."));
				}
				if ($res == 99){
					die(msg(1,"<p>Registration successful! <a href='login.php'>Click here</a> to login.</p>"));
				}
		}

	function msg($status,$txt)
	{
		return '{"status":'.$status.',"txt":"'.$txt.'"}';
	}

?>

