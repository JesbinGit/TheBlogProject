<?php
 require 'config/database.php';

 //get signup data

 if(isset($_POST['submit'])){
      //filtervar - ee email , numbers and shit validate cheyan to check  the  format of the data and remove unnecassary parts. or so i read.
      
      //FILTER_SANITIZE_SPECIAL_CHARS will leave the tags in place but turn the <> characters into &lt; and &gt;. FILTER_SANITIZE_STRING will strip the tags out leaving the just text inside the tags. no idea why its here(yet).

    $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastname  = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $createpassword = filter_var($_POST['createpassword'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $confirmpassword = filter_var($_POST['confirmpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $avatar = $_FILES['avatar'];
    echo  $firstname ,  $firstname , $username , $email , $confirmpassword ;

 }
 else {
    //if signup button not clicked, bounce back to signup page
    header('location: '. ROOT_URL .'signup.php');
    die();
; }



?>