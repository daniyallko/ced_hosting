<?php

include ('class/user.php'); 
$errors = array();
$message = '';

if (isset($_POST['log']))
{
	$email = isset($_POST['email'])?$_POST['email']:'';
	$password = isset($_POST['password'])?$_POST['password']:'';

	$user = new user();
	$dbcon = new dbcon();
	$show=$user->login($email,$password,$dbcon->conn);
  }

if (isset($_POST['reg']))
{
    $name = isset($_POST['name'])?$_POST['name']:'';
    $password = isset($_POST['password'])?$_POST['password']:'';
    $password2 = isset($_POST['password2'])?$_POST['password2']:'';
    $email = isset($_POST['email'])?$_POST['email']:'';
    $mobile = isset($_POST['mobile'])?$_POST['mobile']:'';
    $ques = isset($_POST['ques'])?$_POST['ques']:'';
    $ans = isset($_POST['ans'])?$_POST['ans']:'';

    $user = new user();
    $dbcon = new dbcon();
    $show=$user->register($name,$password,$password2,$email,$mobile,$ques,$ans,$dbcon->conn);

}

?>