<?php
//including connect file
//include('./includes/connect.php');
//getting products
function getproducts(){
    global $con;
      //condition to check isset or not
      if(!isset($_GET['categories'])){
       if(!isset($_GET['brands'])){

    $select_query = "select * from `products`";
    $result_query = mysqli_query($con,$select_query);
    //$row = mysqli_fetch_assoc($result_query);
    //echo $row['product_title'];
    while($row = mysqli_fetch_assoc($result_query)){
      $product_id = $row['product_id'];
      $product_title = $row['product_title'];
      $product_description = $row['product_description'];
      $product_image1 = $row['product_image1'];
      $product_price = $row['product_price'];
      $category_id = $row['category_id'];
      $brands_id = $row['brands_id'];
      echo "<div class='col-md-4 mb-2'>
      <div class='card'>
  <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
  <div class='card-body'>
    <h5 class='card-title'>$product_title</h5>
    <p class='card-text'>$product_description</p>
    <p class='card-text'>Price: $product_price /-</p>
    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
  </div>
</div>
      </div>";
    }
}
}
}



//getting all products
function get_all_products(){
  global $con;
      //condition to check isset or not
      if(!isset($_GET['categories'])){
       if(!isset($_GET['brands'])){

    $select_query = "select * from `products`";
    $result_query = mysqli_query($con,$select_query);
    //$row = mysqli_fetch_assoc($result_query);
    //echo $row['product_title'];
    while($row = mysqli_fetch_assoc($result_query)){
      $product_id = $row['product_id'];
      $product_title = $row['product_title'];
      $product_description = $row['product_description'];
      $product_image1 = $row['product_image1'];
      $product_price = $row['product_price'];
      $category_id = $row['category_id'];
      $brands_id = $row['brands_id'];
      echo "<div class='col-md-4 mb-2'>
      <div class='card'>
  <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
  <div class='card-body'>
    <h5 class='card-title'>$product_title</h5>
    <p class='card-text'>$product_description</p>
    <p class='card-text'>Price: $product_price /-</p>
    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
  </div>
</div>
      </div>";
    }
}
}
}





//geting unique categories
function get_unique_categories(){
    global $con;
    //condition to check isset or not
    if(isset($_GET['categories'])){
        $categories_id = $_GET['categories'];
  $select_query = "select * from `products` where category_id=$categories_id";
  $result_query = mysqli_query($con,$select_query);
  $num_of_rows = mysqli_num_rows($result_query);
  if($num_of_rows==0){
    echo "<h2 class='text-center text-danger'>No stock this Category</h2>";
  }
  //$row = mysqli_fetch_assoc($result_query);
  //echo $row['product_title'];
  while($row = mysqli_fetch_assoc($result_query)){
    $product_id = $row['product_id'];
    $product_title = $row['product_title'];
    $product_description = $row['product_description'];
    $product_image1 = $row['product_image1'];
    $product_price = $row['product_price'];
    $category_id = $row['category_id'];
    $brands_id = $row['brands_id'];
    echo "<div class='col-md-4 mb-2'>
    <div class='card'>
<img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
<div class='card-body'>
  <h5 class='card-title'>$product_title</h5>
  <p class='card-text'>$product_description</p>
  <p class='card-text'>Price: $product_price /-</p>
  <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
  <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
</div>
</div>
    </div>";
  }
}
}

//geting unique categories
function get_unique_brands(){
    global $con;
    //condition to check isset or not
    if(isset($_GET['brands'])){
        $brands_id = $_GET['brands'];
  $select_query = "select * from `products` where brands_id=$brands_id";
  $result_query = mysqli_query($con,$select_query);
  $num_of_rows = mysqli_num_rows($result_query);
  if($num_of_rows==0){
    echo "<h2 class='text-center text-danger'>This Brands is not available for service</h2>";
  }
  //$row = mysqli_fetch_assoc($result_query);
  //echo $row['product_title'];
  while($row = mysqli_fetch_assoc($result_query)){
    $product_id = $row['product_id'];
    $product_title = $row['product_title'];
    $product_description = $row['product_description'];
    $product_image1 = $row['product_image1'];
    $product_price = $row['product_price'];
    $category_id = $row['category_id'];
    $brands_id = $row['brands_id'];
    echo "<div class='col-md-4 mb-2'>
    <div class='card'>
<img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
<div class='card-body'>
  <h5 class='card-title'>$product_title</h5>
  <p class='card-text'>$product_description</p>
  <p class='card-text'>Price: $product_price /-</p>
  <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
  <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
</div>
</div>
    </div>";
  }
}
}







