<?php
require 'connection.php';


if(isset($_POST['submit'])){
    //store all the require value in variable
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $bday = $_POST['birthday'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $photo = $_FILES['photo'];

    //This is for photo
    $photo_name = $photo['name'];// This return name of the photo 
    $photo_tmp_name = $photo['tmp_name'];// This return temprary name of the photo 



    //validate name here
    if (!preg_match("/^[a-zA-Z ]*$/",$_POST['first_name'])) {
        ?>
        <script>alert('Name should only contains letters and white spaces.');</script>
        <?php

    }elseif (empty($fname)) {
            ?>
            <script>alert('Name should not be empty.');</script>
            <?php
    }elseif(!preg_match("/^[a-zA-Z ]*$/",$_POST['last_name'])) {
        ?>
        <script>alert('Name should only contains letters and white spaces.');</script>
        <?php

    }elseif (empty($lname)) {
            ?>
            <script>alert('Name should not be empty.');</script>
            <?php
    }
    //validate mobile number here
    elseif (!preg_match("/^[6-9]\d{9}$/",$_POST['mobile'])) {
            ?>
            <script>alert('Enter valid mobile number.');</script>
        <?php

    //validate email here
    }elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            ?>
            <script>alert('Enter valid Email address.');</script>
            <?php
    }elseif($gender!='male' && $gender!='female'){
        // This is for validate gender
        ?>
            <script>alert('Please Select Valid Gender');</script>
            <?php
            
    }
    else {
        //insert query
        $query = " insert into registered_users (fname,lname,bday,gender,email,mobile,photo) values('$fname','$lname','$bday','$gender','$email','$mobile','$photo_name') ";
    
        //fire query
        mysqli_query($con,$query);
        
          //this is for upload photo to server
          if(move_uploaded_file($photo_tmp_name,'../uploaded-images/'.$photo_name)){
            ?>
            <script>alert('Data Uploaded Successfully')</script>
            <?php
            header('location:../index.php');
        }else{
            ?>
            <script>alert('Data Not Uploaded Successfully')</script>
            <?php
        }
      
    }
}



?>