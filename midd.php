<?php
session_start();
//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception;
//require 'vendor/autoload.php';
use \Mailjet\Resources;
require '/home/cedcoss/vendor/autoload.php';
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

    if(isset($_POST['action']))
    {
      if($_POST['action']=='sendOTPmob'){
        $name=$_POST['name'];
        $mobile=$_POST['mob'];

        $otp = rand(1000,9999);
        $_SESSION['otp']=$otp;
    
        $fields = array(
          "sender_id" => "cedhosting",
          "message" => $name." Your OTP is ".$otp,
          "language" => "english",
          "route" => "p",
          "numbers" => $mobile,
      );
      
      $curl = curl_init();
      
      curl_setopt_array($curl, array(
        CURLOPT_URL => "https://www.fast2sms.com/dev/bulk",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode($fields),
        CURLOPT_HTTPHEADER => array(
          "authorization: XNOL0ynSfu5pVwhgvIMcAHsFRjGelK783rdoPYTZEtiqx462m9mj6O4s05XtbcY1eMEBqHaJzIprg9KD",
          "accept: */*",
          "cache-control: no-cache",
          "content-type: application/json"
        ),
      ));
      
      $response = curl_exec($curl);
      $err = curl_error($curl);
      
      curl_close($curl);
      
      if ($err) {
        echo "cURL Error #:" . $err;
      } else {
        echo $response;
      }
    }
  }
  //497465BAD17168BA7F432A8A09BE70AE514FBCB42FEDF5ECBD09CDEB75C29364D619F6F546CB767E3F20BFB2D23EB0D1


  if(isset($_POST['action']))
      {
        if($_POST['action']=='sendOTPEmail'){
          $name=$_POST['name'];
          $email=$_POST['email'];
  
          $otp1 = rand(1000,9999);
          $_SESSION['otp1']=$otp1;

          $mj = new \Mailjet\Client('41849414927147845fdf7cdae3de34c5','4cb20e5157e76ab2cf695adb2eb1048c',true,['version' => 'v3.1']);
  $body = [
    'Messages' => [
      [
        'From' => [
          'Email' => "cedhosting@dandrive.tk",
          'Name' => "cedHosting"
        ],
        'To' => [
          [
            'Email' => $email,
            'Name' => "cedHosting"
          ]
        ],
        'Subject' => "Verification OTP",
        'TextPart' => 'Hi '.$name.' ,Here is your otp for account verification '.$otp1,
        'HTMLPart' => 'Hi '.$name.' ,Here is your otp for account verification '.$otp1,
        'CustomID' => "AppGettingStartedTest"
      ]
    ]
  ];
  $response = $mj->post(Resources::$Email, ['body' => $body]);
  $response->success() && var_dump($response->getData());

  // $url = 'https://api.elasticemail.com/v2/email/send';

  // try{
  //         $post = array('from' => 'cedhosting@dandrive.tk',
  //     'fromName' => 'CedHosting',
  //     'apikey' => '497465BAD17168BA7F432A8A09BE70AE514FBCB42FEDF5ECBD09CDEB75C29364D619F6F546CB767E3F20BFB2D23EB0D1',
  //     'subject' => 'Verification Email',
  //     'to' => $email,
  //     'bodyHtml' => 'Hi '.$name.' ,Here is your otp for account verification '.$otp1,
  //     'bodyText' => 'CedHosting',
  //     'isTransactional' => true);
      
  //     $ch = curl_init();
  //     curl_setopt_array($ch, array(
  //             CURLOPT_URL => $url,
  //       CURLOPT_POST => true,
  //       CURLOPT_POSTFIELDS => $post,
  //             CURLOPT_RETURNTRANSFER => true,
  //             CURLOPT_HEADER => false,
  //       CURLOPT_SSL_VERIFYPEER => false
  //         ));
      
  //         $result=curl_exec ($ch);
  //         curl_close ($ch);
      
  //         echo $result;	
  // }
  // catch(Exception $ex){
  //   echo $ex->getMessage();
  // }
        }
      }


//    if(isset($_POST['action']))
//     {
//       if($_POST['action']=='sendOTPEmail'){
//         $name=$_POST['name'];
//         $email=$_POST['email'];

//         $otp1 = rand(1000,9999);
//         $_SESSION['otp1']=$otp1;
//         $mail = new PHPMailer();
//         try {
//         $mail->isSMTP(true);
//         $mail->Host = 'smtp.elasticemail.com';
//         $mail->SMTPAuth = true;
//         $mail->Username = 'cedhosting@dandrive.tk';
//         $mail->Password = '8323EC46B58F79BD246BF9F7A54463732AFE';
//         $mail->SMTPSecure = 'tls';
//         $mail->Port = 2525;
        
//         $mail->setfrom('cedhosting@dandrive.tk', 'CedHosting');
//         $mail->addAddress($email);
//         $mail->addAddress($email, $name);
        
//         $mail->isHTML(true);
//         $mail->Subject = 'Account Verification';
//         $mail->Body = 'Hi '.$name.' ,Here is your otp for account verification '.$otp1;
//         $mail->AltBody = 'Body in plain text for non-HTML mail clients';
//         $mail->send();
//         // header('location: otp.php?email=' . $email);
//         } catch (Exception $e) {
//         echo "Mailer Error: " . $mail->ErrorInfo;
//         }
//       }
//     }
    
if(isset($_POST['varifyEmail']))
{
  $email = $_POST['eemail'];
  $otp = $_POST['emailOTP'];
  if($otp==$_SESSION['otp1'])
  {
    $user = new user();
	  $dbcon = new dbcon();
	  $show=$user->verifyEmail($email,$dbcon->conn);
  }

}

if(isset($_POST['varifyMob']))
{
  $mob = $_POST['vmob'];
  $otp = $_POST['mobOTP'];
  if($otp==$_SESSION['otp'])
  {
    $user = new user();
	  $dbcon = new dbcon();
	  $show=$user->verifyMobile($mob,$dbcon->conn);
  }

}





?>