//displaying brands in sidenav
function getbrands(){
    global $con;
    $select_brands = "select * from `brands`";
    $result_brands = mysqli_query($con,$select_brands);
    //$row_data = mysqli_fetch_assoc($result_brands); 
    //echo $row_data['brands_title'];
    //echo $row_data['brands_title'];
    while($row_data = mysqli_fetch_assoc($result_brands)){
     $brands_title = $row_data['brands_title'];
     $brands_id = $row_data['brands_id'];
     echo "<li class='nav-item'>
     <a href='index.php?brands=$brands_id' class='nav-link text-light'>$brands_title</a>
   </li>";
    }
}
//displaying categories in sidenav
function getcategories(){
    global $con;
    $select_categories = "select * from `categories`";
         $result_categories = mysqli_query($con,$select_categories);
         //$row_data = mysqli_fetch_assoc($result_categories); 
         //echo $row_data['categories_title'];
         //echo $row_data['categories_title'];
         while($row_data = mysqli_fetch_assoc($result_categories)){
          $categories_title = $row_data['categories_title'];
          $categories_id = $row_data['categories_id'];
          echo "<li class='nav-item'>
          <a href='index.php?categories=$categories_id' class='nav-link text-light'>$categories_title</a>
        </li>";
         }
}


//searching products function
function search_products(){
  global $con;
if(isset($_GET['search_data_product'])){
  $search_data_value = $_GET['search_data'];
$search_query = "SELECT * FROM `products` WHERE product_title LIKE
 '%$search_data_value%'";
$result_query = mysqli_query($con,$search_query);
$num_of_rows = mysqli_num_rows($result_query);
if($num_of_rows==0){
  echo "<h2 class='text-center text-danger'>No results match. No products found on this category!</h2>";
} 
while($row = mysqli_fetch_assoc($result_query)){
  $product_id = $row['product_id'];
  $product_title = $row['product_title'];
  $product_description = $row['product_description'];
  $product_image1 = $row['product_image1'];
  $product_price = $row['product_price'];
  $category_id = $row['category_id'];
  $brands_id = $row['brands_id'];
  echo "<div class='col-md-4 mb-2'>
  <div class='card'>
<img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
<div class='card-body'>
<h5 class='card-title'>$product_title</h5>
<p class='card-text'>$product_description</p>
<p class='card-text'>Price: $product_price /-</p>
<a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
<a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
</div>
</div>
  </div>";
}
}
}

//view details function
function view_details(){
  global $con;
  if(isset($_GET['product_id'])){
      //condition to check isset or not
      if(!isset($_GET['categories'])){
       if(!isset($_GET['brands'])){
        $product_id = $_GET['product_id'];
    $select_query = "select * from `products` where product_id=$product_id";
    $result_query = mysqli_query($con,$select_query);
    while($row = mysqli_fetch_assoc($result_query)){
      $product_id = $row['product_id'];
      $product_title = $row['product_title'];
      $product_description = $row['product_description'];
      $product_image1 = $row['product_image1'];
      $product_image2 = $row['product_image2'];
      $product_image3 = $row['product_image3'];
      $product_price = $row['product_price'];
      $category_id = $row['category_id'];
      $brands_id = $row['brands_id'];
      echo "<div class='col-md-4 mb-2'>
      <div class='card'>
  <img src='./admin_area/product_images/$product_image1' class='card-img-top' 
  alt='$product_title'>
  <div class='card-body'>
    <h5 class='card-title'>$product_title</h5>
    <p class='card-text'>$product_description</p>
    <p class='card-text'>Price: $product_price /-</p>
    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
  </div>
</div>
      </div>
      
      <div class='col-md-8'>
            <div class='row'>
                <div class='col-md-12'>
                    <h4 class='text-center text-info mb-5'>Related Protects</h4>
                </div>
                <div class='col-md-6'>
                <img src='./admin_area/product_images/$product_image2' 
  class='card-img-top' alt='$product_title'>
                </div>
                <div class='col-md-6'>
                <img src='./admin_area/product_images/$product_image3' 
  class='card-img-top' alt='$product_title'>
                </div>
            </div>
        </div>
      ";
    }
}
}
  }
}
//get ip adress function 
function getIPAddress() {  
  //whether ip is from the share internet  
   if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
              $ip = $_SERVER['HTTP_CLIENT_IP'];  
      }  
  //whether ip is from the proxy  
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
              $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
   }  
