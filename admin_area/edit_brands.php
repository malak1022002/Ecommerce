<?php
if(isset($_GET['edit_brands'])){
    $brands_id=$_GET['edit_brands'];
    $brand_query = "SELECT * FROM `brands` WHERE brands_id=$brands_id";
    $result_guery = mysqli_query($con, $brand_query);
    $row = mysqli_fetch_assoc($result_guery);
    $brands_title=$row['brands_title'];
}
?>
<div class="container mt-5">
    <h1 class="text-center">Edit Brands</h1>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="brands_title" class="form-label">Brands title</label>
            <input type="text" name="brands_title" id="brands_title" class="form-control" 
             required="required" value="<?php echo $brands_title ?>">
        </div>
        <input type="submit" value="Update brands" class="btn btn-info px-3 mb-3"
        name="update_brand">
    </form>
    <?php
    if(isset($_POST['update_brand'])){
        $brands_title=$_POST['brands_title'];
        $update_brand = "UPDATE `brands` SET brands_title='$brands_title' WHERE brands_id=$brands_id";
        $result = mysqli_query($con, $update_brand);
        if($result){
            echo "<script>alert('Brands is been uptaded successfully')</script>";
            echo "<script>window.open('./index.php?view_brands', '_self')</script>";
        }
    }
    ?>