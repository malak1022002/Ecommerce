<?php
if(isset($_GET['edit_products'])){
    $edit_id=$_GET['edit_products'];
    $get_data = "SELECT * FROM `products` WHERE product_id=$edit_id";
    $result = mysqli_query($con, $get_data);
    $row = mysqli_fetch_assoc($result);
    $product_title=$row['product_title'];
    $product_description=$row['product_description'];
    $product_keywords=$row['product_keywords'];
    $category_id=$row['category_id'];
    $brands_id=$row['brands_id'];
    $product_image1=$row['product_image1'];
    $product_image2=$row['product_image2'];
    $product_image3=$row['product_image3'];
    $product_price=$row['product_price'];
    //fetching category name
    $select_category = "SELECT * FROM `categories` WHERE categories_id=$category_id";
    $result_category = mysqli_query($con, $select_category);
    $row_category = mysqli_fetch_assoc($result_category);
    $categories_title=$row_category['categories_title'];
    //echo $categories_title;
    //fetching brands name
    $select_brands = "SELECT * FROM `brands` WHERE brands_id=$brands_id";
    $result_brands = mysqli_query($con, $select_brands);
    $row_brands = mysqli_fetch_assoc($result_brands);
    $brands_title=$row_brands['brands_title'];
   // echo $brands_title;
}
?>
<div class="container mt-5">
    <h1 class="text-center">Edit Product</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product-title" class="form-label">Product Title</label>
            <input type="text" id="product-title" value="<?php echo $product_title ?>" name="product_title" class="form-control"
            required="reqired">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product-desc" class="form-label">Product Description</label>
            <input type="text" id="product-desc" name="product_desc" class="form-control" 
            required="reqired" value="<?php echo $product_description ?>">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product-keywords" class="form-label">Product Keywords</label>
            <input type="text" id="product-keywords" name="product_keywords" class="form-control" 
            required="reqired" value="<?php echo $product_keywords ?>">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_category" class="form-label">Product Category</label>
            <select name="product_category" class="form-select">
                <option value="<?php echo $categories_title; ?>"><?php echo $categories_title; ?></option>
                <?php
                $select_category_all = "SELECT * FROM `categories`";
                $result_category_all = mysqli_query($con, $select_category_all);
                while($row_category_all = mysqli_fetch_assoc($result_category_all)){
                $categories_title=$row_category_all['categories_title'];
                $categories_id=$row_category_all['categories_id'];
                echo "<option value='$categories_id'>$categories_title</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
        <label for="product_brands" class="form-label">Product Brand</label>
            <select name="product_brands" class="form-select">
                <option value="<?php echo $brands_title; ?>"><?php echo $brands_title; ?></option>
                <?php
                $select_brands_all = "SELECT * FROM `brands`";
                $result_brands_all = mysqli_query($con, $select_brands_all);
                while($row_brands_all = mysqli_fetch_assoc($result_brands_all)){
                $brands_title=$row_brands_all['brands_title'];
                $brands_id=$row_brands_all['brands_id'];
                echo "<option value='$brands_id'>$brands_title</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product-image1" class="form-label">Product Image1</label>
            <div class="d-flex">
            <input type="file" id="product-image1" name="product_image1" class="form-control w-90 m-auto" 
            required="reqired">
            <img src="./product_images/<?php echo $product_image1 ?>" alt="" class="product_img">
        </div>
</div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product-image2" class="form-label">Product Image2</label>
            <div class="d-flex">
            <input type="file" id="product-image2" name="product_image2" class="form-control w-90 m-auto" 
            required="reqired">
            <img src="./product_images/<?php echo $product_image2 ?>" alt="" class="product_img">
        </div>
</div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product-image3" class="form-label">Product Image3</label>
            <div class="d-flex">
            <input type="file" id="product-image3" name="product_image3" class="form-control w-90 m-auto" 
            required="reqired">
            <img src="./product_images/<?php echo $product_image3 ?>" alt="" class="product_img">
</div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product-price" class="form-label">Product Price</label>
            <input type="text" id="product-price" name="product_price" class="form-control" 
            required="reqired" value="<?php echo $product_price ?>">
        </div>
        <div class="w-50 m-auto">
            <input type="submit" name="edit_product" value="Updat Product" class="btn btn-info px-3 mb-3">
        </div>
    </form>
</div>
<?php
if(isset($_POST['edit_product'])){
    $product_title=$_POST['product_title'];
    $product_description=$_POST['product_desc'];
    $product_keywords=$_POST['product_keywords'];
    $product_category=$_POST['product_category'];
    $product_brands=$_POST['product_brands'];
    $product_price=$_POST['product_price'];

    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];

    $tmp_image1=$_FILES['product_image1']['tmp_name'];
    $tmp_image2=$_FILES['product_image2']['tmp_name'];
    $tmp_image3=$_FILES['product_image3']['tmp_name'];
    // checking for fields empty or not
    if($product_title=='' or $product_description=='' or $product_keywords=='' or $product_category=='' or 
       $product_brands=='' or $product_image1=='' or $product_image2=='' or $product_image3=='' or 
       $product_price==''){
        echo "<script>alert('Please fill all the fields and continue the process')</script>";
       }else{
        move_uploaded_file($tmp_image1, "./product_images/$product_image1");
        move_uploaded_file($tmp_image2, "./product_images/$product_image2");
        move_uploaded_file($tmp_image3, "./product_images/$product_image3");
        //query to update products
        $update_product = "UPDATE `products` SET product_title='$product_title', product_description='$product_description',
        product_keywords='$product_keywords', category_id='$product_category', brands_id='$product_brands',
        product_image1='$product_image1', product_image2='$product_image2', product_image3='$product_image3',
        product_price='$product_price', date=NOW() WHERE product_id=$edit_id";
        $result_update = mysqli_query($con, $update_product);
        if($result_update){
            echo "<script>alert('Product updated successfully')</script>";
            echo "<script>window.open('./insert_produt.php', '_self')</script>";
        }
       }
}
?>