//whether ip is from the remote address  
  else{  
           $ip = $_SERVER['REMOTE_ADDR'];  
   }  
   return $ip;  
}  
//$ip = getIPAddress();  
//echo 'User Real IP Address - '.$ip;  
function cart(){
  if(isset($_GET['add_to_cart'])){
    global $con;
    $get_ip_add = getIPAddress(); 
    $get_product_id = $_GET['add_to_cart'];
    $select_query="SELECT * FROM `cart_details` WHERE ip_adress = '$get_ip_add' 
    AND product_id = $get_product_id";
    $result_query = mysqli_query($con,$select_query);
    $num_of_rows = mysqli_num_rows($result_query);
  if($num_of_rows>0){
    echo "<script>alert('This item is already present inside cart')</script>";
    echo "<script>window.open('index.php', '_self')</script>";
 }else{
    $insert_query = "INSERT INTO `cart_details` (product_id, ip_adress, quantity) 
    VALUES ('$get_product_id', '$get_ip_add', 0)";
    $result_query = mysqli_query($con,$insert_query);
    echo "<script>alert('Item is added to cart')</script>";
    echo "<script>window.open('index.php', '_self')</script>";
  }
  }
}
//function to get cart item numbers
function cart_item(){
  if(isset($_GET['add_to_cart'])){
    global $con;
    $get_ip_add = getIPAddress(); 
    $get_product_id = $_GET['add_to_cart'];
    $select_query="SELECT * FROM `cart_details` WHERE ip_adress = '$get_ip_add'";
    $result_query = mysqli_query($con,$select_query);
    $count_cart_items = mysqli_num_rows($result_query);
 }else{
  global $con;
    $get_ip_add = getIPAddress(); 
    $select_query="SELECT * FROM `cart_details` WHERE ip_adress = '$get_ip_add'";
    $result_query = mysqli_query($con,$select_query);
    $count_cart_items = mysqli_num_rows($result_query);
 }
  echo $count_cart_items;
}
//total price function
function total_cart_price(){
  global $con;
  $get_ip_add = getIPAddress();
  $total_price = 0;
  $cart_query = "SELECT * FROM `cart_details` WHERE ip_adress = '$get_ip_add'";
  $result = mysqli_query($con,$cart_query);
  while ($row = mysqli_fetch_array($result)){
    $product_id = $row['product_id'];
    $selects_product = "SELECT * FROM `products` WHERE product_id = '$product_id'";
    $result_product = mysqli_query($con,$selects_product);
    while ($row_product_price = mysqli_fetch_array($result_product)){
      $product_price = array ($row_product_price['product_price']);
      $product_values = array_sum ($product_price);
      $total_price += $product_values;
    }
  }
echo $total_price;
}
// get user oeder details
function get_user_order_details(){
  global $con;
  $username = $_SESSION['username'];
  $get_details = "SELECT * FROM `user_table` WHERE username='$username'";
  $result_query = mysqli_query($con, $get_details);
  while($row_query= mysqli_fetch_array($result_query)){
    $user_id = $row_query['user_id'];
    if(!isset($_GET['edit_account'])){
      if(!isset($_GET['my_orders'])){
        if(!isset($_GET['delet_account'])){
          $get_orders = "SELECT * FROM `user_order` WHERE /*user_id=$user_id and*/
           order_status='pending'";
           $result_orders_query = mysqli_query($con, $get_orders);
           $row_count = mysqli_num_rows($result_orders_query);
           if($row_count>0){
            echo "<h3 class='text-center text-success mt-5 mb-2'>you have 
            <span class='text-danger'>$row_count</span> pending orders</h3>
            <p class='text-center'><a href='profile.php?my_orders' class='text-dark'>
            Order Details </a></p>";
           }else{
            echo "<h3 class='text-center text-success mt-5 mb-2'>you have zero 
             pending orders</h3>
            <p class='text-center'><a href='../index.php' class='text-dark'>
            Explore products</a></p>";
           }
        }
      }
    }
  }
}
?>