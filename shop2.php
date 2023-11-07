<?php
    
session_start();

$page_title='Shop';

require ('_dbconnect.php');
$q = "SELECT * FROM create_shop2";
$r = mysqli_query( $conn , $q);
if ( mysqli_num_rows($r) > 0)
{
    echo '<table><tr>';
    while ( $row = mysqli_fetch_array($r , MYSQLI_ASSOC))
    {                                                               
    echo '<td><strong>'.$row['item_name'].
        '</strong><br>'.$row['item_desc'].
        '<br><img src=img/'.$row['item_img'].'><br>$'.$row['item_price'].
        '<br><a href="added.php?id=' . $row['item_id'].
        '">Add To Cart</a></td>';


    
    echo '</tr></table>';

    }
}
else
{
    echo '<p> There are currently no items in this shop.</p>';
}
echo '<p><a href="cart.php">View Cart</a> |
 <a href="/forum/">Forum</a> |
 <a href="/forum/">Home</a> |
 <a href="goodbye.php">Logout</a></p>';