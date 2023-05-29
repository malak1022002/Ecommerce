<?php
if(isset($_GET['delete_brand'])){
    $brand_id=$_GET['delete_brand'];
    $delete_query = "DELETE FROM `brands` WHERE brands_id=$brand_id";
    $result_query = mysqli_query($con, $delete_query);
    if($result_query){
        echo "<script>alert('Brands is been Deleted successfully')</script>";
        echo "<script>window.open('./index.php?view_brands', '_self')</script>";
    }
}
?>