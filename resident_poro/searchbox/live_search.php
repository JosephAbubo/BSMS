<?php

include("config.php");
if(isset($_POST['input'])){

    $input = $_POST['input'];

    $query = "SELECT * FROM notifications WHERE invoiceid LIKE '{$input}%'LIMIT 2";

    $result = mysqli_query($conn,$query);

    if(mysqli_num_rows($result) > 0){?>
        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th>Tracking number</th>
                    <th>Name</th>
                    <th>Type of Document</th>
                    <th>Status</th>
                    <th>remarks</th>
                </tr>
          </thead>

          <tbody>
            <?php
                while($row = mysqli_fetch_assoc($result)){
                     $invoiceid = $row['invoiceid'];
                     $name = $row['name'];
                     $price = $row['price'];
                     $status1 = $row['status1'];
                     $remarks = $row['remarks'];
                 

                     ?>
                        <tr>
                            <td><?php echo $invoiceid;?></td>
                            <td><?php echo $name;?></td>
                            <td><?php echo $price;?></td>
                            <td><?php echo $status1;?></td>
                            <td><?php echo $remarks;?></td>
                          </tr>
                     <?php
                }
            ?>
            </tbody>
        </table>

        <?php

    }else{
        echo "<h6 class='text-danger text-center mt-3'>No data Found</h6>";
    }
}

?>