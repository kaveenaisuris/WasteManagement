<?php   include "db.php";   ?>
<?php session_start(); ?>
 <?php  
   if(isset($_POST["register"])){
       $fname=($_POST["fname"]);
       $uname=($_POST["uname"]);
       $pass=($_POST["pass"]);
       $mail=($_POST["mail"]);
       $lname=($_POST["lname"]);
       $num=($_POST["num"]);
       
       $fullname= $fname.' '.$lname;
       
       
        
        $query ="Insert into users (username,password,user_fullname,email,role,phone)";
        $query .="values('{$uname}','{$pass}','{$fullname}','{$mail}','user','{$num}')";
                    
                    $create_query=mysqli_query($connection,$query);
                    if(!$create_query){
                        die('QUERY FAILED'.mysqli_error($connection));
                    }
    header ("Location: index.php");
   }
?>