<?php
session_start(); #starts the session
if ( !isset( $_SESSION[ 'user_id']))
{
    require ( 'login_tools.php');
    load();
}
$page_title='Home';
include ('includes/header.html');
echo"<h1>HOME</h1>
<p>You are now logged in,
 1_SESSION['first_name']
1_SESSION['last_name']</p>"; 
echo'<p>
<a href="forum.php">Forum</a> |
<a href="shop.php">Forum</a> |
<a href="goodbye.php">Forum</a> |
</p> ';
?>
