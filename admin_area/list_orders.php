<h3 class="text-center text-success">All Orders</h3>
<table class="table table-bordered mt-5">
<thead class="bg-info">
        <?php
        $select_order = "SELECT * FROM `user_order`";
        $result_order = mysqli_query($con, $select_order);
        $row_count = mysqli_num_rows($result_order);

        if($row_count==0){
            echo "<h2 class='text-danger text-center mt-5'>No Order Yet</h2>";
        }else{
            echo "<tr>
            <th>Sl no</th>
            <th>Due Amount</th>
            <th>Invoice Number</th>
            <th>Total Products</th>
            <th>Order Date</th>
            <th>Status</th>
            <th>Delete</th>
            </tr>
            </thead>
            <tbody class='bg-secondary text-light'>";
            $number=0;
            while($row = mysqli_fetch_assoc($result_order)){
                $order_id=$row['order_id'];
                $user_id=$row['user_id'];
                $amount_due=$row['amount_due'];
                $invoice_number=$row['invoice_number'];
                $total_products=$row['total_products'];
                $order_date=$row['order_date'];
                $order_status=$row['order_status'];
                $number++; 
                echo "<tr>
                <td>$number</td>
                <td>$amount_due</td>
                <td>$invoice_number</td>
                <td>$total_products</td>
                <td>$order_date</td>
                <td>$order_status</td>
                <td><a href='index.php?delete_order=$order_id' type='button' 
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