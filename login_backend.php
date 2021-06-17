

<?php 
    include "db.php";
    ?>
    
    <?php session_start(); ?>
    
   
   <?php
        
        if(isset($_POST['login'])){
            $username =$_POST['username'];
            $password =$_POST['password'];
         
            
            $username=mysqli_real_escape_string($connection,$username);
            $password=mysqli_real_escape_string($connection,$password);
            
            
            $query="select * from users where username ='{$username}'";
            $select_user_query=mysqli_query($connection,$query);
            
            if(!$select_user_query){
                        die('QUERY FAILED'.mysqli_error($connection));
                    }
            while($row=mysqli_fetch_array($select_user_query)){
                $db_id=$row['userid'];
                $db_username=$row['username'];
                $db_password=$row['password'];
                $db_fullname=$row['user_fullname'];
                $db_user_role=$row['role'];
            }
            
            
            if($username === $db_username && $password === $db_password){
                
                
                $_SESSION['username']=$db_username;
                $_SESSION['fullname']=$db_fullname;
                $_SESSION['user_role']=$db_user_role;
                $_SESSION['userid']=$db_id;

                switch ($db_user_role){
                    case 'user':
                        //normal user
                        header ("Location: index.php");
                        break;
                    case 'admin':
                        //admin
                        header ("Location: Dashboard.php");
                        break;
                    default :
                        break;
                }


                
            }else{
                header ("Location: login.php");
                
            }
        }
?>
