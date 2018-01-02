<?php
  include('include/connection.php');
    $query=mysql_query("select * from users where username='".$_POST['username']."' and password='".$_POST['password']."'");
    $rows = mysql_num_rows($query);
    if($rows==0) {
      $error = 'Login Id or Password is incorrect !!';
			header('Location:index.php?msg=Login_failed');
    }
    else {
        $fetch=mysql_fetch_array($query);
        session_start();
        
        if($fetch['userType']==1) {
            $_SESSION['user'] = $fetch['username'];
            $_SESSION['userID'] = $fetch['userID'];
            $_SESSION['userType'] = $fetch['userType'];
            header('Location:StudentLanding.php');
        }
        else{
            $_SESSION['admin'] = $fetch['username'];
            $_SESSION['adminID'] = $fetch['userID'];
            $_SESSION['userType'] = $fetch['userType'];
            header('Location:admin/home.php');
        }
            
    }

?>
