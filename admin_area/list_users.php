<h3 class="text-center text-success">All Users</h3>
<table class="table table-bordered mt-5">
<thead class="bg-info">
        <?php
        $select_users = "SELECT * FROM `user_table`";
        $result_users = mysqli_query($con, $select_users);
        $row_count = mysqli_num_rows($result_users);

        if($row_count==0){
            echo "<h2 class='text-danger text-center mt-5'>No Payment Received Yet</h2>";
        }else{
            echo "<tr>
            <th>Sl no</th>
            <th>Username</th>
            <th>User Email</th>
            <th>User Image</th>
            <th>User Address</th>
            <th>User Mobile</th>
            <th>Delete</th>
            </tr>
            </thead>
            <tbody class='bg-secondary text-light'>";
            $number=0;
            while($row = mysqli_fetch_assoc($result_users)){
                $user_id=$row['user_id'];
                $username=$row['username'];
                $user_email=$row['user_email'];
                $user_image=$row['user_image'];
                $user_address=$row['user_address'];
                $user_mobile=$row['user_mobile'];
                $number++; 
                echo "<tr>
                <td>$number</td>
                <td>$username</td>
                <td>$user_email</td>
                <td><img src='../user_area/user_images/$user_image' alt='$user_image' class='product_img'/></td>
                <td>$user_address</td>
                <td>$user_mobile</td>
                <td><a href='index.php?delete_order=$user_id' type='button' 
                class='text-light' data-toggle='modal' data-target='#exampleModal'>
                <i class='fa-solid fa-trash'></i></a></td>
            </tr>"; 
            }
        }
        
        ?>
        
    </tbody>
</table>
<!-- Button trigger modal 
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>-->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h4>Are you sure you want to delete this?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
          <a href="./index.php?list_orders" class="text-light text-decoration-none">No</a></button>
        <button type="button" class="btn btn-primary"><a href='index.php?delete_order=<?php echo $order_id ?>'
            class="text-light text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>