<?php

require_once '../db_connect.php';

if (isset($_REQUEST['username'])) {
    $username = stripslashes($_REQUEST['username']);    // removes backslashes
    $username = mysqli_real_escape_string($conn, $username);
    $fid2 = stripslashes($_REQUEST['fid2']);
    $fid2 = mysqli_real_escape_string($conn, $fid2);
    


    $query1="select * from `admin`";
    $data= mysqli_query($conn,$query1);
    $rows=mysqli_num_rows($data);

    
    if($rows!=0){
        while($result1=mysqli_fetch_assoc($data)){
            if($result1['fid']==$fid2){
                 $query3="SELECT username FROM admin WHERE fid=$fid2";
                 $username_from_database= mysqli_query($conn,$query3);
                 $result2=mysqli_fetch_assoc($username_from_database);
                if($username==$result2['username']){
                    session_start();
                    $_SESSION['username']=$username;
                    $_SESSION['fid']=$fid2;

                    if($result1['role']==1){
                        session_start();
                        $_SESSION['user']='Admin';
                        header("Location: ../home.php");
                    }
                    elseif($result1['role']==0){
                        session_start();
                        $_SESSION['user']='Faculty';
                        header("Location: ../lab_faculty.php");
                    }
                    
                    
               }
               else{
                echo "<div class='form'>
               <h3>Incorrect Username/password.</h3><br/>
               <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
               </div>";
               break;
                }
            
            }
            
            
        }
    }
  }
?>