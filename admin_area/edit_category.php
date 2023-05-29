<?php
if(isset($_GET['edit_category'])){
    $category_id=$_GET['edit_category'];
    $select_cat="SELECT * FROM `categories` WHERE categories_id=$category_id";
    $result_query = mysqli_query($con, $select_cat);
    $row = mysqli_fetch_assoc($result_query);
    $categories_title=$row['categories_title'];
}
?>
<div class="container mt-5">
    <h1 class="text-center">Edit Category</h1>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="category_title" class="form-label">Categort title</label>
            <input type="text" name="category_title" id="category_title" class="form-control" 
            value="<?php echo $categories_title ?>" required="required">
        </div>
        <input type="submit" value="Update Category" class="btn btn-info px-3 mb-3"
        name="update_cat">
    </form>
    <?php
    if(isset($_POST['update_cat'])){
        $cat_title=$_POST['category_title']; 
        $update_query= "UPDATE `categories` SET categories_title='$cat_title' WHERE categories_id=$category_id";
        $result = mysqli_query($con, $update_query);
        if($result){
            echo "<script>alert('Category is been uptaded successfully')</script>";
            echo "<script>window.open('./index.php?view_category', '_self')</script>";
        }
    }
    ?>