<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
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
if(isset($_POST['']))

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
    //  Promotional Route Success Response:
    //   {
    //       "return": true,
    //       "request_id": "lwdtp7cjyqxvfe9",
    //       "message": [
    //           "Message sent successfully to NonDND numbers"
    //       ]
    //   }
    //  Transactional Route Success Response:
    //   {
    //       "return": true,
    //       "request_id": "vrc5yp9k4sfze6t",
    //       "message": [
    //           "Message sent successfully"
    //       ]
    //   }
    
    }
  }

   if(isset($_POST['action']))
    {
      if($_POST['action']=='sendOTPEmail'){
        $name=$_POST['name'];
        $email=$_POST['email'];

        $otp1 = rand(1000,9999);
        $_SESSION['otp1']=$otp1;
        $mail = new PHPMailer();
        try {
        $mail->isSMTP(true);
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'galedhoni@gmail.com';
        $mail->Password = 'q1w2e3r4T5@';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        
        $mail->setfrom('galedhoni@gmail.com', 'CedHosting');
        $mail->addAddress($email);
        $mail->addAddress($email, $name);
        
        $mail->isHTML(true);
        $mail->Subject = 'Account Verification';
        $mail->Body = 'Hi '.$name.' ,Here is your otp for account verification '.$otp1;
        $mail->AltBody = 'Body in plain text for non-HTML mail clients';
        $mail->send();
        // header('location: otp.php?email=' . $email);
        } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;
        }
      }
    
  
     


// # ------------------
// # Create a campaign\
// # ------------------
// # Include the Sendinblue library\
// require_once(__DIR__ . "/APIv3-php-library/autoload.php");
// # Instantiate the client\
// SendinBlue\Client\Configuration::getDefaultConfiguration()->setApiKey("api-key", "YOUR_API_V3_KEY");
// $api_instance = new SendinBlue\Client\Api\EmailCampaignsApi();
// $emailCampaigns = new \SendinBlue\Client\Model\CreateEmailCampaign();
// # Define the campaign settings\
// $email_campaigns['name'] = "Campaign sent via the API";
// $email_campaigns['subject'] = "My subject";
// $email_campaigns['sender'] = array("name"=> "From name", "email"=>"turky890@tapi.re");
// $email_campaigns['type'] = "classic";
// # Content that will be sent\
// "htmlContent"=> "Congratulations! You successfully sent this example campaign via the Sendinblue API.",
// # Select the recipients\
// "recipients"=> array("listIds"=> [2, 7]),
// # Schedule the sending in one hour\
// "scheduledAt"=> "2018-01-01 00:00:01"
// );
// # Make the call to the client\
// try {
// $result = $api_instance->createEmailCampaign($emailCampaigns);
// print_r($result);
// } catch (Exception $e) {
// echo 'Exception when calling EmailCampaignsApi->createEmailCampaign: ', $e->getMessage(), PHP_EOL;
// }
}





?>