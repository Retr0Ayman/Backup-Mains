<?php 
ini_set ("SMTP","mail.MyWebSite.com");
ini_set ("sendmail_from","webmaster@MyWebSite.com");

    if(isset($_POST['btn-send']))
    {
       $UserName = $_POST['UName'];
       $Email = $_POST['Email'];
       $Subject = $_POST['Subject'];
       $Msg = $_POST['msg'];

       if(empty($UserName) || empty($Email) || empty($Subject) || empty($Msg))
       {
           header('location:index.php?error');
       }
       else
       {
           $to = "sideb52989@scubalm.com";

           if(mail($to,$Subject,$Msg,$Email))
           {
               header("location:index.php?success");
           }
       }
    }
    else
    {
        header("location:index.php");
    }
    echo '<p><a href="cart.php">View Cart</a> |
    <a href="/forum/">Forum</a> |
    <a href="/forum/">Home</a> |
    <a href="goodbye.php">Logout</a></p>';


?>