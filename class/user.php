<?php

require 'dbcon.php';

class user{


    function login($email,$password,$conn)
    {
        $errors = array();

        
        if(sizeof($errors)==0 )
        {
            $password = md5($password);
             $sql = "SELECT * FROM tbl_user WHERE
              `email`='$email' AND `password`='$password'";
             $result = $conn->query($sql);
 
            
             if ($result->num_rows > 0) {
 
                 while($row = $result->fetch_assoc()){
                     
                     if ($row['is_admin']==1){

                     $_SESSION['userdata'] = array('username'=>$row['name'],'user_id'=>$row['user_id'],'is_admin'=>$row['is_admin']);
                     header('Location: admin/index.php');
                     }
                     if($row['active']==0)
                     {
                        echo '<p class="bg-danger text-center">You are not approved by ADMIN</p>';
                     }
                     if($row['active']==1 && $row['is_admin']==0){
                        $_SESSION['userdata'] = array('username'=>$row['name'],'user_id'=>$row['id'],'is_admin'=>$row['is_admin']);
                        echo '<script>alert("Login Successful, Going to Index Page");
                     window.location.href = "index.php";</script>';
                     }
                     
                 } 
             }
             
             else 
            {
                $errors[] = array('input'=>'form','msg'=>'Invalid Login Details');
                echo '<p class="bg-danger text-center">Invalid Login Details</p>';
                

            }
         }
         
    }

    function register($name,$password,$password2,$email,$mobile,$ques,$ans,$conn)
     {
        $message = '';
        $errors=array();
        if ($password != $password2) {
            $errors[] = array('input'=>'password','msg'=>'password should be same');
            echo '<p class="bg-danger text-center">password should be same</p>';
        }

        if ($password == $password2) {
            
            $sql = "SELECT * from tbl_user WHERE email like '$email'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $errors[] = array('input' => 'result', 'msg' => 'Username already exists');
                echo '<p class="bg-danger text-center">E-mail id already registered</p>';
                
            }
        }

        if ($password == $password2) {
            
            $sql = "SELECT * from tbl_user WHERE mobile like '$mobile'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $errors[] = array('input' => 'result', 'msg' => 'mobile already exists');
                echo '<p class="bg-danger text-center">Mobile Number already registered</p>';
                
            }
        }
        

        if(count($errors)==0 )
        {
            setcookie("email", $email, time() + 60 * 60 * 24);
            $password = md5($password);
            $sql = "INSERT INTO tbl_user(`name`, `password`, `email`,`mobile`,`security_question`,`security_answer`,`is_admin`)
             VALUES('".$name."', '".$password."', '".$email."', '".$mobile."','".$ques."','".$ans."',0)";

            if ($conn->query($sql) === true) {
                $_SESSION['Varifyuser'] = array('email'=>$email,'mob'=>$mobile,'name'=>$name);
                echo '<script>alert("Registration Successful, Going to Verification Page");
                    window.location.href = "otp.php";</script>';    
        }
             else {
               // $errors[] = array('input'=>'form','msg'=>$conn->errors);
            }
        }
           
    }

   
    
}
?>