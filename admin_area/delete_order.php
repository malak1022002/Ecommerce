<?php
if(isset($_GET['delete_order'])){
    $order_id=$_GET['delete_order'];
    $order_select = "SELECT * FROM `user_order` WHERE order_id=$order_id";
    $order_query = mysqli_query($con, $order_select);
    if($order_query){
        echo "<script>alert('Order is been Deleted successfully')</script>";
        echo "<script>window.open('./index.php?list_orders', ('_self'))</script>";
    }
}
?>