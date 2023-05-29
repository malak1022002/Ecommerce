<h3 class="text-center text-success">All Payments</h3>
<table class="table table-bordered mt-5">
<thead class="bg-info">
        <?php
        $select_pyment = "SELECT * FROM `user_payments`";
        $result_payment = mysqli_query($con, $select_pyment);
        $row_count = mysqli_num_rows($result_payment);

        if($row_count==0){
            echo "<h2 class='text-danger text-center mt-5'>No Payment Received Yet</h2>";
        }else{
            echo "<tr>
            <th>Sl no</th>
            <th>Invoice Number</th>
            <th>Amount</th>
            <th>Payment Mode</th>
            <th>Order Date</th>
            <th>Delete</th>
            </tr>
            </thead>
            <tbody class='bg-secondary text-light'>";
            $number=0;
            while($row = mysqli_fetch_assoc($result_payment)){
                $order_id=$row['order_id'];
                $payment_id=$row['payment_id'];
                $amount=$row['amount'];
                $invoice_number=$row['invoice_number'];
                $payment_mode=$row['payment_mode'];
                $date=$row['date'];
                $number++; 
                echo "<tr>
                <td>$number</td>
                <td>$invoice_number</td>
                <td>$amount</td>
                <td>$payment_mode</td>
                <td>$date</td>
                <td><a href='index.php?delete_order=$payment_id' type='button' 
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