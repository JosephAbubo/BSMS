<?php

include("config.php");
if(isset($_POST['input'])){

    $input = $_POST['input'];

    $query = "SELECT * FROM upload WHERE filetype LIKE '{$input}%' OR name LIKE '{$input}%'
    OR fname LIKE '{$input}%'LIMIT 5";

    $result = mysqli_query($conn,$query);

    if(mysqli_num_rows($result) > 0){?>
        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th>File</th>
                    <th>filetype</th>
                    <th>Action</th>
                    
                   
                </tr>
          </thead>

          <tbody>
            <?php
                while($row = mysqli_fetch_assoc($result)){
                     $name = $row['name'];
                     $filetype = $row['filetype'];
                   
                 

                     ?>
                        <tr>
                            <td><?php echo $name;?></td>
                            <td><?php echo $filetype;?></td>
                            <td>
					<button class="alert-success"><a href="download.php?filename=<?php echo $name;?>&f=<?php echo $row['fname'] ?>">Download</a></button>
				</td>
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