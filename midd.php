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

    if($show){
      $otp = rand(1000,9999);
      $_SESSION['otp']=$otp;
      $mail = new PHPMailer();
      try {
      $mail->isSMTP(true);
      $mail->Host = 'smtp.pepipost.com';
      $mail->SMTPAuth = true;
      $mail->Username = 'mohddaniyal';
      $mail->Password = 'mohddaniyal_7e34df2f49536a2aa73cb1eb8c425d27';
      $mail->SMTPSecure = 'tls';
      $mail->Port = 587;
      
      $mail->setfrom('mohddaniyal@pepisandbox.com', 'CedHosting');
      $mail->addAddress($email);
      $mail->addAddress($email, $name);
      
      $mail->isHTML(true);
      $mail->Subject = 'Account Verification';
      $mail->Body = 'Hi User,Here is your otp for account verification'.$otp;
      $mail->AltBody = 'Body in plain text for non-HTML mail clients';
      $mail->send();
      header('location: verification.php?email=' . $email);
      } catch (Exception $e) {
      echo "Mailer Error: " . $mail->ErrorInfo;
      }

}
}

?>