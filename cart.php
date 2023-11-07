<?php
session_start();

if ( !isset( $_SESSION['user_id']))
{
    require ('login_tools.php');
    load();
}
$page_title ='Cart';
include ('_header.php');
if($_SERVER['REQUEST_METHOD']=='POST')
{
    foreach ($_POST['qty'] as $item_id =>$item_qty)
    {
        #Ensure values are integers
        $id = (int) $item_id;
        $qty = (int)$item_qty;


        #Change quantity or delete if zero
        if ($qty==0)
        { unset ( $_SESSION['cart'][$id]);}
        elseif($qty>0)
        {$_SESSION['cart'][$id]['quantity']=$qty;}
        
    }

}

$total = 0;
if (!empty($_SESSION['cart']))
{
    require ('_dbconnect.php');
    $q = "SELECT * FROM create_shop WHERE item_id IN (";
    foreach ($_SESSION['cart'] as $id => $value)
    { $q.=$id . ',';}
    $q = substr( $q, 0, -1). ') ORDER BY item_id ASC';
    $r = mysqli_query ( $conn, $q);

    echo '<form action="cart.php" method="POST"><table>
    <tr><th colspan="5">Items in your cart</th></tr><tr>';

    while ($row = mysqli_fetch_array ( $r, MYSQLI_ASSOC))
    {
        $subtotal = $_SESSION['cart'][$row['item_id']]['quantity'];
                $_SESSION['cart'][$row['item_id']]['price'];
        $total +=$subtotal;

        echo "<tr> <td>{$row['item_name']}</td>
        <td>{$row['item_desc']}</td>
        <td><input type=\"text\" size=\"3\"
        name=\"qty{$row['item_id']}]\"
        value=\"{$_SESSION['cart'][$row['item_id']]['quantity']}\">
        </td><td>@{$row['item_price']} = </td>
        <td>".number_format ( $subtotal , 2 )."</td></tr>";
    }

    echo " <tr><td>
    Total = '.number_format( $total , 2).'</td></tr>
    </table>
    <input type='submit' value='Update my cart'>
    </form>";
    mysqli_close($conn);
}
else
{ echo "<p> Your cart is currently empty.</p>";}

    echo "<p><a href='cart.php'>View Cart</a> |
 <a href='/forum/'>Forum</a> |
 <a href='/forum/'>Home</a> |
 <a href='goodbye.php'>Logout</a></p>";
 include ("_footer.php");


