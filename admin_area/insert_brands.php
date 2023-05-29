<?php
  include('../includes/connect.php');
  if(isset($_POST['insert_brands'])){
    $brands_title = $_POST['bra_title'];
    //select data from database
    $select_query = "select * from `brands` where brands_title='$brands_title'";
    $result_select = mysqli_query($con,$select_query);
    $number = mysqli_num_rows($result_select);
    if($number>0){
        echo"<script>alert('This brands is present inside the database')</script>";
    }else{
        
    $insert_guery ="insert into `brands` (brands_title) values ('$brands_title')";
    $result = mysqli_query($con,$insert_guery);
    if($result){
        echo"<script>alert('Brands has been inserted successfully')</script>";
    }
}}
?>



<h2 class="text-center">Insert Brands</h2>
<form action="" method="post" class="mb-2">
<div class="input-group w-90 mb-2">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="bra_title" placeholder="Insert Brands" 
  aria-label="Brands" aria-describedby="basic-addon1">
</div>
<div class="input-group w-10 mb-2 m-auto">
       <input type="submit" class="bg-info border-0 p-2 my-3" name="insert_brands" value="Insaert Brands">
</div>
</form>