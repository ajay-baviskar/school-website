<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "sharada";

    $connect = mysqli_connect($server, $username,$password,$database);
    if (!$connect) {
      die("Connection failed: " . mysqli_connect_error());
    }
    // echo "successfull connection";
// if (isset($_POST['send'])) {
          $name=$_POST["name"];
          $message=$_POST["message"];
          $email=$_POST["email"];
          $subject=$_POST["subject"];
  $query="INSERT INTO `sharada-form` (`Name`, `Email`, `Subject`, `Message`) VALUES ('$name', '$email', '$subject', '$message');";

  if ($connect->query($query) == true) {
    header("Location:index.html");
} else {
    echo "ERROR: $query <br> $connect->error";
}
// $con->close();
// 
require 'vendor/autoload.php';  
$mail = new PHPMailer(true); 
  
try { 
    $mail->SMTPDebug = 0;                                        
    $mail->isSMTP();                                             
   $mail->Host       = 'smtp.gmail.com';                     
    $mail->SMTPAuth   = true;                              
    $mail->Username   = 'rajan@accunityservices.com';                  
    $mail->Password   = "jxauvywfnmadopdf";                          
    $mail->SMTPSecure = 'ssl';                               
    $mail->Port       = 465; 
  
    $mail->setFrom('info@sharadaenglishhighschool.in', 'Contact Form');            
    $mail->addAddress('info@sharadaenglishhighschool.in','Contact Form'); 
       
    $mail->isHTML(true);                                   
    $mail->Subject = "Contact Form";
    $mail->Body     ='Name : ' .$_POST['name']."<br/><br/>"
                .'Subject : ' .$_POST['subject'] ."<br/><br/>"
               .'Email : ' .$_POST['email'] ."<br/><br/>"
               .'Message : ' .$_POST['message'] ."<br/><br/>";
    $mail->AltBody = 'Body in plain text for non-HTML mail clients'; 
    $mail->send(); 
    if(!$mail) 
    {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } 
    else 
    {
         header("Location:index.html");
       
    }
    
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
// }
// else
// {
//     echo "could not save data". $connect->error;
// }
      
   


?>