<!--connect file-->
<?php 
session_start();
include('../includes/connect.php');
include('../functions/common_function.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!--bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
         crossorigin="anonymous">
         <!--font awesome link-->
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" 
         integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
         <!-- css file-->
    <link rel="stylesheet" href="../style.css">
    <style>
    .admin-image {
    width: 100px;
    object-fit: contain;
}
    .footer{
        position: absolute;
        bottom:0;
    }
    body{
        overflow-x: hidden;
    }
    .product_img{
        width: 100px;
        object-fit: contain;
    }
    </style>
</head>
<body>
    <!--navbar-->
      <div class="container-fluid p-0">
        <!--first child-->
        <nav class="navbar navbar-expend-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../images/logo.png" alt="" class="logo">
                <nav class="navbar navbar-expend-lg">
                    <ul class="navbar-nav">
                        <?php
                    if(!isset($_SESSION['username'])){
          echo "<li class='nav-item'>
          <a class='nav-link' href='#'>Welcome name </a>
        </li>";
          }else{
            echo "<li class='nav-item'>
            <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
          </li>"; 
          }?>
                    </ul>
</nav>
            </div>
        </nav>
        <!-- Second child-->
        <div class="bg-light">
            <h3 class="text-center p-2">Manage Details</h3>
        </div>
        <!-- third child-->
                <div class="row">
                    <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                        <div class="p-3">
                        <a href="#"><img src="../images/light3.png" alt=""class="admin-image"></a>
                        <p class="text-light text-center">Admin Name</p>
                        </div>
                        <div class="button text-center">
                            <button class="my-3"><a href="insert_prodect.php" class="nav-link text-light bg-info my-1">Insert Products</a></button>
                            <button><a href="index.php?view_products" class="nav-link text-light bg-info my-1">View Products</a></button>
                            <button><a href="index.php?insert_categories" class="nav-link text-light bg-info my-1">Insart Categories</a></button>
                            <button><a href="index.php?view_category" class="nav-link text-light bg-info my-1">View Categories</a></button>
                            <button><a href="index.php?insert_brands" class="nav-link text-light bg-info my-1">Insert Brands</a></button>
                            <button><a href="index.php?view_brands" class="nav-link text-light bg-info my-1">View Brands</a></button>
                            <button><a href="index.php?list_orders" class="nav-link text-light bg-info my-1">All orders</a></button>
                            <button><a href="index.php?list_payments" class="nav-link text-light bg-info my-1">All payments</a></button>
                            <button><a href="index.php?list_users" class="nav-link text-light bg-info my-1">List users</a></button>
                            <button><a href="" class="nav-link text-light bg-info my-1">Logout</a></button>
                        </div>
                    </div>
                </div>
        <!-- fourth child-->
        <div class="container my-3 ">
            <?php 
              if(isset($_GET['insert_categories'])){
                  include('insart_categories.php');
              }
              if(isset($_GET['insert_brands'])){
                include('insert_brands.php');
            }
            if(isset($_GET['view_products'])){
                include('view_products.php');
            }
            if(isset($_GET['edit_products'])){
                include('edit_products.php');
            }
            if(isset($_GET['delete_products'])){
                include('delete_product.php');
            }
            if(isset($_GET['view_category'])){
                include('view_category.php');
            }
            if(isset($_GET['view_brands'])){
                include('view_brands.php');
            }
            if(isset($_GET['edit_category'])){
                include('edit_category.php');
            }
            if(isset($_GET['edit_brands'])){
                include('edit_brands.php');
            }
            if(isset($_GET['delete_category'])){
                include('delete_category.php');
            }
            if(isset($_GET['delete_brand'])){
                include('delete_brand.php');
            }
            if(isset($_GET['list_orders'])){
                include('list_orders.php');
            }
            if(isset($_GET['delete_order'])){
                include('delete_order.php');
            }
            if(isset($_GET['list_payments'])){
                include('list_payments.php');
            }
            if(isset($_GET['list_users'])){
                include('list_users.php');
            }
            ?>
        </div>
         
       
        <!-- last child-->
      <?php
      include ("../includes/footer.php");
      ?>

      </div>
    <!--bootstrap js link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" 
crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
 integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" 
crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
 integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" 
 crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" 
integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" 
crossorigin="anonymous"></script>
</body>
</html>