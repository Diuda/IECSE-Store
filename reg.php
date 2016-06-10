<?php
session_start();

//connecting databse
global $conn;
$conn = mysqli_connect("localhost","root","root","iecsestore");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$errors=array();


if(empty($_POST)===false)
{
	$req_fields=array('f_name','l_name','username','email','password');
	foreach ($_POST as $key => $value) 
	{
		if(empty($value)&& in_array($key, $req_fields)===true)
		{
			$errors[]='Please fill all the fileds';
			break 1;
		}
	}
}

if(!empty($_POST) && empty($errors)===true)
{

	if(preg_match('/[^0-9a-zA-Z_]/', $_POST['username'])==true)
	{
		$errors[]='Username can contain only characters, numbers and underscore';
	}

	if(strlen($_POST['password']) < 6)
	{
		$errors[]='Your Password should be more than 6 characters.';
	}

	if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)==false)
	{
		$errors[]='Enter a valid email address';
	}
}



if(empty($_POST)===false&&empty($errors)===true)
{
	$register_data=array(
		'first_name'=>$_POST['f_name'],
		'last_name'=>$_POST['l_name'],
		'username'=>$_POST['username'],
		'email'=>$_POST['email'],
		'password'=>$_POST['password']

		);
	user_register($register_data,$conn);
	
}

function user_register($register_data,$conn)
{
	$register_data['password']=md5($register_data['password']);
	array_walk($register_data, 'array_sanatize');
	$fields='`'.implode('`,`', array_keys($register_data)).'`';
	$data='\''.implode('\',\'', $register_data).'\'';
	$query="insert into `users` ($fields) values ($data)";
	if(mysqli_query($conn,$query))
	{
		echo 'you have been registered';
	}
	else
	{
	echo 'There has been some error.Please try after sometime.';
	}
	die();

}







foreach($errors as $error)
{
	echo '<br>'.$error;
}



